<?php

namespace App\Http\Controllers;

use App\Categoryw;
use Illuminate\Http\Request;

class CategorywController extends Controller
{
    public function create()
    {
        $categories = Categoryw::all();
        $i = 1 ;
        return view('admin.widg_category.create', compact('categories', 'i'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Categoryw::create([
            'name' => ucfirst($request->get('name'))
        ]);

        return redirect()->back()->with('success', 'Category Has Been Added Successfully. ');
    }

    public function update(Request $request, Categoryw $widgetCategory)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Categoryw::findOrFail($widgetCategory->id)
                    ->update($request->all());

        return redirect()->back()->with('success', 'Category Has Been Updated Successfully. ');
    }


    public function destroy(Categoryw $widgetCategory)
    {
        $categories = Categoryw::findOrFail($widgetCategory->id);

        $categories->widgets()->delete();

        $categories->delete();

        return back()->with('success', 'Category Has Been Deleted Successfully.');
    }

}
