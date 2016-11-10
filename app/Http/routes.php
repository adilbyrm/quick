<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => ['web']], function () {
    //Route::get('/', function() {

		// dd(auth()->guard('user')->check());
		// dd(auth()->guard('user')->user()->username);
		
		/*$guid = getGUID();
		DB::statement("INSERT INTO 
			Products (Name, RowAddDateTime, RowAddUserNo, RowEditDateTime, RowEditUserNo, ID, Status, _SynchronizationID_)
			VALUES ('testttts224', '2016-09-28 15:31:38.000', 1, '2016-09-28 15:31:38.000', 1, '614', 0, '$guid')");*/
	//});

    Route::get('/', ['as' => 'homepage', 'uses' => 'HomeController@homepage']);
    Route::get('about', ['as' => 'about', 'uses' => 'ContentController@about']);
    Route::get('contact', ['as' => 'contact', 'uses' => 'ContentController@contact']);

    ################ Dealer ################
	Route::get('dealer-login', ['as' => 'dealer.login', 'uses' => 'DealerController@login']);
	Route::post('dealer-login', ['as' => 'dealer.login.p', 'uses' => 'DealerController@loginP']);
	Route::get('dealer-logout', ['as' => 'dealer.logout', 'uses' => 'DealerController@logout']);
	Route::get('dealer-profile', ['as' => 'dealer.profile', 'uses' => 'DealerProfileController@profile']);
	Route::get('dealership-request', ['as' => 'dealer.request', 'uses' => 'DealerProfileController@dealerRequest']);
	################ /Dealer ################

	################ Cart ################
	/**
	 * AJAX - single product add - (function: main.blade)
	 */
	Route::post('add-to-cart', ['as' => 'add-to-cart', 'uses' => 'CartController@addToCart']);
	
	/**
	 * AJAX - get top menu box - (function: main.blade)
	 */
	Route::post('get-top-menu-box', ['as' => 'get-top-menu-box', 'uses' => 'CartController@getTopMenuBox']);

	/**
	 * AJAX - top box - (function: main.blade)
	 */
	Route::post('delete-the-cart', ['as' => 'delete-the-cart', 'uses' => 'CartController@deleteTheCart']);

	Route::get('shopping-cart', ['as' => 'shopping.cart', 'uses' => 'CartController@getCarts']);

	Route::post('get-all-cart-xhr', ['as' => 'get.all.cart.xhr', 'uses' => 'CartController@getCartsXHR']);

	Route::post('update-carts', ['as' => 'update.carts', 'uses' => 'CartController@updateCartsXHR']);
	################ /Cart ################

	Route::get('trademark/{trademarkID}/products', ['as' => 'products.of.trademark', 'uses' => 'ProductController@productsOfTrademark']);

	Route::get('category/{categoryID}/products', ['as' => 'products.of.category', 'uses' => 'ProductController@productsOfCategory']);

	Route::get('{productName}/{productID}', ['as' => 'product.detail', 'uses' => 'ProductController@productDetail']);


	// Route::get('category/image/{id}', ['as' => 'image', 'uses' => 'HomeController@image']);
});
