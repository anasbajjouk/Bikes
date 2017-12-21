<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Categoryw;
use App\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WidgetController extends Controller
{
    /* 
        PRODUCT CONTROLLER ARE WORKING ON THE ADMIN PANEL ONLY .
        FRONT CONTROLLER IS MADE FOR ALL THE FRONT VIEWS 
    */

    public function index() {
        $products = Widget::paginate(10);
        $i= 1;
        return view('admin.widget.index', compact('products','i'));
    }

    
    public function create() {
        $categories = Categoryw::all();
        return view('admin.widget.create', compact('categories'));
    }

    public function store(ProductRequest $request) {   

        $this->validate($request,['category_id' => 'required']); //widgwidgcategory_id
        //Upload Image
        $image = $request->image;

        if ($image) {
            $imageName = Auth::user()->name . '-' . $image->getClientOriginalName();
            $imageFile = $image->move('widget_img', $imageName);
        

            $colorString = implode(", ", $request->get('color'));
            $sizeString = implode(", ", $request->get('size'));

            Widget::create([
                        'name' => $request->get('name'),
                        'brand' => $request->get('brand'),
                        'description' => $request->get('description'),
                        'categoryw_id' => $request->get('category_id'), //widgwidgcategory_id
                        'overview' => $request->get('overview'),
                        'price' => $request->get('price'),
                        'size' => $sizeString, //$request->get('size'),
                        'discount' => $request->get('discount'),
                        'availability' => $request->get('availability'),
                        'onSale' => $request->get('onSale'),
                        'information' => $request->get('information'),
                        'color' => $colorString,//$request->get('color'),
                        'image' => $imageFile
                    ]);

            return redirect()->route('widget.index')->with('success', 'Widget has been added successfully.');
        }
        return redirect()->route('widget.index')->with('errors', 'Something went wrong');
    }

   
    public function show(Widget $widget) {

        $product = Widget::find($widget->id);
        return view('admin.widget.show', compact('product'));
    }

  
    public function edit(Widget $widget) {

        $products = Widget::find($widget->id);

        $proCatID = $products->categoryw_id; //widgwidgcategory_id
        $proCatName = Categoryw::where('id', $proCatID)->value('name');

        $categories = Categoryw::all();
        return view('admin.widget.edit', compact('products', 'categories', 'proCatName'));
    }

  
    public function update(ProductRequest $request, Widget $widget) {

        $products = Widget::findOrFail($widget->id);

        $this->validate($request,['category_id' => 'required']);
        
        $colorString = implode(", ", $request->get('color'));
        $sizeString = implode(", ", $request->get('size'));

        //Upload Image
        $image = $request->image;

        if ($image) {
            $imageName = $image->getClientOriginalName(). '-' . $widget->id;
            $imageFile = $image->move('widget_img', $imageName);

        }else if (!$image){
            $imageFile = $products->image;
        }
            
        if ($products) {

           $products->update([
                'name' => $request->get('name'),
                'brand' => $request->get('brand'),
                'description' => $request->get('description'),
                'categoryw_id' => $request->get('category_id'),
                'overview' => $request->get('overview'),
                'price' => $request->get('price'),
                'size' => $sizeString, //$request->get('size'),
                'discount' => $request->get('discount'),
                'availability' => $request->get('availability'),
                'onSale' => $request->get('onSale'),
                'information' => $request->get('information'),
                'color' => $colorString,//$request->get('color'),
                'image' => $imageFile
            ]);

            return redirect()->route('widget.index')->with('success', 'Widget has been added successfully.');
        }
        return redirect()->route('widget.index')->with('errors', 'Something went wrong');
    }

    public function destroy(Widget $widget) {
        $products = Widget::findOrFail($widget->id);
        $products->delete(); 
        return back()->with('success', 'Widget Has Been Deleted Successfully.');
    }

}
