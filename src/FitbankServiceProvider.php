<?php

namespace Vook\Fitbank;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Foundation\Application;

/**
 * Class FitbankServiceProvider
 * @package Vook\Fitbank
 */
class FitbankServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->configure('fitbank');
        $this->app->singleton('fitbank', function(Application $app) {
            /**
             * @var $config Config
             */
            $config = $app->get('config');
            return new Connection(
                $config->get('username'),
                $config->get('password'),
                $config->get('timeout'),
                $config->get('sandbox')
            );
        });
    }
}
