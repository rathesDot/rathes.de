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

Route::get('/resume', function () {
    return PDF::setOptions([
            'dpi' => 300,
            'defaultFont' => 'sans-serif',
            'isHtml5ParserEnabled' => true,
            'isFontSubsettingEnabled' => true,
        ])
        ->loadView('resume')
        ->stream('resume.pdf');
});
