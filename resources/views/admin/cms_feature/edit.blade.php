@extends('admin.layouts.master')

@section('title','Cms Edit')

@section('content')

<div class="col-12">
    <div class="row align-items-center justify-content-center">
       <div class="col-md-11">
          <form action="{{route('cms-update')}}"  method="POST" id="cmsupdate" enctype="multipart/form-data">
             @csrf
             <div class="form-body">
                <div class="card radius shadow-sm">
                   <div class="card-body">
                      <div class="row">
                         <div class="col-md-12">
                            <h4 class="card-title mb-1 mt-3">Edit Cms  </h4>
                            <p class="pb-border"> </p>
                         </div>
                      </div>
                      <div class="row">
                         
                         <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{base64_encode($cmscoins->id)}}">
                               <label for="role" class="form-control-label font-weight-300">Title<span class="text-danger">*</span></label>
                               <input type="text" name="title" value="{{ $cmscoins->title }}" class="form-control" placeholder="Title">
                               <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-title"></p>
                            </div>
                         </div>
                      </div>

                      <a href="javascript:;" class="add_chose"><i class="fa fa-plus mb-3"></i> Add About Coins</a>
                      <span class="addSpokeDiv">
                        @if($cmscoins->title_points!=NULL)
                        @php
                            $input_item_data = $cmscoins->title_points;

                            $input_item_data_array =  json_decode($input_item_data, true);
                         
                        @endphp

                        @if($input_item_data_array != null)
                            @foreach ($input_item_data_array as $key => $input)
                                <?php 
                                    $key_val = array_keys($input);
                                    $input_val = array_values($input);
                                ?>

                                <div class='spokeReport' row-id='1'>
                                    <div class='form-group'>
                                        <div class="row">
                                        <div class="col-md-5">
                                            <label style='font-size: 16px;'> Coin Title </label>
                                            <input class='form-control' type='text' name='title_points[]' value="{{$key_val[0]}}">
                                            <p style='margin-bottom: 2px;' class='text-danger error_container error-spoke_name' id="error-spoke_name"></p>
                                        </div>
                                        <div class="col-md-5">
                                            <label style='font-size: 16px;'> Coin Description <span class="text-danger">*</span></label>
                                            {{-- <input class='form-control' type='text' name='title_description[]' value="{{$input_val[0]}}"> --}}
                                            <textarea class="form-control" placeholder="Enter the Description" name="title_description[]">{{$input_val[0]}}</textarea>
                                            <p style='margin-bottom: 2px;' class='text-danger error_container error-spoke_name' id="error-spoke_name"></p>
                                        </div>
                                        <div class="col-md-2 mt-4">
                                            <span class="btn btn-link text-danger delete_spokeman" data-id="{{base64_encode($key)}}" data-business="{{base64_encode($cmssingle->id)}}" style="font-size:20px;"><i class="far fa-times-circle"></i></span>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif    
                      </span><br>


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

        $(document).on('click','.add_chose',function(){ 
            var s_len = $('.chooseinput').length;
            if(s_len + 1 > 8)
            {

                swal({
                        title: "You Can Include Maximum 8 Input !!",
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
                    <label style='font-size: 16px;'> Title heading  <span class="text-danger"></span></label>
                    <input class='form-control' type='text' name='title_points[]' value=''>
                    <p style='margin-bottom: 2px;' class='text-danger error_container error-spoke_name' id="error-spoke_name"></p>
                    </div>
                    <div class="col-md-5">
                    <label style='font-size: 16px;'> Title Description <span class="text-danger"></span></label>
                    <textarea class="form-control" placeholder="Enter the Description" name="title_description[]"></textarea>
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


        $(document).on('submit', 'form#cmsupdate', function (event) {
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
                            toastr.success("CMS Updated Successfully");
                            window.setTimeout(function() {
                                window.location.href = "{{URL::to('admin/cms-list')}}"
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

        //about coins deleted
        $(document).on('click','.delete_spokeman',function(){
            var id = $(this).attr('data-id');
            var customer_id = $(this).attr('data-business');
            var _this=$(this);

            swal({
               // icon: "warning",
               type: "warning",
               title: "Are You Sure Want To Delete?",
               text: "",
               dangerMode: true,
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "YES",
               cancelButtonText: "CANCEL",
               closeOnConfirm: false,
               closeOnCancel: false
               },
               function(e){
                  if(e==true)
                  {
                     $.ajax({
                           type:'POST',
                           url: "{{route('cms-data')}}",
                           data: {"_token": "{{ csrf_token() }}",'id':id,'customer_id':customer_id},        
                           success: function (response) {        
                           console.log(response);
                           
                              if (response.status=='ok') {    

                                 _this.parent().parent().parent().parent().fadeOut("slow", function(){ 
                                    _this.parent().parent().parent().parent().remove();
                                       var i=0;
                                       $('.error-spoke_name').each(function(){
                                          $(this).attr('id','error-spoke_name_'+i);
                                          i++;
                                       });

                                    });
                                    
                              } else {

                                 toastr.error("Something Went Wrong !!");
                                    
                              }
                           },
                           error: function (response) {
                              console.log(response);
                           }
                        });

                        swal.close();
                  }
                  else
                  {
                     swal.close();
                  }
               }
            );
        });
    </script>

@endpush