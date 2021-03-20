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

Route::get('/','WelcomeController@index');
Route::post('/search','WelcomeController@searchProduct');
Route::get('/searchByUiJs','WelcomeController@getProductForSuggest');
Route::get('/viewCategory/{id}','WelcomeController@category');
Route::get('/viewManufactureProduct/{id}','WelcomeController@manufacture');
Route::get('/viewSaleProduct/{id}','WelcomeController@SaleProduct');
Route::get('/product-details/{id}','WelcomeController@productDetails');
Route::get('/contact','WelcomeController@contact');
Route::get('/contact','WelcomeController@contact');
Route::post('/contact','WelcomeController@contactUs');
Route::get('/allProduct','WelcomeController@allProduct');

Route::post('/customer/register','LoginRegisterController@index');
Route::get('/customer/verify/{token}', 'LoginRegisterController@verifyCustomer');
Route::post('/customer/login','LoginRegisterController@login');
Route::post('/customer/login2','LoginRegisterController@login2');


Route::group(['middleware' => 'checkUser'],function(){

	Route::get('/customer/logout','LoginRegisterController@logout');

	Route::get('/customer/profile','CustomerController@index');
	Route::post('/customer/update','CustomerController@update');
	Route::post('/customer/changePassword','CustomerController@changePassword');
	Route::get('/wishlist','wishlistController@index');
	Route::post('/wishlist/add','wishlistController@add');
	Route::get('/wishlist/delete/{id}','wishlistController@delete');
	Route::post('/order/save','orderController@add');
	
});

Route::get('/cart','cartController@index');
Route::get('/cart/add/{id}','cartController@addItem');
Route::post('/cart/add','cartController@addItemForm');
Route::get('/cart/update','cartController@updateItem');
Route::get('/cart/remove/{id}','cartController@removeItem');
Route::get('/order','orderController@index');




/*
|--------------------------------------------------------------------------
| Start All Backend Route
|--------------------------------------------------------------------------
|
*/

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');

Route::group(['middleware' => 'adminCheck'],function(){


		/*		Start Theme Setting Info 		*/
		Route::get('/theme','ThemeOptionsController@index');
		Route::post('/theme/themeSettings','ThemeOptionsController@updateThemeOptionSettings');
		/*		End Theme Setting Info 		*/



		/*		Start User Info 		*/
		Route::get('/user/list', 'userController@listUser');
		Route::get('/user/add', 'userController@addUser');
		Route::post('/user/create', 'userController@createUser');
		Route::get('/user/deleteUser/{id}','userController@deleteUser');
		/*		End User Info 		*/



		/*		Start Slider Info 		*/
		Route::get('/slider/list', 'sliderController@listSlider');
		Route::get('/slider/add','sliderController@addSlider');
		Route::post('/slider/save','sliderController@createSlider');
		Route::get('/slider/editSlider/{id}','sliderController@editSlider');
		Route::post('/slider/update','sliderController@updateSlider');
		Route::get('/slider/deleteSlider/{id}','sliderController@deleteSlider');
		/*		End Slider Info 		*/



		/*		Start Category Info 		*/
		// Route::get('/category/add', 'CategoryController@createCategory')->middleware('adminCheck'); Use middleware in single route
		Route::get('/category/add', 'CategoryController@createCategory');
		Route::post('/category/save', 'CategoryController@storeCategory');
		Route::get('/categry/list', 'CategoryController@listCategory');
		Route::get('/category/editCategory/{id}', 'CategoryController@editCategory');
		Route::post('/category/update', 'CategoryController@updateCategory');
		Route::get('/category/deleteCategory/{id}', 'CategoryController@deleteCategory');
		/*		End Category Info 		*/



		/*		Start Manufacturar Info 		*/
		Route::get('/manufacture/add','manufactureController@createManufacture');
		Route::post('/manufacture/save','manufactureController@storeManufacture');
		Route::get('/manufacture/list', 'manufactureController@listManufacture');
		Route::get('/manufactures/editManufacture/{id}', 'manufactureController@editManufacture');
		Route::post('/manufacture/update', 'manufactureController@updateManufacture');
		Route::get('/manufactures/deleteManufacture/{id}', 'manufactureController@deleteManufacture');
		/*		End Manufacturar Info 		*/



		/*		Start Manufacturar Info 		*/
		Route::get('/tag/add','tagController@createTag');
		Route::post('/tag/save','tagController@storeTag');
		Route::get('/tag/list', 'tagController@listTag');
		Route::get('/tag/editTag/{id}', 'tagController@editTag');
		Route::post('/tag/update', 'tagController@updateTag');
		Route::get('/tag/deleteTag/{id}', 'tagController@deleteTag');
		/*		End Manufacturar Info 		*/



		/*		Start Size Info 		*/
		Route::get('/size/add','sizeController@createSize');
		Route::post('/size/save','sizeController@storeSize');
		Route::get('/size/list', 'sizeController@listSize');
		Route::get('/size/editSize/{id}', 'sizeController@editSize');
		Route::post('/size/update', 'sizeController@updateSize');
		Route::get('/size/deleteSize/{id}', 'sizeController@deleteSize');
		/*		End Size Info 		*/


		/*		Start Color Info 		*/
		Route::get('/color/add','colorController@createColor');
		Route::post('/color/save','colorController@storeColor');
		Route::get('/color/list', 'colorController@listColor');
		Route::get('/color/editColor/{id}', 'colorController@editColor');
		Route::post('/color/update', 'colorController@updateColor');
		Route::get('/color/deleteColor/{id}', 'colorController@deleteColor');
		/*		End Color Info 		*/




		/*		Start Product Info 		*/
		Route::post('/categoryAddAjax','CategoryController@addCategoryByModal');
		Route::post('/tagAddAjax','tagController@addTagByModal');
		Route::post('/manufactureAddAjax','manufactureController@addManufactureByModal');
		Route::get('/product/add','productController@createProduct');
		Route::post('/product/save','productController@storeProduct');
		Route::get('/product/list', 'productController@listProduct');
		Route::get('/product/viewProduct/{id}', 'productController@viewProduct');
		Route::get('/product/editProduct/{id}', 'productController@editProduct');
		Route::post('/product/update', 'productController@updateProduct');
		Route::get('/product/deleteProduct/{id}', 'productController@deleteProduct');
		/*		End Product Info 		*/


		/*		Start Order Info 		*/
		Route::get('/adminOrder','orderController@getAllOrder');
		Route::post('/order/status','orderController@changeStatus');
		Route::get('/order/deleteOrder/{id}','orderController@deleteOrder');
		Route::get('/order/viewOrder/{id}','orderController@viewOrder');
		/*		End Order Info 		*/

		/*		Start Customer Info 		*/
		Route::get('/adminCustomer/list','CustomerController@getAllCustomers');
		Route::get('/adminCustomer/create','CustomerController@createNewCustomer');
		Route::post('/adminCustomer/add','CustomerController@addNewCustomer');
		Route::post('/adminCustomer/status','CustomerController@changeStatus');
		Route::get('/adminCustomer/deleteCustomer/{id}','CustomerController@deleteCustomer');
		/*		End Customer Info 		*/


});

