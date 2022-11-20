<?php

namespace DuxDucisArsen\Phrases;

use Illuminate\Support\ServiceProvider;

class PhrasesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'phrases');
        $this->loadViewsFrom(__DIR__.'/../resources/js', 'phrases');



        /*
            ejemplos: 
            
            // Register a macro, extending the Illuminate\Collection class
            Collection::macro('rejectEmptyFields', function () {
                return $this->reject(function ($entry) {
                    return $entry === null;
                });
            });

            // Register an authorization policy
            Gate::define('delete-post', function ($user, $post) {
                return $user->is($post->author);
            });
        */
    }
}