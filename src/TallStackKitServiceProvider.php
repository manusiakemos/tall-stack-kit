<?php

namespace Manusiakemos\TallStackKit;

use Illuminate\Support\ServiceProvider;

class TallStackKitServiceProvider extends ServiceProvider
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
                __DIR__.'/../config/tall-stack-kit.php' => config_path('tall-stack-kit.php'),
              ], 'kit-config');
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
}
