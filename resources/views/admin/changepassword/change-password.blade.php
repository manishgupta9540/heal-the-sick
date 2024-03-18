@extends('admin.layouts.master')

@section('title','Change Password')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

   <style>
    .invalid-feedback {
         display:inline-block;
     }
     span.show-hide-password { 
       top: 7px;
       right: 3%;
       font-size: 16px;
       color: #748a9c;
       cursor: pointer;
       z-index: 6;
     }
     .eye_icon {
         position: absolute;
         right: 14px;
         top: 35px;
      }
   </style>

<div class="col-12">
    <div class="row align-items-center justify-content-center">
       <div class="col-md-11">
          <form action="{{route('change-password-save')}}"  method="POST" id="passworChange">
             @csrf
            <div class="form-body">
               <div class="card radius shadow-sm">
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <h4 class="card-title mb-1 mt-3 ">Change Password</h4>
                        <p class="pb-border"> </p>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-sm-8">
                        <div class="form-group position-relative">
                           <label for="role" class="form-control-label font-weight-300">Old Password <span class="text-danger">*</span></label>
                           <input type="text" name="old_password"  class="form-control" placeholder="Old Password">
                           <span class="show-hide-password js-show-hide has-show-hide"><i class="bi bi-eye-slash eye_icon"></i></span>
                           <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-old_password"></p>
                        </div>
                     </div>

                     <div class="col-sm-8">
                        <div class="form-group position-relative">
                           <label for="role" class="form-control-label font-weight-300">New Password <span class="text-danger">*</span></label>
                           <input type="text" name="new_password"  class="form-control" placeholder="Enter new password">
                           <span class="show-hide-password js-show-hide has-show-hide"><i class="bi bi-eye-slash eye_icon"></i></span>
                           <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-new_password"></p>
                        </div>
                     </div>

                     <div class="col-sm-8">
                        <div class="form-group position-relative">
                           <label for="role" class="form-control-label font-weight-300">Confirm Password <span class="text-danger">*</span></label>
                           <input type="text" name="confirm_password"  class="form-control confirm_password" placeholder="Enter confirm password">
                           <span class="show-hide-password js-show-hide has-show-hide"><i class="bi bi-eye-slash eye_icon"></i></span>
                           <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-confirm_password"></p>
                        </div>
                        </div>
                     </div>
                  </div>
                  <span style="" class="text-left text-danger error_container" id="wrong-credential"> </span>
               </div>

               <div class="card-footer">
                  <div class="text-right">
                     <button class="btn btn-success submit" type="submit">Updated</button>
                  </div>
                  <div class="text-center">
                     <div class="error"></div>
                  </div>
               </div>
               </div>
            </div>
          </form>
       </div>
    </div>
 </div>
 

@endsection

@push('customjs')
     <script>
      $(document).on('click','.js-show-hide',function (e) {
            e.preventDefault();
            var _this = $(this);

            if (_this.hasClass('has-show-hide'))
            {
               _this.parent().find('input').attr('type','text');
               _this.html('<i class="fa fa-eye eye_icon" aria-hidden="true"></i>');
               _this.removeClass('has-show-hide');
            }
            else
            {
               _this.addClass('has-show-hide');
               _this.parent().find('input').attr('type','password');
               _this.html('<i class="bi bi-eye-slash eye_icon"></i>');
            }
      });
            

      $(document).on('submit', 'form#passworChange', function (event) {
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
                           $('.submit').html('Update Password');
                        },2000);
                        console.log(response);
                        if(response.success==true) {   
                           toastr.success("Password Change Successfully");
                           window.setTimeout(function() {
                              //window.location.href = "{{URL::to('admin/card-list')}}"
                              $("#passworChange")[0].reset();
                           }, 2000);
                        }

                        //show the form validates error
                        if( response.error_type == 'wrong_password' ){                                                      
                           $("#wrong-credential").html("");
                           $("#wrong-credential").html("Your current password is incorrect!");
                           return false;
                        }

                        //show the form validates error
                        if(response.success==false ) {                              
                           for (control in response.errors) {  
                              var error_text = control.replace('.',"_");
                              $('#error-'+error_text).html(response.errors[control]);
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