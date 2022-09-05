<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Countries;
use App\Models\Year;
use Session;
use Redirect;
use Response;

class YearsController extends Controller {

    public function index(Request $request) {
      $years = Year::where(function ($q) use ($request) {
          return $q->when($request->search, function ($query) use ($request) {
            return $query->where('name_ar', 'like', '%' . $request->search . '%');
          });
      })->latest()->paginate(20);
        $title = ('التحكم فى سنين الصنع');
        return view('admin_panel.years.index',compact('years','title'));
    }

    public function create() {
      $title = ('أضافة سنه جديدة');
      return view('admin_panel.years.create',compact('title'));
    }

    public function store(Request $request) {
    $data = $this->validate($request, [
        'name'              => 'required|max:255|unique:years,name',
        ],[
        'name.required'     => 'مطلوب أدخال سنه الصنع',
    ]);
    $data = Year::create([
      'name'=>$request->name,
    ]);
    $data->save();
    Session::flash('save','تم أضافة سنه جديدة بنجاح');
    return Redirect('admin_panel/years');
}


    public function destroy($id) {
        $data = Year::find($id);
        $data->delete();
        Session::flash('save','تم حذف السنه بنجاح');
        return Redirect('admin_panel/years');
    }
}
