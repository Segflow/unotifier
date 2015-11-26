<?php namespace App\Http\Middleware;

use Closure;

class IsAjax {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (!$request->ajax()) {
			return "This page can not be accessed using a browser.";
		}
		return $next($request);
	}

}
