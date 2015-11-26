<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Html;
use Request;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Html::macro('activeState', function ($route) {
			$routes = $route;
			if (!is_array($route)) {
				$routes = [$route];
			}
			$url = Request::url();
			foreach ($routes as $route) {
				if ($url == route($route)) {
					return 'active';
				}
			}
    		return '';
		});

		Html::macro('notifState', function ($rec) {
			$states = '';
			if ($rec->pivot->seen)
				$states .= 'success';
			return $states;
		});

		define('EXCERPT_LENGTH', 70);
		Html::macro('excerpt', function ($data) {
			if (strlen($data) > EXCERPT_LENGTH) {
				$data = substr($data, 0, EXCERPT_LENGTH) . ' ...';
			}
    		return $data;
		});

		View::composer('partials.stats', 'App\Http\ViewComposers\StatisticsComposer');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
