<?php

namespace Vook\Fitbank;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Support\ServiceProvider;

/**
 * Class FitbankServiceProvider
 * @package Vook\Fitbank
 */
class FitbankServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->configure('fitbank');
        $path = realpath(__DIR__ . '/config/fitbank.php');
        $this->mergeConfigFrom($path, 'fitbank');
        $this->app->singleton(Connection::class, function($app) {
            /**
             * @var $config Config
             */
            $config = $app->get('config');
            Connection::$dateParser = $config->get('fitbank.date_parse');
            return new Connection($config->get('fitbank'));
        });
    }
}
