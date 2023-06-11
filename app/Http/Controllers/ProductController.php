<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Pimage;
use App\Models\Category;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where("status" ,'!=', 'deleted')->paginate(20);
        return view("dashboard.product.index" , compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where("status" ,'!=', 'deleted')->get();
        $brands = Brand::where("status" ,'!=', 'deleted')->get();
        return view("dashboard.product.create" , compact("brands","categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
             'name_uz' => 'required',
             'name_ru' => 'required',
             'category_id' => 'required|numeric',
             'brand_id' => 'required|numeric',
             'description_uz' => 'required',
             'description_ru' => 'required',
             'price' => 'required|numeric',
        ]);


        // if ($validator->fails()) {

        //     $messages = $validator->messages();
    
        //     return redirect(route('product.create'))->withErrors($messages);
    
        // }else{
        //     return "WoW";  
        // }


        $imageRules = array(
            'image' => 'image|max:4000'
        );
        
        foreach($request->image as $image)
        {
          $image = array('image' => $image);
            $imageValidator = Validator::make($image, $imageRules);
            if ($imageValidator->fails()) {
                $messages = $imageValidator->messages();
                return redirect(route('product.create'))->withErrors($messages);
            }
        } 


        // $path = md5(rand(1111,9999) . microtime()).".".$request->image->extension();
        // $request->image->storeAs("public/product/",$path);
        $product = Product::create([
            "name_uz"=> $request->name_uz,
            "name_ru"=> $request->name_ru,
            "brand_id"=> $request->brand_id,
            "category_id"=> $request->category_id,
            "price"=> $request->price,
            "description_uz"=> $request->description_uz,
            "description_ru"=> $request->description_ru,
            "status"=> 'active'
        ]);
        
        
        foreach($request->image as $image)
        {  $path = md5(rand(1111,9999) . microtime()).".".$image->extension();
           $image->storeAs("public/product/",$path);
            Pimage::create([
              'p_id' => $product->id,
              'path'=>$path,
            ]);
            
        } 
       
       
        return redirect(route('product.index'))->with('create','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {   
        $categories = Category::where("status" ,'!=', 'deleted')->get();
        $brands = Brand::where("status" ,'!=', 'deleted')->get();
        return view('dashboard.product.edit',compact('product',"brands","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name_uz' => 'required',
            'name_ru' => 'required',
            'category_id' => 'required|numeric',
            'brand_id' => 'required|numeric',
            'description_uz' => 'required',
            'description_ru' => 'required',
            'price' => 'required|numeric',
        ]);
        if($request->has('image')){

            $imageRules = array(
                'image' => 'image|max:4000'
            );
            
            foreach($request->image as $image)
            {
              $image = array('image' => $image);
                $imageValidator = Validator::make($image, $imageRules);
                if ($imageValidator->fails()) {
                    $messages = $imageValidator->messages();
                    return redirect(route('product.create'))->withErrors($messages);
                }
            } 
            $pimages =  Pimage::where('p_id',$product->id)->get();
            foreach($pimages as $pimage){   

                File::delete('storage/product/'.$pimage->path);

            }
             Pimage::where('p_id',$product->id)->delete();
             foreach($request->image as $image)
             {  $path = md5(rand(1111,9999) . microtime()).".".$image->extension();
                $image->storeAs("public/product/",$path);
                 Pimage::create([
                   'p_id' => $product->id,
                   'path'=>$path,
                 ]);
                 
             } 
        }
       
        $product->update([
            "name_uz"=> $request->name_uz,
            "name_ru"=> $request->name_ru,
            "brand_id"=> $request->brand_id,
            "category_id"=> $request->category_id,
            "price"=> $request->price,
            "description_uz"=> $request->description_uz,
            "description_ru"=> $request->description_ru
        ]);
        return redirect(route('product.index'))->with('update','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
        {  
             $product->update([
            'status'=>'deleted'
        ]);
        return redirect()->back()->with('delete','seccess');

    }

    public function trash(Request $request)
        {  if($request->has('key')){
            $products = Product::where("status",'deleted')->where('name_uz','like', '%'.$request->key.'%')->paginate(20);
        }else{
            $products = Product::where("status",'deleted')->paginate(20);
        }
            
             $brands = Brand::where("status",'deleted')->paginate(20);
             $categories = Category::where("status",'deleted')->paginate(20);
             return view('dashboard.trash',compact('products',"brands","categories"));

    }
    public function restore($id){
        Product::findOrFail($id)->update([
            'status' => 'active'
        ]);
        return redirect()->back();

    }
}
