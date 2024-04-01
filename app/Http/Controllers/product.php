<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class product extends Controller
{
    public function allProduct()
    {
        $cateName = "All Product";
        $product = Http::get("https://dummyjson.com/products");
        if ($product->successful()) {
            $data = $product->json();
            // dd($data); 
            $categories = Http::get("https://dummyjson.com/products/categories");
            $categories = $categories->json();
            return view('allproduct', ['data' => $data['products'], 'categories' => $categories, 'cateName' => $cateName]);
        } else {
            $status = $product->status();
            return view('error');
        }
    }
    public function productID($id)
    {
        $product = Http::get("https://dummyjson.com/products/" . $id);
        if ($product->successful()) {
            $data = $product->json();
            return view('product', ['data' => $data]);
        } else {
            $status = $product->status();
            return view('error');
        }
    }

    public function categories($categories)
    {
        $cateName = ucwords(strtolower($categories));
        $product = Http::get("https://dummyjson.com/products/category/" . $categories);
        // dd($product);
        if ($product->successful()) {
            $data = $product->json();
            $categories = Http::get("https://dummyjson.com/products/categories");
            $categories = $categories->json();
            return view('allproduct', ['data' => $data['products'], 'categories' => $categories, 'cateName' => $cateName]);
        } else {
            $status = $product->status();
            return view('error');
        }
    }
}
