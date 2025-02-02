<?php

use Illuminate\Support\Facades\Route;

Route::get('storefront/featured-categories/{categoryNumber}/products', 'FeaturedCategoryProductController@index')->name('storefront.featured_category_products.index');
Route::get('storefront/tab-products/sections/{sectionNumber}/tabs/{tabNumber}', 'TabProductController@index')->name('storefront.tab_products.index');
Route::get('storefront/tab-packages/sections/{sectionNumber}/tabs/{tabNumber}', 'TabProductController@packages')->name('storefront.tab_packages.index');
Route::get('storefront/product-grid/tabs/{tabNumber}', 'ProductGridController@index')->name('storefront.product_grid.index');
Route::get('storefront/flash-sale-products', 'FlashSaleProductController@index')->name('storefront.flash_sale_products.index');
Route::get('storefront/vertical-products/{columnNumber}', 'VerticalProductController@index')->name('storefront.vertical_products.index');

Route::delete('storefront/newsletter-popup', 'NewsletterPopup@destroy')->name('storefront.newsletter_popup.destroy');

Route::delete('storefront/cookie-bar', 'CookieBarController@destroy')->name('storefront.cookie_bar.destroy');
