<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
 * Display All Produtos
 */
Route::get('/', function () {
   	return view('produtos');
});

/**
 * Add A New Produto
 */
Route::post('/produto', function(Request $request){
	//
});

/**
 * Delete An Existing Produto
 */
Route:delete('/produto/{id}', function($id) {
	//
});
