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
        $sort = $request->get('sort', 'latest');
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

        // Apply Sorting
        $this->applySorting($query, $sort);

        $products = $query->get();
        return view('shop', compact('products', 'title'));
    }

    public function category(Request $request, $slug)
    {
        $sort = $request->get('sort', 'latest');
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

        // Apply Sorting
        $this->applySorting($query, $sort);

        $products = $query->get();
        return view('shop', compact('products', 'title'));
    }

    private function applySorting($query, $sort)
    {
        switch ($sort) {
            case 'price-low':
                $query->orderBy('price', 'asc');
                break;
            case 'price-high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'latest':
            default:
                $query->orderBy('id', 'desc');
                break;
        }
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
