<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>@yield('title','Chudats')</title>
<!-- Fav Icon -->
<link rel="icon" href="{{asset('front/assets/images/fav_icon.png')}}" type="image/x-icon">
<!-- Google Fonts -->
<link href="../css2?family=Manrope:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="../css2-1?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<!-- Stylesheets -->
<link href="{{asset('front/assets/css/font-awesome-all.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/flaticon.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/owl.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/jquery.fancybox.min.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/animate.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/nice-select.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/elpath.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/color/theme-color.css')}}" id="jssDefault" rel="stylesheet">
<link href="{{asset('front/assets/css/switcher-style.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/rtl.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/style.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/banner.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/feature.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/about.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/service.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/calculator.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/video.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/funfact.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/apps.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/testimonial.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/news.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/subscribe.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/responsive.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/faq.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/process.css')}}" rel="stylesheet">
<link href="{{asset('front/assets/css/module-css/page-title.css')}}" rel="stylesheet">
{{-- toastr css --}}
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
       
<!-- sweetalert css-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

<!-- contact number 10 digit only type css-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
</head>

<style>     
span.select2.select2-container.select2-container--default {
    width: 100% !important;
}

</style>
<!-- page wrapper -->
<body>

    <div class="boxed_wrapper ltr">


        <!-- preloader -->
        <div class="loader-wrap">
            <div class="preloader">
                <div class="preloader-close">close</div>
                <div id="handle-preloader" class="handle-preloader">
                    <div class="animation-preloader">
                        <!-- <div class="spinner"></div> -->
                        <div class="txt-loading">
                            <span data-text-preloader="h" class="letters-loading">
                               h
                            </span>
                            <span data-text-preloader="e" class="letters-loading">
                                e
                            </span>
                            <span data-text-preloader="a" class="letters-loading">
                                a
                            </span>
                            <span data-text-preloader="l" class="letters-loading">
                               l
                            </span>
                            <span data-text-preloader=" " class="letters-loading">
                                
                            </span>
                            <span data-text-preloader="c" class="letters-loading">
                               c
                            </span>
                            <span data-text-preloader="o" class="letters-loading">
                                o
                            </span>
                            <span data-text-preloader="i" class="letters-loading">
                                i
                            </span>
                            <span data-text-preloader="n" class="letters-loading">
                                n
                            </span>
                            <span data-text-preloader="s" class="letters-loading">
                                s
                            </span>
                           
                            
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        <!-- preloader end -->

        <!-- main header -->
        @include('front.layouts.include.header')
        <!-- main-header end -->


        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>
            
            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html"><img src="{{asset('front/assets/images/logo.png')}}" alt="" title=""></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <div class="contact-info">
                    <!-- <h4>Contact Info</h4> -->
                    <!-- <ul>
                        <li>Chicago 12, Melborne City, USA</li>
                        <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                        <li><a href="mailto:info@example.com">info@example.com</a></li>
                    </ul> -->
                </div>
                <div class="social-links">
                    <!-- <ul class="clearfix">
                        <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
                    </ul> -->
                </div>
            </nav>
        </div><!-- End Mobile Menu -->


        @yield('content')


        <!-- main-footer -->
        @include('front.layouts.include.footer')
        <!-- main-footer end-->



        <!--Scroll to top-->
        <div class="scroll-to-top">
            <div>
                <div class="scroll-top-inner">
                    <div class="scroll-bar">
                        <div class="bar-inner"></div>
                    </div>
                    <div class="scroll-bar-text">Go To Top</div>
                </div>
            </div>
        </div>
        <!-- Scroll to top end -->
        
    </div>


    <!-- jequery plugins -->
    <script src="{{asset('front/assets/js/jquery.js')}}"></script>
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front/assets/js/owl.js')}}"></script>
    <script src="{{asset('front/assets/js/wow.js')}}"></script>
    <script src="{{asset('front/assets/js/validation.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('front/assets/js/appear.js')}}"></script>
    <script src="{{asset('front/assets/js/isotope.js')}}"></script>
    <script src="{{asset('front/assets/js/parallax-scroll.js')}}"></script>
    <script src="{{asset('front/assets/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('front/assets/js/jQuery.style.switcher.min.js')}}"></script>
    <script src="{{asset('front/assets/js/emi-calculator.js')}}"></script>
    <script src="{{asset('front/assets/js/script.js')}}"></script>
    <!-- main-js -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" ></script> 

    {{-- toastr js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- sweetalert jsss-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>


    <!-- contact number 10 digit only type js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/intlTelInput.js"></script>
    <!-- contact number 10 digit only type js-->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous"></script>

    <script>
         $("#phone1").intlTelInput({
          initialCountry: "in",
          separateDialCode: true,
          // preferredCountries: ["ae", "in"],
          onlyCountries: ["in"],
          geoIpLookup: function (callback) {
              $.get('https://ipinfo.io', function () {
              }, "jsonp").always(function (resp) {
                  var countryCode = (resp && resp.country) ? resp.country : "";
                  callback(countryCode);
              });
          },
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/js/utils.js"
      });

      /* ADD A MASK IN PHONE1 INPUT (when document ready and when changing flag) FOR A BETTER USER EXPERIENCE */

      var mask1 = $("#phone1").attr('placeholder').replace(/[0-9]/g, 0);

      $(document).ready(function () {
          $('#phone1').mask(mask1)
      });


      $("#phone1").on("countrychange", function (e, countryData) {
          $("#phone1").val('');
          var mask1 = $("#phone1").attr('placeholder').replace(/[0-9]/g, 0);
          $('#phone1').mask(mask1);
          $('#code').val($("#phone1").intlTelInput("getSelectedCountryData").dialCode);
          $('#iso').val($("#phone1").intlTelInput("getSelectedCountryData").iso2);
      });
    </script>
    @stack('customjs')

</body><!-- End of .page_wrapper -->
</html>
