

@extends('admin_panel/layouts/main')

@section('content')
@inject('user','App\Models\User')
@inject('msg', 'App\Models\Contact')
@inject('Car_Type', 'App\Models\Car_Type')



 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: 921px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الرئيسية
      </h1>

    </section>



    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">

       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">عدد الاعضاء</span>
              <span class="info-box-number">{{$user->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
         <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-car"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">عدد الاعلانات</span>
              <span class="info-box-number">{{$ads->count()}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">عدد قطع الغيار</span>
                <span class="info-box-number">{{ $Car_Type->count() }}</span>
              </div><!-- /.info-box-content -->
            </div><!-- /.info-box -->
          </div><!-- /.col -->

        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">عدد الرسائل فى الموقع</span>
              <span class="info-box-number"><small>{{$msg->where('view',0)->count()}}</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->


           <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">اخر الاعضاء المسجلين </h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 New Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($users as $user)
                    <li>

                      <a class="users-list-name" href="#">{{$user->username}}</a>
                      <span class="users-list-date">{{$user->created_at}}</span>
                    </li>
                      @endforeach

                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{url('admin_panel/users')}}" class="uppercase">كل الاعضاء</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->

     </div>
      <!-- /.row -->


  <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->

        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">اخر الاعلانات المضافة</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">

                @foreach($ads as $ad)
                <li class="item">
                  <div class="product-img">
                    @if($ad->Images->count())
                <img height="70px" width="70px" src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$ad->Images->first()->image}}"/>
                    @endif
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">{{$ad->name_ar}}
                      <span class="label label-warning pull-left">{{$ad->price}} ريال</span></a>
                        <span class="product-description">
                          {{$ad->description_ar}}.
                        </span>
                  </div>
                </li>
                   @endforeach


                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{url('admin_panel/ads')}}" class="uppercase"> كل الاعلانات</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->


      </div>
      <!-- /.row -->





    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@stop
