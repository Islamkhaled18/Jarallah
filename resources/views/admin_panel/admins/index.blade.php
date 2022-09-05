@extends('admin_panel/layouts/main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <!-- DataTables -->
    <section class="content-header">
      <h1>التحكم فى المستخدمين</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin_panel/admins/create')}}">أضافة مدير جديد</a></li>
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
                 <a href="{{Url('admin_panel/admins/search')}}"></a>
                 <button type="submit" class="btn btn-success"><li class="fa fa-search"></li> بحث  </button>
               </div>

             </div>
           </form>
             <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">أسم المستخدم </th>
                  <th class="text-center">رقم الجوال</th>
                  <th class="text-center">البريد الالكترونى</th>
                  <th class="text-center">صورة المستخدم</th>
                  <th class="text-center">أنشئ في</th>
                  <th class="text-center">الإجراءات</th>
                </tr>
              </thead>
            </tbody>
            <tbody>
              @php $count = 1; @endphp
              @foreach($admins as $user)
              <tr>
                <td class="text-center">{{$count}}</td>
                <td class="text-center">{{$user->user_name}}</td>
                <td class="text-center">{{$user->phone}}</td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center"><img height="70px" width="70px" src="{{asset('public/'.$user->image)}}"/></td>
                <td class="text-center">{{$user->created_at}}</td>


               <td class="text-center">
                <!-- <a href="{{url('admin_panel/admins/'.$user->id.'/edit')}}" class="btn btn-primary fa fa-pencil-square-o" ></a> -->


                <a class="btn btn-danger fa fa-trash-o"data-id="{{$user->id}}" data-toggle="modal" data-target="#delete-user{{$user->id}}"></a>
                <!-- Modal -->
                <div class="modal modal-danger fade" id="delete-user{{$user->id}}" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                         <h4 class="modal-title text-center" id="exampleModalLabel">تأكيد الحذف</h4>
                      </div>

                      <div class="modal-body">
                        <h3 class="text-center "> هل أنت متأكد من حذف مدير  :  {{ $user->user_name }} ؟ </h3>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline"  data-dismiss="modal">الغاء</button>
                        <a href="{{url('admin_panel/admins/'.$user->id.'/delete')}}" class="btn btn-outline danger delete pull-right">حذف</a>

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
 {!! $admins->render() !!}
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
