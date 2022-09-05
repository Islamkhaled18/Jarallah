<!DOCTYPE html>
<html lang="en">
<?php $setting = App\Models\Setting::find(1); ?>
<?php $locale  = App::getLocale(); ?>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>{{app()->getLocale() == 'ar' ? $setting->name_ar :  $setting->name_en}}</title>


   <!-- Bootstrap link  -->
   <link rel="stylesheet" href="{{ Url('') }}/public/site/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


  <!-- owl-carousel link -->
  <link rel="stylesheet" href="{{ Url('') }}/public/site/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ Url('') }}/public/site/css/owl.theme.default.min.css">

  <!-- rateyo link -->
  <link rel="stylesheet" href="{{ Url('') }}/public/site/css/jquery.rateyo.min.css">

  <!-- nice select link -->
  <link rel="stylesheet" href="{{ Url('') }}/public/site/css/nice-select.css">

  <!-- aos link -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

   <!-- custom css file link  -->
   <link rel="stylesheet" href="{{ Url('') }}/public/site/css/style.css">

   {!! Html::style('public/toastr/toastr-rtl.min.css') !!}


</head>
<body>

  <div class="bottom-nav">

    <div class="row align-items-center justify-content-between">
      <div class="col-auto top-nav-logo-order">
          <a href="{{ Url('/') }}">
              <img class="top-nav-logo" src="{{ Url('/') }}/public/site/images/Group 68193 (1).png" alt="">
          </a>
         

      </div>
      <div class="col-md-7 hide-md">
        <ul class="bottom-nav-sections">
          <li @if(Request::is('/')) class="active" @endif><a href="{{ url('/') }}">{{trans('main.Home')}}</a>

            <li  @if(Request::is('site/about_us')) class="active" @endif>
                <a href="{{ url('site/about_us') }}">{{trans('main.About_Us')}}</a>
            </li>

            <li @if(Request::is('site/products')) class="active" @endif>
                <a href="{{ url('site/products') }}">المنتجات</a>
            </li>

          <li  @if(Request::is('site/offers')) class="active" @endif>
            <a href="{{ url('site/offers') }}">العروض</a></li>
            
          <li @if(Request::is('site/contact')) class="active" @endif>
              <a href="{{ url('site/contact') }}">{{trans('main.CONTACT_US')}}</a>
          </li>
        </ul>
      </div>
      <div class="col-md-2 col-auto d-flex align-items-center justify-content-end">

        <!-- <div class="dropdown lang-dropdown">-->
        <!--  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> -->
        <!--     @if( session()->has('lang'))-->
        <!--    @if( session()->get('lang') == 'en')-->
        <!--    العربية-->
        <!--      @elseif( session()->get('lang') == 'ar')-->
        <!--      English-->
        <!--      @endif-->
        <!--      @else-->
        <!--      العربية-->
        <!--      @endif-->
        <!--  </a>-->

        <!--  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">-->
        <!--    @if( session()->has('lang'))-->
        <!--    @if( session()->get('lang') == 'en')-->
        <!--    <li><a class="dropdown-item" href="{{ url('lang/ar') }}">العربية</a></li>-->
        <!--    @elseif( session()->get('lang') == 'ar')-->
        <!--    <li><a class="dropdown-item" href="{{ url('lang/en') }}">English</a></li>-->
        <!--    @endif-->
        <!--    @else-->
        <!--  <li><a class="dropdown-item" href="{{ url('lang/ar') }}">العربية</a></li>-->
        <!--   @endif-->
        <!--  </ul>-->
        <!--</div> -->

        <!-- <div class="dropdown lang-dropdown">-->
        <!--<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">-->

        <!--</button> -->

        <!-- </div> -->
        <div class="hide-lg">
          <a href="javascript:void(0)"  class="toggle-side-menu">
            <i class="bi bi-list"></i>
          </a>
        </div>
        <div class="tel-number hide-md ps-0">
          <p>
              <a href="tel:{{ $setting->mobile}}" style="color: var(--dark-blue);">{{ $setting->mobile}}</a></p>
          <div class="icon">
            <i class="bi bi-telephone"></i>
          </div>
        </div>
        <ul class="icons d-flex pe-0">
                    @if (Auth::guest())
                      @else
                      <!-- <li>
                        <a href="cart.html">
                          <img src="{{ Url('') }}/public/site/images/_01.svg" alt="">
                          <span class="quantity-num">11</span>
                        </a>
                      </li> -->
                      
                      @endif
                      <li class="top-nav-user">
                        <a href="javascript:void(0)" class="has-menu">
                          <img src="{{ Url('') }}/public/site/images/svgexport-6 (91).svg" alt="">
                        </a>
                        <div class="sub-menu">

                            @if (Auth::guest())
                            <button type="button" data-bs-toggle="modal" data-bs-target="#login-modal">تسجيل الدخول</button>
                          @else
                          <a href="{{ Url('site/my_profile/'.Auth::user()->id) }}">الملف الشخصي</a>
                          <form action="{{route('logout')}}" method="post" >
                              @csrf

                              <button type="submit">تسجيل الخروج</button>

                          </form>
                          @endif



                        </div>
                      </li>
                  </ul>
      </div>
    </div>

  </div>



  <div class="side-menu-nav">
    <a href="javascript:void(0)" class="close-side-menu"><i class="bi bi-x-lg"></i></a>
    <ul>
      <li><a href="{{ url('/') }}">الرئيسية</a></li>
      <li><a href="{{ url('site/about_us') }}">من نحن</a></li>
      <li><a href="{{ url('site/products') }}">المنتجات</a></li>
      <li><a href="{{ url('site/offers') }}">العروض</a></li>
      <li><a href="{{ url('site/contact') }}">تواصل معنا</a></li>
    </ul>
    <div class="tel-number">
      <div class="icon">
        <i class="bi bi-telephone"></i>
      </div>
      <p><a href="tel:{{ $setting->mobile}}">{{ $setting->mobile}}</a></p>
    </div>
  </div>



<!-- --- side-menu-nav ends ---- -->
