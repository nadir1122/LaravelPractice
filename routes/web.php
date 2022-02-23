<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
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
 return view('index');
});
Route::get('login','AuthController@loginPage');

Route::get('/join',"AuthController@joinPage");
Route::post('/join', "AuthController@join");
Route::post('login','AuthController@login');
Route::any('/logout',"AuthController@logout");
