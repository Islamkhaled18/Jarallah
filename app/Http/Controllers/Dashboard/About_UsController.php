<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\About_UsRequest;
use App\Models\About_Us;
use Session;


class About_UsController extends Controller {

    public function index() {
        $about_us = About_Us::find(1);
        $title   = ('إعدادات من نحن');
      return view('admin_panel.about_us.about_us',compact('about_us','title'));
    }

    public function update(About_UsRequest $request, $id) {
      $data = About_Us::find($id);
      $data->update(array_except($request->all(),'logo_aboutus'));
      if($request->hasFile('logo_aboutus')){
       $logo_aboutus= $request->file('logo_aboutus');
       $name = 'logo_aboutus-' .$data->id. '.' . $logo_aboutus->getClientOriginalExtension();
       $logo_aboutus->move(public_path('/adminPanel/admin/uploads/About_Us/'), $name);
       $data->logo_aboutus  = '/adminPanel/admin/uploads/About_Us/'.$name ;
       }
       $data->save();
        return Redirect('admin_panel/about_us')->with(['save' => 'تم تحديث بيانات صفحة من نحن بنجاخ']);
    }
}
