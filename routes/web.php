<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function()
// {
//     Route::get('/print', function(){
//         return  "hello world";});
//      Route::get('/printarray', function(){
//         return  [1,2,3];});

    Route::get('/cookie',function()
        {
            return response('hello world')->cookie(
                'name','jay',2
           );
        //   return redirect('/api/store');
        // return redirect()->away('https://www.google.com');
        });
// // });
