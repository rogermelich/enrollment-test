<?php

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

Route::get('/test', function () {
    DB::listen(function ($event) {
        dump($event->sql);
        dump($event->bindings);
    });
    Stats::of(Scool\Enrollment\Models\Enrollment\Enrollment::class);
    return Stats::total();
});