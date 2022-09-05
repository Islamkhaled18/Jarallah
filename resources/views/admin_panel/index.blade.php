@extends('admin_panel/layouts/main')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <!-- DataTables -->
    <section class="content-header">
      <h1>التحكم فى الأقسام</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
        <li><a href="{{Url('admin_panel/categories/create')}}">أضافة قسم جديدة</a></li>
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
             <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">أسم القسم باللغه العربية</th>
                  <th class="text-center">أسم القسم باللغه الانجليزية</th>
                  <th class="text-center">حالة القسم</th>
                  <th class="text-center">أنشئ في</th>
                  <th class="text-center">محدث فى </th>
                  <th class="text-center">تعديل</th>
                  <th class="text-center">حذف</th>
                </tr>
              </thead>
            </tbody>
            <tbody>
              @php $count = 1; @endphp
              @foreach($categorys as $category)
              <tr>
                <td class="text-center">{{$count}}</td>
                <td class="text-center">{{$category->name_ar}}</td>
                <td class="text-center">{{$category->name_en}}</td>
                <td class="text-center">{{$category->created_at}}</td>
                <td class="text-center">{{$category->updated_at}}</td>

                <td class="text-center">
                 <a href="{{url('admin_panel/categories/'.$category->id.'/edit')}}" class="btn btn-primary fa fa-pencil-square-o" ></a>
               </td>
                <td class="text-center">
                <a class="btn btn-danger fa fa-trash-o"data-id="{{$category->id}}" data-toggle="modal" data-target="#delete-category{{$category->id}}"></a>
                <!-- Modal -->
                <div class="modal modal-danger fade" id="delete-category{{$category->id}}" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                         <h4 class="modal-title text-center" id="exampleModalLabel">تأكيد الحذف</h4>
                      </div>

                      <div class="modal-body">
                        <h3 class="text-center ">  هل أنت متأكد من حذف قسم :  {{ $category->name_ar }} ؟ </h3>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline"  data-dismiss="modal">الغاء</button>
                        <a href="{{url('admin_panel/categories/'.$category->id.'/delete')}}" class="btn btn-outline danger delete pull-right">حذف</a>

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
          {!! $categorys->render() !!}
        </div><!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

</div><!-- /.content-wrapper -->
@stop
