<?php

namespace app\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Products\ProductCreationRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreationRequest $product)
    {
        dd($product->all());
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
