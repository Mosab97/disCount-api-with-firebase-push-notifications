<?php

namespace App\Http\Controllers\Api;
use App\Admin;
use App\Http\Controllers\Controller;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NotificationController extends Controller
{


    public function add($fcm_token )
    {
        $notification = new Notification();
        $notification->fcm_token = $fcm_token;
        $notification->save();

        return response()->json(['status' => TRUE ,'messag' => 'Added successfully' ]);

    }


    public function addAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('admins', 'email')],
            'password' => 'required',
            'image_path' => 'sometimes|nullable|',
        ], [], [
            'name' => trans('الاسم'),
            'email' => trans('رقم الهاتف'),
            'password' => trans('كلمة المرور'),

        ]);
        $path = $request->image_path->store('admins_images');
        $admin = new Admin();
        $admin->image_path = $path;
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));

        $admin->save();
        return $admin;
    }
}
