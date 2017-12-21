<?php

namespace App\Http\Controllers;

use App\Widgcategory;
use Illuminate\Http\Request;

class WidgcategoryController extends Controller
{
    public function create()
    {
        $categories = Widgcategory::all();
        $i = 1 ;
        return view('admin.widg_category.create', compact('categories', 'i'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Widgcategory::create([
            'name' => ucfirst($request->get('name'))
        ]);

        return redirect()->back()->with('success', 'Category Has Been Added Successfully. ');
    }

    public function update(Request $request, Widgcategory $widgetCategory)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Widgcategory::findOrFail($widgetCategory->id)
                    ->update($request->all());

        return redirect()->back()->with('success', 'Category Has Been Updated Successfully. ');
    }


    public function destroy(Widgcategory $widgetCategory)
    {
        $categories = Widgcategory::findOrFail($widgetCategory->id);

        $categories->widgets()->delete();

        $categories->delete();

        return back()->with('success', 'Category Has Been Deleted Successfully.');
    }

}
