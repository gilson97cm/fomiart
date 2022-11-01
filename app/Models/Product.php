<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'categoryId',
        'name',
        'shortDescription',
        'longDescription',
        'discountRate',
        'price',
        'urlImage',
        'unit',
        'code',
        'status',
    ];

    public function category(){
        return $this->belongsTo(ProductCategory::class,'categoryId');
    }

    public function pictures(){
        return $this->morphMany(Picture::class,'pictureable');
    }

    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }
}
