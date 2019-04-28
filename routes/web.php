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

Auth::routes();
Route::get('/logout', function () {
    Auth::logout();
    return redirect('home');
});
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
//test
Route::get('curl', 'Paypal@DetailInvoice');
Route::get('getPaymenttest/{id}', 'Paypal@getPaymenttest');
Route::get('getTranstiontest/{id}', 'Paypal@getTranstiontest');
Route::get('getListTransactions', 'Paypal@getListTransactions');
//paypal
Route::get('checktransaction', 'CheckTransactionController@index')->middleware('permission:checktransaction');
Route::get('listtransaction', 'ListTransactionController@index')->middleware('permission:listtransaction');
//paypal account
Route::get('paypal_account', 'PayPalAccountController@index')->middleware('permission:paypal_account');
Route::get('paypal_account/{id}', 'PayPalAccountController@show')->middleware('permission:paypal_account');
Route::post('paypal_account/{id}', 'PayPalAccountController@edit')->middleware('permission:paypal_account');
//historyrefund
Route::get('historyrefund', 'RefundController@index')->middleware('permission:historyrefund');
Route::post('refund', 'RefundController@Refund')->middleware('permission:refund');
Route::get('refund/{id}', 'RefundController@refunddetails')->middleware('permission:refund');
//member
Route::get('member', 'MemberController@index')->middleware('permission:member');
Route::get('member/{id}', 'MemberController@show')->middleware('permission:member');
Route::post('member/{id}', 'MemberController@edit')->middleware('permission:member');
Route::post('member', 'MemberController@create')->middleware('permission:member');
//role
Route::resource('roles', 'RoleController')->middleware('permission:roles');
//change account paypal
Route::get('changepaypal/{id}', 'Paypal@changeAccount');
