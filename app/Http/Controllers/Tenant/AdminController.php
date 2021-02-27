<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Tenant\Admin;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class AdminController
 * @package App\Http\Controllers\Tenant
 */
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['tenant', 'auth:admin']);
    }

    /**
     * show dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        return view('tenant.dashboard.pages.index');
    }

    public function usersList()
    {

        $admins = Admin::paginate(10);
        return view('tenant.dashboard.pages.users.userslist', compact(['admins']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  String $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($subdomain, Admin $admin)
    {

        abort_if((auth()->id() !== $admin->id || !$admin->isadmin()), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all();
        return view('tenant.dashboard.pages.users.userEdit', compact(['admin', 'countries']));
    }

    public function update()
    {

        request()->validate([
            'image' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $filename = Str::uuid().'.'.$extension;
        $set->addMediaFromRequest('image')->usingFileName($filename)->toMediaCollection('sets');

        return response()->json([
            "success" => true
        ]);
    }
}
