<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
class CategoryController extends Controller
{
    public function index(Request $request)
    {
        
        $category = new Category();
        $category->title = $request->title;
        $category->parent_id = $request->parentcategory;
        $category->save();
        return response()->json([
            'status' => true,
            'data'  => $category
        ]);
    }

    public function parent()
    {
        $category = Category::with('children')->whereNull('parent_id')->get();
        return response()->json([
            'status' => true,
            'data'    => $category
        ]);
    }

    public function all()
    {
        $category = Category::with('children')->get();
        return response()->json([
            'status' => true,
            'data'   => $category
        ]);
    }

    public function getCategory($id)
    {
        $category = Category::find($id);
        return response()->json([
            'status'    => true,
            'data'      => $category
        ]);
    }

    public function update($id,Request $request)
    {
        dd($id);
        $category = Category::find($id);
        dd($category);
        $category->title = $request->title;
        $category = $category->save();
        return response()->json([
            'status' => true,
            'data'   => $category
        ]);
    }
}
