<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\View\ThemeViewFinder;
use App\Http\ViewComposers\AddStatusMessage;
use AAp\Http\ViewComposers\AddAdminUser;
use App\Http\ViewComposers\InjectPages;
use App\Http\ViewComposers\InjectRecentPosts;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['view']->composer(['layouts.auth', 'layouts.backend'], AddStatusMessage::class);
        $this->app['view']->composer('layouts.backend', AddAdminUser::class);
        $this->app['view']->composer('layouts.frontend', InjectPages::class);
        $this->app['view']->composer('templates.partials.recentPost', InjectRecentPosts::class);
        $this->app['view']->setFinder($this->app['theme.finder']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->singleton('theme.finder', function ($app) {
            $finder = new ThemeViewFinder($app['files'], $app['config']['view.paths']);

            $config = $app['config']['cms.theme'];

            $finder->setBasePath($app['path.public'].'/'.$config['folder']);
            $finder->setActiveTheme($config['active']);

            return $finder;
        });
    }
}
