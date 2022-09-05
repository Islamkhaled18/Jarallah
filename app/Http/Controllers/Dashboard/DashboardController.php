<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
      $ads = Ads::take(6)->orderBy('id', 'desc')->get();
      $users = User::take(6)->orderBy('id', 'desc')->get();
        return view('admin_panel.dashboard',compact('ads', 'users'));
    }
}
