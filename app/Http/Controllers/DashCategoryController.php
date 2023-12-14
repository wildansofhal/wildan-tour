<?php

namespace App\Http\Controllers;

use App\Models\DashPackage;
use Illuminate\Support\Str;
use App\Models\DashCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DashCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash/category', [
            'page' => "Category",
            'category' => DashCategory::orderBy('id' , 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash/create-category' , [
            'page' => "Category",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:dash_categories',
            'img'   => 'required|mimes:jpeg,png,jpg,gif,svg,jfif|max:7168',
        ]);

        if($request->file('img')){
            $title = $request->title;
            $slug  = Str::slug($title);
            if (DashCategory::where('slug' , $slug)->exists()) {
                return redirect()->back()->withErrors('The slug has already been taken.');
            } else {
                $img = $request->file('img')->store('upload/category');
                DashCategory::create([
                    'title' => Str::title($title),
                    'img' => $img,
                    'slug'  => $slug,
                ]);   
            }
        }

        return redirect()->route('category.index')->withErrors('Create Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DashCategory  $dashCategory
     * @return \Illuminate\Http\Response
     */
    public function show(DashCategory $dashCategory)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DashCategory  $dashCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(DashCategory $category)
    {
        if ($category->id == 1) {
            return redirect()->route('category.index')->withErrors('Edit Denied !');
        }
        return view('dash/edit-category' , [
            'page' => 'Category',
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DashCategory  $dashCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashCategory $category)
    {
        $id = $category->id;
        $title = Str::title($request->title) ;
        $slug  = Str::slug($title);
        if ($id == 1) {
            return redirect()->route('category.index')->withErrors('Edit Denied !');
        }
        $validated = $request->validate([
            'title' => 'required|unique:dash_categories,title,'.$id,
            'img'   => Rule::when(Storage::missing($category->img) , ['required', 'mimes:jpeg,png,jpg,gif,svg,jfif' , 'max:7168']),
        ]);

        if (DashCategory::where('slug' , $slug)->exists() && $slug != $category->slug) {
            return redirect()->back()->withErrors('The slug has already been taken.');
        }
        if ($request->file('img')){
            $img = $request->file('img')->store('upload/category');
            if(Storage::exists($category->img)){
                Storage::delete($category->img);
            }
        }else {
            $img = $category->img;
        }
        DashCategory::where('id' , $category->id)->update([
            'title' => $title,
            'slug' => $slug,
            'img' => $img,
        ]);
        return redirect()->route('category.index')->withErrors('Edit Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DashCategory  $dashCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(DashCategory $category)
    {
        if ($category->id == 1) {
            return redirect()->route('category.index')->withErrors('Delete Denied !');
        }
        if(Storage::exists($category->img)){
            Storage::delete($category->img);
        }
        DashCategory::destroy($category->id);
        DashPackage::where('category_id' , $category->id)->update([
            'category_id' => '1',
        ]);
        return redirect()->route('category.index')->withErrors('Delete Successfully !');
    }
}
