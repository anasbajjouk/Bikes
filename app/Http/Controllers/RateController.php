<?php

namespace App\Http\Controllers;

use App\Product;
use App\Rate;
use App\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    
    public function productRate(Request $request, Product $product, $id)
    {

        $product = Product::findOrFail($id);
        $productItems = $product->productItems()->get();
        $user = Auth::user();

        foreach ($productItems as $productItem) {
            $pivotProductID = $productItem->pivot->product_id;
            $pivotUserID = $productItem->user_id;
        }

        if (($user->id == $pivotUserID) && ($pivotProductID == $product->id)) {

            $this->validate($request,[
                'your_awesome_parameter' => 'required|integer|min:1|max:5'
            ]);

            $user->rates()->create([
                'rate' => $request->input('your_awesome_parameter'),
                'product_id' => $product->id,
                'widget_id' => null
            ]);

            return redirect()->back()
                                ->with('success', 'Thank you for rating the Product');

        }else{

            return redirect()->back()
                            ->with('errors', 'You can not rate this Product , you will need to buy first');

        }
        
    }


    public function widgetRate(Request $request, Widget $widget, $id)
    {

        $widget = Widget::findOrFail($id);
        $widgetItems = $widget->widgetItems()->get();
        $user = Auth::user();

        foreach ($widgetItems as $widgetItem) {
            $pivotWidgetID = $widgetItem->pivot->widget_id;
            $pivotUserID = $widgetItem->user_id;
        }

        if (($user->id == $pivotUserID) && ($pivotWidgetID == $widget->id)) {

            $this->validate($request,[
                'your_awesome_parameter' => 'required|integer|min:1|max:5'
            ]);

            $user->rates()->create([
                'rate' => $request->input('your_awesome_parameter'),
                'widget_id' => $widget->id,
                'product_id' => null
            ]);

            return redirect()->back()
                                ->with('success', 'Thank you for rating the Product');

        }else{

            return redirect()->back()
                            ->with('errors', 'You can not rate this Product , you will need to buy first');

        }
        
    }



}
