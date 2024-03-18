@extends('front.layouts.master')

@section('title','Chudats')

@section('content')
<style>
    .intl-tel-input.allow-dropdown.separate-dial-code.iti-sdc-3 {
    position: relative;
    display: block;
    width: 100%;
    height: 60px;
    background: #fff;
    border: 1px solid #fff;
    font-size: 16px;
    color: rgba(103, 103, 103, 1);
    padding: 10px 30px;
}
input#phone1 {
    border: unset;
}
</style>
 <!-- page-title -->
 <section class="page-title centred">
    <div class="bg-layer" style="background-image: url({{asset('front/assets/images/background/banner-1.png')}});"></div>
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('front/assets/images/shape/shape-18.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('front/assets/images/shape/shape-1.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Contact Us</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="{{ route('home')}}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </div>
</section>
<!-- page-title end -->



<!-- contact-info-section -->
<section class="contact-info-section centred pt_120 pb_90">
    <div class="auto-container">
        <div class="sec-title mb_70">
            <h6>Contact US</h6>
            <h2>Contact Details</h2>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                <div class="info-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-2"></i></div>
                        <h3>Our Location</h3>
                        <a class="text-center" href="https://goo.gl/maps/GLfLMM5WWYJ1X86p6" target="_blank">
                            
                            <div class="icon-text ">
                               
                                <p class=" " style="line-height: 1.8">MAHSRA BUREAU Commercial Avenue<br> PO Box 1091 Bamenda Cameroon</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                <div class="info-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-43"></i></div>
                        <h3>Email Address</h3>
                        <p><a href="mailto:contact@example.com">care@chudats.net</a><br> <a href="mailto:support@healcoins.net">support@healcoins.net</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 info-column">
                <div class="info-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="icon-box"><i class="icon-44"></i></div>
                        <h3>Phone Number</h3>
                        <p><a href="tel:2085550112">(+237) 654904225</a> (24/7)</p>
                        <p><a href="tel:2085550112">(+237) 696061766</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- contact-info-section end -->


<!-- contact-section -->
<section class="contact-section pt_120 pb_30">
    <div class="auto-container">
        <div class="sec-title centred mb_70">
            <h6>Contact US</h6>
            <h2>Contact Details</h2>
        </div>
        <div class="form-inner">
            <form action="{{route('contact-save')}}" method="post"  id="contactform" class="default-form">
                @csrf 
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <input type="text" name="username" placeholder="Your Name" value="{{old('username')}}">
                        <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-username"></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <input type="email" name="email" placeholder="Your email" value="{{old('email')}}">
                        <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-email"></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <input type="hidden" id="code" name ="primary_phone_code" value="91" >
                        <input type="hidden" id="iso" name ="primary_phone_iso" value="in" >
                        <input type="tel" name="phone" id="phone1" class="number_only form-control" style='display:block' value="{{old('phone')}}">
                        <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-phone"></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                        <input type="text" name="subject"  placeholder="Subject" value="{{old('subject')}}">
                        <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-subject"></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                        <textarea name="message" placeholder="Type message"></textarea>
                    </div>
                    <div class="form-group mt-4 mb-4">
                        <div class="captcha">
                            <span>{!! captcha_img() !!}</span>
                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                &#x21bb;
                            </button>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                        <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-captcha"></p>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                        <button class="theme-btn btn-one submit" type="submit">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- contact-section end -->
<section>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3968.314847892343!2d10.1524012!3d5.951283200000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x105f166b6bcb51f3%3A0xabae9add6e826cee!2sMAHSRA%20BUREAU!5e0!3m2!1sen!2sin!4v1710483883877!5m2!1sen!2sin" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>
@endsection

@push('customjs')
<script>

    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });


        $(document).on('submit', 'form#contactform', function (event) {
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
                          $('.submit').html('Send Message');
                      },2000);
                      console.log(response);
                      if(response.success==true) {   
                          toastr.success("Contact Form Submit Successfully");
                          window.setTimeout(function() {
                              //window.location.href = "{{URL::to('contact')}}"
                              $("#contactform")[0].reset();
                          }, 2000);
                      }
                      //show the form validates error
                      if(response.success==false ) {                              
                          for (control in response.errors) {  
                          var error_text = control.replace('.',"_");
                          $('#error-'+error_text).html(response.errors[control]);
                          // $('#error-'+error_text).html(response.errors[error_text][0]);
                          // console.log('#error-'+error_text);
                          }
                          // console.log(response.errors);
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
</script>

@endpush