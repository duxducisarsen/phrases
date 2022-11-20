<?php

class TestCase
{

    protected function getPackageProviders($app)
    {
        return [
            ExtraCollectServiceProvider::class
        ];
    }
    
}
