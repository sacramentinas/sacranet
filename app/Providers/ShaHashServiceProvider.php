<?php
namespace Sacranet\Providers;
use Illuminate\Hashing\HashServiceProvider;
use Sacranet\ShaHasher;

class ShaHashServiceProvider extends HashServiceProvider{

    public function register()
    {
        $this->app->singleton('hash',function(){
            return new ShaHasher;
        });
    }

}