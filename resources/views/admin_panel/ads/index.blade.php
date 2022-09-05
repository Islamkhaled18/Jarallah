@extends('admin_panel/layouts/main')

@section('content')
<!-- Content Wrapper. Contains page content -->

<style type="text/css">

.mycheck{
    position: relative;
    width: 20px;
    height: 20px;
    border-radius: 5px;
    display: inline-block;
}
.mycheck input{display: none;}
.mycheck .check-style{
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
    border-radius: 5px;
  -webkit-transition: .4s;
  transition: .4s;
}
.mycheck .check-style:before{
    content: "\f00c";
    font-family: FontAwesome;
    width: 20px;
    height: 20px;
    line-height: 20px;
    text-align: center;
    color: #ccc;
    position: absolute;
    top: 0;
    left: 0;
    -webkit-transition: .4s;
    transition: .4s;
}
.mycheck input:checked + .check-style{background-color: #3498db;}
.mycheck input:focus + .check-style{box-shadow: 0 0 1px #3498db;} .mycheck input:checked + .check-style:before{color: #fff;}
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <!-- DataTables -->
    <section class="content-header">
      <h1>التحكم فى قطع السيارات</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin_panel/ads/create')}}">أضافة سيارة جديدة</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              @include('admin_panel.layouts.includes.alerts.massage')
          <!-- /.box-header -->
          <div class="box-body">
            <form action="">
             <div class="row">
               <div class="col-md-4">
                 <input type="text" name="search" class="form-control" placeholder="بحث">
               </div>
               <div class="col-md-4">
                 <a href="{{Url('admin_panel/ads_type/search')}}"></a>
                 <button type="submit" class="btn btn-success"><li class="fa fa-search"></li> بحث  </button>
               </div>

             </div>
           </form>
             <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">أسم القطعة باللغة العربية</th>
                  <th class="text-center">صورة القطعة</th>
                  <th class="text-center">نو ع الاعلان</th>
                  <th class="text-center">أنشئ في</th>
                  <th class="text-center">تعديل</th>
                  <th class="text-center">حذف</th>
                </tr>
              </thead>
            </tbody>
            <tbody>
              @php $count = 1; @endphp
              @foreach($ads as $ad)
              <tr>
                <td class="text-center">{{$count}}</td>
                <td class="text-center">{{$ad->name_ar}}</td>
                @if($ad->Images->count())
                <td class="text-center"><img height="70px" width="70px" src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$ad->Images->first()->image}}"/></td>
                @else
                <td class="text-center"><img height="70px" width="70px" src=""/></td>
                @endif

                <td class="text-center">
                @if($ad->offers == 0)
                {{Form::open(array('method'=>'post','url'=>'admin_panel/ads/'.$ad->id.'/activate'))}}
                <label class="mycheck">
                 <input type="checkbox" name="offers" onchange="this.form.submit()">
                 <div class="check-style"></div>
               </label>
               {{Form::close()}}

               @else
               {{Form::open(array('method'=>'post','url'=>'admin_panel/ads/'.$ad->id.'/deactivate'))}}
               <label class="mycheck">
                 <input type="checkbox" name="offers" onchange="this.form.submit()" checked>
                 <div class="check-style"></div>
               </label>
               {{Form::close()}}
               @endif
             </td>

            <td class="text-center">{{$ad->created_at}}</td>


               <td class="text-center">
                <a href="{{url('admin_panel/ads/'.$ad->id.'/edit')}}" class="btn btn-primary fa fa-pencil-square-o" ></a>
               </td>
                <td class="text-center">
                <a class="btn btn-danger fa fa-trash-o"data-id="{{$ad->id}}" data-toggle="modal" data-target="#delete-ad{{$ad->id}}"></a>
                <!-- Modal -->
                <div class="modal modal-danger fade" id="delete-ad{{$ad->id}}" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                         <h4 class="modal-title text-center" id="exampleModalLabel">تأكيد الحذف</h4>
                      </div>

                      <div class="modal-body">
                        <h3 class="text-center "> هل أنت متأكد من حذف سيارة  :  {{ $ad->name_ar }} ؟ </h3>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline"  data-dismiss="modal">الغاء</button>
                        <a href="{{url('admin_panel/ads/'.$ad->id.'/delete')}}" class="btn btn-outline danger delete pull-right">حذف</a>

                      </div>

                    </div>
                  </div>
                </div>

            </td>
              {{Form::close()}}
            </tr>
            @php $count ++; @endphp
            @endforeach
          </tbody>
        </table>
 {!! $ads->render() !!}
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
