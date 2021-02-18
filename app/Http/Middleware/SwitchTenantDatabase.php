<?php

namespace App\Http\Middleware;

use App\Models\Project;
use App\Models\Tenant\Admin;
use App\Tenant\ManageTenant;
use Closure;
use Illuminate\Support\Facades\DB;

class SwitchTenantDatabase
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


        $manager = app(ManageTenant::class);
        $project = Project::where('subdomain', $request->subdomain)->first();
        if(!$project) {
            abort(404, __('auth.subdomain.404'));
        }elseif(!$manager->isMasterDomain()){
            $manager->setConnection($project);
        }

        $admin = \App\Models\Tenant\Admin::where(auth()->id())->with('owner')->first();//dd($admin);
        if(!$admin->owner->subscribed('default') && $admin->owner->roles[0]->title !== 'Free Plan'){
            abort(401, 'Your account is expired!');
        }

        return $next($request);
    }
}
