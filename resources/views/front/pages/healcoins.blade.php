@extends('front.layouts.master')

@section('title','Chudats')

@section('content')
<style>
    .col-md-4 {
    flex: 0 0 auto;
    width: 33.33333333%;
}
.table td, .table th {
    font-size: 14px;
    vertical-align: middle;
    padding: 0.75rem 1.25rem;
}
.table th {
    font-size: 12px;
    vertical-align: middle;
    padding: 0.75rem 1.25rem;
}
</style>
 <!-- page-title -->
 <section class="page-title centred">
    <div class="bg-layer" style="background-image: url({{asset('front/assets/images/background/banner-3.png')}});"></div>
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('front/assets/images/shape/shape-18.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('front/assets/images/shape/shape-1.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box">
            <h1 >Purchase Heal Coin </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home')}}">Home</a></li>
                <li>Purchase Heal Coin </li>
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
                    <div class="content-box ">
                        <div class="sec-title mb_20 text-center">
                        </div>
                        <div class="inner-box mb_45">
                            <div class="single-item">
                                <div class="row">
                                    <div class="col-md-6 mx-auto p-5 border rounded shadow">
                                        <h2 class="text-center mb_30">Purchase Heal Coin</h2>
                                        <label for="">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
                                        <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-email"></p>
                                    
                                        <br>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <button type="button" class="btn btn-dark btn-sm px-3 py-2 submit" id="datafetch">Get Details</button>
                                            <div class="">
                                                <a href="{{route('sign-up')}}" class="btn btn-dark rounded">Sign Up</a>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="single-item data-fetch d-none">
                                <div class="row">
                                    <div class="col-md-6 mx-auto p-5 border rounded shadow">
                                        <h2 class="text-center mb_30">Fetch Your Details</h2>
                                        <label for="">Name</label>
                                            : <span class="user_name"></span> <br>
                                        <label for="">Email</label>
                                            : <span class="email"></span> <br>
                                        <label for="">Phone Number</label>
                                            : <span class="phone"></span> <br>
                                            <br>
                                        <label for="">Purchase Heal Coin</label>
                                        <input type="text" name="purchase_value" id="purchase_value" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"> 
                                        <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-purchase_value"></p>  
                                        <br>
                                        <button type="button" class="btn btn-dark btn-sm px-3 py-2 submit_data" id="purchaseheal">Purchase</button> 
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tbody>
                                           <tr>
                                                <td>
                                                    Name : <span class="user_name"></span> <br>
                                                    Email : <span class="email"></span> <br>
                                                    Phone Number  : 
                                                </td>
                                            </tr>
                                        
                                        </tbody>
                                     </table>
                                </div>
                            </div> --}}
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




@endsection


@push('customjs')
<script>

$(document).ready(function() {

    //data fetch app ajax
    $(document).on('click','#datafetch',function(){ 
        var email =  $('#email').val();

        $('p.error_container').html("");

        var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
        $('.submit').attr('disabled',true);
        if ($('.submit').html() !== loadingText) {
            $('.submit').html(loadingText);
        }

        $.ajax({
            type: "post",
            url: "{{ route('purchase-coins') }}",
            data: {
                '_token': "{{ csrf_token() }}",
                'email': email,
            },
            dataType: "json",
            success: function(data) {
                console.log(data);
                window.setTimeout(function(){
                    $('.submit').attr('disabled',false);
                    $('.submit').html('Get Details');
                },2000);

                if(data.success == true){
                    $('.data-fetch').removeClass('d-none');
                    $('.data-fetch').addClass('d-block');

                    $('.user_name').html("<strong>"+data.data.name!=null ? data.data.name : ''+"</strong>");
                    $('.email').html("<strong>"+data.data.email!=null ? data.data.email : ''+"</strong>");
                    $('.phone').html("<strong>"+data.data.phone!=null ? data.data.phone : ''+"</strong>");
    
                }
                //show the form validates error
                if(data.success==false ) {                              
                    for (control in data.errors) {  
                        var error_text = control.replace('.',"_");
                        $('#error-'+error_text).html(data.errors[control]);
                    }
                }
            }
        });
    });

    //purchase heal coin
    $(document).on('click','#purchaseheal',function(){ 
        var purchase_value =  $('#purchase_value').val();
        
        $('p.error_container').html("");

        var loadingText = '<i class="fa fa-circle-o-notch fa-spin"></i> loading...';
        $('.submit_data').attr('disabled',true);
        if ($('.submit_data').html() !== loadingText) {
            $('.submit_data').html(loadingText);
        }

        $.ajax({
            type: "post",
            url: "{{ route('purchase-coin-data') }}",
            data: {
                '_token': "{{ csrf_token() }}",
                'purchase_value': purchase_value,
            },
            
            success: function(response) {
                console.log(response);
                window.setTimeout(function(){
                    $('.submit_data').attr('disabled',false);
                    $('.submit_data').html('Purchase');
                },2000);

                if(response.success == true){
                    

                }
                //show the form validates error
                if(response.success==false ) {                              
                    for (control in response.errors) {  
                        var error_text = control.replace('.',"_");
                        $('#error-'+error_text).html(response.errors[control]);
                    }
                }
            }
        });
    });
});

</script>
@endpush