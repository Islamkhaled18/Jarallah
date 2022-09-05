@extends('admin_panel/layouts/main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>أضافة سيارة جديدة</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel/index')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin_panel/cars_type')}}"> التحكم فى السيارات</a></li>
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
            <!-- form start -->
          {!!Form::open(array(
            'url'=>'admin_panel/cars_type',
            'class'=>'form-horizontal',
            'role'=>'form',
            'method' => 'POST',
            'files'=>true
            ))!!}

           <div class="form-group @if($errors->has('name_ar')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم السيارة باللغه العربية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name_ar" value="{{old('name_ar')}}" placeholder="أسم السيارة باللغه العربية">
                <strong class="help-block">{{ $errors->first('name_ar') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('name_en')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم السيارة باللغة الانجليزية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name_en" value="{{old('name_en')}}" placeholder="أسم السيارة باللغة الانجليزية">
                <strong class="help-block">{{ $errors->first('name_en') }}</strong>
              </div>
           </div>


           <div class="form-group @if($errors->has('image')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">صورة نوع السيارة</label>
              <div class="col-md-10">
                <input type="file" class="form-control image" name="image">
              <strong class="help-block">{{ $errors->first('image') }}</strong>
              </div>
           </div>


          <div class="text2">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success">
                <li class="fa fa-globe" style="color: #ffffff"></li>
                أضافة سيارة جديدة
              </button>
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
