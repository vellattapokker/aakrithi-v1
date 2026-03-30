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
                'apparels' => 'Designer Apparels & Ethnic Wear',
                'kutties' => 'Kutties Collection - Traditional Kids Wear',
                'decors' => 'Handloom Home Decors & Embroidered Sarees',
                'boutique' => 'Custom Boutique & Designer Studio',
            ];
            $catName = $categoryMap[$category] ?? ucfirst($category);
            $query->where('category', $catName);
            $title = "$catName | Aakrithi";
            $meta_description = "Shop $catName at Aakrithi. Our curated collection brings you the finest selection of handpicked artisanal clothing and home decor.";
        } else {
            $meta_description = "Explore the full collection of designer ethnic wear, handloom sarees, and artisanal products at Aakrithi. Find timeless style for every occasion.";
        }

        $meta_keywords = "Aakrithi shop, designer apparel, ethnic wear online, boutique sarees, traditional Indian clothing";

        // Apply Sorting
        $this->applySorting($query, $sort);

        $products = $query->get();
        return view('shop', compact('products', 'title', 'meta_description', 'meta_keywords'));
    }

    public function category(Request $request, $slug)
    {
        $sort = $request->get('sort', 'latest');
        $query = Product::query();
        
        $categoryMap = [
            'apparels' => 'Designer Apparels & Ethnic Wear',
            'kutties' => 'Kutties Collection - Traditional Kids Wear',
            'decors' => 'Handloom Home Decors & Embroidered Sarees',
            'boutique' => 'Custom Boutique & Designer Studio',
        ];
        $catName = $categoryMap[strtolower($slug)] ?? ucfirst(str_replace('-', ' ', $slug));
        
        $query->where('category', $catName);
        $title = "$catName | Aakrithi";
        $meta_description = "Shop $catName at Aakrithi. Discover our unique collection of artisanal clothing and home decor handcrafted for elegance.";
        $meta_keywords = "$catName, Aakrithi collection, Indian ethnic wear, designer sarees, handloom boutique";

        // Apply Sorting
        $this->applySorting($query, $sort);

        $products = $query->get();
        return view('shop', compact('products', 'title', 'meta_description', 'meta_keywords'));
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
