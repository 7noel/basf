<?php namespace App\Http\Middleware;

use App\Modules\Finances\CompanyRepo;
use Closure;

class Permissions {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		
        if (null == session('my_company')) {
            $c = new CompanyRepo;
            session(['my_company' => $c->find(1)]);
        }
		if (\Auth::user()->is_superuser) {
			return $next($request);
		} else {
		$actPar = $request->route()->getAction();
		$action = $actPar['as'];
		if (substr($action, -6) == '.store') { $action = str_replace('.store',	'.create', $action); }
		if (substr($action, -7) == '.update') { $action = str_replace('.update','.edit', $action); }
		$roles = \Auth::user()->roles()->get();
		foreach ($roles as $key => $role) {
			$permission = $role->permissions()->where('action', $action)->first();
			if(isset($permission)){
				return $next($request);
			}
		}
		//return redirect()->to('home');
		return response(view('errors.access_denied'));
		}
	}

}
