<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Models\Tenant\Admin;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

/**
 * Class AuthGates
 * @package App\Http\Middleware
 */
class AuthGates
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guest()) {
            return $next($request);
        }

      /*  if(isset($request->subdomain)){
            DB::setDefaultConnection('tenant');
            $admin = Admin::where('id',auth()->id())->with('owner')->first();//dd($admin);
            $user = $admin->owner;
      
        }else{*/
            $user = auth()->user();
//        }

        // Check if subscription time is expired after cancellation
        DB::setDefaultConnection('mysql');
            if (!$user->is_admin && $user->is_premium && !$user->subscribed('default')) {
                $user->roles()->sync([2]);
                $user->fresh();
            }

            $roles            = Role::with('permissions')->get();
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    if (!$permission->pivot->max_amount) {
                        $permissionsArray[$permission->title][] = $role->id;
                    } else {
                        $method = Str::plural(str_replace('_create', '', $permission->title));
                        if (!method_exists($user, $method) || $user->{$method}
                                ->count() < $permission->pivot->max_amount) {
                            $permissionsArray[$permission->title][] = $role->id;
                        }

                    }

                }

            }

            foreach ($permissionsArray as $title => $roles) {
                Gate::define($title, function (\App\Models\User $user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }

        /*if(isset($request->subdomain)){
            DB::setDefaultConnection('tenant');
        }*/

        return $next($request);
    }

}
