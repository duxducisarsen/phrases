<?php

use DuxDucisArsen\Phrases\Http\Controllers\PhraseController;
use Illuminate\Support\Facades\Route;

Route::resource('phrase', PhraseController::class)->middleware(['web', 'auth']);   
