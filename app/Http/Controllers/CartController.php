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

        $razorpayKey = env('RAZORPAY_KEY_ID');
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
}
