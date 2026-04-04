<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        
        // Sync session images with current DB state to ensure new assets are picked up
        if (!empty($cart)) {
            $updated = false;
            foreach ($cart as $id => &$details) {
                $product = \App\Models\Product::find($id);
                if ($product && $details['image'] !== $product->image) {
                    $details['image'] = $product->image;
                    $updated = true;
                }
            }
            if ($updated) {
                session()->put('cart', $cart);
            }
        }

        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        return view('cart', compact('cart', 'total'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Your cart is empty!');
        }

        $razorpayKey = config('services.razorpay.key');
        $addresses = auth()->check() ? auth()->user()->addresses()->orderBy('is_default', 'desc')->get() : collect([]);

        return view('checkout', compact('cart', 'total', 'razorpayKey', 'addresses'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image,
                "category" => $product->category
            ];
        }

        session()->put('cart', $cart);

        if ($request->query('redirect') === 'checkout') {
            return redirect()->route('checkout')->with('success', 'Ready for checkout!');
        }

        if ($request->query('redirect') === 'cart') {
            return redirect()->route('cart')->with('success', 'Product added — ready to checkout!');
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function wholesaleIndex()
    {
        $cart = session()->get('wholesale_cart', []);
        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
        $totalQuantity = array_reduce($cart, function($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);

        return view('wholesale-cart', compact('cart', 'total', 'totalQuantity'));
    }

    public function wholesaleAdd(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('wholesale_cart', []);
        $qtyToAdd = $request->query('quantity', 6);

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $qtyToAdd;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => (int)$qtyToAdd,
                "price" => $product->price,
                "image" => $product->image,
                "category" => $product->category
            ];
        }

        session()->put('wholesale_cart', $cart);

        return redirect()->route('wholesale.cart')->with('success', 'Item added to wholesale cart!');
    }

    public function wholesaleRemove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('wholesale_cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('wholesale_cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function wholesaleUpdate(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('wholesale_cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('wholesale_cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function wholesaleCheckout()
    {
        $cart = session()->get('wholesale_cart', []);
        $totalQuantity = array_reduce($cart, function($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);

        if ($totalQuantity < 6) {
            return redirect()->route('wholesale.cart')->with('error', 'Minimum 6 items required for wholesale orders!');
        }

        $total = array_reduce($cart, function($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $addresses = auth()->check() ? auth()->user()->addresses()->orderBy('is_default', 'desc')->get() : collect([]);

        return view('wholesale-checkout', compact('cart', 'total', 'totalQuantity', 'addresses'));
    }
}
