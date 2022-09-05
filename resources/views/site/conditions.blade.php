@extends('site/layouts/main')
@section('content')

<!------------- breadcrumb -------------->
<section class="border-bottom">
  <div class="container">
    <div class="d-flex mt-4 breadcrumb">
        <a href="{{ url('/') }}" class="text-muted"> الرئيسية</a>
        <i class="bi bi-chevron-left mx-2"></i>
        <h6>الشروط والاحكام</h6>
    </div>
  </div>
</section>
<section class="my-5">
    <div class="container">
        <div class="privacy">
            <div class="heading d-flex align-items-center">
              <span>
                 <i class="bi bi-card-checklist"></i> 
              </span>
              <h5 class="m-0">الشروط والأحكام</h5>
            </div>
            <ul>
              <li>
                <p>
                  @if( App::getLocale() == 'en')
                  {{(strip_tags($setting->conditions_en))}}
                  @elseif( App::getLocale() == 'ar')
                  {{(strip_tags($setting->conditions_ar))}}
                  @endif
                </p>
              </li>

            </ul>
        </div>
    </div>
</section>



@stop
