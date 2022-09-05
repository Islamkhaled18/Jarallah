<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Session;
use Redirect;
use Response;

class CitysController extends Controller {

    public function index(Request $request) {
      $citys = City::where(function ($q) use ($request) {
          return $q->when($request->search, function ($query) use ($request) {
            return $query->where('name_ar', 'like', '%' . $request->search . '%');
          });
      })->orderBy('id','asc')->paginate(PAGINATION_COUNT);
        $title = ('التحكم فى المدن');
        return view('admin_panel.citys.index',compact('citys','title'));
    }

    public function create() {
      $title = ('أضافة مدينة جديدة');
      return view('admin_panel.citys.create',compact('title'));
    }

    public function store(CityRequest $request) {
      try {
        $data = City::create([
          'name_ar'=>$request->name_ar,
        ]);
    $data->save();
    return redirect('admin_panel/citys')->with(['save' => 'تم أضافة قسم جديد']);
  } catch (\Exception $e) {
    return redirect('admin_panel/citys')->with(['error' => 'حدث خطا حاول مرة اخرى']);
  }
}


    public function edit($id) {
        $city       = City::find($id);
        $title      = ('تعديل بيانات المدينة');
        return view('admin_panel.citys.edit',compact('city','title'));
    }

    public function update(CityRequest $request, $id) {
        $city = City::find($id);
        $city->update([
          'name_ar'=>$request->name_ar,
        ]);
        Session::flash('save','تم تعديل بيانات المدينة بنجاح');
        return Redirect('admin_panel/citys');
    }

    public function destroy($id) {
        $data = City::find($id);
        $data->delete();
        Session::flash('save','تم حذف المدينة بنجاح');
        return Redirect('admin_panel/citys');
    }
}
