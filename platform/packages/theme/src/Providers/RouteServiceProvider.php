<?php

namespace Platform\Theme\Providers;

use File;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Theme;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Move base routes to a service provider to make sure all filters & actions can hook to base routes
     */
    public function boot()
    {
        $this->app->booted(function () {

            $themeRoute = theme_path(Theme::getThemeName() . '/routes/web.php');
            $themeApiRoute = theme_path(Theme::getThemeName() . '/routes/api.php');

            if (File::exists($themeRoute)) {
                $this->loadRoutesFrom($themeRoute);
            }

            if (File::exists($themeApiRoute)) {
                $this->loadRoutesFrom($themeApiRoute);
            }

            $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        });
    }
}
