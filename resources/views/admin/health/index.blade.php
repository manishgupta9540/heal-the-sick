@extends('admin.layouts.master')

@section('title','Health Manage')

@section('content')

<style>
.badge-danger {
    color: #fff;
    background-color: #dc3545;
}
.badge-success {
    color: #fff;
    background-color: #28a745;
}
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <br>
                <div class="table-responsive">
                    <a href="{{route('healthmanage-trash')}}" class="btn btn-warning btn-sm" style="float:right"><i class="fa fa-trash"></i> Trash</a>
                    <a href="{{route('healthmanage-create')}}" class="btn btn-primary btn-sm" style="float:right"><i class="fa fa-plus"></i>Add Health</a>
                    <br>
                    <table class="table border  user_datatable mt-3">
                        <thead class="table-light fw-semibold insuffTable">
                            <tr class="align-middle">
                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                {{-- <th>Created At</th> --}}
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($healthCares as $key => $coins)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$coins->title}}</td>
                                    @php  
                                           $image_arry = explode(",",$coins->image);
                                    @endphp
                                    <td><img src="{{asset('uploads/health/'.$image_arry[0])}}" alt="" style="width: 80px; height: 80px;"></td>
                                    <td>
                                        @if($coins->status==0)
                                        <span data-dc="{{base64_encode($coins->id)}}" class="badge badge-danger">Deactive</span>
                                        <span data-ac="{{base64_encode($coins->id)}}" class="badge badge-success d-none">Active</span>
                                    @else
                                        <span data-dc="{{base64_encode($coins->id)}}" class="badge badge-danger d-none">Deactive</span>
                                        <span data-ac="{{base64_encode($coins->id)}}" class="badge badge-success">Active</span>
                                    @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/healthmanage/edit/'.base64_encode($coins->id))}}">
                                            <button class="btn btn-primary btn-sm" type="button"> <i class='fa fa-edit'></i> Edit</button>
                                        </a>
                                        <button class="btn btn-danger btn-sm deleteBtn" type="button" data-id="{{ base64_encode($coins->id) }}" > <i class='fa fa-trash'></i> Delete</button>
                                        @if($coins->status==1)
                                            <span data-d="{{base64_encode($coins->id)}}"><a href="javascript:;" class="btn btn-md btn-outline-warning status" data-id="{{base64_encode($coins->id)}}" data-type="{{base64_encode('deactive')}}" title="Deactivate"><i class="far fa-times-circle"></i></a></span>
                                            <span data-a="{{base64_encode($coins->id)}}" class="d-none"><a href="javascript:;" class="btn btn-md btn-outline-success status" data-id="{{base64_encode($coins->id)}}" data-type="{{base64_encode('active')}}" title="Activate"><i class="far fa-check-circle"></i></a></span>
                                        @else
                                            <span class="d-none" data-d="{{base64_encode($coins->id)}}"><a href="javascript:;" class="btn btn-md btn-outline-warning status" data-id="{{base64_encode($coins->id)}}" data-type="{{base64_encode('deactive')}}" title="Deactivate"><i class="far fa-times-circle"></i></a></span>
                                            <span data-a="{{base64_encode($coins->id)}}"><a href="javascript:;" class="btn btn-md btn-outline-success status" data-id="{{base64_encode($coins->id)}}" data-type="{{base64_encode('active')}}"  title="Activate"><i class="far fa-check-circle"></i></a></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('customjs')
    <script>

        // delete button 
        $(document).on('click', '.deleteBtn', function() {
            var _this = $(this);
            var id = $(this).data('id');
        
            var table = 'health_cares';
            swal({
                    // icon: "warning",
                    type: "warning",
                    title: "Are You Sure You Want to Delete?",
                    text: "",
                    dangerMode: true,
                    showCancelButton: true,
                    confirmButtonColor: "#007358",
                    confirmButtonText: "YES",
                    cancelButtonText: "CANCEL",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(e) {
                    if (e == true) {
                        _this.addClass('disabled-link');
                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{ route('healthmanage-delete') }}",
                            data: {
                                "_token": "{{ csrf_token() }}",
                                'id': id,
                                'table_name': table
                            },
                            success: function(response) {
                                console.log(response);
                                window.setTimeout(function() {
                                    _this.removeClass('disabled-link');
                                }, 2000);

                                if (response.success==true ) {
                                    window.setTimeout(function() {
                                        window.location.reload();
                                    }, 2000);
                                }
                            },
                            error: function(response) {
                                console.log(response);
                            }
                        });
                        swal.close();
                    } else {
                        swal.close();
                    }
                }
            );
        });
    

        //status active and deactive
        $(document).on('click', '.status', function (event) {

         var id = $(this).attr('data-id');
         var type =$(this).attr('data-type');
         //  alert(user_id);
         if(confirm("Are you sure want to change the status ?")){
            $.ajax({
                  type:'POST',
                  url: "{{url('admin/healthmanage-status')}}",
                  data: {"_token" : "{{ csrf_token() }}",'id':id,'type':type},        
                  success: function (response) {        
                  // console.log(response);
                  
                     if (response.status=='ok') { 
                        window.setTimeout(function(){
                           location.reload();
                        },2000);
                        toastr.success("Status Changed Successfully");

                        if(response.type=='active')
                        {
                              $('table.insuffTable tr').find("[data-ac='" + id + "']").fadeIn("slow");
                              $('table.insuffTable tr').find("[data-ac='" + id + "']").removeClass("d-none");

                              $('table.insuffTable tr').find("[data-dc='" + id + "']").fadeOut("slow");

                              $('table.insuffTable tr').find("[data-dc='" + id + "']").addClass("d-none");

                              $('table.insuffTable tr').find("[data-a='" + id + "']").fadeOut("slow");
                              $('table.insuffTable tr').find("[data-a='" + id + "']").addClass("d-none");

                              $('table.insuffTable tr').find("[data-d='" + id + "']").fadeIn("slow");

                              $('table.insuffTable tr').find("[data-d='" + id + "']").removeClass("d-none");

                              
                        }
                        else if(response.type=='deactive')
                        {
                              $('table.insuffTable tr').find("[data-dc='" + id + "']").fadeIn("slow");
                              $('table.insuffTable tr').find("[data-dc='" + id + "']").removeClass("d-none");

                              $('table.insuffTable tr').find("[data-ac='" + id + "']").fadeOut("slow");

                              $('table.insuffTable tr').find("[data-ac='" + id + "']").addClass("d-none");

                              $('table.insuffTable tr').find("[data-d='" + id + "']").fadeOut("slow");
                              $('table.insuffTable tr').find("[data-d='" + id + "']").addClass("d-none");

                              $('table.insuffTable tr').find("[data-a='" + id + "']").fadeIn("slow");

                              $('table.insuffTable tr').find("[data-a='" + id + "']").removeClass("d-none");
                        }
                     } 
                     else {
                        
                     }
                  },
                  error: function (xhr, textStatus, errorThrown) {
                     // alert("Error: " + errorThrown);
                  }
            });

         }
             return false;
        });
    </script>

@endpush