<?php namespace CodeCommerce\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;

class Admin
{

    private $auth;

    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        if(! $this->auth->check() or ! $this->auth->user()->is_admin )
        {
            return abort(404);
        }
		return $next($request);
	}



}
