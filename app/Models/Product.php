<?php

namespace App\Models;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $guarded =['id'];

    public function imagePath()
    {
        return asset('').'storage/product/'.$this->image;
    }
    public function brand(){
        return $this->belongsTo(Brand::class); 
    }
    public function category(){
        return $this->belongsTo(Category::class); 
    }
    public function images(){
        return $this->hasMany(Pimage::class , 'p_id'); 
    }
}
