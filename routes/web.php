<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AbonneController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::match(['get','post'],'/login',[
    'as' => 'login',
    'uses'=> 'LoginController@index'
]);

 
Route::get('/logout',function(){
    if(session()->has('user'))
    {
        session()->pull('user');
    }
    return redirect('login');
})->name('logout');


Route::group(['middleware'=>['LoginMiddleware']],function(){

    
    // Route::get('/', function () {
    //     return redirect()->route('home');
    // });
    
    // Route::get('/home', 'HomeController@index')->name('home');
    
    
    /*************************ADMIN ROUTES**************************** */
    
    //Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware(['auth','can:admin-access'])->group(function () {
    
    //Abbonnes routes
    
    Route::match(['get','post'],'/abonnes/{p1?}/{p2?}/{p3?}',[
        'as' => 'abonnes',
        'uses'=> 'Admin\AbonneController@index'
    ]);
    
    
    //Categories routes
    
    Route::match(['get','post'],'/categories/{p1?}/{p2?}/{p3?}',[
        'as' => 'categories',
        'uses'=> 'Admin\CategorieController@index'
    ]);
    
    
    //Recettes routes
    
    Route::match(['get','post'],'/recettes/{p1?}/{p2?}/{p3?}',[
        'as' => 'recettes',
        'uses'=> 'Admin\RecetteController@index'
    ]);
    
    //Recelamations routes
    
    
    Route::match(['get','post'],'/reclamations/{p1?}/{p2?}/{p3?}',[
        'as' => 'reclamations',
        'uses'=> 'Admin\ReclamationController@index'
    ]);
    
    //Banques routes
    
    Route::match(['get','post'],'/banques/{p1?}/{p2?}/{p3?}',[
        'as' => 'banques',
        'uses'=> 'Admin\BanqueController@index'
    ]);
    
    //Depenses routes
    
    Route::match(['get','post'],'/depenses/{p1?}/{p2?}/{p3?}',[
        'as' => 'depenses',
        'uses'=> 'Admin\DepenseController@index'
    ]);
    
    //});
    
    /*************************ABONNE ROUTES**************************** */
    
    //Route::namespace('Abonne')->prefix('abonne')->name('abonne.')->middleware(['auth','can:abonne-access'])->group(function () {
    
    //Abbonnes routes
    
    Route::match(['get','post'],'/abonne_abonnes/{p1?}/{p2?}/{p3?}',[
        'as' => 'abonne_abonnes',
        'uses'=> 'Abonne\AbonneController@index'
    ]);
    
    //Recelamations routes
    
    Route::match(['get','post'],'/abonne-reclamations/{p1?}/{p2?}/{p3?}',[
        'as' => 'abonne-reclamations',
        'uses'=> 'Abonne\ReclamationController@index'
    ]);
});


//});