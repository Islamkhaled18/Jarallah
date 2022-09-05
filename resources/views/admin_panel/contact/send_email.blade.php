@extends('admin/layouts/main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">



<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}">


   <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>رد على رساله العضو :
    {{ $contact->username }}</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin/index')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin/contact')}}"> التحكم فى الرسائل </a></li>



      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
          <div class="box-body">

       <!-- form start -->
          {{Form::open(array(
            'url'=>'sendmail',
            'class'=>'form-horizontal',
            'method' => 'POST'
            ))}}



            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">أسم الشخص المرسل</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="namesend"  placeholder="أسم الشخص المرسل">
              </div>
            </div>



            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">ايميل المرسل اليها</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" name="mail" value="{{ $contact->mail }}" placeholder="موضوع الرسال">
              </div>
            </div>


        <div class="col-md-12">
        <label for="inputEmail3" class="col-sm-2 control-label">أترك رسالتك</label>
             <textarea name="content" class="3" placeholder="أترك رسالتك"></textarea>
        </div><!-- md-12 -->

             <div class="clear-fix"></div>

          <div class="text2">
            <div class="col-md-12">
              <button type="submit" class="btn btn-warning">
                <li class=" fa fa-btn fa-user " style="color: #ffffff"></li>
                  ارسال رساله
              </button>
            </div>
          </div><!-- /.box-footer -->






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
