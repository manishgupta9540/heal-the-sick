@extends('front.layouts.master')

@section('title','Chudats')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<style>
    .col-md-4 {
        flex: 0 0 auto;
        width: 33.33333333%;
    }

    .table td,
    .table th {
        font-size: 14px;
        vertical-align: middle;
        padding: 0.75rem 1.25rem;
    }

    .table th {
        font-size: 12px;
        vertical-align: middle;
        padding: 0.75rem 1.25rem;
    }
    .form-control:focus {
        color: #212529;
        background-color: #fff;
        border-color: #86b7fe;
        outline: 0;
        box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 0%);
    }

    span.show-hide-password {
        position: relative;
        bottom: 31px !important;
        right: -225px;
        font-size: 16px;
        color: #748a9c;
        cursor: pointer;
        z-index: 6;
    }
    .select2-container--default .select2-search--dropdown .select2-search__field {
        display: none;
    }
   
</style>
<!-- page-title -->
<section class="page-title centred">
    <div class="bg-layer" style="background-image: url({{asset('front/assets/images/background/banner-3.png')}});">
    </div>
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('front/assets/images/shape/shape-18.png')}});">
        </div>
        <div class="pattern-2" style="background-image: url({{asset('front/assets/images/shape/shape-1.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Sign Up </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">Home</a></li>
                <li>Sign Up</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->


<!-- about-section -->
<section class="about-section pt_120 pb_120">
    <div class="pattern-layer rotate-me"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 content-column">
                <div class="content_block_one">
                    <div class="content-box ml_40">
                        <div class="inner-box mb_45">
                            <div class="row">
                                <form action="{{ route('user-register') }}" method="post" id="userfrm">
                                    @csrf
                                    <div class="col-md-6 mx-auto border shadow rounded p-5">
                                        <div class="sec-title mb_20 text-center"><h3>Sign Up</h3></div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="">First Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                                <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-first_name"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="">Last Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                                <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-last_name"></p>
                                            </div>
                                        </div>
                                       
                                        <label for="" class="mt-3">Email <span class="text-danger">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                                        <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-email"></p>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="mt-3">Mobile Number <span class="text-danger">*</span></label>
                                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Your Phone">
                                                <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-phone"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="mt-3">Country <span class="text-danger">*</span></label>
                                                    <select name="country_id" class="form-control country">
                                                        @foreach ($cuntry_list as $country)
                                                            <option value="{{ $country['id']}}">{{ $country['name'] }}</option>
                                                        @endforeach
                                                    </select>
                                                <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-country"></p>
                                            </div>
                                        </div>
                                       
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="" class="mt-3">Password <span class="text-danger">*</span></label>
                                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your password">
                                                <span class="show-hide-password js-show-hide has-show-hide"><i class="bi bi-eye-slash"></i></span>
                                                <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-password"></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="" class="mt-3">Confirm Password <span class="text-danger">*</span></label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Your Confirm Password">
                                                <span class="show-hide-password js-show-hide has-show-hide"><i class="bi bi-eye-slash"></i></span>
                                                <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-confirm_password"></p>
                                            </div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="d-flex align-items-baseline ">
                                                <input type="checkbox" name="checkbox" id="checkbox_id1" class="mr-2" checked="" required="">
                                                <label for="checkbox_id1" style="margin-left: 10px;"> Subscribe to our application.</label>
                                            </div>
                                            <div class="d-flex align-items-baseline ">
                                                <input type="checkbox" name="checkbox" id="checkbox_id" class="mr-2">
                                                <label for="checkbox_id" style="margin-left: 10px;"> I agree to the <a href="#">Terms and Condition</a> and <a href="#">Privacy and Policy</a>.</label>
                                            </div>
                                            <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-checkbox"></p>
                                        </div>
                                       

                                        <div class="text-center my-4">
                                            <button type="submit" class="btn btn-dark btn-sm py-2 px-4 submit" id="submitButton" disabled>Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                           
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about-section end -->

<!-- apps-section -->
<section class="apps-section about-page pb_120">
    <div class="light-icon" style="background-image: url({{asset('front/assets/images/icons/icon-4.png')}});"></div>
    <div class="auto-container">
        <div class="inner-container">
            <div class="shape">
                <div class="shape-1" style="background-image: url({{asset('front/assets/images/shape/shape-4.png')}});">
                </div>
                <div class="shape-2" style="background-image: url({{asset('front/assets/images/shape/shape-3.png')}});">
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image image-1"><img src="{{asset('front/assets/images/resource/mockup-1.png')}}"
                                alt=""></figure>
                        <figure class="image image-2"><img src="{{asset('front/assets/images/resource/mockup-2.png')}}"
                                alt=""></figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title mb_20">
                            <h6>Lorem, ipsum.</h6>
                            <h2>Lorem ipsum dolor sit amet consectetur adipisicing.</h2>
                        </div>
                        <div class="text-box mb_50">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat eaque illo architecto
                                nihil nulla itaque sit sapiente eius autem consectetur!</p>
                        </div>
                        <div class="btn-box">
                            <a href="index.html" class="play-store mr_20">
                                <img src="{{asset('front/assets/images/icons/icon-2.png')}}" alt="">
                                <span>get it on</span>
                                Google Play
                            </a>
                            <a href="index.html" class="play-store">
                                <img src="{{asset('front/assets/images/icons/icon-3.png')}}" alt="">
                                <span>Download on the</span>
                                App Store
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- apps-section end -->


<!-- testimonial-style-two -->
{{-- <section class="testimonial-style-two pt_120 pb_120">
    <div class="bg-layer" style="background-image: url({{asset('front/assets/images/background/Coin-31.png')}});">
</div>
<div class="auto-container">
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12 col-sm-12 title-column">
            <div class="sec-title mr_70">
                <h6>Testimonials</h6>
                <h2>Lorem ipsum dolor sit.</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita, deserunt doloremque?</p>
            </div>
        </div>
        <div class="col-lg-8 col-md-12 col-sm-12 content-column">
            <div class="two-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
                @if (count($testimonial)>0)
                @foreach ($testimonial as $item)
                <div class="testimonial-block-two">
                    <div class="inner-box">
                        <div class="author-box">
                            <figure class="thumb-box">
                                <img src="{{asset('uploads/testimonial/'.$item->image)}}" alt="">
                            </figure>
                            <h4>{{$item->name ?? "" }}</h4>
                            <span class="designation">{{ $item->designation ?? "" }}</span>
                        </div>
                        <ul class="rating mb_15 clearfix">
                            <li><i class="icon-9"></i></li>
                            <li><i class="icon-9"></i></li>
                            <li><i class="icon-9"></i></li>
                            <li><i class="icon-9"></i></li>
                            <li><i class="icon-9"></i></li>
                        </ul>
                        <p>{!! $item->description ?? "" !!}</p>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
</section> --}}

<!-- testimonial-style-two end -->

@endsection


@push('customjs')
<script>
    $(".country").select2();
    $(document).ready(function () {

        document.getElementById('checkbox_id').addEventListener('change', function() {
            const submitButton = document.getElementById('submitButton');
            submitButton.disabled = !this.checked;
        });

        $(document).on('submit', 'form#userfrm', function (event) {
            event.preventDefault();
            //clearing the error msg
            $('p.error_container').html("");
            
            var form = $(this);
            var data = new FormData($(this)[0]);
            var url = form.attr("action");
            var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
            $('.submit').attr('disabled',true);
            $('.form-control').attr('readonly',true);
            $('.form-control').addClass('disabled-link');
            $('.error-control').addClass('disabled-link');
            if ($('.submit').html() !== loadingText) {
                $('.submit').html(loadingText);
            }

            $.ajax({
                type: form.attr('method'),
                url: url,
                data: data,
                cache: false,
                contentType: false,
                processData: false,      
                success: function (response) {
                    window.setTimeout(function(){
                        $('.submit').attr('disabled',false);
                        $('.form-control').attr('readonly',false);
                        $('.form-control').removeClass('disabled-link');
                        $('.error-control').removeClass('disabled-link');
                        $('.submit').html('Submit');
                    },2000);
                    console.log(response);
                    if(response.success==true) {   
                        toastr.success(response.message);
                        window.setTimeout(function() {
                            //window.location.href = "{{URL::to('sign-up')}}"
                            //window.location.reload();
                            $("#userfrm")[0].reset();
                        }, 2000);
                    }
                    //show the form validates error
                    if(response.success==false ) {                              
                        for (control in response.errors) {  
                            var error_text = control.replace('.',"_");
                            $('#error-'+error_text).html(response.errors[control]);
                        }
                    }
                },
                error: function (response) {
                    // alert("Error: " + errorThrown);
                    console.log(response);
                }
            });
            event.stopImmediatePropagation();
            return false;
        });

        //password text hide and show
        $(document).on('click','.js-show-hide',function (e) {
            e.preventDefault();
            var _this = $(this);

            if (_this.hasClass('has-show-hide'))
            {
                _this.parent().find('input').attr('type','text');
                _this.html('<i class="fa fa-eye" aria-hidden="true"></i>');
                _this.removeClass('has-show-hide');
            }
            else
            {
                _this.addClass('has-show-hide');
                _this.parent().find('input').attr('type','password');
                _this.html('<i class="bi bi-eye-slash"></i>');
            }
        });
    });
</script>
@endpush