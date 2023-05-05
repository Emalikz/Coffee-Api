<?php

    namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Log;

    class ProductService {

        public function __construct(private AuthService $authService){

        }
        /**
         * Find Product by id from database
         * @param integer $id
         * @return App\Models\Product;
         */
        public function find($id){
            return Product::find($id);
        }


        public function store(mixed $product){
            $creator = $this->authService->session_id();
            $product['created_by'] = $creator;
            return Product::create($product);
        }
    }
