<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('web.pages.index');
    }

    public function pricing()
    {
        /*if (auth()->check()) {
            return redirect()->route('admin.home');
        }*/

        $plans = Role::whereNotNull('stripe_plan_id')->get();

        if ($plans) {
            $planClass = 12 / ($plans->count());
        }

        return view('web.pages.pricing', compact('plans', 'planClass'));
    }
}
