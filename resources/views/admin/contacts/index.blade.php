@extends('admin.layouts.master')

@section('title','Contact')

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
                    {{-- <a href="{{route('banner-create')}}" class="btn btn-primary btn-sm">Add banner</a> --}}
                    <br>
                    <table class="table border  user_datatable mt-3">
                        <thead class="table-light fw-semibold insuffTable">
                            <tr class="align-middle">
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $key => $contact)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$contact->username}}</td>
                                    <td>{{$contact->email}}</td>
                                    <td>{{$contact->phone}}</td>
                                    <td>{{ Str::limit($contact->message, 50, '...') }}</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm deleteBtn" type="button" data-id="{{ base64_encode($contact->id) }}" > <i class='fa fa-trash'></i> Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                   {!! $contacts->links() !!}
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
        
            var table = 'contacts';
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
                            url: "{{ route('contact-delete') }}",
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
    

        // //status active and deactive
        // $(document).on('click', '.status', function (event) {

        //  var id = $(this).attr('data-id');
        //  var type =$(this).attr('data-type');
        //  //  alert(user_id);
        //  if(confirm("Are you sure want to change the status ?")){
        //     $.ajax({
        //           type:'POST',
        //           url: "{{url('admin/banner-status')}}",
        //           data: {"_token" : "{{ csrf_token() }}",'id':id,'type':type},        
        //           success: function (response) {        
        //           // console.log(response);
                  
        //              if (response.status=='ok') { 
        //                 window.setTimeout(function(){
        //                    location.reload();
        //                 },2000);
        //                 toastr.success("Status Changed Successfully");

        //                 if(response.type=='active')
        //                 {
        //                       $('table.insuffTable tr').find("[data-ac='" + id + "']").fadeIn("slow");
        //                       $('table.insuffTable tr').find("[data-ac='" + id + "']").removeClass("d-none");

        //                       $('table.insuffTable tr').find("[data-dc='" + id + "']").fadeOut("slow");

        //                       $('table.insuffTable tr').find("[data-dc='" + id + "']").addClass("d-none");

        //                       $('table.insuffTable tr').find("[data-a='" + id + "']").fadeOut("slow");
        //                       $('table.insuffTable tr').find("[data-a='" + id + "']").addClass("d-none");

        //                       $('table.insuffTable tr').find("[data-d='" + id + "']").fadeIn("slow");

        //                       $('table.insuffTable tr').find("[data-d='" + id + "']").removeClass("d-none");

                              
        //                 }
        //                 else if(response.type=='deactive')
        //                 {
        //                       $('table.insuffTable tr').find("[data-dc='" + id + "']").fadeIn("slow");
        //                       $('table.insuffTable tr').find("[data-dc='" + id + "']").removeClass("d-none");

        //                       $('table.insuffTable tr').find("[data-ac='" + id + "']").fadeOut("slow");

        //                       $('table.insuffTable tr').find("[data-ac='" + id + "']").addClass("d-none");

        //                       $('table.insuffTable tr').find("[data-d='" + id + "']").fadeOut("slow");
        //                       $('table.insuffTable tr').find("[data-d='" + id + "']").addClass("d-none");

        //                       $('table.insuffTable tr').find("[data-a='" + id + "']").fadeIn("slow");

        //                       $('table.insuffTable tr').find("[data-a='" + id + "']").removeClass("d-none");
        //                 }
        //              } 
        //              else {
                        
        //              }
        //           },
        //           error: function (xhr, textStatus, errorThrown) {
        //              // alert("Error: " + errorThrown);
        //           }
        //     });

        //  }
        //  return false;

        // });
    </script>

@endpush