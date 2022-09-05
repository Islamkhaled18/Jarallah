@extends('site/layouts/main')
@section('content')



<section class="products-container">
    <div class="container">
        <div class="row py-5 justify-content-center">
            @foreach($products_types as $product)
          <div class="col-lg-3 col-md-4 col-sm-6"   data-aos="fade-up"  data-aos-easing="linear" data-aos-duration="500" >
            <div class="card product-item mb-3" >
              <span class="new-padge">
                @if($product->ads_type == 0 ) جديد
                @elseif($product->ads_type == 1)  مستعمل
                @endif
              </span>
              <a class="view-product" href="product-details.html"></a>
              <div class="position-relative">
                @if($product->Images->count())
                <img src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$product->Images->first()->image}}" alt="...">
                @endif
                <div class="overlay-product-item">
                  <a href="{{ Url('site/show_product/'.$product->id) }}"><i class="bi bi-arrow-left"></i></a>

                  @if (Auth::guest())


                    @else
                    <a href="{{ url('site\addfav/' .$product->id ) }}" class="add-to-fav">
                      @if(\App\Models\Foverite::where('user_id',Auth()->user()->id)->where('ads_id',$product->id)->count())
                      <i class="bi bi-heart-fill"> </i>
                      @else
                      <i class="bi bi-heart"> </i>
                      @endif
                      </a>


                    @endif

                  </a>
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
                <span class="product-price"><span>{{ $product->price }}</span> ريال </span>
              </div>
              <a class="btn add-to-cart" href="{{ Url('site/show_product/'.$product->id) }}">عرض المنتج</a>
            </div>
          </div>
@endforeach

        </div>
    </div>
  </section>

@stop
