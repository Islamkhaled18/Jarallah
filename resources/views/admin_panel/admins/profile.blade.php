@extends('admin_panel/layouts/main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> عرض بيانات المستخدم : {{ $user->username }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li class="active"><a href="{{Url('admin/users')}}">التحكم فى الاعضاء</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <div class="box">
          <div class="box-header">
          </div>
          <!-- /.box-header -->
           <div class="box-body">
           <div class="form-group">
              <label for="inputEmail3" class="col-md-2 control-label">أسم المستخدم</label>
              <div class="col-md-10">
                <input type="text" class="form-control" value="{{$user->username}}" readonly>
              </div>
           </div>
            <div class="clearfix"></div>
            <br>

           <div class="form-group">
              <label for="inputEmail3" class="col-md-2 control-label">البريد الالكترونى</label>
              <div class="col-md-10">
                <input type="text" class="form-control" value="{{$user->email}}" readonly>
              </div>
           </div>
            <div class="clearfix"></div>
            <br>

           <div class="form-group">
              <label for="inputEmail3" class="col-md-2 control-label">الهاتف</label>
              <div class="col-md-10">
                <input type="text" class="form-control" value="{{$user->phone}}" readonly>
              </div>
           </div>
            <div class="clearfix"></div>
            <br>

           <div class="form-group">
              <label for="inputEmail3" class="col-md-2 control-label">صورة العضو</label>
              <div class="col-md-10">
                 <img height="100px" width="100px" src="{{asset('public/'.$user->image)}}"/>
              </div>
           </div>
            <div class="clearfix"></div>
            <br>

           <div class="form-group">
              <label for="inputEmail3" class="col-md-2 control-label">نوع العضوية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" value="
                @if($user->type == 1) مستخدم عادى
                @elseif($user->type == 2) مقدم خدمة
                @endif" readonly>
              </div>
           </div>

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
</div><!-- /.content-wrapper -->
@stop
