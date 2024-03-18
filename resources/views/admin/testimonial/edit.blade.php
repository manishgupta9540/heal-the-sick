@extends('admin.layouts.master')

@section('title','Testimonial Updated')

@section('content')

<div class="col-12">
    <div class="row align-items-center justify-content-center">
       <div class="col-md-11">
          <form action="{{route('testimonial-update')}}"  method="POST" id="testupdate" enctype="multipart/form-data">
             @csrf
             <div class="form-body">
                <div class="card radius shadow-sm">
                   <div class="card-body">
                      <div class="row">
                         <div class="col-md-12">
                            <h4 class="card-title mb-1 mt-3">Edit Testimonial </h4>
                            <p class="pb-border"> </p>
                         </div>
                      </div>
                      <div class="row">
                         <div class="col-sm-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{base64_encode($testimonial->id)}}">
                               <label for="role" class="form-control-label font-weight-300">Name<span class="text-danger">*</span></label>
                               <input type="text" name="name" value="{{ $testimonial->name }}" class="form-control" placeholder="Name">
                               <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-name"></p>
                            </div>
                         </div>

                         <div class="col-sm-6">
                            <div class="form-group">
                               <label for="role" class="form-control-label font-weight-300">Designation<span class="text-danger">*</span></label>
                               <input type="text" name="designation" value="{{ $testimonial->designation}}" class="form-control" placeholder="Designation">
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

                      <br>

                      @if($testimonial->image!=NULL && file_exists(public_path('uploads/testimonial/'.$testimonial->image)))
                          <div class="col-sm-6">
                              <div class="form-group">
                                  <a href="{{asset('uploads/testimonial/'.$testimonial->image)}}" target="_blank">
                                      <img src="{{asset('uploads/testimonial/'.$testimonial->image)}}" width="100px" height="100px">
                                  </a>
                              </div>
                          </div>
                      @endif

                      <div class="col-sm-12">
                        <div class="form-group">
                            <label for="role" class="form-control-label font-weight-300">Description<span class="text-danger">*</span></label>
                            <textarea class="form-control" placeholder="Enter the Description" id="description" name="description" >{{$testimonial->description}}</textarea>
                            <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-description"></p>
                        </div>
                    </div>
                      {{-- <a href="javascript:;" class="add_chose"><i class="fa fa-plus mb-3"></i> Add About Coins</a>
                      <span class="addSpokeDiv"></span><br> --}}
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
<script src="{{asset('admin/ckeditor/ckeditor.js')}}"></script>

<script>
    CKEDITOR.replace('description', {
        extraPlugins: 'youtube,mathjax,codesnippet,html5audio,html5video',
        mathJaxLib: 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML', // Add the MathJax plugin
        removeButtons: 'PasteFromWord'
    });
</script>

     <script>
          $(document).on('submit', 'form#testupdate', function (event) {
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
                                $('.submit').html('Updated');
                            },2000);
                            console.log(response);
                            if(response.success==true) {   
                                toastr.success("Testimonial Updated Successfully");
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