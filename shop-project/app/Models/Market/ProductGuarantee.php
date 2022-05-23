<?php

namespace App\Models\Market;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductGuarantee extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "guarantees";

    protected $fillable = ["name", "product_id", "price_increase", "sold_number", "frozen_number", "marketable_number"];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
