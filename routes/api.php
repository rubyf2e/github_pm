<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GithubController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SwaggerAPIDocsController;


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

Route::group(['prefix' => 'v1.0'], function () {

	Route::group(['namespace' => 'Github', 'prefix' => 'Github'], function () {
		Route::get('/UserData/{user?}', [GithubController::class, 'UserData']);
		Route::get('/UserRepos/{user?}', [GithubController::class, 'UserRepos']);
		Route::get('/UserAccessTokenRepos', [GithubController::class, 'UserAccessTokenRepos']);
		Route::post('/UserAccessTokenCreateRepos', [GithubController::class, 'UserAccessTokenCreateRepos']);
		Route::post('/UserAccessTokenCreateCommit', [GithubController::class, 'UserAccessTokenCreateCommit']);
		Route::post('/UserAccessTokenCreateBlob', [GithubController::class, 'UserAccessTokenCreateBlob']);
		Route::post('/UserAccessTokenGetBlob/{file_sha}', [GithubController::class, 'UserAccessTokenGetBlob']);


	});

	Route::get('/get-api-document', [SwaggerAPIDocsController::class, 'getJSON']);
	Route::post('/User/createUser', [UserController::class, 'createUser']);

});






