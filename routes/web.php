<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

use App\User;
//use Illuminate\Support\Facades\Input;
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
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes(['verify' => true]);
Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('roles','RoleController');
    /*Headmaster*/

    Route::get('bookrequestindex{id}','HeadmasterRequestController@bookrequestindex')->name('bookrequestindex');
    Route::get('schooindexreceived{id}','HeadmasterRequestController@schooindexreceived')->name('schooindexreceived');
    Route::get('councilindexreceived{id}','HeadmasterRequestController@councilindexreceived')->name('councilindexreceived');
    Route::get('headmasterrequestsreceived','HeadmasterRequestController@headmasterrequestsreceived')->name('headmasterrequestsreceived');
    Route::get('regionindexreceived','HeadmasterRequestController@regionindexreceived')->name('regionindexreceived');
    Route::resource('headmasterrequests','HeadmasterRequestController');
    Route::resource('headmasterfeedbacks','HeadmasterfeedbackController');
    Route::resource('headmaster','HeadmasterController');
    /*Statistical officer*/
    Route::resource('statisticalofficer','StatisticalofficerController');
    Route::resource('statisticalofficerschools','StatististicalofficerschoolController');

    Route::post('storestatisticalofficerfeedbacktoregion','StatisticalofficerfeedbackController@storestatisticalofficerfeedbackstoregion')->name('storestatisticalofficerfeedbackstoregion');
    Route::get('statisticalofficerfeedbackstoregion','StatisticalofficerfeedbackController@statisticalofficerfeedbackstoregion')->name('statisticalofficerfeedbackstoregion');
    Route::get('statisticalfeedbacks{id}','StatisticalofficerfeedbackController@statisticalfeedbacks')->name('statisticalfeedbacks');
    Route::resource('statisticalofficerfeedbacks','StatisticalofficerfeedbackController');
    Route::resource('statisticaluser','StatisticaluserController');
    Route::resource('statisticalschool','StatisticalschoolController');
    /*projectmanager*/
    Route::resource('projectmanager','ProjectmanagerController');
    Route::get('projectmanagerfeedbacksfromcouncil','ProjectmanagerfeedbackController@councilfeedbacks')->name('projectmanagerfeedbacksfromcouncil');
    Route::post('headmasterfeedbacksformmanager','ProjectmanagerfeedbackController@headmasterfeedbacksformmanager')->name('headmasterfeedbacksformmanager');
    Route::post('statisticalofficerfeedbacksformmanager','ProjectmanagerfeedbackController@statisticalofficerfeedbacksformmanager')->name('statisticalofficerfeedbacksformmanager');
    Route::get('projectmanagerfeedbacksfromschool','ProjectmanagerfeedbackController@schoolfeedbacks')->name('projectmanagerfeedbacksfromschool');
    Route::get('schooledit{id}','ProjectmanagerfeedbackController@schooledit')->name('schooledit');
    Route::resource('projectmanagerfeedbacks','ProjectmanagerfeedbackController');
    Route::resource('standards','StandardController');
    Route::get('getBookcategory/{bookId}', 'BookController@getBookcategory')->name('getBookcategory');
    Route::get('getBookcategorys/{bookId}', 'BookController@getBookcategorys')->name('getBookcategorys');
    Route::get('exportbooks', 'BookController@export')->name('exportbooks');
    Route::post('importbooks', 'BookController@import')->name('importbooks');
    Route::resource('books','BookController');
    Route::get('export', 'MyController@export')->name('export');
    Route::get('category_exports','Book_categoryController@category_exports')->name('category_exports');
    Route::post('book_category_imports','Book_categoryController@book_category_imports')->name('book_category_imports');
    Route::resource('book_categories','Book_categoryController');
    /*Region*/
    Route::get('/regions/pdf','RegionController@createPDF');

//    Route::get('/invoicetitle/get/{id}','RegionController@getInvoiceDetails');
    Route::get('/invoicerefnumbertitle/get/{id}','RegionController@getInvoicerefnumbereDetails');

    Route::get('/invoicerefnumber/get/{id}','RegionController@getinvoicerefnumber');
    Route::get('/council/get/{id}','RegionController@getCouncil');
    Route::resource('regions','RegionController');
    Route::get('/region/index','CreateRegionController@index');
    Route::get('/region/index-pdf','CreateRegionController@create');
    /*Councils*/
    Route::get('mutipleremovecouncil','CouncilController@mutipleremovecouncil')->name('mutipleremovecouncil');
//    Route::resource('loadcouncils','LoadcouncilController');
    Route::resource('councils','CouncilController');
    /*School*/
    Route::get('mutipleremoveschool','SchoolController@mutipleremoveschool')->name('mutipleremoveschool');
    Route::get('getCouncils/{id}','SchoolController@getCouncils')->name('getCouncils');
    Route::get('getSchools/{id}','SchoolController@getSchools')->name('getSchools');
    Route::get('getSchool/{id}','SchoolController@getSchool')->name('getSchool');
    Route::get('getStandard/{id}','SchoolController@getStandard')->name('getStandard');
    Route::resource('schools','SchoolController');
    Route::get('schoolindex{id}','School_informationController@schoolindex')->name('schoolindex');
    Route::get('councilindex{id}','School_informationController@councilindex')->name('councilindex');
    Route::resource('Schoolinformation','School_informationController');
    Route::get('viewpdfmachapisho{id}','NewsController@viewpdf')->name('viewpdfmachapisho');

    Route::get('newsuploadedheads','NewsController@newsuploadedheads')->name('newsuploadedheads');
    Route::resource('newsuploads','NewsController');



    Route::get('blockedusers', 'Users\UserController@blocked')->name('blockedusers');
    Route::get('userChangeStatus', 'Users\UserController@userChangeStatus');
    Route::resource('users','Users\UserController');
    Route::get('generateinvoices','InvoiceController@generate')->name('generateinvoices');


    Route::resource('invoices','InvoiceController');

    Route::get('/invoicerecordsdet/get/{id}','InvoiceRecordController@getInvoiceref');
     Route::get('/invo/{invoice}/edit/{schoolID}','InvoiceRecordController@getInvoiceDetails');
    Route::get('/invoicerecordslist/get/{id}','InvoiceRecordController@getInvoice');
    Route::get('/invoiceschoolrecords/get/{id}','InvoiceRecordController@getSchool');
    Route::get('/councilinvoicerecords/get/{id}','InvoiceRecordController@getCouncil');
    Route::get('allinvoicerecordds','InvoiceRecordController@allinvoicerecordds')->name('allinvoicerecordds');
    Route::resource('invoicesrecords','InvoiceRecordController');
    Route::resource('generateinv','GenerateController');


    Route::get('/councilInvoicesDetailsAccept/get/{id}','GeneratestatisticalController@councilInvoicesDetailsAccept');
    Route::get('/schoolsInvoicesDetails/get/{id}','GeneratestatisticalController@getSchoolInvoiceDetails');
    Route::get('/schoolsInvoices/get/{id}','GeneratestatisticalController@getSchoolInvoice');
    Route::resource('GeneratestatisticalControllers','GeneratestatisticalController');


    Route::get('/schoolsInvoicesDetailsAccept/get/{id}','GenerateheadmasterController@getSchoolInvoiceDetailsAccept');
    Route::get('/schoolsInvoicesDetailsHead/get/{id}','GenerateheadmasterController@schoolsInvoicesDetailsHead');
    Route::resource('GenerateheadmasterControllers','GenerateheadmasterController');

    Route::resource('profileAccount','ProfileAccountController');
    Route::resource('change-password', 'ChangePasswordController');
    Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
    //import excel
    Route::get('export', 'MyController@export')->name('export');
    Route::get('importExportView', 'MyController@importExportView');
    Route::post('import', 'MyController@import')->name('import');
    //pdf
    Route::get('pdf-create','PdfController@create');

//    Route::resource('invoicereferences','InvoiceReferenceController');

});
