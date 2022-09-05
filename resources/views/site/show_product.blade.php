@extends('site/layouts/main')
@section('content')
<!------------- breadcrumb  -------------->
<section class="border-bottom">
    <div class="container">
      <div class="d-flex mt-4 breadcrumb">
          <a href="index.html" class="text-muted"> الرئيسية </a>
          <i class="bi bi-chevron-left mx-2"></i>
          <h6>تفاصيل المنتج</h6>
      </div>
    </div>
  </section>

<!------------- breadcrumb end -------------->


<div class="container product-details py-5">
    <div class="row align-items-center">
        <div class="col-12 col-md-5">
            <div class="single-img">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme one">
                          @foreach($product->Images as $img)
                            <div class="item-box">
                                <img src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$img->image}}" alt="">
                            </div>
                          @endforeach
                        </div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme two">
                          @foreach($product->Images as $img)
                            <div class="item">
                                <img src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$img->image}}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div class="left-t nonl-t">
                            <i class="bi bi-chevron-left"></i>
                        </div>
                        <div class="right-t">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="cart-product-item bg-transparent">
                <div class="col-12">
                    <div class="cart-product-name d-flex justify-content-between align-items-center mb-3">
                      <h6>
                    @if( App::getLocale() == 'en')
                      {{ $product->name_en}}
                      @elseif( App::getLocale() == 'ar')
                      {{ $product->name_ar}}
                    @endif</h6>
                      <div class="d-flex justify-content-between align-items-center">
              
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
                      </div>
                    </div>

                    <div class="views row align-items-center mb-2">
                      <div class="d-flex align-items-center my-3">
                        <lottie-player src="https://assets7.lottiefiles.com/datafiles/HExuituxmQTR0Yj/data.json" background="transparent"  speed="1.5"  style="width: 30px; height: 30px;" loop  autoplay></lottie-player>
                        <span class="mx-2"> عدد مشاهدات المنتج : </span>
                        <span  style="color: #FB2B00;">2000 مشاهده</span>
                      </div>
                    </div>

                    <div id="rateYo" class="mb-3" rateYo="3"></div>
                    <p class="product-preview">
                      @if( App::getLocale() == 'en')
                      {{(strip_tags($product->description_en))}}
                      @elseif( App::getLocale() == 'ar')
                      {{(strip_tags($product->description_ar))}}
                      @endif
                    </p>
                    <ul>
                        <li>
                            <span>نوع السياره : </span>
                            <span>
                              @if( App::getLocale() == 'en')
                                {{ $product->Car_Type->name_en}}
                                @elseif( App::getLocale() == 'ar')
                                {{ $product->Car_Type->name_ar}}
                              @endif
                            </span>
                        </li>

                        <li>
                            <span>رقم القطعة : </span>
                            <span>
                            {{$product->piece_number}}
                            </span>
                        </li>

                        <li>
                            <span>موديل السياره : </span>
                            <span> {{$product->car_model}} </span>
                        </li>

                        <li>
                            <span class="full-price px-2 px-md-3">{{$product->price}} ريال</span>
                        </li>
                    </ul>

                  </div>
              </div>
        </div>
    </div>
</div>

<div class="container description-comments">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

        <li class="nav-item" role="presentation">
          <button class="nav-link active mb-2" id="comments-tab" data-bs-toggle="pill" data-bs-target="#comments" type="button" role="tab" aria-controls="comments" aria-selected="false">التعليقات</button>
        </li>

      </ul>
    <div class="tab-content" id="pills-tabContent">

        @if($commentCount > 0)
        <div class="tab-pane fade active show" id="comments" role="tabpanel" aria-labelledby="comments-tab">
            <div class="row">
                <div class="col-md-4 col-12 flex-md-column align-items-md-start d-flex align-items-center  mb-4 mb-md-0">
                    <div class="col-7 col-md-12">
                        <div class="rate-percentage d-flex align-items-center">
                            <i class="bi bi-star-fill text-warning"></i>
                            <span class="mx-2">1</span>
                            <div class="progress w-100" style="height: 3px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $progresseData['1'] }}%;" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="rate-percentage d-flex align-items-center">
                            <i class="bi bi-star-fill text-warning"></i>
                            <span class="mx-2">2</span>
                            <div class="progress w-100" style="height: 3px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $progresseData['2'] }}%;" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="rate-percentage d-flex align-items-center">
                            <i class="bi bi-star-fill text-warning"></i>
                            <span class="mx-2">3</span>
                            <div class="progress w-100" style="height: 3px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $progresseData['3'] }}%;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="rate-percentage d-flex align-items-center">
                            <i class="bi bi-star-fill text-warning"></i>
                            <span class="mx-2">4</span>
                            <div class="progress w-100" style="height: 3px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $progresseData['4'] }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="rate-percentage d-flex align-items-center mb-0 mb-md-5">
                            <i class="bi bi-star-fill text-warning"></i>
                            <span class="mx-2">5</span>
                            <div class="progress w-100" style="height: 3px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $progresseData['5'] }}%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 col-md-12">
                        <div class="full-rate">
                            <span>{{ $av }}</span>
                            <div class="Stars" style="--rating:{{ $av}};"></div>
                            
                            <span>
                                <i class="bi bi-person"></i>
                                      عدد التقييمات {{$commentCount}}
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8 col-12 ">
                    <div class="user-comment-container">
                        @foreach($comments as $comment)
                        <div class="user-comment">
                            <div class="avatar">
                                @if($comment->User->image)
                                <img src="{{asset('public/'.$comment->User->image)}}" alt="">
                                @else
                                 <img src="{{asset('public/site/images/avatar.png')}}" alt="" id="photo">
                                @endif
                            </div>
                            <div class="comment-details">
                                <h6>{{$comment->User->username}}</h6>
                                <!--<div  class="mt-1 mb-2 px-0 user-rate" rateYo="{{$comment->rate}}"></div>-->
                                <div class="Stars" style="--rating:{{$comment->rate}};"></div>
                                <p>{{$comment->msg}}</p>
                            </div>
                        </div>
                        @endforeach
    
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    
        <div class="your-comment">
            @if (Auth::guest())
                <button type="button" data-bs-toggle="modal" data-bs-target="#login-modal" class="mt-4 w-auto m-auto"> لكتابة تعليق يرجى تسجيل الدخول اولا </button>
            @else
            <div class="d-flex align-items-center mb-2 ">
                <span>اختر تقييمك</span>
                <div id="your-rate" class="mb-1 px-2" rateYo="5"></div>
            </div>
            <form action="{{route('comment.store',$product->id)}}" method="post">
                    <input name="rate" id="hide_rate" value='0' hidden type="text">
                <!--<textarea name="comment" rows="5"></textarea>-->
                        @csrf
                      <div class="row">
                        <div class="col-12 mb-3">
                          <textarea name="msg" rows="5" required></textarea>
                        </div>
                      </div>
                      <button type="submit">اضافة تعليق</button>
                </form>
            @endif
        </div>
    </div>
</div>
<section class="container most-wanted">
    <div class="most-wanted-headline">
      <h5>منتجات مقترحة</h5>
    </div>
    <div class="most-wanted-slider py-5">
      <div class="owl-carousel">
          @foreach($related_products as $rel)
          
          <div class="card product-item mb-3">
            <div class="position-relative">
              @if($rel->Images->count())
                  <img src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$rel->Images->first()->image}}" alt="...">
                  @endif
              <div class="overlay-product-item">
                <!--<button><i class="bi bi-box-arrow-up"></i></button>-->
                <a href=""><i class="bi bi-arrow-left"></i></a>
                <button data-product-id="{{$product->id}}"  class="add-to-fav addTofoverite"><i class="bi bi-heart"></i></button>
              </div>
            </div>
            <div class="card-body">
              <div class="product-title-rating">
                <h5 class="card-title">
                     @if( App::getLocale() == 'en')
                      {{ $rel->name_en}}
                      @elseif( App::getLocale() == 'ar')
                      {{ $rel->name_ar}}
                      @endif
                </h5>
                <span class="product-rating"><i class="bi bi-star-fill"></i> 5</span>
              </div>
              <p class="card-text product-info">
                   @if( App::getLocale() == 'en')
                    {{mb_substr(strip_tags($rel->description_en),0,200)}}
                    @elseif( App::getLocale() == 'ar')
                    {{mb_substr(strip_tags($rel->description_ar),0,200)}}
                    @endif
                    
                    </p>
              <span class="product-price"><span>{{ $rel->price}}</span>  </span>
            </div>
            <a href="{{ Url('site/show_product/'.$product->id) }}" class="btn add-to-cart">عرض المنتج</a>
          </div>
          
          @endforeach



          </div>
      </div>
    </div>
  </section>

@stop
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
