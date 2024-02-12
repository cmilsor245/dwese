<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Http\Requests\ProductoRequest; // Added to use custom request validation
use App\Http\Resources\ProductoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():JsonResource
    {
        $products = Products::all();
        // return response()->json($products,200);
        return ProductoResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     * Use ProductoRequest for validation.
     */
    public function store(ProductoRequest $request): JsonResource
    {
        $producto = new Products();
        $producto->name = $request->name;
        $producto->description = $request->description;
        $producto->save();
        $producto->categorias()->attach($request->categorias);
        return new ProductoResource($producto);

        /* $categorias = $request->categorias;
        $params = $request->all();
        unset($params['categorias']);
        $products = Products::create($params);
        $products->categorias()->attach($request->categorias);
        // return response()->json($products,200);
        // return response()->json($products, 201);
        return new ProductoResource($products); */
    }

    /**
     * Display the specified resource.
     */
    public function show($id):JsonResource
    {
        $products = Products::find($id);
        // return response()->json($products,200);
        return new ProductoResource($products);
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
     * Use ProductoRequest for validation.
     */
    public function update(ProductoRequest $request, $id): JsonResource // Changed to use ProductoRequest for validation
    {
        $products = Products::find($id);
        $products->name = $request->name;
        $products->description = $request->description;
        $products->categorias()->detach();
        $products->categorias()->attach($request->categorias);
        $products->save();
        // return response()->json($products,200);
        return new ProductoResource($products);
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

