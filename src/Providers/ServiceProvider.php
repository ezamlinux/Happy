<?php

namespace Ezamlinux\Happy\Providers;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    protected $commands = [
        \Ezamlinux\Happy\Console\Commands\HappyInitCommand::class,
        \Ezamlinux\Happy\Console\Commands\HappyKeyCommand::class,
        \Ezamlinux\Happy\Console\Commands\HappyModelCommand::class,
        \Ezamlinux\Happy\Console\Commands\HappyRouteCommand::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../happy.php', 'happy');
        $this->commands($this->commands);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../happy.php' => config_path('happy.php')], 'config');
        $this->publishes([__DIR__.'/../publishable/route.js' => resource_path('js/route.js')], 'routejs');
    }
}
