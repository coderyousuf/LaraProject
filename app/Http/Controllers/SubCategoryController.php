<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\SubCategoryStoreRequest;
use App\Http\Requests\SubCategoryUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories=SubCategory::with('category')->get(['id', 'name', 'category_id', 'created_at']);
        return view('subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::get(['id', 'name']);
        return view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryStoreRequest $request)
    {
        SubCategory::create([
            'category_id'=>$request->category_id,
            'name'=>$request->subcategory_name,
            'slug'=>Str::slug($request->subcategory_name),
            'is_active'=>$request->filled('is_active')
        ]);
        // dd($request->all());
        // Session::flash('status', 'Subcategory created successfullly');
        // return redirect()->route('subcategory.index');
        Toastr::success('Subcategory created successfullly');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory=SubCategory::find($id);
        return view('subcategory.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::get(['id', 'name']);
        $subcategory=SubCategory::find($id);
        return view('subcategory.edit', compact('categories', 'subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryUpdateRequest $request, $id)
    {
        $subcategory=SubCategory::find($id);
        $subcategory->update([
            'category_id'=>$request->category_id,
            'name'=>$request->subcategory_name,
            'slug'=>Str::slug($request->subcategory_name),
            'is_active'=>$request->filled('is_active')
        ]);
        // dd($request->all());
        Session::flash('status', 'Subcategory updated successfullly');
        return redirect()->route('subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       SubCategory::find($id)->delete();
       Session::flash('status', 'SubCategory deleted successfully');
       return redirect()->route('subcategory.index');
    }
}
