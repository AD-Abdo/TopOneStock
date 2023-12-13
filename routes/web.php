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

use Illuminate\Support\Facades\Auth;


Route::middleware('CheckAdmin')->group(function () {
    Route::get('/', 'Frontend\HomeController@Home')->name('home');

    Route::get('/about', 'Frontend\HomeController@About')->name('about');

    Route::get('/contact','Frontend\HomeController@Contact')->name('contact');
    Route::post('/contact/post','Frontend\HomeController@ContactPost')->name('contact.post');

    Route::get('/packages','Frontend\HomeController@Packages')->name('packages');
    Route::post('/packages/check','Frontend\HomeController@PartcipationCheck')->name('partcipation.check');

    Route::get('/tawsiat','Frontend\HomeController@Tawsiat')->name('tawsiat');

    Route::get('/profile','Frontend\HomeController@Profile')->name('user.profile');
    Route::get('/profile/edit','Frontend\HomeController@ProfileEdit')->name('user.profile.edit');
    Route::put('/profile/update','Frontend\HomeController@ProfileUpdate')->name('user.profile.update');
    Route::get('/profile/password/edit','Frontend\HomeController@PasswordEdit')->name('user.profile.password');
    Route::put('/profile/password/update','Frontend\HomeController@PasswordUpdate')->name('user.profile.password.update');
    Route::get('/tawsiat/{id}','Frontend\HomeController@TawsiatGet')->name('tawsiat.get');
    Route::post('/tawsiat/{id}','Frontend\HomeController@TawsiatPost')->name('tawsiat.post');
    
});
Route::get('/404','Frontend\HomeController@ErrorDashboard')->name('error');

Auth::routes();

Route::prefix('/dashboard')->namespace('Backend')->name('admin.')->group(function () {
    Route::get('/home','HomeController@index')->name('home');

    //Shara Routes
    Route::middleware('CheckUser')->group(function () {
        
    
        Route::resource('share', 'ShareController');
        Route::post('share/filter','ShareController@filter')->name('share.filter.post');
        Route::get('share/filter','ShareController@filter')->name('share.filter.get');

        Route::resource('package','PackageController');
        Route::post('package/filter','PackageController@filter')->name('package.filter.post');
        Route::get('package/filter','PackageController@filter')->name('package.filter.get');

        Route::resource('user','UserController')->except('edit','update');
        Route::post('filter','UserController@Filter')->name('user.filter');
        
        Route::get('/customer','UserController@Customer')->name('customer');
        Route::post('/customer','UserController@CustomerFilter')->name('customer.filter');
        Route::post('/customer/{id}','UserController@CustomerDelete')->name('customer.delete');
        Route::patch('/customer/{id}','UserController@CustomerUpdate')->name('customer.update');
        Route::get('/customer/show/{id}','UserController@CustomerShow')->name('customer.show');
        Route::patch('/customer/comment/{id}','UserController@editComment')->name('customer.comment.edit');
        Route::get('/customer/comment/{id}','UserController@Comment')->name('customer.comment');
        Route::get('/analysis','UserController@Analysis')->name('user.analysis');


        Route::get('client', 'ClientController@index')->name('client.index');
        Route::get('client/create', 'ClientController@create')->name('client.create');
        Route::post('client/store', 'ClientController@store')->name('client.store');
        Route::get('client/edit/{id}', 'ClientController@edit')->name('client.edit');
        Route::post('client/update/{id}', 'ClientController@update')->name('client.update');
        Route::get('client/{id}', 'ClientController@show')->name('client.show');
        Route::post('client/{id}', 'ClientController@destroy')->name('client.delete');
        Route::patch('/client/{id}','ClientController@ClientUpdate')->name('client.agree.update');
        Route::post('/client','ClientController@ClientFilter')->name('client.filter');

        Route::resource('/participation','ParticipationController')->except('show','edit','update','store','create');
        Route::post('/participation/filter','ParticipationController@filter')->name('participation.filter');
        Route::patch('/participation/{id}','ParticipationController@ParticipationUpdate')->name('participation.update');

        Route::resource('/inbox', 'InboxController')->except('create','store','edit','update');
        Route::post('/inbox/filter','InboxController@filter')->name('inbox.filter');


        Route::get('/profile','ProfileController@edit')->name('profile');
        Route::put('/profile/update','ProfileController@update')->name('profile.update');

        Route::get('/profile/password','ProfileController@Password')->name('profile.password');
        Route::put('/profile/password/update','ProfileController@PasswordUpdate')->name('profile.password.update');
        
    });
});