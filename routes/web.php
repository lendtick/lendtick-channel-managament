<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Helpers\Api;

$router->get('/', function () use ($router) {
	$message = 'Welcome to Service Channel ';
	return response()->json(Api::format(200, $message . $router->app->version(), []), 200);
});

$router->get('/call-job','CallChannelController@index');

$router->get('/data','ChannelDataController@index');
$router->get('/data-sync','ChannelDataController@DataSync');


// $router->get('/promo', 'ContentController@all'); 
// $router->get('/content-promo/{ContentType}','ContentController@GetByCategory');


$router->group(['prefix' => 'channel'], function() use ($router){
	$router->get('/list','ChannelController@index');
});

// $router->group('content/', function() use ($router){

// });

