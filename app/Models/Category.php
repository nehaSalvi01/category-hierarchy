<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    
public function parentCategory()
{
    return $this->belongsTo(Category::class, 'parent_id');
}

 

    public function children()
{
    return $this->hasMany(Category::class, 'parent_id')->with('children');
}
// YourController.php

public function showCategoryTree()
{
    $categories = Category::all();

    $categoryTree = $this->buildTree($categories);

    return view('categories.tree', compact('categoryTree'));
}

private function buildTree($categories, $parentId = null)
{
    $branch = [];

    foreach ($categories as $category) {
        if ($category->parent_id == $parentId) {
            $children = $this->buildTree($categories, $category->id);
            if ($children) {
                $category->children = $children;
            }
            $branch[] = $category;
        }
    }

    return $branch;
}

}

