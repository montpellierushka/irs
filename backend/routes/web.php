<?php

use Illuminate\Support\Facades\Route; 

Route::get('/', [App\Http\Controllers\Controller::class, 'index']);

Route::get('/order', [App\Http\Controllers\Controller::class, 'order']);

Route::get('/blog', [App\Http\Controllers\Controller::class, 'blog']);
Route::get('/blog/page/{number}', [App\Http\Controllers\Controller::class, 'blogPage']);//->where('number', '[0-9]+');
Route::get('/blog/{slug}', [App\Http\Controllers\Controller::class, 'blogDetail']);

Route::get('/vacancies', [App\Http\Controllers\Controller::class, 'vacancies']); 
Route::get('/vacancies/{slug}', [App\Http\Controllers\Controller::class, 'vacanciesDetail']);



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){
    Route::get('/',  [App\Http\Controllers\AdminController::class, 'index'])->name('home');
    Route::post('/slide1', [App\Http\Controllers\AdminController::class, 'slide1'])->name('admin_slide1');
    Route::post('/slide2', [App\Http\Controllers\AdminController::class, 'slide2'])->name('admin_slide2');
    Route::post('/slide2/delete', [App\Http\Controllers\AdminController::class, 'slide2Delete'])->name('admin_slide2_delete');
    Route::post('/slide2/update', [App\Http\Controllers\AdminController::class, 'slide2Update'])->name('admin_slide2_update');
    Route::post('/slide2/new', [App\Http\Controllers\AdminController::class, 'slide2New'])->name('admin_slide2_new');
    Route::post('/slide3', [App\Http\Controllers\AdminController::class, 'slide3'])->name('admin_slide3');
    Route::post('/slide3/delete', [App\Http\Controllers\AdminController::class, 'slide3Delete'])->name('admin_slide3_delete');
    Route::post('/slide3/update', [App\Http\Controllers\AdminController::class, 'slide3Update'])->name('admin_slide3_update');
    Route::post('/slide3/new', [App\Http\Controllers\AdminController::class, 'slide3New'])->name('admin_slide3_new');
    Route::post('/slide4', [App\Http\Controllers\AdminController::class, 'slide4'])->name('admin_slide4');
    Route::post('/slide4/delete', [App\Http\Controllers\AdminController::class, 'slide4Delete'])->name('admin_slide4_delete');
    Route::post('/slide4/update', [App\Http\Controllers\AdminController::class, 'slide4Update'])->name('admin_slide4_update');
    Route::post('/slide4/new', [App\Http\Controllers\AdminController::class, 'slide4New'])->name('admin_slide4_new');
    Route::post('/slide5', [App\Http\Controllers\AdminController::class, 'slide5'])->name('admin_slide5');
    Route::post('/slide6', [App\Http\Controllers\AdminController::class, 'slide6'])->name('admin_slide6');
    Route::post('/slide6/delete', [App\Http\Controllers\AdminController::class, 'slide6Delete'])->name('admin_slide6_delete');
    Route::post('/slide6/update', [App\Http\Controllers\AdminController::class, 'slide6Update'])->name('admin_slide6_update');
    Route::post('/slide6/new', [App\Http\Controllers\AdminController::class, 'slide6New'])->name('admin_slide6_new');

    Route::get('/blog', function () {
         
    })->name('admin_blog');
    
    Route::get('/upload',  [App\Http\Controllers\AdminController::class, 'upload'])->name('upload');
    Route::post('/upload',  [App\Http\Controllers\AdminController::class, 'adminUpload']);
    Route::post('/upload/delete',  [App\Http\Controllers\AdminController::class, 'uploadDelete'])->name('upload_delete');

    Route::group(['prefix' => 'menu'], function(){
        Route::get('/{type}',  [App\Http\Controllers\AdminController::class, 'menu'])->name('admin_menu');
        Route::post('/delete', [App\Http\Controllers\AdminController::class, 'menuDelete'])->name('admin_menu_delete'); 
        Route::post('/update', [App\Http\Controllers\AdminController::class, 'menuUpdate'])->name('admin_menu_update'); 
        Route::post('/new', [App\Http\Controllers\AdminController::class, 'menuNew'])->name('admin_menu_new'); 
    });

    Route::group(['prefix' => 'posts'], function(){
        Route::get('/',  [App\Http\Controllers\AdminController::class, 'posts'])->name('admin_posts');
        Route::get('/{number}', [App\Http\Controllers\AdminController::class, 'postsPost'])->where('number', '[0-9]+');
        Route::post('/delete', [App\Http\Controllers\AdminController::class, 'postsDelete'])->name('admin_posts_delete'); 
        Route::post('/update', [App\Http\Controllers\AdminController::class, 'postsUpdate'])->name('admin_posts_update'); 
        Route::get('/new', [App\Http\Controllers\AdminController::class, 'postsNew'])->name('admin_posts_new'); 
        Route::post('/new', [App\Http\Controllers\AdminController::class, 'postsNewAdd']); 
    });


    Route::group(['prefix' => 'pages'], function(){
        Route::get('/',  [App\Http\Controllers\AdminController::class, 'pages'])->name('admin_pages');
        Route::get('/{number}', [App\Http\Controllers\AdminController::class, 'pagesPage'])->where('number', '[0-9]+');
        Route::post('/delete', [App\Http\Controllers\AdminController::class, 'pagesDelete'])->name('admin_pages_delete'); 
        Route::post('/update', [App\Http\Controllers\AdminController::class, 'pagesUpdate'])->name('admin_pages_update'); 
        Route::get('/new', [App\Http\Controllers\AdminController::class, 'pagesNew'])->name('admin_pages_new'); 
        Route::post('/new', [App\Http\Controllers\AdminController::class, 'pagesNewAdd']); 
    });


    Route::group(['prefix' => 'team'], function(){
        Route::get('/',  [App\Http\Controllers\AdminController::class, 'team'])->name('admin_team');
        Route::get('/{number}', [App\Http\Controllers\AdminController::class, 'teamEl'])->where('number', '[0-9]+');
        Route::post('/delete', [App\Http\Controllers\AdminController::class, 'teamDelete'])->name('admin_team_delete'); 
        Route::post('/update', [App\Http\Controllers\AdminController::class, 'teamUpdate'])->name('admin_team_update'); 
        Route::get('/new', [App\Http\Controllers\AdminController::class, 'teamNew'])->name('admin_team_new'); 
        Route::post('/new', [App\Http\Controllers\AdminController::class, 'teamNewAdd']); 
    });

    Route::group(['prefix' => 'vacancies'], function(){
        Route::get('/',  [App\Http\Controllers\AdminController::class, 'vacancies'])->name('admin_vacancies');
        Route::get('/{number}', [App\Http\Controllers\AdminController::class, 'vacanciesVacancy'])->where('number', '[0-9]+');
        Route::post('/delete', [App\Http\Controllers\AdminController::class, 'vacanciesDelete'])->name('admin_vacancies_delete'); 
        Route::post('/update', [App\Http\Controllers\AdminController::class, 'vacanciesUpdate'])->name('admin_vacancies_update'); 
        Route::get('/new', [App\Http\Controllers\AdminController::class, 'vacanciesNew'])->name('admin_vacancies_new'); 
        Route::post('/new', [App\Http\Controllers\AdminController::class, 'vacanciesNewAdd']); 
    });

    Route::get('/orders',  [App\Http\Controllers\AdminController::class, 'orders'])->name('orders');
    Route::post('/orders/delete',  [App\Http\Controllers\AdminController::class, 'ordersDelete'])->name('orders_delete');

});


Route::middleware("guest:web")->group(function () {   
    Route::get('/login', function(){ return view('admin.login'); })->name('login'); 
    Route::post('/login', [App\Http\Controllers\Controller::class, 'login']); 
});
Route::middleware("auth:web")->group(function () {  
    Route::get('/logout', [App\Http\Controllers\Controller::class, 'logout'])->name('logout');
});




Route::get('/{page}', [App\Http\Controllers\Controller::class, 'page']);

Route::any('{query}', [App\Http\Controllers\Controller::class, 'page404'])->where('query', '.*');
