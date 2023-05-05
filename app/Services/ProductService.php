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
         * @return \App\Models\Product
         */
        public function find($id):Product{
            return Product::findOrFail($id);
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

        /**
         * Update product from entry data
         * @return \App\Models\Product
         */
        public function update(Product $product, mixed $newData):Product{
            $newData['modified_by'] = $this->authService->session_id();
            $product->update($newData);
            return $product;
        }

        /**
         * Delete a product from database
         * @return void
         */
        public function delete(Product $product){
            return $product->delete();
        }
    }
