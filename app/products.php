<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable=[
        'name','price','product_type','weight','color','description','image'
    ];
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
}
