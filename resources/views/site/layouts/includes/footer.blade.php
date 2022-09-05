<?php $about_us   = App\Models\About_Us::find(1); ?>
<?php $setting   = App\Models\Setting::find(1); ?>
<?php $locale = App::getLocale(); ?>
<!------------- map -------------->
<section class="google-map">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0717709408755!2d48.47961528494304!3d27.467024882892087!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3e5c7b5c02fa1255!2zMjfCsDI4JzAxLjMiTiA0OMKwMjgnMzguNyJF!5e0!3m2!1sar!2seg!4v1656230264783!5m2!1sar!2seg" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<!------------- footer -------------->
<footer>
  <div class="py-3">
      <div class="row row-cols-sm-2 gy-3 align-items-center justify-content-center text-center">
              <!--  logo -->
              <div class="col-auto">
                  <div class="d-flex align-items-center justify-content-center">
                      <img class="mx-2" src="{{ Url('') }}/public/site/images/Group 67645.svg" alt="logo-garallah">
                      <h4 class="">الجار الله</h4>
                  </div>
              </div>
              <!-- tabs -->
              <div class="col-12 col-lg-7">
              <div class="row gx-1">
                <ul>
                    <div class="col col-sm-auto">
                        <li><a href="{{ url('site/conditions') }}">الشروط والأحكام</a></li>
                    </div>
                    <div class="col col-sm-auto">
                        <li><a href="{{ url('site/privacy_policy') }}">سياسيات الخصوصية</a></li>
                    </div>
                    <div class="col col-sm-auto">
                        <li><a href="{{ url('site/products')}}">المتجر</a></li>
                    </div>
                    <div class="col col-sm-auto">
                        <li><a href="{{ url('site/contact')}}">تواصل معنا</a></li>
                    </div>
                </ul>
              </div>
          </div>
              <!-- social -->
              <div class="col col-sm-6 col-md-3 col-lg-2">
                <div class="social">
                <div>
                  <a href="{{ $setting->link_instagram}}"><i class="bi bi-instagram"></i></a>
                </div>

                <div>
                  <a href="{{ $setting->link_facebook}}"><i class="bi bi-facebook"></i></a>
                </div>

              <div>
                <a href="tel:+{{ $setting->mobile}}"><i class="bi bi-telephone-fill"></i></a>
              </div>

              </div>
              </div>
          </div>
  </div>
  <!-- nested footer -->
  <div class="sub-footer">
      <p class="text-center mb-0">
        جميع الحقوق محفوظه لموقع
         <a href="https://smartvision4p.com" target="_blank">
            <span class="text-white">سمارت فيجن لتصميم المواقع والتطبيقات<span class="me-2"> | </span></span>
            <img src="https://cyclo-bikes.com/style/images/dev.svg" alt="">
         </a>
      </p>
  </div>
</footer>

<!-- --- sign in & up modal ---- -->

<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light p-0">
        <div class="modal-title w-100" id="exampleModalLabel">
          <ul class="nav nav-pills " id="pills-tab" role="tablist">
            <li class="nav-item w-50" role="presentation">
              <button class="nav-link" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register" type="button" role="tab" aria-controls="pills-register" aria-selected="true">إنشاء حساب</button>
            </li>
            <li class="nav-item w-50" role="presentation">
              <button class="nav-link active" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab" aria-controls="pills-login" aria-selected="false">تسجيل دخول</button>
            </li>
          </ul>

        </div>

      </div>
      <div class="modal-body">
        <div class="tab-content px-3" id="pills-tabContent">
          <!-- register -->
          <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="pills-register-tab">

              {!!Form::open(array(
                'url'=>'site/register',
                'role'=>'POST',
                'class' => 'form-login py-5',
                'files'=>'true'
              ))!!}
              <div class="row gy-3">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for="">إسم المستخدم</label>
                  <input class="form-input-login" type="text" name="username">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for="">البريد الالكتروني</label>
                  <input class="form-input-login" type="email" name="email">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for="">كلمة المرور</label>
                  <input class="form-input-login" name="password" type="password">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for=""> تأكيد كلمة المرور</label>
                  <input class="form-input-login" name="repassword" type="password">
                </div>
              </div>
            <button class="btn d-block m-auto form-login-btn mt-4" type="submit">تسجيل الدخول</button>
            </form>
          </div>
          <!-- login -->
          <div class="tab-pane fade  show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
            <!-- login -->

            <form action="{{url('site/login')}}" method="post" id="login" class="form-login py-5">
                @csrf
              <div class="row gy-3">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for="">البريد الالكتروني</label>
                  <input class="form-input-login" name="email" type="email">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for="">كلمة المرور</label>
                  <input class="form-input-login" name="password" type="password">
                  <!-- <span class="forgot-pass" id="forgotPassBtn"><a role="button">هل نسيت كلمة المرور ؟</a></span> -->
                </div>
              </div>
              <button type="submit" class="btn d-block m-auto form-login-btn rounded mt-4">تسجيل</button>
            </form>

            <!-- forgot pass -->

            <!-- your current email -->
            <form action="" id="currentEmail" class="form-login d-none py-5">
              <div class="row gy-3 justify-content-center">
                <div class="col-6 text-center">
                  <label for="">أدخل بريدك الإلكتروني الذي قمت التسجيل به</label>
                  <input class="form-input-login my-4" type="email">
                </div>
              </div>
              <button type="button" id="sendCurrentEmail" class="btn d-block m-auto form-login-btn rounded mt-3">ارسال</button>
            </form>

            <!-- verification code -->

            <div  id="verifyCode" class="d-none">
              <div id="wrapper" >
                <div id="dialog">
                  <span>أدخل رمز التحقق المرسل على بريدك الإلكتروني</span>
                  <form id="varification-code">
                    <div class="d-flex">
                      <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                      <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                      <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                      <input type="text" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
                    </div>
                    <button id="sendVerifyCode" class="btn btn-primary btn-embossed">ارسال</button>
                  </form>
                </div>
              </div>
            </div>

            <!-- reset pass -->

            <form action="" id="resetPass" class="form-login d-none py-5">
              <p class="mb-5 fs-5">انشاء كلمة مرور جديدة</p>
              <div class="row gy-3">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for="">كلمة المرور</label>
                  <input class="form-input-login" type="email">
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                  <label for=""> تأكيد كلمة المرور</label>
                  <input class="form-input-login" type="password">
                </div>
              </div>
              <button type="button" id="sendNewPass" class="btn d-block m-auto form-login-btn rounded mt-5">ارسال</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- --- sign in & up modal ---- -->





<!-- jQuery script -->
<script src="{{ Url('') }}/public/site/js/jquery-3.6.0.min.js"></script>

<!-- lottie -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

<!-- popper script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" integrity="sha512-8cU710tp3iH9RniUh6fq5zJsGnjLzOWLWdZqBMLtqaoZUA6AWIE34lwMB3ipUNiTBP5jEZKY95SfbNnQ8cCKvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- owl-carousel script -->
<script src="{{ Url('') }}/public/site/js/owl.carousel.min.js"></script>

<!-- bootstrap script -->
<script src="{{ Url('') }}/public/site/js/bootstrap.min.js"></script>

<!-- rateyo script -->
<script src="{{ Url('') }}/public/site/js/jquery.rateyo.min.js"></script>

<!-- nice select script -->
<script src="{{ Url('') }}/public/site/js/jquery.nice-select.min.js"></script>

<!-- aos script -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>

<!-- typed js script -->
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>

<!-- custom js file link  -->
<script src="{{ Url('') }}/public/site/js/script.js"></script>
@stack('js')
{!! Html::script('public/toastr/toastr.min.js') !!}

@if(Session::has('flash_message'))
<script type="text/javascript">
    Command: toastr["success"]("{{ Session::get('flash_message') }}")
</script>
@elseif(Session::has('error_flash_message'))
<script type="text/javascript">
    Command: toastr["error"]("{{ Session::get('error_flash_message') }}")
</script>
@elseif(Session::has('info_flash_message'))
<script type="text/javascript">
    Command: toastr["info"]("{{ Session::get('info_flash_message') }}")
</script>
@endif
