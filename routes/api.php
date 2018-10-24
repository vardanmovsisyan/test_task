<?php

use Illuminate\Http\Request;
use App\User;
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
Route::group(['middleware' => 'api'], function(){
    // Fetch Users
    Route::get('users', function(){
        return User::where('verifiedByAdmin', 0)->orderBy('created_at', 'desc')
                                        ->get();
    });
    // VerifyUser
    Route::post('user/{id}', function(Request $request, $id){
        $user=User::findOrFail($id);
        $user->verifiedByAdmin = 1;
        $user->save();
    });
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
