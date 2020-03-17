<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Mail\AdminResetPassword;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Mail;

class AdminAuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }




    public function getLoginPage()
    {
        return view('dashboard.auth.login');

    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $remember_me = request('remember') == 1 ? true : false;
        if (admin()->attempt(['email' => request('email'), 'password' => request('password')], $remember_me)) {
            return redirect()->route('dashboard.index');
        } else {
            throw ValidationException::withMessages([
                'email' => [trans('auth.failed')],
            ]);
        }
    }

    public function logout()
    {
        admin()->logout();
        return redirect()->route('dashboard.login');
    }

    public function forgotPassword()
    {
        return view('dashboard.auth.forgot');
    }

    public function submitForgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $admin = Admin::where('email', request('email'))->first();

        if (!empty($admin)) {
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));
            session()->flash('success', trans('site.the_link_reset_sent'));
            return redirect()->route('dashboard.login');
        }

        session()->flash('error', trans('site.change_password_failed'));
        throw ValidationException::withMessages([
            'email' => [trans('site.email_incorrect')],
        ]);
    }

    public function resetPassword($token)
    {
        $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))
            ->first();

        if (! empty($check_token)) {
            return view('dashboard.auth.reset_password', ['data' => $check_token]);
        } else {
            session()->flash('error', trans('site.token_is_expired'));
            return redirect()->route('dashboard.forgot');
        }
    }

    public function submitResetPassword($token, Request $request)
    {

        $request->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $check_token = DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>', Carbon::now()->subHours(2))
            ->first();

        if (! empty($check_token)) {
            Admin::where('email', $check_token->email)->update([
                'email' => $check_token->email,
                'password' => bcrypt($request->password)
            ]);
            DB::table('password_resets')->where('email', $check_token->email)->delete();

            admin()->attempt(['email' => $check_token->email, 'password' => request('password')], true);

            session()->flash('success', trans('site.password_changed_successfully'));

            return redirect()->route('dashboard.index');
        } else {

            session()->flash('error', trans('site.token_is_expired'));
            return redirect()->route('dashboard.forgot');
        }
    }


}
