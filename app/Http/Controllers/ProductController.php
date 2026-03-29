<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::take(4)->get();
        return view('home', compact('products'));
    }

    public function shop(Request $request)
    {
        $category = $request->get('category');
        $query = Product::query();
        $title = 'All Shop';

        if ($category) {
            $categoryMap = [
                'apparels' => 'Apparels',
                'kutties' => 'Kutties',
                'decors' => 'Decors',
                'boutique' => 'Boutique & Designs',
            ];
            $catName = $categoryMap[$category] ?? ucfirst($category);
            $query->where('category', $catName);
            $title = "Aakrithi $catName";
        }

        $products = $query->get();
        return view('shop', compact('products', 'title'));
    }

    public function category($slug)
    {
        $query = Product::query();
        
        $categoryMap = [
            'apparels' => 'Apparels',
            'kutties' => 'Kutties',
            'decors' => 'Decors',
            'boutique' => 'Boutique & Designs',
        ];
        $catName = $categoryMap[strtolower($slug)] ?? ucfirst(str_replace('-', ' ', $slug));
        
        $query->where('category', $catName);
        $title = "Aakrithi $catName";

        $products = $query->get();
        return view('shop', compact('products', 'title'));
    }

    public function show($slug)
    {
        // First try to find by slug
        $product = Product::where('slug', $slug)->first();

        // If not found AND the value is numeric, try finding by ID and redirect to slug URL
        if (!$product && is_numeric($slug)) {
            $product = Product::find($slug);
            if ($product && $product->slug) {
                return redirect()->route('product', $product->slug, 301);
            }
        }

        if (!$product) {
            abort(404);
        }

        return view('product', compact('product'));
    }
}
