<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Tenant\Admin;
use App\Notifications\NewAdminEmailNotification;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class AdminController
 * @package App\Http\Controllers\Tenant
 */
class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:admin', 'tenant']);
    }

    public function index()
    {
        return view('tenant.dashboard.pages.index');
    }

    public function usersList()
    {
        $admins = Admin::paginate(10);
        return view('tenant.dashboard.pages.users.index', compact(['admins']));
    }

    public function deleted()
    {
        abort_if(auth()->user()->isadmin() === false, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admins = Admin::onlyTrashed()->paginate(10);
        return view('tenant.dashboard.pages.users.deleted', compact(['admins']));
    }

    public function create()
    {
        $countries = Country::all();
        return view('tenant.dashboard.pages.users.create', compact(['countries']));
    }

    public function store(Request $request)
    {
        switch_connection_to('tenant');

        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:admins',
            'avatar' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $is_admin = (isset($request->is_admin) && $request->is_admin === 'on' ? 1 : 0);
        $password = Str::random(10);

        try{
            $admin = Admin::create([
                'name' => $request->name ,
                'email' => $request->email ,
                'created_by' => auth()->user()->owner->id,
                'password' => Hash::make($password) ,
                'vat_number' => $request->vat_number ,
                'address_1' => $request->address_1 ,
                'address_2' => $request->address_2 ,
                'city' => $request->city ,
                'country_id' => $request->country_id ?? null,
                'postcode' => $request->postcode ,
                'phone_number' => $request->phone_number ,
                'is_admin' => $is_admin,
                'birth_date' => $request->birth_date ?? null,
            ]);
        }catch (\Exception $e){
            abort(Response::HTTP_NOT_IMPLEMENTED, $e->getMessage());
        }

        $admin->notify(new NewAdminEmailNotification($request->subdomain, $request->email, $password));

        return redirect()
            ->route('tenant.users.list', [
                'subdomain' => request()->subdomain]
            );
    }

    public function edit($subdomain, Admin $admin)
    {
        abort_if(auth()->id() !== $admin->id && auth()->user()->isadmin() === false, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::all();
        return view('tenant.dashboard.pages.users.edit', compact(['admin', 'countries']));
    }

    public function toggleAdmin(Request $request, $subdomain, $id)
    {
        return (Admin::where('id', $id)->update(['is_admin' => $request->is_admin])) ?
            response()->json(['success' => true]) :
            response()->json(['success' => false]);
    }

    public function uploadAvatar(Request $request, $subdomain)
    {
        $avatar = upload_base64(auth()->user(), $request->base64, 'admin');

        try{
            Admin::where('id', $request->id)->update(['avatar' => $avatar]);
        }catch (\Exception $e){
            abort(Response::HTTP_NOT_IMPLEMENTED, $e->getMessage());
        }

        return response()->json([
            "success" => true,
            "id" => $request->id,
            "avatar" => asset('storage/'.$avatar)
        ]);

    }

    public function update(Request $request, $subdomain ,Admin $admin)
    {
        switch_connection_to('tenant');

        request()->validate([
            'name' => 'required',
            'email' => 'required|unique:admins,email,'.$admin->id,
            'avatar' => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        $is_admin = (isset($request->is_admin) && $request->is_admin === 'on' ? 1 : 0);

        try{
            $admin->update([
                'name' => $request->name ,
                'email' => $request->email ,
                'vat_number' => $request->vat_number ,
                'address_1' => $request->address_1 ,
                'address_2' => $request->address_2 ,
                'city' => $request->city ,
                'country_id' => $request->country_id ,
                'postcode' => $request->postcode ,
                'phone_number' => $request->phone_number ,
                'is_admin' => $is_admin,
                'birth_date' => $request->birth_date,
                'updated_at' => Carbon::now() ,
            ]);
        }catch (\Exception $e){
            abort(Response::HTTP_NOT_IMPLEMENTED, $e->getMessage());
        }

        return redirect()
            ->route('tenant.user.edit', [
                'subdomain' => request()->subdomain,
                'admin' => $admin->id
            ])->with('success', trans('cruds.user.fields.updated_success'));
    }

    public function delete($subdomain, $admin)
    {
        $count = Admin::all()->count();
        abort_if(auth()->user()->isadmin() === false || $count === 1, Response::HTTP_FORBIDDEN, '403 Forbidden');

        try{
            $admin = Admin::where('id', $admin)->delete();
        }catch (\Exception $e){
            abort(Response::HTTP_NOT_IMPLEMENTED, $e->getMessage());
        }

        return response()->json(["success" => true, 'admin' => $admin]);
    }

    public function delete_restore($subdomain, $admin)
    {
        abort_if(auth()->user()->isadmin() === false, Response::HTTP_FORBIDDEN, '403 Forbidden');

        Admin::where('id', $admin)->restore();
        $admins = Admin::all();
        return redirect()->route('tenant.users.list', ['admins'=>$admins, 'subdomain'=>request()->subdomain]);
    }

    public function individual_force_delete($subdomain, $admin)
    {
        abort_if(auth()->user()->isadmin() === false, Response::HTTP_FORBIDDEN, '403 Forbidden');

        Admin::where('id', $admin)->forceDelete();
        $admins = Admin::onlyTrashed();
        return view('tenant.dashboard.pages.users.deleted', compact(['admins']));
    }

    public function force_delete()
    {
        abort_if(auth()->user()->isadmin() === false, Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admins = Admin::onlyTrashed()->forceDelete();
        return view('tenant.dashboard.pages.users.deleted', compact(['admins']));
    }

}
