<?php

namespace DuxDucisArsen\Phrases\Test;

use DuxDucisArsen\Phrases\PhrasesServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app): array
    {
        return [
            PhrasesServiceProvider::class,
        ];
    }
    
   
}
