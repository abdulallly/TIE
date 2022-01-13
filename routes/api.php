<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*Load coucils*/
Route::group(['prefix' => 'councils'], function() {
    Route::get('/{regionId}', 'SchoolController@getCouncils');
});
/*Load school*/
Route::group(['prefix' => 'schools'], function() {
    Route::get('/{councilId}', 'SchoolController@getSchools');
});



Route::group(['prefix' => 'schoolsdetails'], function() {
    Route::get('/{councilId}', 'SchoolController@getSchool');
});

Route::group(['prefix' => 'standards'], function() {
    Route::get('/{schoolId}', 'SchoolController@getStandard');
});


Route::group(['prefix' => 'bookdetails'], function() {
    Route::get('/{bookId}', 'BookController@getBookcategory');
});
Route::group(['prefix' => 'bookdetails'], function() {
    Route::get('/{bookId}', 'BookController@getBookcategorys');
});



//Auth
Route::post('login','Api\AuthController@login');
Route::put('update/{id}','Api\AuthController@update');
Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout')->middleware('jwtAuth');

//books & schools
Route::get('retrievebook/standards/{council_id}','Api\BooksController@standards');
Route::get('retrievebook/books/{standard_id}','Api\BooksController@retrieve');
Route::get('retrievebook/bookscategory/{book_id}','Api\BooksController@get');
Route::get('retrievebook/standardname/{standard_id}','Api\BooksController@receive');
Route::post('requestbook/addbook','Api\BooksController@add');



//feedbacks
Route::post('councilfeedback/send','Api\HeadmasterFeedbacksController@send');
Route::get('councilfeedback/receive/{council_id}','Api\HeadmasterFeedbacksController@get');
Route::post('tiefeedback/send/','Api\HeadmasterFeedbacksController@send');
Route::get('tiefeedback/receive/{region_id}','Api\HeadmasterFeedbacksController@retrieve');

//news
Route::get('newsposts/receive/{school_id}','Api\PostNewsController@get');

//invoices
Route::post('invoices','Api\InvoicesController@get');
Route::post('invoices/otherdata','Api\InvoicesController@retrieve');
Route::get('invoices/bookrequests/{school_id}','Api\InvoicesController@requests');
Route::put('invoices/updateheadmasterstatus','Api\InvoicesController@update');
Route::post('invoices/headmasterinvoicedetails/{invoicenumber}','Api\InvoicesController@headmasterinvoicedetails');
