<?php

use CharlieLangridge\FathomStatsDisplay\Http\Controllers\FathomStatsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Card API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your card. These routes
| are loaded by the ServiceProvider of your card. You're free to add
| as many additional routes to this file as your card may require.
|
*/

Route::get('/refresh', function (Request $request) {
    foreach ([7, 30, 60, 90] as $day) {
        $key = 'fathomStats_'.$day;
        \Illuminate\Support\Facades\Cache::forget($key);
    }

    return true;
});
Route::get('/getStats/{siteId}/{days?}', FathomStatsController::class);
