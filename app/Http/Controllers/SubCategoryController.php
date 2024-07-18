<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    

    public function index()
    {
        //echo ('hjhdjk');die();
        $categories = Category::whereNot("parent_id",0)->get();
        return view('subcategories.list', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where("parent_id",0)->get();
        return view('subcategories.add',compact('categories'));
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

    $parentCategories = Category::whereNull('parent_id')->get(); // Fetch all top-level categories

    return view('subcategories.edit', compact('category', 'parentCategories'));
}
       
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);
    
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();
    
        return redirect()->route('subcategories.index')->with('success', 'Category updated successfully!');
    }
    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('subcategories.index')->with('success', 'Category deleted successfully!');
    }

    public function show(Request $request)
    {
        $category = Category::find($request->id);
        $category->load('parentCategory', 'children');
        return view('subcategories.view', compact('category'));
    }
}

