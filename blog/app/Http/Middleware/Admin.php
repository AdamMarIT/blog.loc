<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userId = Auth::id();
        $role = DB::table('role_users')
            ->join('roles', 'roles.id', '=', 'role_users.role_id')
            ->where ('user_id', '=', $userId)
            ->get();
        //$roleUser = $role->role;
        $roleUser =  $role->all();
        $r = $roleUser[0]->role;
        //echo "<pre>";
        //print_r($r);
        //echo "</pre>";

        if ($r != 'admin') {
            return redirect('/');
        }

        return $next($request);
    }
}
