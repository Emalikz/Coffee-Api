<?php

    namespace App\Services;

use App\Http\Resources\ProductCollection;
use App\Models\Product;

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


        /**
         * Store a product in database
         * @return App\Models\Product;
         */
        public function store(mixed $product){
            $creator = $this->authService->session_id();
            $product['created_by'] = $creator;
            return Product::create($product);
        }


        /**
         * Retrieves a collection of products
         * @return App\Http\Resources\ProductCollection
         */
        public function list(){
            return new ProductCollection(Product::all());
        }
    }
