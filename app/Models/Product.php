<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Since we're using Form Request validation (StoreProductRequest and UpdateProductRequest),
     * and only validated data is passed via $request->validated(),
     * we don't need $fillable. All fields are guarded except those explicitly allowed.
     */
    protected $guarded = [];
}
