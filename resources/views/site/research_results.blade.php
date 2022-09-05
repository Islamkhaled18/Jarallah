@extends('site/layouts/main')
@section('content')

<section class="search my-5">
    <div class="container">
        <div class="searchNum searchNum-sm-media">
          <p class=" mb-3">نتائج البحث: <span>{{$products->count()}} عنصر</span></p>
        </div>
        <div class="row align-items-center justify-content-between bg-light p-2">
          <!-- search filter col -->
          <div class="col searchFilter d-flex align-items-center">
              <!-- filter  btn -->
              <a role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-sliders fs-5 ms-2"></i> <span role="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"> عرض التصفية </span></a>

              <!-- filter option -->
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h6 id="offcanvasRightLabel" class="w-100 text-center mb-0">التصفيه</h6>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                    <!-- نوع السيارة -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          نوع السيارة
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          <ul>
                            <li>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="carName" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  اسم السيارة
                                </label>
                              </div>
                            </li>
                            <li>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="carName" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  اسم السيارة
                                </label>
                              </div>
                            </li>
                            <li>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="carName" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                  اسم السيارة
                                </label>
                              </div>
                            </li>
                            <li>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="carName" id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">
                                  اسم السيارة
                                </label>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <!-- موديل السيارة -->
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          موديل السيارة
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          <ul>
                            <li>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="carModel" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                  موديل السيارة
                                </label>
                              </div>
                            </li>
                            <li>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="carModel" id="flexRadioDefault2">
                                <label class="form-check-label" for="flexRadioDefault2">
                                  موديل السيارة
                                </label>
                              </div>
                            </li>
                            <li>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="carModel" id="flexRadioDefault3">
                                <label class="form-check-label" for="flexRadioDefault3">
                                  موديل السيارة
                                </label>
                              </div>
                            </li>
                            <li>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="carModel" id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">
                                  موديل السيارة
                                </label>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="middle">
                    <span class="priceRange">سعر الطلب</span>
                    <div class="slider-container">
                      <span class="bar"><span class="fill"></span></span>
                      <input id="slider" class="slider" type="range" min="0" max="100" value="50">
                    </div>
                  </div>
                  <div class="d-flex justify-content-between text-muted mx-3">
                    <span>0</span>
                    <span>500</span>
                    <span>2000</span>
                  </div>
                </div>
                <button type="button" class="btn">تصفية</button>

              </div>
          </div>
          <!-- searchNum col -->
          <div class="col searchNum">
              <p class=" mb-0">نتائج البحث: <span>{{$products->count()}} عنصر</span></p>
          </div>
          <!-- dropdown col -->

        </div>
    </div>
</section>


<section class="products-container my-5">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            @if(count($products) > 0)
          @foreach($products as $product )
            <div class="col-lg-3 col-md-4 col-sm-6"   data-aos="fade-up"  data-aos-easing="linear" data-aos-duration="500" >
              <div class="card product-item mb-3" >
                <span class="new-padge">
                  @if($product->ads_type == 0 ) جديد
                    @elseif($product->ads_type == 1)  مستعمل
                  @endif
             </span>
                <a class="view-product" href="{{ Url('site/show_product/'.$product->id) }}"></a>
                <div class="position-relative">
                  @if($product->Images->count())
                  <img src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$product->Images->first()->image}}" alt="...">
                  @endif
                  <div class="overlay-product-item">

                    <a href="{{ Url('site/show_product/'.$product->id) }}"><i class="bi bi-arrow-left"></i></a>
                    <a href="{{ url('site\addfav/' .$product->id ) }}" class="add-to-fav">
                      @if(\App\Models\Foverite::where('user_id',Auth()->user()->id)->where('ads_id',$product->id)->count())
                      <i class="bi bi-heart-fill"> </i>
                      @else
                      <i class="bi bi-heart"> </i>
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
                </div>
                <div class="card-footer">
                 <span class="product-price"><span>{{ $product->price }}</span> ريال </span>
                </div>
                <a href="{{ Url('site/show_product/'.$product->id) }}" class="btn add-to-cart">عرض المنتج</a>
              </div>
            </div>
            @endforeach
            @else
                <span class="label label-danger">لا يوجد نتايج</span>
            @endif

          </div>

    </div>
  </section>

@stop
