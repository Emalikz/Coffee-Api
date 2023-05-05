<?php

namespace App\Http\Controllers\V1\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Products\ProductCreationRequest;
use App\Http\Requests\V1\Products\ProductUpdatingRequest;
use App\Models\Product;
use App\Services\ProductService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductController extends Controller
{

    public function __construct(protected ProductService $productService)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->productService->list();
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
    public function show($product)
    {
        try{
            $this->productService->find($product);
        }catch(ModelNotFoundException $e){
            dd($e);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdatingRequest $data,$product)
    {
        try{
            $product = $this->productService->find($product);
            $newProduct = $this->productService->update($product,$data->all());
        }catch(ModelNotFoundException $e){

            return response([
                "error"=> true,
                "message" => "record not found"
            ],404);
        }catch(Exception $e){
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
