<?php

namespace App\Models;

use App\Services\ProductService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [
        "product_id",
        "amount",
        "sold_by"
    ];

    public static function boot(){
        parent::boot();
        static::created(function($item){
            $product = Product::find($item->product_id);
            $product->stock = $product->stock - $item->amount;
            $product->save();

        });
    }
    use HasFactory;

    public function seller(){
        return $this->belongsTo(User::class,"sold_by");
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
