@extends('admin.layouts.master')

@section('title','Testimonial Create')

@section('content')

<div class="col-12">
    <div class="row align-items-center justify-content-center">
       <div class="col-md-11">
          <form action="{{route('testimonial-create')}}"  method="POST" id="aboutcreate" enctype="multipart/form-data">
             @csrf
             <div class="form-body">
                <div class="card radius shadow-sm">
                   <div class="card-body">
                      <div class="row">
                         <div class="col-md-12">
                            <h4 class="card-title mb-1 mt-3">Create a New Testimonial </h4>
                            <p class="pb-border"> </p>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-sm-6">
                            <div class="form-group">
                               <label for="role" class="form-control-label font-weight-300">Name<span class="text-danger">*</span></label>
                               <input type="text" name="name"  class="form-control" placeholder="Name">
                               <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-name"></p>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <label for="role" class="form-control-label font-weight-300">Designation<span class="text-danger">*</span></label>
                               <input type="text" name="designation"  class="form-control" placeholder="Designation">
                               <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-designation"></p>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <label for="role" class="form-control-label font-weight-300">Image<span class="text-danger">*</span></label>
                               <input type="file" name="image"  class="form-control" placeholder="Image">
                               <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-image"></p>
                            </div>
                         </div>
                      </div>

                      <div class="col-sm-12">
                        <div class="form-group">
                            <label for="role" class="form-control-label font-weight-300">Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" placeholder="Enter the Description" id="description" name="description"  value="{{old('description')}}"></textarea>
                            <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-description"></p>
                        </div>
                    </div>
                      {{-- <a href="javascript:;" class="add_chose"><i class="fa fa-plus mb-3"></i> Add About Coins</a>
                      <span class="addSpokeDiv"></span><br> --}}
                   </div>
                   <div class="card-footer">
                      <div class="text-right">
                         <button class="btn btn-success submit" type="submit">Save</button>
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
<script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>

<script>
    CKEDITOR.replace('description', {
        extraPlugins: 'youtube,mathjax,codesnippet,html5audio,html5video',
        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML', // Add the MathJax plugin
        removeButtons: 'PasteFromWord'
    });
</script>

     <script>

        $(document).on('click','.add_chose',function(){ 
            var s_len = $('.chooseinput').length;
            if(s_len + 1 > 5)
            {

                swal({
                        title: "You Can Include Maximum 5 Input !!",
                        text: '',
                        type: 'warning',
                        buttons: true,
                        dangerMode: true,
                        confirmButtonColor:'#003473'
                    });
            }
            else
            {
                $(".addSpokeDiv").append(
                `<div class='chooseinput' row-id='1'>
                    <div class='form-group'>
                    
                    <div class="row">
                    <div class="col-md-5">
                    <label style='font-size: 16px;'> Coin Title  <span class="text-danger"></span></label>
                    <input class='form-control' type='text' name='coin_types[]' value=''>
                    <p style='margin-bottom: 2px;' class='text-danger error_container error-spoke_name' id="error-spoke_name"></p>
                    </div>
                    <div class="col-md-5">
                    <label style='font-size: 16px;'> Coin Description <span class="text-danger"></span></label>
                    <textarea class="form-control" placeholder="Enter the Description" name="coin_description[]"></textarea>
                    <p style='margin-bottom: 2px;' class='text-danger error_container error-spoke_name' id="error-spoke_name"></p>
                    </div>
                    <div class="col-md-2 mt-4">
                    <span class="btn btn-link text-danger close_spoke_div" style="font-size:20px;"><i class="far fa-times-circle"></i></span>
                    </div>
                    </div>
                    </div>
                </div>`
                );
            }
                var i=0;
                $('.error-spoke_name').each(function(){
                    $(this).attr('id','error-spoke_name_'+i);
                    i++;
                });
                
        });

        $(document).on('click','.close_spoke_div',function(){
            var _this=$(this);
            
            _this.parent().parent().parent().parent().fadeOut("slow", function(){ 
                _this.parent().parent().parent().parent().remove();
                    var i=0;
                    $('.error-spoke_name').each(function(){
                    $(this).attr('id','error-spoke_name_'+i);
                    i++;
                    });
            });  
        });


          $(document).on('submit', 'form#aboutcreate', function (event) {
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
                                $('.submit').html('Save');
                            },2000);
                            console.log(response);
                            if(response.success==true) {   
                                toastr.success("Testimonial created Successfully");
                                window.setTimeout(function() {
                                    window.location.href = "{{URL::to('admin/testimonial-list')}}"
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