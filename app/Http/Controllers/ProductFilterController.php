<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Products = Product::paginate(5);
        $Category = Product::select('category')->distinct()->pluck('category');
        $Color = Product::select('color')->distinct()->pluck('color');
       
        return view('products',['products' => $Products,'category' => $Category,'color' => $Color,]);
    }
    public function filter(Request $request)
    {
        $category = $request->category;
        $color = $request->color;
        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
    
        $products = Product::query();
    
        if (!empty($category)) {
            $products->where('category', $category);
        }
        if (!empty($color)) {
            $products->where('color', $color);
        }
        if (!empty(($minprice) & ($maxprice))) {
            $products->whereBetween('price', [$minprice,$maxprice]);
        }
    
        $productList = $products->get();
    
        return response()->json(['products' => $productList]);
    }
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
