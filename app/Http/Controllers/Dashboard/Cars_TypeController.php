<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Car_TypeRequest;
use App\Models\Car_Type;
use Session;
use Redirect;
use Response;

class Cars_TypeController extends Controller {

    public function index(Request $request) {
      $cars = Car_Type::where(function ($q) use ($request) {
          return $q->when($request->search, function ($query) use ($request) {
            return $query->where('name_ar', 'like', '%' . $request->search . '%');
          });
      })->latest()->paginate(20);
        $title = ('التحكم فى أنواع السيارات');
        return view('admin_panel.cars_type.index',compact('cars','title'));
    }

    public function create() {
      $title = ('أضافة سيارة جديدة');
      return view('admin_panel.cars_type.create',compact('title'));
    }

    public function store(Car_TypeRequest $request) {
      $data = Car_Type::create($request->except('image'));
      if($request->hasFile('image')){
          $image= $request->file('image');
          $name = 'image-' .$data->id. '.' . $image->getClientOriginalExtension();
          $image->move(public_path('/adminPanel/admin/uploads/cars_type/'), $name);
          $data->image  = '/adminPanel/admin/uploads/cars_type/'.$name ;
      }
    $data->save();
    Session::flash('save','تم أضافة سيارة جديدة بنجاح');
    return Redirect('admin_panel/cars_type');
 }

    public function edit($id) {
        $car    = Car_Type::find($id);
        $title  = ('تعديل بيانات السيارة جديدة');
        return view('admin_panel.cars_type.edit',compact('car','title'));
    }

    public function update(Request $request, $id) {
      $data = Car_Type::find($id);
      $data->update(array_except($request->all(),'image'));
      if($request->hasFile('image')){
       $image= $request->file('image');
       $name = 'image-' .$data->id. '.' . $image->getClientOriginalExtension();
       $image->move(public_path('/adminPanel/admin/uploads/cars_type/'), $name);
       $data->image  = '/adminPanel/admin/uploads/cars_type/'.$name ;
       }
      $data->update();
        Session::flash('save','تم تعديل بيانات نوع السيارة بنجاح');
        return Redirect('admin_panel/cars_type');
    }

    public function destroy($id) {
      try {
        $data = Car_Type::find($id);
        unLink(public_path().'/'.$data->image);
        if(!$data)
        return redirect('admin_panel/cars_type')->with(['error' => 'هذا الاعلان غير موجود']);
          $data->delete();
        return redirect('admin_panel/cars_type')->with(['save' => 'تم حذف نوع السيارة بنجاح']);
      } catch (\Exception $e) {
        return redirect('admin_panel/cars_type')->with(['error' => 'حدث خطا ما برجاء المحاولة لاحقا']);
      }

    }
}
