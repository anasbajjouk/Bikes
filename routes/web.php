<?php

Route::redirect('/', 'home');
Route::redirect('/front', 'home');

Auth::routes();

Route::get('/contact-us', function () {
	return view('front.contact');
});



/**************************************** AUTH Controller ***************************************************/

Route::get('/register', 'Auth\CustomRegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\CustomRegisterController@register');

Route::get('/login', 'Auth\CustomLoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\CustomLoginController@login');

Route::get('verify/{token}', 'UserController@verify')->name('verify');

Route::get('verifyEmailFirst', 'Auth\CustomRegisterController@verifyEmailFirst')->name('verifyEmailFirst');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

/**************************************** END AUTH Controller ************************************************/

/************************************ FRONT Controller (User interface) *******************************************/

Route::get('/home', 'FrontController@home')->name('home');
Route::get('/front/product/{id}', 'FrontController@showProduct')->name('front.productDetail');
Route::get('/front/widget/{id}', 'FrontController@showWidget')->name('front.widgetDetail');
Route::get('/front/productshop', 'FrontController@productShop')->name('front.productshop');
Route::get('/front/widgetshop', 'FrontController@widgetShop')->name('front.widgetshop');
Route::get('/front/search', 'FrontController@search')->name('front.search');
Route::post('/contact-us', 'FrontController@contact')->name('front.contact');
Route::post('/front/rate/{id}', 'RateController@productRate')->name('rate.productRate');
Route::post('/front/widget_rate/{id}', 'RateController@widgetRate')->name('rate.widgetRate');


/************************************ END FRONT Controller (User interface) ***************************************/

/**************************************** CART Controller FOR guest and users *******************************/

Route::post('/cart/add_product/{id}', 'CartController@addProductItem')->name('cart.productItem');
Route::post('/cart/add_widget/{id}', 'CartController@addWidgetItem')->name('cart.widgetItem');
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::get('/cart/wishlist', 'CartController@wishlist')->name('cart.wishlist');

/**************************************** END CART Controller FOR guest and users ***************************/

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function (){

	Route::post('toggleOrder/{orderId}', 'OrderController@toggleOrder')->name('toggle.order');

	Route::get('orders/{type?}', 'OrderController@Orders')->name('order.orders');

	Route::get('/', 'ProductController@adminIndex')->name('admin.index');
	
	Route::resource('product', 'ProductController');
	Route::resource('widget', 'WidgetController');
	Route::resource('category', 'CategoryController');
	Route::resource('widgetCategory', 'CategorywController');
	Route::resource('user', 'UserController');

	Route::get('users/admins', 'UserController@getAdminIndex')
			->name('user.admins');
			//->middleware('superAdmin');

	Route::get('users/normalusers', 'UserController@getNormalUsersIndex')
			->name('user.normalusers');
			//->middleware('superAdmin');

	Route::get('user/{id}/getPassword', 'UserController@getPassword')->name('user.getPassword');
	Route::put('user/{id}/changePassword', 'UserController@changePassword')->name('user.changePassword');

});


Route::middleware(['auth'])->group(function (){

	/***********************************************AUTH  GROUP ***************************************************************/

	Route::resource('cart', 'CartController', ['only' => [
	    	'update','destroy'
		]]);
	Route::get('shipping-info','CheckoutController@shipping')->name('checkout.shipping');
	Route::get('payment','CheckoutController@payment')->name('checkout.payment');
	Route::post('store-payment','CheckoutController@storePayment')->name('payment.store');
	Route::resource('address','AddressController');

	Route::get('orders/{hash}','OrderController@index')->name('orders.index');

	/***************************************** USER CONTROLLER (Normal User) *********************************/
	Route::get('front/profile/{id}', 'UserController@showUser')->name('show.profile');
	Route::get('front/editprofile/{id}', 'UserController@editUser')->name('edit.profile');
	Route::patch('front/updateprofile/{id}', 'UserController@updateUser')->name('update.profile');
	Route::get('front/user/{id}/getUserPassword', 'UserController@getUserPassword')->name('user.getUserPassword');
	Route::put('front/user/{id}/changeUserPassword', 'UserController@changeUserPassword')->name('user.changeUserPassword');
	/***************************************** END USER CONTROLLER (Normal User) **********************************/

	/********************************************* END AUTH  GROUP ***************************************************************/


});
