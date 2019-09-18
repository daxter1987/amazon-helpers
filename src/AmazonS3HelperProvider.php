<?php

namespace daxter1987\AmazonS3Helper;
use Illuminate\Support\ServiceProvider;

class AmazonS3HelperProvider extends ServiceProvider {

    public function boot()
    {
        $this->commands([
            Commands\ConfigureComposer::class,
        ]);
    }

    public function register()
    {
    }
}