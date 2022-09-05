@extends('admin_panel/layouts/main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <!-- DataTables -->
    <section class="content-header">
      <h1>التحكم فى سنين الصنع</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin_panel/years/create')}}">أضافة سنه جديدة</a></li>
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
                 <a href="{{Url('admin_panel/years/search')}}"></a>
                 <button type="submit" class="btn btn-success"><li class="fa fa-search"></li> بحث  </button>
               </div>

             </div>
           </form>
             <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">سنه الصنع</th>
                  <th class="text-center">أنشئ في</th>
                  <th class="text-center">حذف</th>
                </tr>
              </thead>
            </tbody>
            <tbody>
              @php $count = 1; @endphp
              @foreach($years as $year)
              <tr>
                <td class="text-center">{{$count}}</td>
                <td class="text-center">{{$year->name}}</td>
                <td class="text-center">{{$year->created_at}}</td>

                <td class="text-center">
                <a class="btn btn-danger fa fa-trash-o"data-id="{{$year->id}}" data-toggle="modal" data-target="#delete-year{{$year->id}}"></a>
                <!-- Modal -->
                <div class="modal modal-danger fade" id="delete-year{{$year->id}}" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                         <h4 class="modal-title text-center" id="exampleModalLabel">تأكيد الحذف</h4>
                      </div>

                      <div class="modal-body">
                        <h3 class="text-center "> هل أنت متأكد من حذف سنه  :  {{ $year->name_ar }} ؟ </h3>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline"  data-dismiss="modal">الغاء</button>
                        <a href="{{url('admin_panel/years/'.$year->id.'/delete')}}" class="btn btn-outline danger delete pull-right">حذف</a>

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
 {!! $years->render() !!}
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
