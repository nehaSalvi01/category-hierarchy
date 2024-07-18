<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    public function index()
    {
        $categories = Category::whereNot("parent_id", 0)->orderBy('name', 'asc')->get();
        return view('subcategories.list', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where("parent_id", 0)->get();
        return view('subcategories.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;;
        $category->save();

        return redirect()->route('subcategories.index');
    }



    public function edit($id)
    {
        $category = Category::find($id);
        $allCategories = Category::where("parent_id", 0)->get();
        return view('subcategories.edit', compact('category', 'allCategories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()->route('subcategories.index')->with('success', 'Category updated successfully!');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    
        return response()->json(['success' => 'Category deleted successfully!']);
    }
    

    public function show(Request $request, $id)
    {
        $category = Category::find($id);
        $allCategories = Category::where("parent_id", 0)->get();
        return view('subcategories.view', compact('category'));
    }
}
