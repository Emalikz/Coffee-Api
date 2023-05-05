<?php
    namespace App\Services;

use App\Models\Product;
use App\Models\Sell;
    class AnalyticsService {
        public function __construct(protected ProductService $productService){}
        public function mostSold(){
            $mostSold = Sell::selectRaw("count(*) as total, product_id")->whereHas("product")->groupBy("product_id")->orderBy("total", 'DESC')->get()->first()->toArray();
            $product = $this->productService->find($mostSold['product_id']);
            $product->sells = count($product->sells);
            return $product;
        }

        public function higherStock(){
            return Product::orderBy("stock",'DESC')->first();
        }
    }
