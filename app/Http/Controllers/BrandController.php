<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $brands = Brand::where("status" ,'!=', 'deleted')->paginate(20);
             return view("dashboard.brand.index" , compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands|max:55'
        ]);


        Brand::create([
            "name" => $request->name
        ]);
        return redirect(route('brand.index'))->with('message','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('dashboard.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|max:55'
        ]);


        $brand->update([
            "name" => $request->name
        ]);
        return redirect(route('brand.index'))->with('update','success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->update([
           'status'=>'deleted'
        ]);
        return redirect()->back()->with('delete','seccess');

    }
    public function restore($id){
        Brand::findOrFail($id)->update([
            'status' => 'active'
        ]);
        return redirect()->back();

    }
}
