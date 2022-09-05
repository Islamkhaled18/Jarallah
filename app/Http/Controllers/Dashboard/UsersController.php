<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\City;
use Auth;
use Session;
use Redirect;
class UsersController extends Controller {
    public function index() {
        $users = User::orderBy('id', 'desc')->paginate(10);
        $title  = ('حسابات الاعضاء');
        return view('admin_panel.users.index',compact('users','title'));
    }

    public function create() {
      $citys = City::all();
      $title  = ('أضافة مستخدم جديد');
      return view('admin_panel.users.create',compact('title','citys'));
    }

    public function store(UserRequest $request) {
         $data = User::create($request->except('image'));
         if($request->hasFile('image')){
           $image= $request->file('image');
           $name = 'image-' .$data->id. '.' . $image->getClientOriginalExtension();
           $image->move(public_path('/adminPanel/admin/uploads/Users/'), $name);
           $data->image  = '/adminPanel/admin/uploads/Users/'.$name ;
         }
         $data['password'] = bcrypt(request('password'));
         $data->save();
        return redirect('admin_panel/users')->with(['save' => 'تم أضافة مستخدم جديد']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user  = User::find($id);
        $title = ('عرض بيانات العضو');
        return view('admin_panel.users.profile',compact('user','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user  = User::find($id);
        $citys = City::all();
        $title = ('تحديث بيانات المستخدم ');
        return view('admin_panel.users.edit',compact('user','title', 'citys'));
    }

    public function update($id, UserRequest $request) {
      $data = User::find($id);
      $data->username  = isset($request->username) ? $request->username : $data->username;
      $data->email     = isset($request->email) ? $request->email : $data->email;
      $data->phone     = isset($request->phone) ? $request->phone : $data->phone;
      $data->image     = isset($request->image) ? $request->image : $data->image;
      $data->password  = isset($request->password) ? bcrypt(request('password')) : $data->password;
   if($request->hasFile('image')){
    $path = public_path();
    $destinationPath = '';
    $filename        = '';
    $destinationPath = $path.'/admin/uploads/Users/'; // upload path
    $image= $request->file('image');
    $extension = $image->getClientOriginalExtension(); // getting image extension
    $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
    $image->move($destinationPath, $name); // uploading file to given path
    $data->image  = '/admin/uploads/Users/'.$name ;
    }
    $data->update();
    Session::flash('save',' تم تحديث بيانات المستخدم بنجاح');
    return Redirect('admin/users');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
      try {
        $data = User::find($id);
        unLink(public_path().'/'.$data->image);
        if(!$data)
        return redirect('admin_panel/users')->with(['error' => 'هذا العميل غير موجود']);
          $data->delete();
        return redirect('admin_panel/users')->with(['save' => 'تم حذف العميل بنجاح']);
      } catch (\Exception $e) {
        return redirect('admin_panel/users')->with(['error' => 'حدث خطا ما برجاء المحاولة لاحقا']);
      }

    }
}
