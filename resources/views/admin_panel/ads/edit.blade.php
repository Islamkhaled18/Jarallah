@extends('admin_panel/layouts/main')

@section('content')
<style type="text/css">
.pp {
  position: relative;
  float: right;
  margin-left: 5px;
  width: 110px;
  height: 100px;
}
a.delPostImg {
  position: absolute;
  top: 5px;
  left: 6px;
  font-size: 25px;
  color: #f00;
  width: 20px;
  height: 20px;
  line-height: 22px;
  text-align: center;
  background-color: #fff;
}
.pp img {
  width: 100%;
  height: 100%;
}
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>تعديل بيانات القطعة : {{ $ads->name_ar }}
           </h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel/index')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin_panel/ads')}}"> التحكم فى القطعةات</a></li>
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
              'url'=>'admin_panel/ads/'.$ads->id,
              'class'=>'form-horizontal',
              'role'=>'form',
              'method' => 'put',
              'files'=>true
          ))!!}
@include('admin_panel.layouts.includes.alerts.massage')
          <div class="form-group @if($errors->has('name_ar')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">أسم القطعة باللغه العربية</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name_ar" value="{{$ads->name_ar}}" placeholder="أسم القطعة باللغة العربية">
                <strong class="help-block">{{ $errors->first('name_ar') }}</strong>
              </div>
           </div>

           <div class="form-group @if($errors->has('name_en')) has-error @endif">
               <label for="inputEmail3" class="col-md-2 control-label">أسم القطعة باللغه الانجليزية</label>
               <div class="col-md-10">
                 <input type="text" class="form-control" name="name_en" value="{{$ads->name_en}}" placeholder="أسم القطعة باللغة الانجليزية">
                 <strong class="help-block">{{ $errors->first('name_en') }}</strong>
               </div>
            </div>

            <div class="form-group @if($errors->has('car_type_id')) has-error @endif">
              <label  class="col-sm-2 control-label">أختار نوع القطعة</label>
               <div class="col-sm-4">
                  <select name="car_type_id" class="form-control">
                    @foreach($car_types as $car_type)
                      <option {{$ads->car_type_id == $car_type->id?'selected':''}} value="{{$car_type->id}}">{{$car_type->name_ar}}</option>
                    @endforeach
                  </select>
                  <strong class="help-block">{{ $errors->first('car_type_id') }}</strong>
                </div>
            </div>

            <div class="form-group @if($errors->has('car_model')) has-error @endif">
                <label for="inputEmail3" class="col-md-2 control-label">ألموديل</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="car_model" value="{{$ads->car_model}}" placeholder="ألموديل">
                  <strong class="help-block">{{ $errors->first('car_model') }}</strong>
                </div>
             </div>

             <div class="form-group @if($errors->has('price')) has-error @endif">
                 <label for="inputEmail3" class="col-md-2 control-label">سعر القطعة</label>
                 <div class="col-md-10">
                   <input type="text" class="form-control" name="price" value="{{$ads->price}}" placeholder="سعر القطعة">
                   <strong class="help-block">{{ $errors->first('price') }}</strong>
                 </div>
              </div>

              <div class="form-group @if($errors->has('piece_number')) has-error @endif">
                  <label for="inputEmail3" class="col-md-2 control-label">رقم القطعة</label>
                  <div class="col-md-10">
                    <input type="text" class="form-control" name="piece_number" value="{{$ads->piece_number}}" placeholder="رقم القطعة">
                    <strong class="help-block">{{ $errors->first('piece_number') }}</strong>
                  </div>
               </div>

               <div class="form-group">
                    <label  class="col-md-2 control-label">حالة القطعة</label>
                    <div class="col-md-10">
                      <select name="ads_type" class="form-control select2" style="width: 100%;">
                        <option value="0" @if($ads->ads_type == 0)  selected="selected" @endif >جديد</option>
                        <option value="1" @if($ads->ads_type == 1)  selected="selected" @endif  >مستعمل</option>
                      </select>
                    </div>
                 </div>

               <div class="form-group">
                  <label for="inputEmail3" class="col-md-2 control-label">صور المنتح</label>
                  <div class="col-md-10">
                  <input type="file" multiple="" class="form-control" name="image[]" value="{{$ads->images}}">
                   @foreach($ads->Images as $img)
                    <div class="pp">

                        <a class="delPostImg" data-token="{{ csrf_token() }}" href="{{route('del_img',$img->id)}}">×</a>
                        <img height="70px" width="80px" src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$img->image}}"/>
                    </div>
                  @endforeach
                  </div>
               </div>


           <div class="text2">
            <div class="col-md-12">
              <button type="submit" class="btn btn-warning">
                <li class="fa fa-success" style="color: #ffffff"></li>
                تعديل بيانات القطعة
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


@section('footer')
<script type="text/javascript">
    // Delete Image
    $('.delPostImg').on('click', function (e) {
      e.preventDefault();
      var url = $(this).attr("href"),token = $(this).data('token'),a=$(this);
      $.post(url,{_method: 'delete', _token :token},function (data) {
      //success data
      if(data = 'deleted'){
        a.closest('div').hide();
        toastr.options.timeOut = '6000';
        toastr.options.positionClass = 'toast-bottom-left';
        Command: toastr["info"]("تم الحذف بنجاح")
      }
    });
    });

  </script>


@endsection
@stop
