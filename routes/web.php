<?php

use DuxDucisArsen\Phrases\Http\Controllers\PhraseController;
use Illuminate\Support\Facades\Route;

Route::resources([
    'phrase'          => PhraseController::class,
]);
