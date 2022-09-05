@extends('site/layouts/main')
@section('content')

<!------------- breadcrumb -------------->
<section class="border-bottom">
  <div class="container">
    <div class="d-flex mt-4 breadcrumb">
        <a href="{{ url('/') }}" class="text-muted">{{trans('main.Home')}}</a>
        <i class="bi bi-chevron-left mx-2"></i>
        <h6>{{trans('main.CONTACT_US')}}</h6>
    </div>
  </div>
</section>

<!------------- contact info -------------->
<section class="mt-5">
    <div class="container contact-data bg-light rounded-top p-5">
        <div class="row text-center  justify-content-center">
            <!-- الموقع -->
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-3"  data-aos="fade-right"  data-aos-easing="linear" data-aos-duration="500">
                <div class="contact-info">
                    <img src="{{ Url('') }}/public/site/images/Icon material-location-on.svg" alt="">
                    <h5 class="my-3">{{trans('main.Location')}}</h5>
                    <p class="text-muted my-3">
                    @if( App::getLocale() == 'en')
                    {{ $setting->address_en}}
                    @elseif( App::getLocale() == 'ar')
                    {{ $setting->address_ar}}
                    @endif</p>
                </div>
            </div>
            <!-- الهاتف -->
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-3"  data-aos="fade-up"  data-aos-easing="linear" data-aos-duration="500">
                <div class="contact-info">
                    <img src="{{ Url('') }}/public/site/images/Icon material-phone-android.svg" alt="">
                    <h5 class="my-3">{{trans('main.Phone')}}</h5>
                    <div class="phone-num">
                        <p>{{ $setting->phone}}</p>
                        <p>{{ $setting->mobile}}</p>
                    </div>
                </div>
            </div>
            <!-- البريد الإلكتروني -->
            <div class="col-12 col-sm-12 col-md-6 col-lg-4 mb-3"  data-aos="fade-left"  data-aos-easing="linear" data-aos-duration="500">
                <div class="contact-info">
                    <img src="{{ Url('') }}/public/site/images/Icon simple-minutemailer.svg" alt="" style="margin: 25px;
                    width: 30px;">
                    <h5 class="my-3">{{trans('main.Email')}}</h5>
                    <p class="text-muted">{{ $setting->email}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!------------- تواصل معنا -------------->

<section class="mb-5 contactUs-form">
    <div class="container mb-5 bg-light rounded-bottom p-5">
        <h4 class="mb-5 text-center" style="color: #FB2B00;">{{trans('main.CONTACT_US')}} </h4>
        <!------- form  -------->

          {!!Form::open(array('url'=>'site/contact', 'method' => 'POST','role'=>'form', 'class'=>'form-horizontal','files'=>'true'))!!}
          @csrf
            <div class="row row-cols-1 row-cols-lg-3">
              <!-- الاسم -->
              <div class="form-input @if($errors->has('user_name')) has-error @endif">
                  <h6>{{trans('main.User_Name_Us')}}</h6>
                  <input type="text" name="user_name" value="{{old('user_name')}}" id="form-control" placeholder="">
                  <strong class="help-block">{{ $errors->first('user_name') }}</strong>
              </div>
              <!-- الهاتف -->
              <div class="col form-input @if($errors->has('phone')) has-error @endif">
                  <h6>{{trans('main.phone_us')}}</h6>
                  <input type="text" name="phone" value="{{old('phone')}}" id="user-phone" placeholder="">
                  <strong class="help-block">{{ $errors->first('phone') }}</strong>
              </div>
              <!-- البريد الإلكتروني -->
              <div class="col form-input @if($errors->has('email')) has-error @endif">
                  <h6>{{trans('main.email_us')}}</h6>
                  <input type="email" name="email" value="{{ old('email') }}" id="user-email" placeholder="">
                  <label class="d-none" for=""></label>
                  <strong class="help-block">{{ $errors->first('email') }}</strong>
              </div>
              <!-- رسالتك -->
              <div class="col-12 form-input @if($errors->has('message')) has-error @endif">
                  <textarea name="message" value="{{old('message')}}" id="" cols="40" rows="8" placeholder="{{trans('main.message_us')}}"></textarea>
                  <strong class="help-block">{{ $errors->first('message') }}</strong>
              </div>
            </div>
            <button type="submit" class="btn d-block m-auto text-white mt-4 rounded-3">{{trans('main.send')}}</button>
      {!! Form::close() !!}
        <label class="d-none" for=""></label>
    </div>
</section>


@stop
