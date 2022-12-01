<?php

use Illuminate\Support\Facades\Route;

use DuxDucisArsen\Phrases\Http\Controllers\PhraseController;

Route::group(['middleware' => config('phrase.middleware', ['web', 'auth'])], function () {
    Route::resource('phrase', PhraseController::class);
});