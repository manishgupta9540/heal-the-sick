@extends('front.layouts.master')

@section('title','Chudats')

@section('content')

<!-- banner-section -->
<section class="banner-section p_relative">
    <div class="banner-carousel owl-theme owl-carousel owl-dots-none">
        @if(count($banners)> 0)
            @foreach ($banners as $item)
                <div class="slide-item p_relative">
                    <div class="bg-layer" style="background-image: url({{asset('uploads/banner/'.$item->banner_image)}});"></div>
                    <div class="pattern-layer">
                        <div class="pattern-1" style="background-image: url({{asset('front/assets/images/shape/shape-1.png')}});"></div>
                        <div class="pattern-2" style="background-image: url({{asset('front/assets/images/shape/shape-2.png')}});"></div>
                    </div>
                    <div class="auto-container">
                        <div class="content-box">
                            <h2>{{ ucfirst($item->title ?? "")}}</h2>
                            <p>{!! ucfirst($item->description ?? "") !!}</p>
                            <div class="btn-box">
                                <a href="#" class="theme-btn btn-one">Make an Appointment</a>
                            </div>
                        </div> 
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</section>
<!-- banner-section end -->

<!-- feature-section -->
<section class="feature-section">
    <div class="auto-container">
        <div class="inner-container clearfix wow fadeInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            @if (count($cards)>0)
                @foreach ($cards as $key => $item)
                    <div class="feature-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-{{$key+5}}"></i></div>
                            <h4><a href="#">{{ ucfirst($item->title ?? "")}}</a></h4>
                            <p>{!! ucfirst($item->description ?? "") !!}</p>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</section>
<!-- feature-section end -->


<!-- about-section -->
<section class="about-section pt_120 pb_120 bg-img">
    <div class="pattern-layer rotate-me"></div>
    <div class="auto-container">
        @if (count($aboutCoins) > 0)
            @foreach ($aboutCoins as  $about)
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                        <div class="image_block_one">
                            <div class="image-box pr_90 mr_40">
                                <div class="image-shape" style="background-image: url({{asset('front/assets/images/shape/shape-3.png')}});"></div>
                                <figure class="image">
                                    <img src="{{asset('uploads/coins/'.$about->image)}}" alt="">
                                </figure>
                                <div class="rating-box">
                                    <ul class="rating mb_5 clearfix">
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                        <li><i class="icon-9"></i></li>
                                    </ul>
                                    <h6>5 Star Rating Bank</h6>
                                </div>
                                <div class="experience-box">
                                    <div class="inner">
                                        <h2>40</h2>
                                        <h6>Years of Experiense</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_one">
                            <div class="content-box ">
                                <div class="sec-title mb_20">
                                    <h6>About the Coins</h6>
                                    <h2>{{ ucfirst($about->title ?? "") }}</h2>
                                </div>
                            
                                @if($about->coin_types!=NULL)
                                    @php
                                        $input_item_data = $about->coin_types;
                                        $input_item_data_array =  json_decode($input_item_data, true);
                                    @endphp

                                    @if($input_item_data_array != null)
                                        @foreach ($input_item_data_array as $key => $input)
                                            <?php 
                                                $key_val = array_keys($input);
                                                $input_val = array_values($input);
                                            ?>
                                            <div class="inner-box mb_45">
                                                <div class="single-item">
                                                    <div class="icon-box">
                                                        @if ($key==0)
                                                            <i class="icon-10"></i>
                                                        @else
                                                            <i class="icon-11"></i>
                                                        @endif
                                                    </div>
                                                    <h3>{{ ucfirst($key_val[0]) }}</h3>
                                                    <p>{{ ucfirst($input_val[0]) }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
<!-- about-section end -->
<section class="apps-section alternat-2 pt_120 pb_120">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('front/assets/images/shape/shape-3.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('front/assets/images/shape/shape-16.png')}});"></div>
    </div>
    
    <div class="auto-container">
        @if (count($cmsManages)>0)
            <div class="row clearfix">
                @foreach ($cmsManages as $manages)
                    <div class="col-xl-6 content-column">
                        <div class="content-box ml_50">
                            <div class="sec-title light mb_20">
                                <h2>{{ ucfirst($manages->title ?? "")}}</h2>
                            </div>
                            @if ($manages->title_points !=null)
                                    @php
                                        $input_item_data = $manages->title_points;
                                        $input_item_data_array =  json_decode($input_item_data, true);
                                     @endphp
                                @if($input_item_data_array != null) 
                                    @foreach ($input_item_data_array as $key => $input)
                                        <?php 
                                            $key_val = array_keys($input);
                                            $input_val = array_values($input);
                                        ?>
                                        <div class="text-box mb_50 text-white">
                                            <div class="single-item mt-3">
                                                <div class="d-flex align-items-center"> 
                                                    <div class="icon-box"><i class="icon-10 font-30"></i></div>
                                                    <h5 class="ms-2 text-white fst-normal"> &nbsp;{{ ucfirst($key_val[0])}}</h5>
                                                </div>
                                                    <p class="ms-5">{{ ucfirst($input_val[0])}}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section class="video-section centred" id="video">
    <div class="bg-layer parallax-bg" data-parallax="{&quot;y&quot;: 100}" style="transform:translate3d(0px, 100px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); -webkit-transform:translate3d(0px, 100px, 0px) rotateX(0deg) rotateY(0deg) rotateZ(0deg) scaleX(1) scaleY(1) scaleZ(1); background-image: url(https://www.shutterstock.com/shutterstock/videos/33865246/thumb/1.jpg?ip=x480);"></div>
    <div class="auto-container">
        <div class="inner-box">
            <h2>The 3rd Generation Private Commercial Bank</h2>
            <div class="video-btn">
                
                <a href="https://www.shutterstock.com/shutterstock/videos/33865246/preview/stock-footage-make-money-with-bitcoin.mp4" class="lightbox-image" data-caption="">
                    <i class="icon-20"></i>
                    <span class="border-animation border-1"></span>
                    <span class="border-animation border-2"></span>
                    <span class="border-animation border-3"></span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="about-style-two pt_120 pb_120">
    <div class="auto-container">
        <div class="row align-items-center">
            {{-- @if(count($healthCares)>0)
            @foreach ($healthCares as $health) --}}
            
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_three">
                        <div class="content-box mr_110">
                            <div class="sec-title mb_20">
                                <h6> Revolutionizing Healthcare</h6>
                                <h2>{{ ucfirst($healthCares->title ?? "") }}</h2>
                            </div>
                            <div class="text-box mb_40">
                                <p>{!! ucfirst($healthCares->description ?? "") !!}</p>

                                @if($healthCares->appointments!=NULL)
                                    @php
                                        $health = $healthCares->appointments;
                                        $health_array = json_decode($health,2);
                                    @endphp
                                    @if(count($health_array)>0)
                                        @foreach ($health_array as $key => $value)
                                            <ul class="list-style-one clearfix">
                                                <li>{{ ucfirst($value) }}</li>
                                            </ul>
                                        @endforeach
                                    @endif        
                                @endif
                            </div>
                        
                        </div>
                    </div>
                </div>
                {{-- @endforeach
            @endif --}}
            <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                <div class="image_block_two">
                    <div class="image-box">
                        <div class="image-shape">
                            <div class="shape-1" style="background-image: url({{asset('front/assets/images/shape/shape-11.png')}});"></div>
                            <div class="shape-2" style="background-image: url({{asset('front/assets/images/shape/shape-11.png')}});"></div>
                        </div>
                        <div class="row clearfix">
                            @if($healthCares->image!=NULL)
                                @php
                                    $atcachmentimg = explode(',', $healthCares->image);
                                @endphp
                            @endif
                            <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                <div class="image-inner">
                                    @if (isset($atcachmentimg) && is_array($atcachmentimg) && count($atcachmentimg) > 0)
                                        <figure class="image mb_30">
                                            <img src="{{asset('uploads/health/'.$atcachmentimg[0])}}" alt="">
                                        </figure>
                                    @endif
                                    
                                    <div class="experience-box">
                                        <h2>25<span>Years</span></h2>
                                        <h5>of Experience in the Finance Service</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 single-column">
                                <div class="image-inner">
                                    @if (isset($atcachmentimg) && is_array($atcachmentimg) && count($atcachmentimg) > 1)
                                        <figure class="image mb_30">
                                            <img src="{{asset('uploads/health/'.$atcachmentimg[1])}}" alt="">
                                        </figure>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="process-section centred pt_120 pb_90">
    <div class="bg-layer" style="background-image: url({{asset('front/assets/images/background/process-bg.jpg')}});"></div>
    <div class="auto-container">
        <div class="sec-title mb_110"> 
            <h6 class="mb-2"> Empowering Donations for a Healthier World
                Make a Difference, One Contribution at a Time
                </h6>
            <h5 class="fw-normal">Chudats goes beyond healthcare management by facilitating <br>life-changing donations. Here's how you can be a part of something bigger
            </h5>
        </div>
        <div class="inner-container">
            @if (count($empowers) > 0)
                @foreach ($empowers as $key => $empower) 
                    <div class="processing-block-one">
                        <div class="arrow-shape" style="background-image: url({{asset('front/assets/images/shape/shape-12.png')}});"></div>
                        <div class="inner-box">
                            <span class="count-text">{{ $key+1 }}</span>
                            <p>{!! ucfirst($empower->description ?? "") !!}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<section class="apps-section about-page pb_120">
    <div class="light-icon" style="background-image: url({{asset('front/assets/images/icons/icon-4.png')}});"></div>
    <div class="auto-container">
        <div class="inner-container">
            <div class="shape">
                <div class="shape-1" style="background-image: url({{asset('front/assets/images/shape/shape-4.png')}});"></div>
                <div class="shape-2" style="background-image: url({{asset('front/assets/images/shape/shape-3.png')}});"></div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image image-1"><img src="{{asset('front/assets/images/resource/mockup-1.png')}}" alt=""></figure>
                        <figure class="image image-2"><img src="{{asset('front/assets/images/resource/mockup-2.png')}}" alt=""></figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title mb_20">
                            <h6>Join Us in Transforming Lives</h6>
                            <h2>Download Chudats Today</h2>
                        </div>
                        <div class="text-box mb_50">
                            <p>Ready to take control of your healthcare journey and make a positive impact on others? Download Chudats now and join a community that believes in accessible, efficient healthcare for everyone.
                            </p>
                        </div>
                        <div class="btn-box">
                            <a href="#" class="play-store mr_20">
                                <img src="{{asset('front/assets/images/icons/icon-2.png')}}" alt="">
                                <span>get it on</span>
                                Google Play
                            </a>
                            <a href="#" class="play-store">
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

<!-- service-section --> 
<!-- <section class="service-section pt_120 pb_90">
    <div class="bg-layer" style="background-image: url(assets/images/background/service-bg.jpg);"></div>
    <div class="auto-container">
        <div class="sec-title centred mb_60">
            <h6>Our Services</h6>
            <h2>Online Banking at Your <br>Fingertips</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="shape"></div>
                        <div class="icon-box"><i class="icon-12"></i></div>
                        <h4><a href="service-details.html">Digital Banking</a></h4>
                        <ul class="list-item clearfix">
                            <li>Bank & savings accounts</li>
                            <li>Credit cards</li>
                            <li>Personal loans</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="shape"></div>
                        <div class="icon-box"><i class="icon-13"></i></div>
                        <h4><a href="service-details-2.html">Mobile & Web Banking</a></h4>
                        <ul class="list-item clearfix">
                            <li>Instant Access</li>
                            <li>Savings Fixed Term</li>
                            <li>Savings Instant</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="shape"></div>
                        <div class="icon-box"><i class="icon-14"></i></div>
                        <h4><a href="service-details-3.html">Insurance Policies</a></h4>
                        <ul class="list-item clearfix">
                            <li>Pet insurance</li>
                            <li>Transport Insurance</li>
                            <li>Accident insurance</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="900ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="shape"></div>
                        <div class="icon-box"><i class="icon-15"></i></div>
                        <h4><a href="service-details-4.html">Home & Property Loan</a></h4>
                        <ul class="list-item clearfix">
                            <li>Residential Mortgages</li>
                            <li>Buy-to-let Mortgages</li>
                            <li>Building Mortgages</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="shape"></div>
                        <div class="icon-box"><i class="icon-16"></i></div>
                        <h4><a href="service-details-5.html">All Bank Account</a></h4>
                        <ul class="list-item clearfix">
                            <li>nstant Access Savings</li>
                            <li>Instant Access Cash</li>
                            <li>Young Savers Account</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="shape"></div>
                        <div class="icon-box"><i class="icon-17"></i></div>
                        <h4><a href="service-details-6.html">borrowing accounts</a></h4>
                        <ul class="list-item clearfix">
                            <li>Bank Credit Card</li>
                            <li>Setter personal loan</li>
                            <li>Overdraft</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="shape"></div>
                        <div class="icon-box"><i class="icon-18"></i></div>
                        <h4><a href="service-details-7.html">Private Banking</a></h4>
                        <ul class="list-item clearfix">
                            <li>Dedicated personal service</li>
                            <li>Specialist teams</li>
                            <li>Tailored products</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 service-block">
                <div class="service-block-one wow fadeInUp animated" data-wow-delay="900ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="shape"></div>
                        <div class="icon-box"><i class="icon-19"></i></div>
                        <h4><a href="service-details-8.html">Fixed term accounts</a></h4>
                        <ul class="list-item clearfix">
                            <li>Fixed Term Saving</li>
                            <li>Fixed Rate Cash</li>
                            <li>Resume your Current</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section> -->
<!-- service-section end -->


<!-- calculator-section -->
<!-- <section class="calculator-section pt_120 pb_120">
    <div class="light-icon float-bob-y" style="background-image: url(assets/images/icons/icon-1.png);"></div>
    <div class="auto-container">
        <div class="inner-container">
            <div class="shape" style="background-image: url(assets/images/shape/shape-3.png);"></div>
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_two">
                        <div class="content-box">
                            <div class="sec-title mb_50">
                                <h6>Calculate Loan</h6>
                                <h2>Online EMI Calculator</h2>
                            </div>
                            <div class="calculator-inner">
                                <form id="loan-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="number" id="amount" placeholder="Loan amount">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" id="years" placeholder="Number of months">
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="number" id="interest" placeholder="Interest rate">
                                        </div>
                                    </div>
                                    <div class="form-group d-flex">
                                        <input type="submit" value="Calculate" class="theme-btn btn-one mr_20">
                                        <input type="button" value="Reset Data" class="reset-btn">
                                    </div> 
                                </form>
                                <div id="results">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="number" placeholder="Monthly Installment is" id="monthly-payment" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group none">
                                        <div class="input-group">
                                            <input type="number" id="total-payment" disabled="">
                                        </div>
                                    </div>
                                    <div class="form-group none">
                                        <div class="input-group">
                                            <input type="number" id="total-interest" disabled="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <figure class="image-box"><img src="assets/images/resource/calculator-1.jpg" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- calculator-section end -->

<!-- video-section -->
<!--<section class="video-section centred">
        <div class="bg-layer parallax-bg" data-parallax='{"y": 100}' style="background-image: url(assets/images/background/video-bg.jpg);"></div>
        <div class="auto-container">
            <div class="inner-box">
                <h2>The 3rd Generation Private Commercial Bank</h2>
                <div class="video-btn">
                    <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&t=28s" class="lightbox-image" data-caption="">
                        <i class="icon-20"></i>
                        <span class="border-animation border-1"></span>
                        <span class="border-animation border-2"></span>
                        <span class="border-animation border-3"></span>
                    </a>
                </div>
            </div>
        </div>
    </section> -->
<!-- video-section end -->


<!-- funfact-section -->
<!-- <section class="funfact-section">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="icon-box"><i class="icon-21"></i></div>
                    <div class="count-outer count-box">
                        <span class="count-text" data-speed="1500" data-stop="50">0</span><span>k+</span>
                    </div>
                    <p>Happy Clients</p>
                </div>
            </div>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="icon-box"><i class="icon-22"></i></div>
                    <div class="count-outer count-box">
                        <span class="count-text" data-speed="1500" data-stop="90">0</span><span>Bn</span>
                    </div>
                    <p>Total Transection</p>
                </div>
            </div>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="icon-box"><i class="icon-23"></i></div>
                    <div class="count-outer count-box">
                        <span class="count-text" data-speed="1500" data-stop="40">0</span><span>+</span>
                    </div>
                    <p>Branchs in USA</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- funfact-section end -->


<!-- apps-section -->
<!-- <section class="apps-section pt_120 pb_120">
    <div class="light-icon" style="background-image: url(assets/images/icons/icon-4.png);"></div>
    <div class="auto-container">
        <div class="inner-container">
            <div class="shape">
                <div class="shape-1" style="background-image: url(assets/images/shape/shape-4.png);"></div>
                <div class="shape-2" style="background-image: url(assets/images/shape/shape-3.png);"></div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box">
                        <figure class="image image-1"><img src="assets/images/resource/mockup-1.png" alt=""></figure>
                        <figure class="image image-2"><img src="assets/images/resource/mockup-2.png" alt=""></figure>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content-box">
                        <div class="sec-title mb_20">
                            <h6>Mobile App</h6>
                            <h2>Get the Fastest and Most Secure Banking</h2>
                        </div>
                        <div class="text-box mb_50">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec felis, suscipit you take action against fraud. See it the Security Center for and Mobile and Online Banking.</p>
                        </div>
                        <div class="btn-box">
                            <a href="index.html" class="play-store mr_20">
                                <img src="assets/images/icons/icon-2.png" alt="">
                                <span>get it on</span>
                                Google Play
                            </a>
                            <a href="index.html" class="play-store">
                                <img src="assets/images/icons/icon-3.png" alt="">
                                <span>Download on the</span>
                                App Store
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- apps-section end -->


<!-- testimonial-section -->
<!-- <section class="testimonial-section centred pt_120 pb_120">
    <div class="bg-layer" style="background-image: url(assets/images/background/testimonial-bg.jpg);"></div>
    <div class="auto-container">
        <div class="sec-title mb_70">
            <h6>Testimonials</h6>
            <h2>Love from Our Clients</h2>
        </div>
        <div class="three-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="assets/images/resource/testimonial-1.png" alt=""></figure>
                    <h4>Sandra Bullock</h4>
                    <span class="designation">Manager</span>
                    <ul class="rating mb_6 clearfix">
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                    </ul>
                    <p>“Lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque etiam nis quis at arcu nunc neque ac integer sit lobortis diam semper nulla duis in blandit.”</p>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="assets/images/resource/testimonial-2.png" alt=""></figure>
                    <h4>Julien Anthor</h4>
                    <span class="designation">Manager</span>
                    <ul class="rating mb_6 clearfix">
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                    </ul>
                    <p>“Lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque etiam nis quis at arcu nunc neque ac integer sit lobortis diam semper nulla duis in blandit.”</p>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="assets/images/resource/testimonial-3.png" alt=""></figure>
                    <h4>Rolier Demonil</h4>
                    <span class="designation">Manager</span>
                    <ul class="rating mb_6 clearfix">
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                        <li><i class="icon-26"></i></li>
                    </ul>
                    <p>“Lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque etiam nis quis at arcu nunc neque ac integer sit lobortis diam semper nulla duis in blandit.”</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- testimonial-section end -->


<!-- news-section -->
<!-- <section class="news-section pt_120 pb_90">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url(assets/images/shape/shape-6.png);"></div>
        <div class="pattern-2" style="background-image: url(assets/images/shape/shape-7.png);"></div>
    </div>
    <div class="auto-container">
        <div class="sec-title centred mb_70">
            <h6>Latest News</h6>
            <h2>Our Latest Media Update</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box" style="background-image: url(assets/images/news/news-1.jpg);">
                        <div class="content-box">
                            <span class="post-date"><i class="icon-27"></i>Apr 17, 2022</span>
                            <h3><a href="blog-details.html">Self-Guided Driving & Tours Walk Of Greater City</a></h3>
                            <ul class="post-info mb_25">
                                <li><i class="icon-28"></i><a href="blog-details.html">Admin</a></li>
                                <li><i class="icon-29"></i>0 Comment</li>
                            </ul>
                            <div class="btn-box"><a href="blog-details.html" class="theme-btn btn-three">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box" style="background-image: url(assets/images/news/news-2.jpg);">
                        <div class="content-box">
                            <span class="post-date"><i class="icon-27"></i>Apr 16, 2022</span>
                            <h3><a href="blog-details.html">Assistance For Homes & Properties Real Estate</a></h3>
                            <ul class="post-info mb_25">
                                <li><i class="icon-28"></i><a href="blog-details.html">Admin</a></li>
                                <li><i class="icon-29"></i>4 Comment</li>
                            </ul>
                            <div class="btn-box"><a href="blog-details.html" class="theme-btn btn-three">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box" style="background-image: url(assets/images/news/news-3.jpg);">
                        <div class="content-box">
                            <span class="post-date"><i class="icon-27"></i>Apr 15, 2022</span>
                            <h3><a href="blog-details.html">Long-Term Vision Of Health & Attractive Facility</a></h3>
                            <ul class="post-info mb_25">
                                <li><i class="icon-28"></i><a href="blog-details.html">Admin</a></li>
                                <li><i class="icon-29"></i>1 Comment</li>
                            </ul>
                            <div class="btn-box"><a href="blog-details.html" class="theme-btn btn-three">Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- news-section end -->


<!-- subscribe-section -->
<!-- <section class="subscribe-section">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-5.png);"></div>
    <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 text-column">
                <div class="text-box">
                    <h2>Subscribe us to Recieve Latest Updates</h2>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                <div class="form-inner ml_40">
                    <form method="post" action="contact.html">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your email" required="">
                            <button type="submit" class="theme-btn btn-two">Subscribe Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- subscribe-section end -->

@endsection