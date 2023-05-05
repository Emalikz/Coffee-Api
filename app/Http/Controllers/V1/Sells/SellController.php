<?php

namespace App\Http\Controllers\V1\Sells;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Sells\SellProductRequest;
use App\Services\SellService;
use App\Exceptions\ProductOutOfStockException;

class SellController extends Controller
{

    public function __construct(protected SellService $sellService)
    {

    }
    /**
     * Store a newly sell in storage.
     */
    public function sell(SellProductRequest $sellProduct)
    {
        try{
            $this->sellService->verifyAndSell($sellProduct->product_id, $sellProduct->amount);
            return response()->json([
                "error" => false,
                "message" => "Product sold successfully"
            ]);
        }catch(ProductOutOfStockException $e){
            return response()->json([
                "error" => true,
                "errors" => [
                    "amount" => ["Product Out Of Stock"]
                ]
            ],422);
        }
    }
}
