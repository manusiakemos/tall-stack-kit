<?php

namespace Manusiakemos\TallStackKit;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Manusiakemos\TallStackKit\Commands\TallStackKitCommand;

class TallStackKitServiceProvider extends PackageServiceProvider
{

    public function boot(): void
    {
        $this->bootResources();
        $this->bootPublishing();
        $this->bootBladeComponents();
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'kit');
    }

    private function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                // __DIR__.'/Components/' => app_path('View/Components/TallStackKit'),
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/tall-stack-kit'),
            ], 'tall-stack-kit-view-components');
        }
    }

    private function bootBladeComponents()
    {
        $this->loadViewComponentsAs('kit', [
            Modal::class,
            Button::class,
        ]);
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('tall-stack-kit')
            // ->hasConfigFile()
            ->hasViews()
            // ->hasMigration('create_tall-stack-kit_table')
            ->hasCommand(TallStackKitCommand::class);
    }
}
