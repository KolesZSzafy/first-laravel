<?php

use App\Http\Controllers\MainPages;
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

Route::group(['prefix' => '/', 'as' => 'game.'], function () {
    Route::get('', function () {
        return redirect()->route('game.list', ['number' => 1]);
    });

    Route::get('page{number}', function (int $number) {
        return (new MainPages())->list($number);
    })->name('list');

    Route::get('{name}/{id}', function (string $name, int $id) {
        return (new MainPages())->show($name, $id);
    })->name('show');
});
