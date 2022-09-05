@extends('site/layouts/main')
@section('content')


<!------------- breadcrumb -------------->
<section class="border-bottom">
  <div class="container">
    <div class="d-flex mt-4 breadcrumb">
        <a href="{{ url('/') }}" class="text-muted"> الرئيسية</a>
        <i class="bi bi-chevron-left mx-2"></i>
        <h6>الملف الشخصي</h6>
    </div>
  </div>
</section>

<!------------- profile -------------->
<section class="profile py-5">
  <div class="container">
          <!-- profile nav-sm -->
          <div class="profile-nav-sm rounded-3">
            <img src="images/Group 67653.png" class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" alt="">
            <!-- nav-items -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
              <div class="offcanvas-header">
                <!-- title -->
                <h5 id="offcanvasRightLabel">الملف الشخصي</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <!-- المعلومات الشخصية -->
                  <button class="nav-link active" id="v-pills-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-info" type="button" role="tab" aria-controls="v-pills-info" aria-selected="true">المعلومات الشخصيه
                      <i class="bi bi-person"></i>
                  </button>

              </div>
              <!--profile log out button -->
                  <form action="{{route('logout')}}" method="post" >
                      @csrf
                      <div class="d-grid gap-2">
                           <button class="log-out btn btn-primary mt-1" type="submit">تسجيل الخروج
                           </button>
                      </div>
                  </form>
              </div>
            </div>
          </div>
      <div class="row d-flex justify-content-between align-items-start">
          <!-- profile nav-lg col -->
          <div class="profile-nav col col-md-5 col-lg-3">
              <!-- profile title -->
              <div class="personal-title rounded-3 text-center">
                  الملف الشخصي
              </div>
              <!-- profile nav -->
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <!-- المعلومات الشخصية -->
                  <button class="nav-link active" id="v-pills-info-tab" data-bs-toggle="pill" data-bs-target="#v-pills-info" type="button" role="tab" aria-controls="v-pills-info" aria-selected="true">المعلومات الشخصيه
                      <i class="bi bi-person"></i>
                  </button>

                  <!-- المفضلة -->
                  <button class="nav-link" id="v-pills-fav-tab" data-bs-toggle="pill" data-bs-target="#v-pills-fav" type="button" role="tab" aria-controls="v-pills-fav" aria-selected="false">المفضلة
                      <i class="bi bi-heart"></i>
                  </button>
              </div>
              <!--profile log out button -->
              <form action="{{route('logout')}}" method="post" >
                      @csrf
                      <div class="d-grid gap-2">
                           <button class="log-out btn btn-primary mt-1" type="submit">تسجيل الخروج
                           </button>
                      </div>
              </form>
          </div>

          <!-- profile data col -->
          <div class="profile-data col col-md-7 col-lg-9">
              <div class="tab-content" id="v-pills-tabContent">
                  <!-- المعلومات الشخصية -->
                  <div class="tab-pane fade show active" id="v-pills-info" role="tabpanel" aria-labelledby="v-pills-info-tab">
                   <form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data">

                        @csrf
                         @method('PUT')


                        <input type="hidden" value="$user->id">
                        <!-- profile-picture -->
                        <div class="profile-pic position-relative bg-light">
                            @if($user->image)
                          <img class="w-100 h-100" src="{{asset('public/'.$user->image)}}" alt="" id="photo">
                          @else
                          <img class="w-100 h-100" src="{{asset('public/site/images/avatar.png')}}" alt="" id="photo">
                          @endif
                          <div class="profile-pic-icon">
                              <i class="bi bi-camera-fill"></i>
                          </div>
                          <input type="file" id="file" name="image" accept="image/*">
                           @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row gy-3">
                            <!-- الاسم -->
                            <div class="col-12 col-lg-6">
                                <p>الاسم</p>
                                <div class="position-relative">
                                  <input class="personal-profile-data" name="username" value="{{$user->username}}"  type="text">
                                  <i class="bi bi-pencil-fill"></i>
                                </div>
                                @error('username')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- البريد الالكتروني -->
                            <div class="col-12 col-lg-6">
                                <p>البريد الالكتروني</p>
                                <div class="position-relative">
                                  <input class="personal-profile-data" name="email"  value="{{$user->email}}" type="email">
                                  <i class="bi bi-pencil-fill"></i>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- رقم الجوال -->
                            <div class="col-12 col-lg-6">
                                <p>رقم الجوال</p>
                                <div class="position-relative">
                                  <input class="personal-profile-data" name="phone"  value="{{$user->phone ?? ' '}}" type="text">
                                  <i class="bi bi-pencil-fill"></i>
                                </div>
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <!-- الرقم السري -->
                            <div class="col-12 col-lg-6">
                                <p>الرقم السري</p>
                                <div class="position-relative">
                                  <input class="personal-profile-data" name="password" type="password">
                                  <i class="bi bi-pencil-fill"></i>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn personal-profile-data rounded mt-5">حفظ</button>

                    </form>
                  </div>


                  <!-- المفضلة -->
                  <div class="tab-pane fade" id="v-pills-fav" role="tabpanel" aria-labelledby="v-pills-fav-tab">
                    <!-- products section -->
                    <section class="products">
                      <div class="row gy-3">
                        @php $count = 1; @endphp
                        @foreach($products as $product )
                          <div class="col-lg-4 col-md-6 col-sm-6"   data-aos="fade-up"  data-aos-easing="linear" data-aos-duration="500" >
                            <div class="card product-item mb-3" >
                              <span class="new-padge">
                                @if($product->ads_type == 0 ) جديد
                                  @elseif($product->ads_type == 1)  مستعمل
                                @endif
                           </span>
                              <a class="view-product" href="{{ Url('site/show_product/'.$product->id) }}"></a>
                              <div class="position-relative">

                                @if($product->Ads->Images->count())
                                <img src="{{url('/')}}/public/adminPanel/admin/uploads/ads/{{$product->Ads->Images->first()->image}}" alt="...">
                                @endif
                                <div class="overlay-product-item">

                                    <a href="{{ Url('site/show_product/'.$product->id) }}"><i class="bi bi-arrow-left"></i></a>
                                  
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="product-title-rating">
                                  <h5 class="card-title">
                                    @if( App::getLocale() == 'en')
                                    {{ $product->Ads->name_en}}
                                    @elseif( App::getLocale() == 'ar')
                                    {{ $product->Ads->name_ar}}
                                    @endif
                                  </h5>
                                  <span class="product-rating"><i class="bi bi-star-fill"></i> 5</span>
                                </div>
                                <p class="card-text product-info">
                                  @if( App::getLocale() == 'en')
                                  {{mb_substr(strip_tags($product->Ads->description_en),0,200)}}
                                  @elseif( App::getLocale() == 'ar')
                                  {{mb_substr(strip_tags($product->Ads->description_ar),0,200)}}
                                  @endif
                                </p>
                              </div>
                              <div class="card-footer">
                               <span class="product-price"><span>{{ $product->Ads->price}}</span> ريال </span>
                              </div>
                              <a href="{{ Url('site/show_product/'.$product->Ads->id) }}" class="btn add-to-cart">عرض المنتج</a>


                            </div>
                          </div>
                          @php $count ++; @endphp
                          @endforeach


                      </div>
                    </section>
                    <!-- products section ends -->
                  </div>
                </div>
          </div>

      </div>
  </div>
</section>
@push('js')
<script>
const photo = document.querySelector('#photo');
const fileUpl = document.querySelector('#file');

fileUpl.addEventListener('change', function(){
  const choosedFile = this.files[0];
  if (choosedFile) {
    //   console.log('cvbnm,');
      const reader = new FileReader(); 
      reader.addEventListener('load', function(){
          photo.setAttribute('src', reader.result);
      });
      reader.readAsDataURL(choosedFile);
  }
});
</script>
@endpush
@stop
