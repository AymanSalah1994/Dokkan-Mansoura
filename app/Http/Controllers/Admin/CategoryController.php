<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    //
    public function index () {
        $categories = Category::all() ;
        return view('admin.category.index' , compact('categories')) ;
    }

    public function create() {
        // TODO  : Customize Error Messages  ;
        return view('admin.category.create') ;
    }

    public function store(CategoryRequest $request) {
        // TODO : Making the Error Messages in The View ;
        $allRequestData = $request->handleRequest() ;
        Category::create($allRequestData);
        return redirect()->route('categories.index') ;
    }
    public function edit($id) {
        $category = Category::findOrFail($id) ;
        return view('admin.category.edit' , compact('category')) ;
    }

    public function update($id , CategoryUpdateRequest $request) {
        //TODO : Handle Update Request
        $allRequestedData = $request->handleRequest($id) ;
        $category = Category::find($id) ;
        $category->update($allRequestedData) ;
        return redirect()->route('categories.index')->with('status' , 'Category Updated Successfully') ;
    }

    public function destroy($id) {
        // TODO : Delete the Image from storage
        $category = Category::find($id) ;
        if($category['category_picture']) {
            // In Case it Has a Photo
            // Because Photo is Nullable & Can Be Empty
            Storage::delete($category['category_picture']) ;
        }
        $category->delete() ;
        return redirect()->route('categories.index')->with('status' , 'Category Deleted Successfully') ;
    }
}
