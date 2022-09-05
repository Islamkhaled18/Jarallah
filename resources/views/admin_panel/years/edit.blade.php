@extends('admin_panel/layouts/main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>تعديل بيانات المدينة : {{ $city->name_ar }}
           </h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel/index')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin_panel/citys')}}"> التحكم فى المدن </a></li>
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
              'url'=>'admin_panel/citys/'.$city->id,
              'class'=>'form-horizontal',
              'role'=>'form',
              'method' => 'put',
              'files'=>true
          ))!!}

          <div class="form-group @if($errors->has('name_ar')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم المدينه باللغه العربية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name_ar" value="{{$city->name_ar}}" placeholder="أسم المدينة باللغة العربية">
                <strong class="help-block">{{ $errors->first('name_ar') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('name_en')) has-error @endif">
               <label for="inputEmail3" class="col-md-2 control-label">أسم المدينه باللغه الانجليزية</label>
               <div class="col-md-10">
                 <input type="text" class="form-control" name="name_en" value="{{$city->name_en}}" placeholder="أسم المدينة باللغة الانجليزية">
                 <strong class="help-block">{{ $errors->first('name_en') }}</strong>
               </div>
            </div>

           <div class="text2">
            <div class="col-md-12">
              <button type="submit" class="btn btn-warning">
                <li class="fa fa-success" style="color: #ffffff"></li>
                تعديل بيانات المدينة
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
