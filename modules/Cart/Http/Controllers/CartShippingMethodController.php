<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Cart\Facades\Cart;
use Modules\Shipping\Facades\ShippingMethod;
use Modules\ShippingArea\Entities\ShippingArea;

class CartShippingMethodController
{
    /**
     * Store a newly created resource in storage.
     *
     * @return \Modules\Cart\Cart
     */
    public function store()
    {
        $cost = $this->getAreaCost(request()->all());        
        Cart::addShippingMethod(
            ShippingMethod::get(
                request('shipping_method')
            ), $cost
        );

        return Cart::instance();
    }

    public function getAreaCost($request){
        if($request['shipping_method'] == 'shipping_rate' && isset($request['area'])){
            $cost = ShippingArea::where('slug',$request['area'])->firstOrFail()['cost'];
            if(!$cost){
                return 0;
            }
            return $cost;
        } else {
            return null;
        }
    }
}
