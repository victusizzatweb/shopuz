<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $categories = Category::where("status" , 'active')->get();
        $product = Product::latest()->first(); 
        $products = Product::limit(8)->get(); 
     return view('frontend.index', compact('categories' , 'product','products' ));
}
    public function single($id){
        $categories = Category::where("status" , 'active')->get();
        $product = Product::findOrFail($id); 
        $products = Product::limit(8)->get(); 
        return view('frontend.single', compact('categories' , 'product','products' ));
    }
}