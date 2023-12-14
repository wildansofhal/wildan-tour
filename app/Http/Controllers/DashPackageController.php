<?php

namespace App\Http\Controllers;

use App\Models\DashPackage;
use Illuminate\Support\Str;
use App\Models\DashCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class DashPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dash/package' , [
            'page' => 'Package',
            'package' => DashPackage::orderBy('id' , 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dash/create-package' , [
            'page' => "Package",
            'category' => DashCategory::orderBy('id' , 'desc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , DashPackage $package)
    {
        $validated = $request->validate([
            'title'         => 'required|unique:dash_packages',
            'img'           => 'required|mimes:jpeg,png,jpg,gif,svg,jfif|max:7168',
            'category_id'   => [
                                    'required',
                                    'integer',
                                    Rule::exists('dash_categories', 'id'),
                               ],
            'include'       => 'required|numeric',
            'exclude'       => 'required|integer',
            'important'     => 'required',
            'table_price'   => 'required',
            'include'       => 'required',
            'exclude'       => 'required',
            'important'     => 'required',
        ]);

        if($request->file('img')){
            $title = $request->title;
            $slug  = Str::slug($title);
            if (DashPackage::where('slug' , $slug)->exists()) {
                return redirect()->back()->withErrors('The slug has already been taken.');
            } else {
                $img = $request->file('img')->store('upload/package');
                DashPackage::create([
                    'category_id' => $request->category_id,
                    'title' => Str::title($title),
                    'img' => $img,
                    'slug'  => $slug,
                    'rate_from' => $request->rate_from,
                    'duration' => $request->duration,
                    'overview' => $request->overview,
                    'table_price' => $request->table_price,
                    'include' => $request->include,
                    'exclude' => $request->exclude,
                    'important' => $request->important,
                ]);   
            }
        }

        return redirect()->route('package.index')->withErrors('Create Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DashPackage  $dashPackage
     * @return \Illuminate\Http\Response
     */
    public function show(DashPackage $dashPackage)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DashPackage  $dashPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(DashPackage $package)
    {
        return view('dash/edit-package' , [
            'page' => 'Package',
            'category' => DashCategory::orderBy('id' , 'desc')->get(),
            'package' => $package,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DashPackage  $dashPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DashPackage $package)
    {
        $id = $package->id;
        $title = Str::title($request->title) ;
        $slug  = Str::slug($title);
        $validated = $request->validate([
            'title'         => 'required|unique:dash_packages,title,'.$id,
            'img'           => Rule::when(Storage::missing($package->img) , ['required', 'mimes:jpeg,png,jpg,gif,svg,jfif' , 'max:7168']),
            'category_id'   => [
                                    'required',
                                    'integer',
                                    Rule::exists('dash_categories', 'id'),
                               ],
            'include'       => 'required|numeric',
            'exclude'       => 'required|integer',
            'important'     => 'required',
            'table_price'   => 'required',
            'include'       => 'required',
            'exclude'       => 'required',
            'important'     => 'required',
        ]);

        if (DashPackage::where('slug' , $slug)->exists() && $slug != $package->slug) {
            return redirect()->back()->withErrors('The slug has already been taken.');
        }
        if ($request->file('img')){
            $img = $request->file('img')->store('upload/package');
            if(Storage::exists($package->img)){
                Storage::delete($package->img);
            }
        }else {
            $img = $package->img;
        }
        DashPackage::where('id' , $package->id)->update([
            'title' => $title,
            'slug' => $slug,
            'img' => $img,
            'category_id' => $request->category_id,
            'rate_from' => $request->rate_from,
            'duration' => $request->duration,
            'overview' => $request->overview,
            'table_price' => $request->table_price,
            'include' => $request->include,
            'exclude' => $request->exclude,
            'important' => $request->important,
        ]);
        return redirect()->route('package.index')->withErrors('Edit Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DashPackage  $dashPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(DashPackage $package)
    {
        if(Storage::exists($package->img)){
            Storage::delete($package->img);
        }
        DashPackage::destroy($package->id);
        
        return redirect()->route('package.index')->withErrors('Delete Successfully !');
    }
}
