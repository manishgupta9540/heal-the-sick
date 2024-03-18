@extends('front.layouts.master')

@section('title','Chudats')

@section('content')

 <!-- page-title -->
 <section class="page-title centred">
    <div class="bg-layer" style="background-image: url({{asset('front/assets/images/background/banner-2.png')}});"></div>
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('front/assets/images/shape/shape-18.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('front/assets/images/shape/shape-1.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box">
            <h1>About Portal</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="index.html">Home</a></li>
                <li>About Portal</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->


<!-- about-section -->
<section class="about-section pt_120 pb_120">
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
                                    <h6>Lorem ipsum dolor sit.</h6>
                                </div>
                                <div class="experience-box">
                                    <div class="inner">
                                        <h2>40</h2>
                                        <h6>Lorem, ipsum dolor.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                        <div class="content_block_one">
                            <div class="content-box ml_40">
                                <div class="sec-title mb_20">
                                    <h6>About Coins</h6>
                                    <h2>{{$about->title ?? ""}}</h2>
                                </div>
                                <div class="text-box mb_40">
                                    <p>{!! $about->description !!}</p>
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
                                                        <h3>{{$key_val[0]}}</h3>
                                                        <p>{{$input_val[0]}}</p>
                                                    </div>
                                                </div>
                                            @endforeach    
                                        @endif
                                @endif
                                <div class="btn-box">
                                    <a href="{{ route('home')}}" class="theme-btn btn-one">Lorem, ipsum.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>
<!-- about-section end -->


<!-- funfact-section -->
<section class="funfact-section about-page pt_95 pb_120">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="icon-box"><i class="icon-21"></i></div>
                    <div class="count-outer count-box">
                        <span class="count-text" data-speed="1500" data-stop="50">0</span><span>k+</span>
                    </div>
                    <p>Lorem, ipsum.</p>
                </div>
            </div>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="icon-box"><i class="icon-22"></i></div>
                    <div class="count-outer count-box">
                        <span class="count-text" data-speed="1500" data-stop="90">0</span><span>D</span>
                    </div>
                    <p>Lorem, ipsum.</p>
                </div>
            </div>
            <div class="funfact-block-one">
                <div class="inner-box">
                    <div class="icon-box"><i class="icon-23"></i></div>
                    <div class="count-outer count-box">
                        <span class="count-text" data-speed="1500" data-stop="40">0</span><span>+</span>
                    </div>
                    <p>Lorem, ipsum.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- funfact-section end -->



<!-- apps-section -->
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
                            <h6>Lorem, ipsum.</h6>
                            <h2>Lorem ipsum dolor sit amet consectetur adipisicing.</h2>
                        </div>
                        <div class="text-box mb_50">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat eaque illo architecto nihil nulla itaque sit sapiente eius autem consectetur!</p>
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
<section class="testimonial-style-two pt_120 pb_120">
    <div class="bg-layer" style="background-image: url({{asset('front/assets/images/background/Coin-32.png')}});"></div>
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
                    {{-- <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="author-box">
                                <figure class="thumb-box"><img src="{{asset('front/assets/images/resource/testimonial-5.png')}}" alt=""></figure>
                                <h4>Lorem, ipsum.</h4>
                                <span class="designation">Lorem</span>
                            </div>
                            <ul class="rating mb_15 clearfix">
                                <li><i class="icon-9"></i></li>
                                <li><i class="icon-9"></i></li>
                                <li><i class="icon-9"></i></li>
                                <li><i class="icon-9"></i></li>
                                <li><i class="icon-9"></i></li>
                            </ul>
                            <p>“Lorem ipsum dolor sit amet consectetur adipiscing elit pellentesque etiam nis quis at arcu nunc neque ac integer sit lobortis diam semper nulla duis in blandit.”</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-style-two end -->

@endsection