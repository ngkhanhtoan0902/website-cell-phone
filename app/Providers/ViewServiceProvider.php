<?php

namespace App\Providers;

use App\Http\View\Composers\HeaderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composer(
			'layouts.header',
			HeaderComposer::class
		);
	}
}
