<?php

namespace Modules\Cart\Http\Controllers;

use Modules\Support\Money;
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

        $cart = Cart::instance();
        $shippingArea = ShippingArea::where('slug',request('area'))->first();         
        if(!$shippingArea){
            $cost = 0;
        } else {
            $cost = $shippingArea->cost;
        }
        $shippingMethods = $cart->availableShippingMethods();

        foreach ($shippingMethods as $method) {
            if ($method->name == 'shipping_rate') {
                $method->cost = new Money($cost, $method->cost->currency());
            }
        }

        // Update the cart with the modified shipping methods
        $cart->setShippingMethods($shippingMethods);
        return $cart;
    }

    public function getAreaCost($request){
        if($request['shipping_method'] == 'shipping_rate' && isset($request['area'])){
            $shippingArea = ShippingArea::where('slug',$request['area'])->first();         
            if(!$shippingArea){
                return 0;
            }
            return $shippingArea->cost;    
        } else {
            return null;
        }
    }
}
