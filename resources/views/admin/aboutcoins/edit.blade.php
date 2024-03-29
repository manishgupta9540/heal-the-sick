@extends('admin.layouts.master')

@section('title','About Coins Create')

@section('content')

<div class="col-12">
    <div class="row align-items-center justify-content-center">
       <div class="col-md-11">
          <form action="{{route('about-coin-update')}}"  method="POST" id="aboutupdate" enctype="multipart/form-data">
             @csrf
             <div class="form-body">
                <div class="card radius shadow-sm">
                   <div class="card-body">
                      <div class="row">
                         <div class="col-md-12">
                            <h4 class="card-title mb-1 mt-3">Edit Coins About </h4>
                            <p class="pb-border"> </p>
                         </div>
                      </div>
                      <div class="row">
                         
                         <div class="col-sm-6">
                            <div class="form-group">
                                <input type="hidden" name="id" value="{{base64_encode($aboutcoins->id)}}">
                               <label for="role" class="form-control-label font-weight-300">Title<span class="text-danger">*</span></label>
                               <input type="text" name="title" value="{{ $aboutcoins->title }}" class="form-control" placeholder="Title">
                               <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-title"></p>
                            </div>
                         </div>
                        
                         <div class="col-sm-6">
                            <div class="form-group">
                               <label for="role" class="form-control-label font-weight-300">Image<span class="text-danger">*</span></label>
                               <input type="file" name="image"  class="form-control" placeholder="Image">
                               <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-image"></p>
                            </div>
                         </div>
                         <br>

                         @if($aboutcoins->image!=NULL && file_exists(public_path('uploads/coins/'.$aboutcoins->image)))
                             <div class="col-sm-6">
                                 <div class="form-group">
                                     <a href="{{asset('uploads/coins/'.$aboutcoins->image)}}" target="_blank">
                                         <img src="{{asset('uploads/coins/'.$aboutcoins->image)}}" width="100px" height="100px">
                                     </a>
                                 </div>
                             </div>
                         @endif
                      </div>

                      <div class="col-sm-12">
                        <div class="form-group">
                            <label for="role" class="form-control-label font-weight-300">Description</label>
                            <textarea class="form-control" placeholder="Enter the Description" id="description" name="description">{{$aboutcoins->description}}</textarea>
                            <p style="margin-bottom: 2px;" class="text-danger error_container" id="error-description"></p>
                        </div>
                    </div>

                      <a href="javascript:;" class="add_chose"><i class="fa fa-plus mb-3"></i> Add About Coins</a>
                      <span class="addSpokeDiv">
                        @if($aboutcoins->coin_types!=NULL)
                        @php
                            $input_item_data = $aboutcoins->coin_types;

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
                                            <input class='form-control' type='text' name='coin_types[]' value="{{$key_val[0]}}">
                                            <p style='margin-bottom: 2px;' class='text-danger error_container error-coin_types' id="error-coin_types"></p>
                                        </div>
                                        <div class="col-md-5">
                                            <label style='font-size: 16px;'> Coin Description <span class="text-danger">*</span></label>
                                            <textarea class="form-control" placeholder="Enter the Description" name="coin_description[]">{{$input_val[0]}}</textarea>
                                            <p style='margin-bottom: 2px;' class='text-danger error_container error-coin_description' id="error-coin_description"></p>
                                        </div>
                                        <div class="col-md-2 mt-4">
                                            <span class="btn btn-link text-danger delete_spokeman" data-id="{{base64_encode($key)}}" data-business="{{base64_encode($aboutcoinsingle->id)}}" style="font-size:20px;"><i class="far fa-times-circle"></i></span>
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
                    <p style='margin-bottom: 2px;' class='text-danger error_container error-coin_types' id="error-coin_types"></p>
                    </div>
                    <div class="col-md-5">
                    <label style='font-size: 16px;'> Coin Description <span class="text-danger"></span></label>
                    <textarea class="form-control" placeholder="Enter the Description" name="coin_description[]"></textarea>
                    <p style='margin-bottom: 2px;' class='text-danger error_container error-coin_description' id="error-coin_description"></p>
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


        $(document).on('submit', 'form#aboutupdate', function (event) {
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
                            toastr.success("Coin created Successfully");
                            window.setTimeout(function() {
                                window.location.href = "{{URL::to('admin/about-coin-list')}}"
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
                           url: "{{route('deleted_coin_data')}}",
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