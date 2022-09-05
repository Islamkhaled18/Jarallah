@extends('admin_panel/layouts/main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<!-- DataTables -->
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>أضافة سنه جديدة</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel/index')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin_panel/years')}}"> التحكم فى سنين الصنع</a></li>
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
            'url'=>'admin_panel/years',
            'class'=>'form-horizontal',
            'role'=>'form',
            'method' => 'POST',
            'files'=>true
            ))!!}

           <div class="form-group @if($errors->has('name')) has-error @endif">
              <label for="inputEmail3" class="col-md-2 control-label">السنه</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="السنه">
                <strong class="help-block">{{ $errors->first('name') }}</strong>
              </div>
           </div>


          <div class="text2">
            <div class="col-md-12">
              <button type="submit" class="btn btn-success">
                <li class="fa fa-save" style="color: #ffffff"></li>
                أضافة سنه جديدة
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
