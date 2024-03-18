@extends('admin.layouts.master')

@section('title','Banner Create')

@section('content')

<div class="col-12">
    <div class="row align-items-center justify-content-center">
       <div class="col-md-11">
          <form action="{{route('banner-update')}}"  method="POST" id="bannerupdate" enctype="multipart/form-data">
             @csrf
             <div class="form-body">
                <div class="card radius shadow-sm">
                   <div class="card-body">
                      <div class="row">
                         <div class="col-md-12">
                            <h4 class="card-title mb-1 mt-3">Edit Banner </h4>
                            <p class="pb-border"> </p>
                         </div>
                      </div>
                      <div class="row">
                         
                         <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{base64_encode($banner->id)}}">
                               <label for="role" class="form-control-label font-weight-300">Title<span class="text-danger">*</span></label>
                               <input type="text" name="title" value="{{ $banner->title }}" class="form-control" placeholder="Title">
                               <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-title"></p>
                            </div>
                         </div>
                        
                         <div class="col-sm-12">
                            <div class="form-group">
                               <label for="role" class="form-control-label font-weight-300">Banner Image<span class="text-danger">*</span></label>
                               <input type="file" name="banner_image"  class="form-control" placeholder="Banner Image">
                               <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-banner_image"></p>
                            </div>
                         </div>
                         <br>
                         @if($banner->banner_image!=NULL && file_exists(public_path('uploads/banner/'.$banner->banner_image)))
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <a href="{{asset('uploads/banner/'.$banner->banner_image)}}" target="_blank">
                                         <img src="{{asset('uploads/banner/'.$banner->banner_image)}}" width="100px" height="100px">
                                     </a>
                                 </div>
                             </div>
                         @endif
                      </div>

                      <div class="col-sm-12">
                        <div class="form-group">
                            <label for="role" class="form-control-label font-weight-300">Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" placeholder="Enter the Description" id="description" name="description">{{ $banner->description }}</textarea>
                            <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-description"></p>
                        </div>
                    </div>
                   </div>
                   <div class="card-footer">
                      <div class="text-right">
                         <button class="btn btn-success submit" type="submit">Update</button>
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
        $(document).on('submit', 'form#bannerupdate', function (event) {
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
                            $('.submit').html('Update');
                        },2000);
                        console.log(response);
                        if(response.success==true) {   
                            toastr.success("Banner Updated Successfully");
                            window.setTimeout(function() {
                                window.location.href = "{{URL::to('admin/banner-list')}}"
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