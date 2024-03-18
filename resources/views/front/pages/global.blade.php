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
.form-control:focus {
    color: #212529;
    background-color: #fff;
    border-color: #86b7fe;
    outline: 0;
    box-shadow: 0 0 0 0.25rem rgb(13 110 253 / 0%);
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.select2-container--default .select2-selection--single {
    border: none !important;
}
.table-bordered tbody{
    display: flex;
    justify-content: center;
}

    .table-bordered tbody  tr {
    margin: 0 10px;
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
            <h1>Global Currency Convertor</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home')}}">Home</a></li>
                <li>Global Currency Convertor</li>
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
            <div class="col-lg-10 mx-auto  col-md-12 col-sm-12 content-column border rounded shadow p-5">
                <div class="content_block_one">
                    <div class="content-box ml_40">
                        <div class="sec-title mb_20 text-center">
                            <h6>Global Currency Convertor Calculator</h6>
                        </div>
                            <div class="inner-box mb_45">
                                <div class="single-item p-0">
                                    <div class="row">
                                        <div class="col-md-4 mx-auto">
                                            <label for="">Currency</label>
                                            <select name="currency_id" class="form-control country" id="currency_id" >
                                                <option value="">-Select-</option>
                                                @foreach ($country_value as $currency)
                                                    <option value="{{ $currency['id'] }}">{{ $currency['country_name'] }} [{{ $currency['currency_name'] }}]</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4 rate" style="display: none">
                                            <label for="">Currency Rate</label>
                                            <input type="text" name="" id="currency_rate"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                class="form-control rate currencytabletoinput" placeholder=" Currency Rate">
                                        </div>
                                        <div class="col-md-4 rate" style="display: none">
                                            <label for="">HC Rate</label>
                                            <input type="text" name="" id="hc_rate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                                                class="form-control rate" placeholder="HC Rate">
                                        </div>
                                    </div>
                                    <div id="currencytable" style="display: none">
                                    <div class="row my-3 rate">
                                        <div class="col-md-7 mx-auto mt-4 col-sm-12">
                                            
                                            <table  class="table table-bordered">
                                                <tr>
                                                    <th>  <h5 id="currency"></h5></th>
                                                </tr>
                                                <tr>
                                                    <th>  <h5 id="hc"> </h5></th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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

<!-- testimonial-style-two end -->

@endsection


@push('customjs')
<script>
$(".country").select2();

    $(document).ready(function() {
        $('#currency_id').change(function(e) {
            e.preventDefault();
            if ($(this).val() == '') {
                $('.rate').hide();
                $('#currencytable').hide();
                
            } else {
                // $('#currencytable').show();
                $('#currency_rate').val('');
                $('#hc_rate').val('');
                $('#currency').html('');
                $('#hc').html('');
                $('.rate').show();
            }
        });

        $('#currency_rate').keyup(function(e) {
            get_value('currency_rate');
        });
       
        $('#hc_rate').keyup(function(e) {
            get_value('hc_rate');
        });


        function get_value(type) {
            var currency_id     = $('#currency_id').val();
            var currency_rate   = $('#currency_rate').val();
            var hc_rate         = $('#hc_rate').val();

            if(currency_id!=""){
            $('#currencytable').show();
            }
            $.ajax({
                type: "post",
                url: "{{ route('get_currency_calculate') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    type: type,
                    currency_id: currency_id,
                    currency_rate: currency_rate,
                    hc: hc_rate
                },
                dataType: "json",
                success: function(response) {
                    $('#currency').html('Currency Rate : ' + response.symbol+response.currency_rate);
                    $('#hc').html('HC Rate : ' + response.hc+"HC");
                    $('#currency_rate').val(response.currency_rate);
                    $('#hc_rate').val(response.hc);
                }
            });
        }
        
    });
 
//     $("table tbody tr th h5").each(function() {                           

// var cell = $(this);       
// if($(cell).text().length == 0){
//     $(cell).hide();
// }
// {

// }
// // if ($(cell).text().length == 0){
// //     // console.log('empty');
// //     $(this).parent().addClass('nodisplay');
// // }

// });

</script>
@endpush