<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\Advertisement;
use App\Mail\AdminResetPassword;
use App\SubCategory;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Mail;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $admins = Admin::when($request->search, function ($q) use ($request) {
            return $q->where('name', 'like', '%' . $request->search . '%');
        })->latest()->paginate(5);
        return view('dashboard.admins.index', compact('admins'));
    }

    public function profile()
    {
        return view('dashboard.admins.profile');
    }

    public function create()
    {
        return view('dashboard.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('admins','email')],
            'password' => 'required',
            'image_path' => 'sometimes|nullable|' ,
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
        session()->flash('success', __('تمت الإضافة بنجاح'));
        return redirect()->route('dashboard.admins.index');




    }

    public function edit(Admin $admin)
    {

        return view('dashboard.admins.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $path = $request->image_path->store('admins_images');
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');
        $admin->password = bcrypt($request->input('password'));
        $admin->image_path = $path;
        $admin->save();
        session()->flash('success', __('تم تعديل البيانات بنجاح'));
        return redirect()->route('dashboard.admins.index');
    }

    public function destroy(Admin $admin)
    {

        $admin->delete();
        session()->flash('success', __('تم الحذف بنجاح'));
        return redirect()->route('dashboard.admins.index');
    }

}
