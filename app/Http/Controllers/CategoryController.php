<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use App\Mail\CategoryCreated;
use App\Mail\CategoryCreateMarkdown;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::query()
        ->withCount('subcategories')->get(['id', 'name', 'created_at']);

        $delcategories = Category::query()
        ->onlyTrashed()
        ->withCount('subcategories')->get(['id', 'name', 'created_at']);

        return view('category.index', compact('categories', 'delcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {

        // dd($request->all());
        $category=Category::create([
            'name'=>$request->category_name,
            'slug'=>Str::slug($request->category_name),
            'is_active'=>$request->filled('is_active'),
        ]);
        // Session::flash('status', 'Category created successfully');
        // return back();

        //Mail Send Command
        $user=User::find(1);
        Mail::to($user)->send(
            new CategoryCreateMarkdown($category)
        );


        Toastr::success('Category created successfully');
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
        $category=Category::find($id);
        return view('category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->category_name,
            'slug' => Str::slug($request->category_name),
            'is_active' => $request->filled('is_active')
        ]);

        Toastr::info('Category updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id)->delete();
        Toastr::success('Category deleted successfully!');
        return back();
    }

    public function restore($category_id)
    {
        Category::onlyTrashed()->find($category_id)->restore();
        Toastr::success('Category restore successfully!');
        return back();
    }

    public function forceDelete($category_id)
    {
        //dd($category_id);
        Category::onlyTrashed()->find($category_id)->forceDelete();
        Toastr::success('Category deleted permanently!');
        return back();
    }
}
