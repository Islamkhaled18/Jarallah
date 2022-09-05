@extends('site/layouts/main')
@section('content')
<!------------- sub nav -------------->
<section class="border-bottom">
  <div class="container">
    <div class="d-flex mt-4 breadcrumb">
        <a href="{{ url('/') }}" class="text-muted"> {{trans('main.Home')}} </a>
        <i class="bi bi-chevron-left mx-2"></i>
        <h6>{{trans('main.about_us')}}</h6>
    </div>
  </div>
</section>

<!------------- services -------------->
<section class="services">
    <div class="container my-5">
        <div class="row gy-3 align-items-center justify-content-around">
            <div class="col-12 col-lg-5" data-aos="fade-down-left" data-aos-easing="linear" data-aos-duration="600">
                <img class="w-100 border-15" src="{{asset('public/'.$about_us->logo_aboutus)}}" style="filter: brightness(70%);" alt="">
            </div>
            <div class="col-12 col-lg-6" data-aos="fade-down-right" data-aos-easing="linear" data-aos-duration="600">
                <p class="text-muted my-3">
                  @if( App::getLocale() == 'en')
                {{ $about_us->aboutus_ar}}
                @elseif( App::getLocale() == 'ar')
                {{ $about_us->aboutus_en}}
                @endif</p></p>
            </div>
        </div>
    </div>
</section>

@stop
