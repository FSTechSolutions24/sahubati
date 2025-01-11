<?php

namespace Modules\Cart\Http\Controllers;

use Exception;
use Modules\Support\Money;
use Illuminate\Http\Request;
use Modules\Cart\Facades\Cart;
use Illuminate\Pipeline\Pipeline;
use Modules\Coupon\Entities\Coupon;
use Modules\Coupon\Checkers\ValidCoupon;
use Modules\Coupon\Checkers\CouponExists;
use Modules\Coupon\Checkers\MaximumSpend;
use Modules\Coupon\Checkers\MinimumSpend;
use Modules\Coupon\Checkers\AlreadyApplied;
use Modules\Coupon\Checkers\ExcludedProducts;
use Modules\Coupon\Checkers\ApplicableProducts;
use Modules\Coupon\Checkers\ExcludedCategories;
use Modules\ShippingArea\Entities\ShippingArea;
use Modules\Coupon\Checkers\UsageLimitPerCoupon;
use Modules\Coupon\Checkers\ApplicableCategories;
use Modules\Coupon\Checkers\UsageLimitPerCustomer;
use Modules\Cart\Http\Requests\AddTaxesToCartRequest;


class CartTaxController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param AddTaxesToCartRequest $addTaxesToCartRequest
     *
     * @return \Modules\Cart\Cart
     */
    public function store(AddTaxesToCartRequest $addTaxesToCartRequest)
    {
        Cart::addTaxes($addTaxesToCartRequest);
        return $this->updateShipping2($addTaxesToCartRequest);        
    }


    public function updateShipping(Request $request){
        return $this->updateShipping2($request);
    }

    public function updateShipping2($request)
    {
        
        $cost = ShippingArea::where('slug',$request['billing']['area'])->firstOrFail()['cost'];        
        if(!$cost){
            $cost = 0;
        }
        $cart = Cart::instance();
        $shippingMethods = $cart->availableShippingMethods();

        foreach ($shippingMethods as $method) {
            if ($method->name == 'shipping_rate') {
                $method->cost = new Money($cost, $method->cost->currency());
            }
        }

        // Update the cart with the modified shipping methods
        $cart->setShippingMethods($shippingMethods); // Adjust according to your cart's set method
        return $cart;
    }
}
