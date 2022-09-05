@extends('admin_panel/layouts/main')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <style type="text/css">
    .content .form-group textarea {
    width: 100%;
    background: #eee;
    border: 1px solid #ddd;
    padding: 10px;
    outline: none;
    }
    </style>
    <!-- DataTables -->

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1> تفاصيل الرسالة </h1>
  <ol class="breadcrumb">
    <!--   <li><a href="{{url('admin_panel/contact/'.$contact->id)}}"><i class="fa fa-reply"></i> رد على رساله العضو </a></li> -->
    <li><a href="{{Url('admin_panel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
    <li><a href="{{Url('admin_panel/contact')}}">التحكم فى الرسائل</a></li>

  </ol>
</section>
<!-- Main content -->
<section class="content"style="min-height: 770px!important;">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
      <div class="box-body">

    <div class="form-group">
      <label for="inputEmail3" class="col-md-2 control-label">الإسم بالكامل</label>
      <div class="col-md-10">
        <input  rows="6" readonly class="form-control" disabled value="{{@$contact->user_name}}" />
      </div>
      </div><!-- /.box-body -->
<br>
<br>
      <div class="form-group">
        <label for="inputEmail3" class="col-md-2 control-label">البريد الإلكتروني </label>
        <div class="col-md-10">
          <input  rows="6" readonly class="form-control" disabled value="{{@$contact->email}}" />
        </div>
        </div><!-- /.box-body -->
<br>
<br>

        <div class="form-group">
          <label for="inputEmail3" class="col-md-2 control-label">رقم الجوال</label>
          <div class="col-md-10">
            <input  rows="6" readonly class="form-control" disabled value="{{@$contact->phone}}" />
          </div>
          </div><!-- /.box-body -->
<br>
<br>

        <div class="form-group">
          <label for="inputEmail3" class="col-md-2 control-label">عنوان الرسالة</label>
          <div class="col-md-10">
            <input  rows="6" readonly class="form-control" disabled value="{{@$contact->title}}" />
          </div>
        </div><!-- /.box-body -->
<br>
<br>

    <div class="form-group">
      <label for="inputEmail3" class="col-md-2 control-label">الرسالة المرسلة </label>
      <div class="col-md-10">
        <textarea  rows="6" readonly cols="100" disabled>{{$contact->message}}</textarea>
      </div>
      </div><!-- /.box-body -->


</div>
<!-- /.box -->




  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop
