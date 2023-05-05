<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "product_name",
        "reference",
        "price",
        "weight",
        "stock",
        "created_by"
    ];


    public function creator(){
        return $this->belongsTo(User::class,"created_by");
    }
}
