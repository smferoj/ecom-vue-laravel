<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug;
    use HasFactory;

     protected $filable = [
        'title',
        'slug',
        'quantity',
        'description',
        'published',
        'instock',
        'price',
        'created_by',
        'updated_by',
        'deleted_by',
     ];
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    function product_images(){
        return $this->hasMany(Product_image::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }
    function brand(){
        return $this->belongsTo(Brand::class);
    }
}


 