<?php namespace CodeCommerce\Http\Middleware;

use Closure;
use CodeCommerce\Product;
use Illuminate\Support\Facades\Session;

class Cart {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next )
	{
        if(!Session::has('cart'))
        {
            Session::put('cart' , new \CodeCommerce\Cart\Cart(new Product()));
        }
		return $next($request);
	}

}
