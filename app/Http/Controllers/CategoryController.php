<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::where("parent_id", 0)->orderBy('name', 'asc')->get();
        return view('categories.list', compact('categories'));
    }

    public function categoryTree()
    {
        $categoryTree = Category::all();
        return view('categories.tree', compact('categoryTree'));
    }

    public function create()
    {
        return view('categories.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->parent_id = 0;
        $category->save();

        return redirect()->route('categories.index');
    }



    public function edit(Request $request, $id)
    {
        $category = Category::select(
            'categories.*',
            'main.name as main_category'
        )
            ->from('categories')
            ->leftJoin('categories as main', 'categories.parent_id', '=', 'main.id')
            ->withoutGlobalScopes()
            ->find($id);

        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->parent_id = 0;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
    
        return response()->json(['success' => 'Category deleted successfully!']);
    }
    

    public function show(Request $request)
    {
        $category = Category::find($request->id);
        return view('categories.view', compact('category'));
    }
}
