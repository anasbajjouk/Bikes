<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create()
    {
        $categories = Category::all();
        $i = 1 ;
        return view('admin.category.create', compact('categories', 'i'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Category::create([
            'name' => ucfirst($request->get('name'))
        ]);

        return redirect()->back()->with('success', 'Category Has Been Added Successfully. ');
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Category::findOrFail($category->id)
                    ->update($request->all());

        return redirect()->back()->with('success', 'Category Has Been Updated Successfully. ');
    }


    public function destroy(Category $category)
    {
        $categories = Category::findOrFail($category->id);

        $categories->products()->delete();

        $categories->delete();

        return back()->with('success', 'Category Has Been Deleted Successfully.');
    }
    
}
