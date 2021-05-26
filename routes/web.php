<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;

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

Route::get('/user{id}/insertaddress/',function($id){
	$user = User::findOrFail($id);

	$address = new Address(['address'=>'Max crossing , las vegas']);

	$user->address()->save($address);
});

Route::get('/user{id}/address',function($id){
	$user = User::find($id);

	return $user->address;
});

Route::get('/user{id}/updateaddress',function($id){

	$address = Address::whereUserId($id)->first();

	$address->address = 'Recks Lane Las vegas';

	$address->save();

});

Route::get('/user{id}/deleteaddress',function($id){
	$user = User::findOrFail($id);

	$user->address()->delete();

	return "Done";
});