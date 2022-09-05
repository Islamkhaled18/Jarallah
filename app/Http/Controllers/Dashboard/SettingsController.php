<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SettingsRequest;
use App\Models\Setting;
use Session;


class SettingsController extends Controller {

    public function index() {
        $setting = Setting::first();
        $title   = ('إعدادات الموقع');
      return view('admin_panel.settings.settings',compact('setting','title'));
    }

    public function update(Request $request, $id) {

        $setting = Setting::find($id);

        if (!$setting)
            return redirect('admin_panel.settings')->with(['error' => 'هذا القسم غير موجود']);

          $setting = Setting::find($id);
            $setting->update(array_except($request->all(),'image'));
            if($request->hasFile('image')){
             $image= $request->file('image');
             $name = 'image-' .$setting->id. '.' . $image->getClientOriginalExtension();
             $image->move(public_path('/admin/uploads/Setting/'), $name);
             $setting->image  = '/admin/uploads/Setting/'.$name ;
             }


          $setting->save();
        return Redirect('admin_panel/settings')->with(['save' => 'تم تحديث بيانات الموقع بنجاح']);

    }
}
