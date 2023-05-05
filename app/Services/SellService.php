<?php

    namespace App\Services;

use App\Models\Product;
use App\Models\Sell;
use App\Services\ProductService as ServicesProductService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Exceptions\ProductNotFoundException;
use App\Exceptions\ProductOutOfStockException;

    class SellService {

        public function __construct(protected ServicesProductService $productService, protected AuthService $authService){

        }
        /**
         * Find Product by id from database
         * @param integer $id
         * @return \App\Models\Product
         */
        public function verifyAndSell($product, $amount):void{
            try{
                $product = $this->productService->find($product);
                if($product->stock < $amount){
                    throw new ProductOutOfStockException();
                }
                $this->sell($product,$amount);
            }catch(ModelNotFoundException $e){
                throw new ProductNotFoundException();
            }
        }

        /**
         * Create sell from product and amount
         */
        public function sell(Product $product, $amount){
            $current_user = $this->authService->session_id();
            $sell = new Sell();
            $sell->fill([
                "product_id" => $product->id,
                "sold_by" => $current_user,
                "amount" => $amount
            ]);

            $sell->save();
        }
    }
