<?php

namespace Modullo\ModulesEosSolution;

use Illuminate\Support\ServiceProvider;

class ModulesEosSolutionServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'modules-eos-solution');
        $this->publishes([
            __DIR__.'/config/modules-eos-solution.php' => config_path('modules-eos-solution.php'),
        ], 'config');
    }

    public function register()
    {

    }
}
