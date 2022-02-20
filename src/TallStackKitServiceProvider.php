<?php

namespace Manusiakemos\TallStackKit;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Manusiakemos\TallStackKit\Commands\TallStackKitCommand;
use Manusiakemos\TallStackKit\View\Components\FileUpload;
use Manusiakemos\TallStackKit\View\Components\Toast;
use TallStackKit\Components\SelectSearch;

class TallStackKitServiceProvider extends PackageServiceProvider
{

    public function boot(): void
    {
        $this->bootResources();
        $this->bootPublishing();
        $this->bootBladeComponents();
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/tall-stack-kit.php', 'tall-stack-kit');
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'kit');
    }

    private function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/View/Components/' => app_path('View/Components'),
                __DIR__ . '/../resources/views' => $this->app->resourcePath('views/vendor/tall-stack-kit'),
            ], 'tall-stack-kit-view-components');

            $this->publishes([
                __DIR__.'/../config/tall-stack-kit.php' => config_path('tall-stack-kit.php'),
              ], 'tall-stack-kit-config');
        }
    }

    private function bootBladeComponents()
    {
        $this->loadViewComponentsAs('kit', [
            Trix::class,
            Toast::class,
            Alert::class,
            FileUpload::class,
            FormGroup::class,
            Radio::class,
            Textarea::class,
            Toggle::class,
            Input::class,
            Tags::class,
            SelectSearch::class,
            Tabs::class,
            Breadcrumb::class,
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
