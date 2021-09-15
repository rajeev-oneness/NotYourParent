<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $categories = Category::all();
        // $categories = Category::first();
        // changeToLocalTime($categories->created_at, 'Australia/ACT');
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|mimes:jpg,jpeg,png,gif,svg|max: 2048',
        ]);

        $fileName = time().'.'.strtolower($request->image->extension());
        $upload_path = 'defaultImages/category/';
        $request->image->move(public_path($upload_path), $fileName);
        $image = $upload_path.$fileName;

        $category = new Category();
        $category->name = $request->name;
        $category->image = $image;
        $category->save();
        return redirect()->route('admin.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
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
        $request->validate([
            'name' => 'required|string',
            'image' => 'mimes:jpg,jpeg,png,svg,gif|max:2048'
        ]);

        if($request->hasFile('image')) {
            $oldImage = public_path(Category::find($id)->image);
            File::delete($oldImage);

            $fileName = time().'.'.strtolower($request->image->extension());
            $upload_path = 'defaultImages/category/';
            $request->image->move(public_path($upload_path), $fileName);
            $image = $upload_path.$fileName;

            Category::where('id', $id)->update([
                'image' => $image,
            ]);
        }

        Category::where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.category.index');
    }
}
