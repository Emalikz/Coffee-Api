<?php

namespace App\Http\Controllers\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Products\ProductCreationRequest;
use App\Models\Product;
use App\Services\ProductService;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct(protected ProductService $productService)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductCreationRequest $product)
    {
        try{
            $this->productService->store($product->all());

            return response()->json([
                "error" => false,
                "message" => "Product save correctly"
            ]);
        }catch(Exception $e){
            return response()->json([
                "error" => true,
                "message" => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
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
