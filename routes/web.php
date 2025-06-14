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

// Route::get('/', function () {
//     return view('welcome');
// });

//dataList
Route::get('datalist/{jr}', 'MasterController@datalist');
Route::get('accountdetail/{id}', 'TransController@accountdetail');

//transList
Route::get('list/purchase', "TransController@listpurchase");



Route::get('trans', function () {
   return 'trans';
   //return View::make('trans');
});


//app
Route::get('/', 'AppController@dashboard');
Route::get('dashboard', 'AppController@dashboard');
Route::get('reportall', 'AppController@reportall');
Route::get('setting', 'AppController@setting');
Route::get('logout', 'AppController@logout');


//edit  trans
// Route::get('edit/salesorder/{id?}', 'SalesController@dataedit');
// Route::get('edit/purchase/{id?}', 'PurchaseController@dataedit');
Route::get('edit/expense/{id?}', 'TransController@editExpense');

//edit master & trans
Route::get('edit/{jr}/{id?}', 'MasterController@dataedit');
// Route::group(['prefix'=>'edit'], function(){
//    Route::get('product/{id}', 'MasterController@dataedit');
//    Route::get('supplier/{id}', 'MasterController@dataedit');
//    Route::get('customer/{id}', 'MasterController@dataedit');
//    Route::get('trans/{id}', 'TransController@transedit')->name('trans-edit');
// });
Route::post('datasave', 'MasterController@store');
Route::post('transsave', 'TransController@store');

//reportmaster
Route::get('report/{id}', 'ReportController@makereport');
// Route::get('report/{id}', 'ReportController@examplepdf');

//dashboard
Route::get('ajax_makechart/{id}', 'AppController@makechart');

//load data
Route::get('loadtrans/{id}', 'DataController@loadTrans');

//server side
//ajax list Master
Route::get('_post_datalist/{id}/{page}/{find}', 'MasterController@post_datalist');

//server side / API--------------------

// list
Route::get('ajax_translist/{jr}', 'AjaxController@ajax_translist')->name('ajax_translist');
Route::get('ajax_datalist/{jr}', 'AjaxController@ajax_datalist')->name('ajax_datalist');

// form master load
Route::get('ajax_getProduct/{id}', 'AjaxController@ajax_getProduct');
Route::get('ajax_getCustomer/{id}', 'AjaxController@ajax_getCustomer');
Route::get('ajax_getSupplier/{id}', 'AjaxController@ajax_getSupplier');
// form master save
Route::post('product-edit/datasave_product', 'AjaxController@datasave_product');
Route::post('supplier-edit/ajax_post', 'AjaxController@datasave_supplier');
Route::post('customer-edit/ajax_post', 'AjaxController@datasave_customer');
// form trans load
Route::get('ajax_getTrans/{id}', 'AjaxController@ajax_getTrans');
// form trans save
Route::post('trans-edit/ajax_post', 'TransController@datasave');
// --------------------------------------------

//load data row / lookup
Route::get('trans-edit/_loaddatarow/{jr}/{id}', function ($jr,$id) {
   if($jr=='product') {
      $dat = (array)DB::table('masterproduct')->where('Code', $id)->first();
		return json_encode($dat);
	}
});
