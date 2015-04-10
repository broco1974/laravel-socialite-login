<?php namespace Broco\SocialiteLogin;

use Illuminate\Support\ServiceProvider;

class SocialiteLoginServiceProvider extends ServiceProvider {

    protected $packagename = 'socialite-login';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {

        $this->handleConfigs();
        $this->handleMigrations();
        // $this->handleViews();
        // $this->handleTranslations();
        // $this->handleRoutes();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {

        // Bind any implementations.

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {

        return [];
    }

    private function handleConfigs() {

        $configPath = __DIR__ . '/../config/' . $this->packagename . '.php';

        $this->publishes([$configPath => config_path($this->packagename . '.php')]);

        $this->mergeConfigFrom($configPath, $this->packagename);
    }

    private function handleTranslations() {

        $this->loadTranslationsFrom($this->packagename, __DIR__.'/../lang');
    }

    private function handleViews() {

        $this->loadViewsFrom($this->packagename, __DIR__.'/../views');

        $this->publishes([__DIR__.'/../views' => base_path('resources/views/vendor/' . $this->packagename)]);
    }

    private function handleMigrations() {

        $this->publishes([__DIR__ . '/../migrations' => base_path('database/migrations')]);
    }

    private function handleRoutes() {

        include __DIR__.'/../routes.php';
    }
}
