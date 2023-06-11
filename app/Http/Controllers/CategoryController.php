<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $categories = Category::where("status" ,'!=', 'deleted')->paginate(20);
             return view("dashboard.category.index" , compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'required|unique:categories|max:55',
            'name_ru' => 'required|unique:categories|max:55'
        ]);


        Category::create([
            "name_uz" => $request->name_uz,
            "name_ru" => $request->name_ru
        ]);
        return redirect(route('category.index'))->with('message','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('dashboard.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name_uz' => 'required|max:55',
            'name_ru' => 'required|max:55'
        ]);


        $category->update([
            "name_uz" => $request->name_uz,
            "name_ru" => $request->name_ru
        ]);
        return redirect(route('category.index'))->with('update','success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->update([
           'status'=>'deleted'
        ]);
        return redirect()->back()->with('delete','seccess');

    }
    public function restore($id){
        Category::findOrFail($id)->update([
            'status' => 'active'
        ]);
        return redirect()->back();

    }
}
