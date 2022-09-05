<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>{{ !empty($title)?$title: 'لوحة التحكم ' }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link rel="stylesheet" href="{{ Url('') }}/public/adminPanel/AdminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ Url('') }}/public/adminPanel/AdminLTE/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ Url('') }}/public/adminPanel/AdminLTE/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a><b>جار الله</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <h2>@include('admin_panel.layouts.includes.alerts.massage')</h2>
        <form method="post">
      {{ csrf_field() }}
      <div class="form-group has-feedback @if($errors->has('user_name')) has-error @endif">
        <input type="text" name="user_name" class="form-control" placeholder="برجاء ادخال أسم المسئول">
        <strong class="help-block">{{ $errors->first('user_name') }}</strong>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback @if($errors->has('password')) has-error @endif">
        <input type="password" name="password" class="form-control" placeholder="برجاء ادخال كلمة المرور">
        <strong class="help-block">{{ $errors->first('password') }}</strong>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="rememberme" value="1"> تذكرنى
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">تسجيل الدخول</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ Url('') }}/public/adminPanel/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.4 -->
    <script src="{{ Url('') }}/public/adminPanel/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="{{ Url('') }}/public/adminPanel/AdminLTE/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
