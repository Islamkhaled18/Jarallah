<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Auth;
use Session;
use Redirect;
class AdminsController extends Controller {
    public function index() {
        $admins = Admin::orderBy('id', 'desc')->paginate(10);
        $title  = ('حسابات الاعضاء');
        return view('admin_panel.admins.index',compact('admins','title'));
    }

    public function create() {
      $title  = ('أضافة مستخدم جديد');
      return view('admin_panel.admins.create',compact('title'));
    }

    public function store(Request $request) {
         $data = Admin::create($request->except('image'));
         if($request->hasFile('image')){
           $image= $request->file('image');
           $name = 'image-' .$data->id. '.' . $image->getClientOriginalExtension();
           $image->move(public_path('/adminPanel/admin/uploads/Admins/'), $name);
           $data->image  = '/adminPanel/admin/uploads/Admins/'.$name ;
         }
         $data['password'] = bcrypt(request('password'));
         $data->save();
        return redirect('admin_panel/admins')->with(['save' => 'تم أضافة مستخدم جديد']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user  = Admin::find($id);
        $title = ('عرض بيانات العضو');
        return view('admin_panel.admins.profile',compact('user','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user  = Admin::find($id);

        $title = ('تحديث بيانات المستخدم ');
        return view('admin_panel.admins.edit',compact('user','title'));
    }

    public function update($id, AdminRequest $request) {
      $data = Admin::find($id);
      $data->username  = isset($request->username) ? $request->username : $data->username;
      $data->email     = isset($request->email) ? $request->email : $data->email;
      $data->phone     = isset($request->phone) ? $request->phone : $data->phone;
      $data->image     = isset($request->image) ? $request->image : $data->image;
      $data->password  = isset($request->password) ? bcrypt(request('password')) : $data->password;
   if($request->hasFile('image')){
    $path = public_path();
    $destinationPath = '';
    $filename        = '';
    $destinationPath = $path.'/admin/uploads/Admins/'; // upload path
    $image= $request->file('image');
    $extension = $image->getClientOriginalExtension(); // getting image extension
    $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
    $image->move($destinationPath, $name); // uploading file to given path
    $data->image  = '/admin/uploads/Admins/'.$name ;
    }
    $data->update();
    Session::flash('save',' تم تحديث بيانات المستخدم بنجاح');
    return Redirect('admin/admins');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

      if($id == 1){
      Session::flash('error','لا يمكنك حذف المسئول الرئيسى');
      return Redirect('admin_panel/admins');
    }
      try {
        $data = Admin::find($id);
        unLink(public_path().'/'.$data->image);
        if(!$data)
        return redirect('admin_panel/admins')->with(['error' => 'هذا العميل غير موجود']);
          $data->delete();
        return redirect('admin_panel/admins')->with(['save' => 'تم حذف العميل بنجاح']);
      } catch (\Exception $e) {
        return redirect('admin_panel/admins')->with(['error' => 'حدث خطا ما برجاء المحاولة لاحقا']);
      }

    }
}
