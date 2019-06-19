<?php
namespace App\Http\Middleware;
use Closure;

class ComprobarRole
{
	public function handle($request, Closure $next, $rol)
	{	
		$member_role = $request->session()->get('usuario');
		if ($member_role != $rol) {
			return redirect('/'.$member_role);// página del formulario
		}
		return $next($request);
	}
}