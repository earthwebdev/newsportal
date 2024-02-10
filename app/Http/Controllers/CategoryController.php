<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$categories = Category::get()->sortByDesc('id'); //orderBy("id","desc")->
        //$categories = Category::withCount("articles")->get()->sortByDesc("id");
        $categories = Category::withCount("articles")->orderBy("id",'desc')->paginate(2);
        return view("category.index", [
            "categories"=> $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug'  =>'nullable|unique:categories,slug',
            'description'   => 'nullable',
            'image' => 'nullable|file|image|between:2,2048',
            'status'    => 'required'
        ],[
            'title.required'    => 'Please enter the title',
            'status.required'   => 'Pleases enter the status'
        ]);

        //dd($request->all());
        if($request->slug == NULL || $request->slug == ""){
            $slug = Str::slug($request->title);
        }else{
            $slug = Str::slug($request->slug);
        }
        $filename_img = '';
        if($request->image){
            $filename_img = time(). '-' . $slug. '.'. $request->image->extension();
            $request->image->storeAs('/public/images/categories/', $filename_img);

        }

        Category::create([
            'title'=> $request->title,
            'slug'  => $slug,
            'description'   => $request->description,
            'image' => $filename_img,
            'status'=> $request->status
        ]);

        return redirect()->route('category.index')->with('success','Category added successfully.');


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
        if(!$category){
            return redirect()->route('category.index')->with('error','Category not found.');
        }
        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if(!$category){
            return redirect()->route('category.index')->with('error','Category not found.');
        }

        $request->validate([
            'title' => 'required',
            'slug'  =>'nullable|unique:categories,slug',
            'description'   => 'nullable',
            'image' => 'nullable|file|image|between:2,2048',
            'status'    => 'required'
        ],[
            'title.required'    => 'Please enter the title',
            'status.required'   => 'Pleases enter the status'
        ]);
        //dd($request->all());
        if($request->slug == NULL || $request->slug == ""){
            $slug = Str::slug($request->title);
        }else{
            $slug = Str::slug($request->slug);
        }
        $filename = $category->image;
        if($request->image){
            $filename = time(). '-' . $slug. '.'. $request->image->extension();
            $request->image->storeAs('/public/images/categories/', $filename);

            if(Storage::exists('/public/images/categories/'.$category->image)){
                Storage::delete('/public/images/categories/'.$category->image);
            }
        }


        //dd($filename);
        $category->update([
            'title'=> $request->title,
            'slug'  => $slug,
            'description'   => $request->description,
            'image' => $filename,
            'status'=> $request->status
        ]);

        return redirect()->route('category.index')->with('success','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(!$category){
            return redirect()->route('category.index')->with('error','Category not found.');
        }

        if($category->image && Storage::exists('/public/images/categories/'.$category->image)){
            Storage::delete('/public/images/categories/'.$category->image);
        }
        $category->delete();

        return redirect()->route('category.index')->with('success','Category deleted successfully.');
    }
}
