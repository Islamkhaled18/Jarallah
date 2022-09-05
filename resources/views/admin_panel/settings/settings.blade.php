@extends('admin_panel/layouts/main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>إعدادات الموقع</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
      </ol>
    </section>
    <!-- Main content -->
   <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
          @include('admin_panel.layouts.includes.alerts.massage')
          <div class="box-header">
          </div>
          <!-- /.box-header -->
           <div class="box-body">
            <!-- form start -->
          {!!Form::open(array(
            'url'=>'admin_panel/settings/1',
            'class'=>'form-horizontal',
            'role'=>'form',
            'method' => 'put',
            'files'=>true
            ))!!}

           <div class="form-group @if($errors->has('name_ar')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم الموقع باللغه العربية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name_ar" value="{{@$setting->name_ar}}" placeholder="أسم الموقع باللغه العربية">
                <strong class="help-block">{{ $errors->first('name_ar') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('name_en')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم الموقع باللغه الانجليزية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name_en" value="{{@$setting->name_en}}" placeholder="أسم الموقع باللغه الانجليزية">
                <strong class="help-block">{{ $errors->first('name_en') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('address_ar')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">العنوان باللغة العربية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="address_ar" value="{{@$setting->address_ar}}" placeholder="العنوان باللغه العربية">
                <strong class="help-block">{{ $errors->first('address_ar') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('address_en')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">العنوان باللغة الانجليزية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="address_en" value="{{@$setting->address_en}}" placeholder="العنوان باللغة الانجليزية">
                <strong class="help-block">{{ $errors->first('address_en') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('email')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">البريد الالكترونى</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="email" value="{{@$setting->email}}" placeholder="البريد الالكترونى">
                <strong class="help-block">{{ $errors->first('email') }}</strong>
              </div>
           </div>


           <div class="form-group @if($errors->has('phone')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">رقم الجوال الاول </label>
              <div class="col-md-10">
                <input type="number" class="form-control" name="phone" value="{{@$setting->phone}}" placeholder="رقم الجوال الاول ">
                <strong class="help-block">{{ $errors->first('phone') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('mobile')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">رقم الجوال الثانى</label>
              <div class="col-md-10">
                <input type="number" class="form-control" name="mobile" value="{{@$setting->mobile}}" placeholder="رقم الجوال الثانى">
                <strong class="help-block">{{ $errors->first('mobile') }}</strong>
              </div>
           </div>


          <div class="form-group @if($errors->has('link_facebook')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">رابط الفيس بوك</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="link_facebook" value="{{@$setting->link_facebook}}" placeholder="رابط الفيس بوك">
                <strong class="help-block">{{ $errors->first('link_facebook') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('link_instagram')) has-error @endif">
               <label for="inputEmail3" class="col-md-2 control-label">رابط الانستقرام</label>
               <div class="col-md-10">
                 <input type="text" class="form-control" name="link_instagram" value="{{@$setting->link_instagram}}" placeholder="رابط الانستقرام">
                 <strong class="help-block">{{ $errors->first('link_instagram') }}</strong>
               </div>
            </div>


            <div class="form-group @if($errors->has('title_ar')) has-error @endif">
                <label for="inputEmail3" class="col-md-2 control-label">عنوان الوصف الموجود فى الصفحة الرئيسية باللغة العربية</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="title_ar" value="{{@$setting->title_ar}}" placeholder="عنوان الوصف الموجود فى الصفحة الرئيسية باللغة العربية">
                  <strong class="help-block">{{ $errors->first('title_ar') }}</strong>
                </div>
             </div>

             <div class="form-group box-body pad">
               <label for="inputEmail3" class="col-md-2 control-label">وصف العنوان المتحرك فى الصفحة الرئيسية باللغة العربية</label>
                <div class="col-md-10">
                  <textarea id="editor" name="inf_titel_ar" rows="10" cols="80" style="margin: 0px; width: 775px; height: 291px;">{{@$setting->inf_titel_ar}}</textarea>
               </div>
             </div>

             <div class="form-group @if($errors->has('title_en')) has-error @endif">
                 <label for="inputEmail3" class="col-md-2 control-label">عنوان الوصف الموجود فى الصفحة الرئيسية باللغة الانجليزية</label>
                 <div class="col-md-10">
                   <input type="text" class="form-control" name="title_en" value="{{@$setting->title_en}}" placeholder="عنوان الوصف الموجود فى الصفحة الرئيسية باللغة الانجليزية">
                   <strong class="help-block">{{ $errors->first('title_en') }}</strong>
                 </div>
              </div>

              <div class="form-group box-body pad">
                <label for="inputEmail3" class="col-md-2 control-label">وصف العنوان المتحرك فى الصفحة الرئيسية باللغة الانجليزية</label>
                 <div class="col-md-10">
                   <textarea id="editor" name="inf_titel_en" rows="10" cols="80" style="margin: 0px; width: 775px; height: 291px;">{{@$setting->inf_titel_en}}</textarea>
                </div>
              </div>
              
              
                <div class="form-group @if($errors->has('image')) has-error @endif">
                  <label for="inputEmail3" class="col-md-2 control-label"> الصورة المتحركة</label>
                  <div class="col-md-10">
                    <input type="file" class="form-control" name="image">
                   <img height="100px" width="100px" src="{{asset('public/'.$setting->image)}}"/>
                  <strong class="help-block">{{ $errors->first('image') }}</strong>
                  </div>
               </div>

              <div class="form-group box-body pad">
                <label for="inputEmail3" class="col-md-2 control-label">الشروط و الاحكام باللغة العربية</label>
                 <div class="col-md-10">
                   <textarea id="editor" name="conditions_ar" rows="10" cols="80" style="margin: 0px; width: 775px; height: 291px;">{{@$setting->conditions_ar}}</textarea>
                </div>
              </div>

              <div class="form-group box-body pad">
                <label for="inputEmail3" class="col-md-2 control-label">الشروط و الاحكام باللغة الالانجليزية</label>
                 <div class="col-md-10">
                   <textarea id="editor" name="conditions_en" rows="10" cols="80" style="margin: 0px; width: 775px; height: 291px;">{{@$setting->conditions_en}}</textarea>
                </div>
              </div>


              <div class="form-group box-body pad">
                <label for="inputEmail3" class="col-md-2 control-label">سياسيات الخصوصية باللغة العربية</label>
                 <div class="col-md-10">
                   <textarea id="editor" name="privacy_policy_ar" rows="10" cols="80" style="margin: 0px; width: 775px; height: 291px;">{{@$setting->privacy_policy_ar}}</textarea>
                </div>
              </div>

              <div class="form-group box-body pad">
                <label for="inputEmail3" class="col-md-2 control-label">سياسيات الخصوصية باللغة الانجليزية</label>
                 <div class="col-md-10">
                   <textarea id="editor" name="privacy_policy_en" rows="10" cols="80" style="margin: 0px; width: 775px; height: 291px;">{{@$setting->privacy_policy_en}}</textarea>
                </div>
              </div>



          <input type="hidden" name="id" value="{{$setting->id}}"/>
    <div class="text2">
        <div class="col-md-12">
          <button type="submit" class=" btn bg-purple  fa fa-dashboard ">  تعديل إعدادات الموقع </button>
    </div>
    </div><!-- /.box-footer -->
      </div><!-- /.box-body -->
      </div>
      </div>
      <!-- /.box-header -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->
    </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    @stop

    @section('footer')


    @endsection
