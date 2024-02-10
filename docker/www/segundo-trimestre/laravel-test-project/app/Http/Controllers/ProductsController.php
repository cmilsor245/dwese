<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Products::all();
        return response()->json($products,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $products = new Products;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->save();
        return response()->json($products,200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $products = Products::find($id);
        return response()->json($products,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $products = Products::find($id);
        if($products){
            $products->name = $request->name;
            $products->description = $request->description;
            $products->save();
            return response()->json($products,200);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $products = Products::find($id);
        if($products){
            $products->delete();
            return response()->json(null,204);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }
}

