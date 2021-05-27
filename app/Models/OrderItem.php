<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'qunatity', 'price'];

    public function product(){
        return Product::where('id', '=', $this->product_id)->first();
        //return $this->belongsTo(Product::class);
    }

}

