    @extends('site/layouts/main')
    @section('content')


  <!-- header section -->

  <header style="background:url({{asset('public/'.$setting->image)}})">
    <div class="header-overlay">
      <div class="header-content">
        <h2 class="my-3"><span> احصل </span>علي جميع قطع غيار سيارتك ....</h2>
        <p class="my-5">
        @if( App::getLocale() == 'en')
          {{ $setting->inf_titel_en}}
          @elseif( App::getLocale() == 'ar')
          {{ $setting->inf_titel_ar}}
        @endif
      </p>
      <!-- --- side-menu-classification ---- -->

        <div class="side-menu-classification">
            <a href="javascript:void(0)" class="toggle-side-menu-classification"><i class="bi bi-filter"></i></a>
            <a href="javascript:void(0)" class="close-side-menu-classification"><i class="bi bi-x-lg"></i></a>
            <form class="side-menu-classification-content" action="" method="#" enctype="multipart">
              <input class="form-control" type="search" placeholder="... ادخل الكلمات" aria-label="default input example">
               <select class="form-control" multiple="multiple">
              <option selected disabled>اختر النوع</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
              <input class="form-control w-100" type="search" placeholder="... ادخل الموديل">
              <button type="button" class="btn btn-orange">ابحث</button>
            </form>
        </div>


        <!-- --- side-menu-classification ends ---- -->
      <div class="classification">
        <form class="classification-content" action="{{route('searchSearch')}}" method="get" enctype="multipart">

          <div class="col px-1">
            <input class="form-control w-100" name="name_ar" value="{{ $filters['name_ar'] ?? '' }}" type="search" placeholder="... ادخل الكلمات">

          </div>
          <div class="col px-1">
            <select name="car_type_id" class="form-control">
                    <option selected disabled>اختر النوع</option>
                  @foreach (App\Models\Car_Type::all() as $carType)
                    <option value="{{ $carType->id }}" @if ($carType->id == ($filters['car_type_id'] ?? '')) selected @endif>{{ $carType->name_ar }}</option>
                  @endforeach
                </select>
          </div>

          <div class="col px-1">
            <input class="form-control w-100" name="name_ar" {{ $filters['name_ar'] ?? '' }} type="search" placeholder="... ادخل الموديل">
          </div>
          <div class="col px-1">
            <button type="submit" class="btn btn-orange w-100">ابحث</button>
          </div>
        </form>
      </div>
    </div>
    </div>
  </header>

  <!-- header section ends -->

  <!-- choose car section -->

    <section class="choose-car">
      <div class="choose-car-heading">
        <img src="{{ Url('') }}/public/site/images/Group 67671.svg" alt="">
        <h3 class="mx-2">اختر نوع سيارتك</h3>
        <img src="{{ Url('') }}/public/site/images/Group 68242.svg" alt="">
      </div>
      <div class="choose-car-slider">
        <div class="owl-carousel">
          @foreach($cars as $car)
         <a href="{{ Url('site/show_car_type/'.$car->id) }}">
          <div class="choose-car-item">
            <img src="{{asset('public/'.$car->image)}}" alt="">
          </div>
         </a>
         @endforeach



        </div>
      </div>
    </section>

  <!-- choose car section ends -->

  <!-- products section -->

  <section class="container products">
    <div class="products-headline">
      <h5>المنتجات</h5>
      <a href="{{ url('site/products') }}">المزيد <i class="bi bi-arrow-left me-1"></i></a>
    </div>
    <div class="row py-5 gy-4 justify-content-center">
      @foreach($products as $product)
      <div class="col-lg-3 col-md-4 col-sm-6">

          <div class="card product-item mb-3">
              <a href="{{ Url('site/show_product/'.$product->id) }}" class="text-dark"></a>
            <span class="new-padge">
              @if($product->ads_type == 0 ) جديد
              @elseif($product->ads_type == 1)  مستعمل
              @endif
            </span>
            <div class="position-relative">
              @if($product->Images->count())
              <img src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$product->Images->first()->image}}" alt="...">
              @endif
              <div class="overlay-product-item">

                <a href="{{ Url('site/show_product/'.$product->id) }}"><i class="bi bi-arrow-left"></i></a>
                <button data-product-id="{{$product->id}}" class="add-to-fav addToWishlist" ><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="product-title-rating">
                <h5 class="card-title">
                  @if( App::getLocale() == 'en')
                    {{ $product->name_en}}
                    @elseif( App::getLocale() == 'ar')
                    {{ $product->name_ar}}
                  @endif
                </h5>
                <span class="product-rating"><i class="bi bi-star-fill"></i> 5</span>
              </div>
              <p class="card-text product-info">
                @if( App::getLocale() == 'en')
                {{mb_substr(strip_tags($product->description_en),0,200)}}
                @elseif( App::getLocale() == 'ar')
                {{mb_substr(strip_tags($product->description_ar),0,200)}}
                @endif
              </p>
            </div>
            <div class="card-footer">
              <span class="product-price"><span>{{ $product->price }}</span> ريال </span>
            </div>
              <a class="btn add-to-cart" href="{{ Url('site/show_product/'.$product->id) }}">عرض المنتج</a>
          </div>

      </div>
@endforeach

    </div>

  </section>

  <!-- products section ends -->


  <!-- discount section  -->

  <section class="container my-5">
    <div class="shopping">
      <div class="overlay">
        <div>
          <h3>احصل على جميع قطع غيار سيارتك ...</h3>

          <a role="button" href="{{ url('site/products') }}">تسوق الان</a>
        </div>
      </div>
    </div>
  </section>

  <!-- discout section ends -->


  <!-- Offers section  -->

  <section class="container offers">
    <div class="offers-headline">
      <h5>العروض</h5>
      <a href="{{ url('site/offers') }}">المزيد <i class="bi bi-arrow-left me-1"></i></a>
    </div>
    <div class="offers-slider py-5"  data-aos="fade-right" ata-aos-easing="linear" data-aos-duration="600">

      <div class="owl-carousel">
        @foreach($products_offers as $ad)
        <div class="card product-item">
          <a class="view-product" href="{{ url('site/products') }}"></a>
          <div class="position-relative">
            @if($ad->Images->count())
            <img src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$ad->Images->first()->image}}" alt="...">
            @endif
            <div class="overlay-product-item">

              <a href="{{ Url('site/show_product/'.$ad->id) }}"><i class="bi bi-arrow-left"></i></a>
              <button data-product-id="{{$ad->id}}" class="add-to-fav addToWishlist"><i class="bi bi-heart"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="product-title-rating">
              <h5 class="card-title">
                @if( App::getLocale() == 'en')
                  {{ $ad->name_en}}
                  @elseif( App::getLocale() == 'ar')
                  {{ $ad->name_ar}}
              @endif
              </h5>
              <span class="product-rating"><i class="bi bi-star-fill"></i> 5</span>
            </div>
            <p class="card-text product-info">
              @if( App::getLocale() == 'en')
              {{mb_substr(strip_tags($ad->description_en),0,200)}}
              @elseif( App::getLocale() == 'ar')
              {{mb_substr(strip_tags($ad->description_ar),0,200)}}
              @endif
            </p>
          </div>
          <div class="card-footer">
              <span class="product-price"><span>{{ $ad->price}}</span> ريال </span>
          </div>
          <a class="btn add-to-cart" href="{{ Url('site/show_product/'.$ad->id) }}">عرض المنتج</a>
        </div>
      @endforeach
      </div>
    </div>
  </section>

  <!-- Offers section ends -->


  <!-- the most wanted section -->

  <section class="container most-wanted">
    <div class="most-wanted-headline">
      <h5>الاكثر مشاهده</h5>
    </div>
    <div class="most-wanted-slider py-5">
      <div class="owl-carousel">
        @foreach($ads_views as $ad)
        <div class="card product-item mb-3">
            <div class="position-relative">
              <img src="{{ Url('') }}/public/site/images/621-XX-K6-removebg-preview.png" alt="...">
              <div class="overlay-product-item">

                <a href="{{ Url('site/show_product/'.$ad->id) }}"><i class="bi bi-arrow-left"></i></a>
                @if (Auth::guest())


                  @else
                  <a href="{{ url('site\addfav/' .$product->id ) }}" class="add-to-fav">
                    @if(\App\Models\Foverite::where('user_id',Auth()->user()->id)->where('ads_id',$product->id)->count())
                    <i class="bi bi-heart"> </i>
                    @else
                    <i class="bi bi-heart"> </i>
                    @endif
                    </a>


                  @endif
              </div>
            </div>
            <div class="card-body">
              <div class="product-title-rating">
                <h5 class="card-title">
                  @if( App::getLocale() == 'en')
                    {{ $ad->name_en}}
                    @elseif( App::getLocale() == 'ar')
                    {{ $ad->name_ar}}
                @endif
                </h5>
                <span class="product-rating"><i class="bi bi-star-fill"></i> 5</span>
              </div>
              <p class="card-text product-info">
                @if( App::getLocale() == 'en')
                {{mb_substr(strip_tags($ad->description_en),0,200)}}
                @elseif( App::getLocale() == 'ar')
                {{mb_substr(strip_tags($ad->description_ar),0,200)}}
                @endif
              </p>
            </div>
            <div class="card-footer">
              <span class="product-price"><span>{{ $ad->price}}</span> ريال </span>
          </div>
            <a class="btn add-to-cart" href="{{ Url('site/show_product/'.$ad->id) }}">عرض المنتج</a>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- the most wanted section ends -->

  <!------------- connect now -------------->
  <section class="my-5">
    <div class="container connect">
      <div class="content-bg py-2">
        <div class="content py-5 px-3" >
          <img src="{{ Url('') }}/public/site/images/Group 67645.svg" alt="">
          <h4>كن علي تواصل معنا ليصلك كل جديد </h4>
          <div class="content-btn px-2">
              <a class="btn btn-lg" href="{{ url('site/contact') }}">تواصل الان</a>
          </div>
        </div>
      </div>
    </div>
  </section>


    @stop
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
