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


        $this->publishes([
            __DIR__ . '/resources/assets' =>
                resource_path('js/vendor/modules-eos-solution'
                )], 'eos-vue');

//        $this->publishes([
//            __DIR__ . '/resources/assets' =>
//                public_path('public/vendor/js/modules-eos-solution'
//                )], 'eos-asset');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_solutions_table.php' => database_path('migrations/' . date('Y_m_d_His', time
                ()) . '_create_solutions_table.php'),
            __DIR__ . '/../database/migrations/create_solution_developers_table.php' => database_path('migrations/' . date('Y_m_d_His', time
                ()) . '_create_solution_developers_table.php'),
            __DIR__ . '/../database/migrations/create_solution_cycles_table.php' => database_path('migrations/' . date('Y_m_d_His', time
                ()) . '_create_solution_cycles_table.php'),
            __DIR__ . '/../database/migrations/create_solution_submissions_table.php' => database_path('migrations/' . date('Y_m_d_His', time
                ()) . '_create_solution_submissions_table.php'),
        ], 'migrations');
    }

    public function register()
    {

    }
}
