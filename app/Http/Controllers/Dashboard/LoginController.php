<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;


class LoginController extends Controller {

  public function Login() {
    $title = ('لوحة التحكم الاعضاء');
    return view('auth.dashboard.login',compact('title'));
  }

  public function postLogin(AdminLoginRequest $request) {

    $remember_me = $request->has('remember_me') ? true : false;

    if (auth()->guard('admin')->attempt(['user_name' => $request->input("user_name"), 'password' => $request->input("password")], $remember_me)) {
        return redirect('admin_panel');
    }
    return redirect()->back()->with(['error' => 'بيانات المستخدم غير صحيحة']);

  }

  public function logout() {
    $gaurd = $this->getGaurd();
    $gaurd->logout();
    return redirect()->route('adminPanel.login');
  }

  public function getGaurd() {
    return auth('adminPanel');
  }
}
