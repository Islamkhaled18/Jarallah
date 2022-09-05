@extends('admin_panel/layouts/main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>إعدادات من نحن</h1>
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
              'url'=>'admin_panel/about_us/1',
              'class'=>'form-horizontal',
              'role'=>'form',
              'method' => 'put',
              'files'=>true
              ))!!}


           <div class="form-group box-body pad @if($errors->has('aboutus_ar')) has-error @endif">
             <label for="inputEmail3" class="col-md-2 control-label">وصف من نحن باللغة العربية</label>
              <div class="col-md-10">
                <textarea id="editor" name="aboutus_ar" rows="10" cols="80" style="margin: 0px; width: 725px; height: 298px;">{{@$about_us->aboutus_ar}}</textarea>
                <strong class="help-block">{{ $errors->first('aboutus_ar') }}</strong>
             </div>
           </div>

           <div class="form-group box-body pad @if($errors->has('aboutus_en')) has-error @endif">
             <label for="inputEmail3" class="col-md-2 control-label">وصف من نحن باللغة الانجليزية</label>
              <div class="col-md-10">
                <textarea id="editor1" name="aboutus_en" rows="10" cols="80" style="margin: 0px; width: 725px; height: 298px;">{{@$about_us->aboutus_en}}</textarea>
                <strong class="help-block">{{ $errors->first('aboutus_en') }}</strong>
             </div>
           </div>

           <div class="form-group @if($errors->has('logo_aboutus')) has-error @endif">
               <label for="inputEmail3" class="col-md-2 control-label">صورة من نحن</label>
               <div class="col-md-10">
                 <input type="file" class="form-control" name="logo_aboutus">
                <img height="100px" width="100px" src="{{asset('public/'.$about_us->logo_aboutus)}}"/>
               <strong class="help-block">{{ $errors->first('logo_aboutus') }}</strong>
               </div>
            </div>

    <div class="text2">
        <div class="col-md-12">
          <button type="submit" class=" btn bg-purple  fa fa-dashboard ">  تعديل إعدادات من نحن</button>
    </div>
    </div><!-- /.box-footer -->
  </form>
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
