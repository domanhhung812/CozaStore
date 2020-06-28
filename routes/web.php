<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// su dung middleware trong controller
Route::get('middleware-controller/{user}/{pass}','ExampleController@index')->name('exp');

Route::get('/error-login',function(){
	return "user or pass invalid";
})->name('error-login');

Route::get('info-me','ExampleController@info')->name('info-me');

/************** Query db ****************/
Route::group([
	'prefix' => 'db'
],function(){
	Route::get('query-get','TestQueryBuilderController@index')->name('queryGet');
	Route::get('orm-get','TestQueryBuilderController@orm')->name('ormGet');
	Route::get('one-to-many','TestQueryBuilderController@oneToMany')->name('oneToMany');

	Route::get('many-to-many','TestQueryBuilderController@manyToMany')->name('manyToMany');
});

/****************** Router Admin ******************************/
Route::group([
	'prefix' => 'admin',
	'as' => 'admin.',
	'namespace' => 'Admin'
],
function(){
	Route::get('login','LoginController@loginView')->name('loginView');
	Route::post('handle-login','LoginController@handleLogin')->name('handleLogin');
	Route::get('register','LoginController@registerView')->name('registerView');
	Route::post('handle-register','LoginController@handleRegister')->name('handleRegister');
	Route::post('logout','LoginController@logout')->name('logout');
});

// Route::group([
// 	'prefix' => 'user',
// 	'as' => 'user.',
// 	'namespace' => 'User'
// ],
// function(){
// 	Route::get('login','LoginController@loginViewUser')->name('loginViewUser');
// 	Route::post('handle-login','LoginController@handleLoginUser')->name('handleLoginUser');
// 	Route::post('logout','LoginController@logoutUser')->name('logoutUser');
// });
  
Route::group([
	'prefix' => 'admin',
	'as' => 'admin.',
	'namespace' => 'Admin',
	'middleware' => ['adminLogined','web']
],
function(){
	Route::get('dashboard','DashboardController@index')->name('dashboard');
	Route::group(['prefix' => 'products'], function(){
		Route::get('/','ProductController@index')->name('products');
		// search products
		Route::post('/','ProductController@searchProducts')->name('searchProducts');

		Route::get('add-product','ProductController@addProduct')->name('addProduct');
		Route::post('handle-add-product','ProductController@handleAddProduct')->name('handleAddProduct');
		Route::post('delete-product','ProductController@deleteProduct')->name('deleteProduct');
		Route::get('edit-product/{id}','ProductController@editProduct')->name('editProduct')->where(['id'=>'[0-9]+']);

		Route::post('handle-edit-product/{id}','ProductController@handleEditProduct')
				->name('handleEditProduct')
				->where(['id'=>'[0-9]+']);
	});
	Route::group(['prefix' => 'categories'], function(){
		Route::get('/','CategoriesController@index')->name('categories');
		Route::get('edit-categories/{id}','CategoriesController@editCategories')->name('editCategories')->where(['id'=>'[0-9]+']);
		Route::post('handle-edit-categories/{id}','CategoriesController@handleEditCategories')
				->name('handleEditCategories')
				->where(['id'=>'[0-9]+']);
		Route::post('delete-categories','CategoriesController@deleteCategories')->name('deleteCategories');
		Route::get('add-categories','CategoriesController@addCategories')->name('addCategories');
		Route::post('handle-add-categories','CategoriesController@handleAddCategories')->name('handleAddCategories');
	});
	Route::group(['prefix' => 'sizes'], function(){
		Route::get('/','SizesController@index')->name('sizes');
		Route::get('edit-sizes/{id}','SizesController@editSizes')->name('editSizes')->where(['id'=>'[0-9]+']);
		Route::post('handle-edit-sizes/{id}','SizesController@handleEditSizes')
				->name('handleEditSizes')
				->where(['id'=>'[0-9]+']);
		Route::post('delete-sizes','SizesController@deleteSizes')->name('deleteSizes');
		Route::get('add-sizes','SizesController@addSizes')->name('addSizes');
		Route::post('handle-add-sizes','SizesController@handleAddSizes')->name('handleAddSizes');
	});
	Route::group(['prefix' => 'colors'], function(){
		Route::get('/','ColorsController@index')->name('colors');
		Route::get('edit-colors/{id}','ColorsController@editColors')->name('editColors')->where(['id'=>'[0-9]+']);
		Route::post('handle-edit-colors/{id}','ColorsController@handleEditColors')
				->name('handleEditColors')
				->where(['id'=>'[0-9]+']);
		Route::post('delete-colors','ColorsController@deleteColors')->name('deleteColors');
		Route::get('add-colors','ColorsController@addColors')->name('addColors');
		Route::post('handle-add-colors','ColorsController@handleAddColors')->name('handleAddColors');
	});
	Route::group(['prefix' => 'brands'], function(){
		Route::get('/','BrandsController@index')->name('brands');
		Route::get('edit-brands/{id}','BrandsController@editBrands')->name('editBrands')->where(['id'=>'[0-9]+']);
		Route::post('handle-edit-brands/{id}','BrandsController@handleEditBrands')
				->name('handleEditBrands')
				->where(['id'=>'[0-9]+']);
		Route::post('delete-brands','BrandsController@deleteBrands')->name('deleteBrands');
		Route::get('add-brands','BrandsController@addBrands')->name('addBrands');
		Route::post('handle-add-brands','BrandsController@handleAddBrands')->name('handleAddBrands');
	});
	Route::group(['prefix' => 'users'], function(){
		Route::get('/','AdminUserController@index')->name('users');
		Route::post('/delete-user','AdminUserController@deleteUser')->name('deleteUser');
	});
	Route::group(['prefix' => 'transactions'], function(){
		Route::get('/','AdminTransactionController@index')->name('transactions');
		Route::get('/view/{id}','AdminTransactionController@viewOrder')->name('getViewOrder');
		Route::get('/active/{id}','AdminTransactionController@activeTransaction')->name('getActiveTransaction');
		Route::post('/active/{id}','AdminTransactionController@activeTransaction')->name('sendEmailBill');
		Route::post('delete-transaction','AdminTransactionController@deleteTransaction')->name('deleteTransaction');
	});
	Route::group(['prefix' => 'blogs'], function(){
		Route::get('/','AdminBlogController@index')->name('blogs');
		Route::get('/add-blogs', 'AdminBlogController@getAddBlogs')->name('getAddBlogs');
		Route::post('/handle-add-blogs', 'AdminBlogController@handleAddBlogs')->name('handleAddBlogs');
		Route::post('delete-blogs','AdminBlogController@deleteBlogs')->name('deleteBlogs');
		Route::get('edit-blogs/{id}','AdminBlogController@editBlogs')->name('editBlogs')->where(['id'=>'[0-9]+']);
		Route::post('handle-edit-blogs/{id}','AdminBlogController@handleEditBlogs')
		->name('handleEditBlogs')
		->where(['id'=>'[0-9]+']);
	});
	Route::group(['prefix' => 'feedbacks'], function(){
		Route::get('','AdminFeedbackController@getFeedbackProducts')->name('getFeedbackProducts');
		Route::post('','AdminFeedbackController@postFeedbackProducts')->name('postFeedbackProducts');
		Route::post('/blogs','AdminFeedbackController@getFeedbackBlogs')->name('getFeedbackBlogs');
		Route::post('delete-feedback','AdminFeedbackController@deleteFeedback')->name('deleteFeedback');
	});
});

/******************** Router Frontend - User **************************/

Route::group([
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'web'],
	'namespace' => 'Frontend',
	'as' => 'fr.'
],function(){
	Route::get('/','ProductController@index')->name('product');
	Route::get('/categories/{slug}/{id}', 'ProductController@getCategories')->name('getCategories');
	Route::get('/detail-product/{slug}/{id}','ProductController@detail')
	      ->name('detailPd');
	Route::post('/detail-product/{slug}/{id}','ProductController@postComments')
	->name('postComments');
	// Sort Products
	Route::get('/products-list','ProductController@searchProducts')->name('searchProducts');
	Route::get('/products-list-by-price-asc','ProductController@sortProductsByPriceAsc')->name('sortProductsByPriceAsc');
	Route::get('/products-list-by-price-desc','ProductController@sortProductsByPriceDesc')->name('sortProductsByPriceDesc');
	Route::get('/product-list-by-date','ProductController@sortProductsByDate')->name('sortProductsByDate');
	Route::get('/product-list-by-color/{id}','ProductController@sortProductsByColor')->name('sortProductsByColor');

	Route::match(['get','post'],'/add-cart/{id}','CartController@addCart')->name('addCart')->where(['id'=>'[0-9]+']);
	Route::get('/cart','CartController@showCart')->name('showCart');
	Route::get('/cart-list','CartController@getListCart')->name('getListCart');
	Route::get('/delete-cart/{rowId}','CartController@deleteCart')->name('deleteCart');
	Route::get('/update-cart','CartController@updateCart')->name('updateCart');
	Route::get('/payment','CartController@getFormPayment')->name('getFormPayment');
	Route::post('/payment','CartController@saveInfoShoppingCart')->name('postFormPayment');
	//Coupons
	Route::post('/coupon','CouponsController@store')->name('postCoupons');
	Route::delete('/coupon','CouponsController@destroy')->name('removeCoupons');

	//Stripe payment
	Route::get('payment/stripe', 'CartController@stripe');
 	Route::post('payment/stripe', 'CartController@payStripe')->name('stripe.post'); 

	// Contact
	Route::get('/contact', 'ContactController@getContact')->name('getContact');
	Route::post('/contact', 'ContactController@saveContact');
	// About
	Route::get('about', 'AboutController@getAbout')->name('getAbout');
	// Blog
	Route::get('blog','BlogController@getBlog')->name('getBlog');
	Route::get('detail-blog/{slug}/{id}', 'BlogController@getDetailBlogs')->name('getDetailBlogs');
	Route::post('/detail-blog/{slug}/{id}','BlogController@postComments')
	->name('postCommentBlogs');

	//Order tracking
	Route::get('track-order','OrderController@index')->name('getOrderTracking');
	Route::post('track-order','OrderController@confirmOrders');
	//Favorite product
	Route::post('/favorite/{id}','UserFavoriteController@addFavorite')->name('postAddFavorite');
	Route::get('/favorite','UserFavoriteController@index')->name('getFavoriteProduct');
	//Profile user
	Route::get('/profile','UserProfileController@index')->name('getUserProfile');
	Route::post('/profile','UserProfileController@editProfile')->name('postUserProfile');
	//Top Sale
	Route::get('/top-sale','ProductController@topsale')->name('topsale');
});
Auth::routes();
Route::group(['namespace' => 'Auth','middleware' => 'web'], function(){
	Route::get('/sign-up', 'RegisterController@getRegister')->name('get.register');
	Route::post('/sign-up', 'RegisterController@postRegister')->name('post.register');

	Route::get('/sign-in', 'LoginController@getLogin')->name('get.login');
	Route::post('/sign-in', 'LoginController@postLogin')->name('post.login');
	Route::get('/logout', 'LoginController@getLogout')->name('get.logout.user');
	Route::get('/forgot-password','ForgotPasswordController@getFormResetPassword')->name('getFormResetPassword');
	Route::post('/forgot-password','ForgotPasswordController@getCodeResetPassword')->name('getCodeResetPassword');
	Route::get('/new-password','ForgotPasswordController@resetPassword')->name('getNewPassword');
	Route::post('/new-password','ForgotPasswordController@saveResetPassword');
});

Route::get('/home', 'Frontend\ProductController@index')->name('home');
// login fb
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
// login google
Route::get('login/google', 'Auth\LoginController@redirectToGoogle');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('change-language/{lang?}',function($lang){
	// set ngon ngu cho ung dung
	App::setLocale($lang);
	// gan bien lang vao session - de sung cho thu vien laravellocalization
	// Session: global (toan cuc)
	Session::put('locale',$lang);

	// xe lai ngon ngu cho ung dung bang thu vien laravellocalization
	LaravelLocalization::setLocale($lang);

	// dieu huong url - quay sang trang ngon ngu ma nguoi dung chon
	// \URL::previous() : quay ve dung trang ma nguoi dung da tung o do truoc khi bam chon ngon ngu
	$url = LaravelLocalization::getLocalizedURL(App::getLocale(), \URL::previous());
	 
	return Redirect::to($url);

})->name('switchLang');














