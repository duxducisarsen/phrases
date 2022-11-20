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
        
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'phrase-migrations');

        $this->publishes([
            __DIR__.'/../routes/web.php' => base_path('routes/phrases.php')
        ], 'phrase-routes');

        
        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/phrases'),
        ], 'phrases-views');

        $this->loadViewsFrom(__DIR__.'/../resources/js', 'phrases');
        // $this->publishes([
        //     __DIR__.'/../public' => public_path('vendor/courier'),
        // ], 'public');

        

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