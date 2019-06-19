<?php
namespace App\Http\Middleware;
use Closure;

class ComprobarRole
{
	public function handle($request, Closure $next)
	{	
		$role = $request->session()->get('usuario');
		if ($role != 'admin') {
			return redirect('/');// página del formulario
		}
		return $next($request);
	}
}