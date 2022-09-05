@extends('site/layouts/main')
@section('content')

<!------------- breadcrumb -------------->
<section class="border-bottom">
  <div class="container">
    <div class="d-flex mt-4 breadcrumb">
        <a href="{{ url('/') }}" class="text-muted"> الرئيسية</a>
        <i class="bi bi-chevron-left mx-2"></i>
        <h6>سياسة الخصوصية</h6>
    </div>
  </div>
</section>





<section class="my-5">
    <div class="container">
        <div>
            <h5 class="mb-4">سياسة الخصوصية</h5>
            <p>
              @if( App::getLocale() == 'en')
              {{(strip_tags($setting->privacy_policy_en))}}
              @elseif( App::getLocale() == 'ar')
              {{(strip_tags($setting->privacy_policy_ar))}}
              @endif
            </p>
        </div>
    </div>
</section>



@stop
