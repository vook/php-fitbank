<?php

namespace Vook\Fitbank;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Contracts\Config\Repository as Config;

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
            return new Connection(
                $config->get('fitbank.username'),
                $config->get('fitbank.password'),
                $config->get('fitbank.partner_id'),
                $config->get('fitbank.business_unit_id'),
                $config->get('fitbank.market_place_id'),
                $config->get('fitbank.timeout'),
                $config->get('fitbank.sandbox'),
            );
        });
    }
}
