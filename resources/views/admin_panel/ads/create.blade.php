@extends('admin_panel/layouts/main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>أضافة قطعة جديدة</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel/index')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin_panel/cars_type')}}"> التحكم فى المنتجات</a></li>
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
            'url'=>'admin_panel/ads',
            'class'=>'form-horizontal',
            'role'=>'form',
            'method' => 'POST',
            'files'=>true
            ))!!}

           <div class="form-group @if($errors->has('name_ar')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم القطعة باللغة العربية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name_ar" value="{{old('name_ar')}}" placeholder="أسم القطعة باللغة العربية">
                <strong class="help-block">{{ $errors->first('name_ar') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('name_en')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم القطعة باللغة الانجليزية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name_en" value="{{old('name_en')}}" placeholder="أسم القطعة باللغة الانجليزية">
                <strong class="help-block">{{ $errors->first('name_en') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('car_type_id')) has-error @endif">
              <label  class="col-sm-2 control-label">أختار نوع القطعة</label>
               <div class="col-sm-4">

            <select name="car_type_id" class="form-control select2" id="car_type_id" style="width: 100%;">
               <option  disabled selected value="0">نوع القطعة</option>
               @foreach($car_types as $car_type)
               <option value="{{$car_type->id}}">{{$car_type->name_ar}}</option>
               @endforeach
             </select>
                 <strong class="help-block">{{ $errors->first('car_type_id') }}</strong>
            </div>
          </div>


          <div class="form-group @if($errors->has('car_model')) has-error @endif">
             <label for="inputEmail3" class="col-md-2 control-label">الموديل</label>
             <div class="col-md-10">
               <input type="text" class="form-control" name="car_model" value="{{old('car_model')}}" placeholder="الموديل">
               <strong class="help-block">{{ $errors->first('car_model') }}</strong>
             </div>
          </div>

         <div class="form-group @if($errors->has('price')) has-error @endif">
            <label for="inputEmail3" class="col-md-2 control-label">سعر القطعة</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="price" value="{{old('price')}}" placeholder="سعر القطعة">
              <strong class="help-block">{{ $errors->first('price') }}</strong>
            </div>
         </div>

         <div class="form-group @if($errors->has('piece_number')) has-error @endif">
            <label for="inputEmail3" class="col-md-2 control-label">رقم القطعة</label>
            <div class="col-md-10">
              <input type="text" class="form-control" name="piece_number" value="{{old('piece_number')}}" placeholder="رقم القطعة">
              <strong class="help-block">{{ $errors->first('piece_number') }}</strong>
            </div>
         </div>


         <div class="form-group @if($errors->has('ads_type')) has-error @endif">
             <label  class="col-md-2 control-label">نوع القطعة</label>
             <div class="col-md-10">
               <select  name="ads_type" class="form-control select2" style="width: 100%;">
                 <option value="" selected="selected">نوع القطعة</option>
                 <option value="0">جديد</option>
                 <option value="1">مستعمل</option>
               </select>
               <strong class="help-block">{{ $errors->first('ads_type') }}</strong>
             </div>
           </div>


          <div class="form-group @if($errors->has('image')) has-error @endif">
             <label for="inputEmail3" class="col-md-2 control-label">صور القطعة</label>
             <div class="col-md-10">
               <input type="file" class="form-control" name="image[]" multiple>
             <strong class="help-block">{{ $errors->first('image') }}</strong>
             </div>
          </div>

          <div class="form-group box-body pad @if($errors->has('description_ar')) has-error @endif">
             <label for="inputEmail3" class="col-md-2 control-label">وصف القطعة باللغة العربية</label>
              <div class="col-md-10">
                <textarea id="editor" name="description_ar" rows="10" cols="80"  style="width: 100%;"></textarea>
                <strong class="help-block">{{ $errors->first('description_ar') }}</strong>
              </div>
           </div>

           <div class="form-group box-body pad @if($errors->has('description_en')) has-error @endif">
             <label for="inputEmail3" class="col-md-2 control-label">وصف القطعة باللغة الانجليزية</label>
              <div class="col-md-10">
                <textarea id="editor" name="description_en" rows="10" cols="80"  style="width: 100%;"></textarea>
                <strong class="help-block">{{ $errors->first('description_en') }}</strong>
              </div>
           </div>


          <div class="text2">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success">
                <li class="fa fa-globe" style="color: #ffffff"></li>
                أضافة قطعة جديدة
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
