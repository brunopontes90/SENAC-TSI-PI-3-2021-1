<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'desc',
        'price',
        'category_id',
        'image'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);

    }

    public static function promocoes(){
        return Product::all()->take(2);
        /* return $this::all('destaque','=','1')->orderBy('updated_at')->take(3);*/
    }

}
