<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use App\Models\Tenant\Admin;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['tenant', 'auth:admin']);
    }

    public function store(Request $request, $subdomain)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        try{
            $admin = Admin::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        }catch (\Exception $e){
            abort(Response::HTTP_EXPECTATION_FAILED, $e->getMessage());
        }

        return redirect()
            ->route('tenant.user.edit', [
                'subdomain' => request()->subdomain,
                'admin' => auth()->id()
            ])->with('success', trans('cruds.user.fields.updated_success'));
    }
}
