<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\AdsRequest;
use App\Models\Ads;
use App\Models\Car_Type;
use App\Models\Year;
use App\Models\Image;
use Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Redirect;
use Response;

class AdsController extends Controller {

    public function index(Request $request) {
      $ads = Ads::where(function ($q) use ($request) {
        return $q->when($request->search, function ($query) use ($request) {
        return $query->where('name_ar', 'like', '%' . $request->search . '%');
        });
      })->latest()->paginate(20);
        $title = ('التحكم فى قطع السيارات');
        return view('admin_panel.ads.index',compact('ads','title'));
    }
    public function create() {
      $car_types   = Car_Type::all();
      $title       = ('أضافة قطعة جديد');
      return view('admin_panel.ads.create',compact('title',  'car_types'));
    }

    public function store(AdsRequest $request) {
      try {
        $data = Ads::create($request->except('image'));
        $num = 0;
         foreach ($request->file('image') as $img) {
           $path = public_path();
               $destinationPath = $path.'/adminPanel/admin/uploads/ads/'; // upload path
               $extension = 'jpg'; // getting img extension
               $name = time().''.rand(11111,99999).'.'.$extension; // renameing img
               $img->move($destinationPath, $name); // uploading file to given path
               $final_name = $destinationPath.$name;
               $image = [
                 'image'  => $name,
                 'ads_id' => $data->id
               ];
               Image::create($image);
               $num++;
             }
           $data->save();
           return redirect('admin_panel/ads')->with(['save' => 'تم أضافة قطعة جديد']);
         } catch (\Exception $e) {
           return redirect('admin_panel/ads')->with(['error' => 'حدث خطا حاول مرة اخرى']);
         }
    }


    public function activate(Request $request, $id) {
      $ads = Ads::findOrFail($id);
      $ads->update(['offers' => 1]);
      Session::flash('save','تم أضافة الاعلان للعروض');
     return Redirect('admin_panel/ads');
    }


    public function deactivate(Request $request, $id) {
     $ads = Ads::findOrFail($id);
     $ads->update(['offers' => 0]);
     Session::flash('save','تم ازلة الاعلان من العروض');
     return Redirect('admin_panel/ads');
    }

    public function edit($id) {
      $car_types   = Car_Type::all();
      $ads         = Ads::find($id);
      $title       = ('تعديل بيانات القطعة');
      return view('admin_panel.ads.edit',compact('ads','title', 'car_types'));
    }

    public function update(Request $request, $id) {
      $ads = Ads::find($id);
       $ads->fill($request->all())->save();
        $num=0;
             if($request->hasFile('image')) {
        foreach ($request->file('image') as $img) {
           $path = public_path();
               $destinationPath = $path.'/adminPanel/admin/uploads/ads/'; // upload path
               $extension = 'jpg'; // getting img extension
               $name = time().''.rand(11111,99999).'.'.$extension; // renameing img
               $img->move($destinationPath, $name); // uploading file to given path
               $final_name = $destinationPath.$name;
               $image = [
                 'image'  => $name,
                 'ads_id' => $ads->id
               ];
               Image::create($image);
               $num++;
             }

        }
      $ads->save();

    return Redirect('admin_panel/ads')->with(['save' => 'تم تحديث بيانات القطعة  بنجاح']);

  }

    public function destroy($id) {
      try {
        $data = Ads::find($id);
      
        if(!$data)
        return redirect('admin_panel/ads')->with(['error' => 'هذا القطعة غير موجود']);
          $data->delete();
        return redirect('admin_panel/ads')->with(['save' => 'تم حذف القطعة بنجاح']);
      } catch (\Exception $e) {
        return redirect('admin_panel/ads')->with(['error' => 'حدث خطا ما برجاء المحاولة لاحقا']);
      }

    }
    
    public function del_img($id){
        // try {
        $data = Image::find($id);
        unlink("public/adminPanel/admin/uploads/ads/".$data->image);
        if(!$data)
        return redirect('admin_panel/ads')->with(['error' => 'هذا القطعة غير موجود']);
          $data->delete();
        return redirect()->back()->with(['save' => 'تم حذف الصوره بنجاح']);
    //   } catch (\Exception $e) {
    //     return redirect('admin_panel/ads')->with(['error' => 'حدث خطا ما برجاء المحاولة لاحقا']);
    //   } 
    }
}
