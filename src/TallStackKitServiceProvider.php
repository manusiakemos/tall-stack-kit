<?php

namespace Manusiakemos\TallStackKit;

use Illuminate\Support\ServiceProvider;

class TallStackKitServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->bootResources();
        $this->bootPublishing();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tall-stack-kit.php', 'tall-stack-kit');
        $this->app->singleton('tall-stack-kit', function () {
            return new TallStackKit;
        });
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'kit');
    }

    private function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/views' => $this->app->resourcePath('views/vendor/kit'),
            ], 'kit-view-components');

            $this->publishes([
                __DIR__ . '/../config/tall-stack-kit.php' => config_path('tall-stack-kit.php'),
            ], 'kit-config');

            $this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor'),
              ], 'kit-assets');
        }
    }
}
