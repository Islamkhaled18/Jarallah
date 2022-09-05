@extends('admin_panel/layouts/main')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">

   <!-- Content Header (Page header) -->
   <section class="content-header">
    <h1>رسائل الزوار</h1>
      <ol class="breadcrumb">
        <li><a href="{{Url('admin_panel')}}"><i class="fa fa-dashboard"></i> الرئيسية </a></li>
      <li><a href="{{Url('admin_panel/contact')}}">التحكم فى الرسائل</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content"style="min-height: 770px!important;">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <?php $save_chack = Session::get('save');?>
                  @if(!empty($save_chack))
                  <div class="container-fluid">
                  <div class="alert alert-dismissable alert-success">
                  <button class="close" aria-hidder="true" data-dismiss="alert">&times;</button>
                  <h4>{{Session::get('save') }}</h4>

                  </div>
                  </div>
                  @endif


                <?php $error_check = Session::get('error');?>
                @if(!empty($error_check))
                <div class="container-fluid">
                <div class="alert alert-dismissable alert-danger">
                <button class="close" aria-hidder="true" data-dismiss="alert">&times;</button>
                  <h4>{{Session::get('error') }}</h4>

                </div>
                </div>
                @endif
          <br>

            <!-- /.box-header -->
          <div class="box-body">
         <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th class="text-center">#</th>
              <th class="text-center">الرد</th>
              <th class="text-center">التاريخ</th>
              <th class="text-center">حذف</th>
            </tr>
          </thead>
          </tbody>
          <tbody>
          @php $count = 1; @endphp
          @foreach($contacts as $contact)
            <tr>
            <td class="text-center">{{$count}}</td>


            <td class="text-center">
              @if($contact->view!=1)
                   <a  href="{{url('admin_panel/contact/'.$contact->id.'/edit')}}" class="btn default btn-xs purple">
                      <i class="fa "></i> لم يتم قرائته
                  </a>
              @else
                  <a  href="{{url('admin_panel/contact/'.$contact->id.'/edit')}}" class="btn primary btn-xs primary">
                      <i class="fa "></i> تم قرائتها
                  </a>
              @endif
            </td>

            <td class="text-center">{{$contact->created_at}}</td>

             <td class="text-center">
                <a class="btn btn-danger fa fa-trash-o"data-id="{{$contact->id}}" data-toggle="modal" data-target="#delete-contact"></a>
                <!-- Modal -->
                <div class="modal modal-danger fade" id="delete-contact" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                         <h4 class="modal-title text-center" id="exampleModalLabel">تأكيد الحذف</h4>
                      </div>


                      <div class="modal-body">
                        <h3 class="text-center "> هل أنت موافق على حذف رسالة:  {{ $contact->name }} ؟ </h3>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline"  data-dismiss="modal">الغاء</button>
                        <a href="{{url('admin_panel/contact/'.$contact->id.'/delete')}}" class="btn btn-danger delete pull-right">حذف</a>

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
