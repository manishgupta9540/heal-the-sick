@extends('admin.layouts.master')

@section('title','health Trash')

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
                    <a href="{{route('testimonial-list')}}" class="btn btn-primary btn-sm" style="float:right">Previous</a>
                    <br>
                    <table class="table border  user_datatable mt-3">
                        <thead class="table-light fw-semibold insuffTable">
                            <tr class="align-middle">
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($trashData)>0)
                                @foreach ($trashData as $key => $item)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td><img src="{{asset('uploads/testimonial/'.$item->image)}}" alt="" style="width: 80px; height: 80px;"></td>
                                        <td>
                                            <button class="btn btn-warning btn-sm restore_data" type="button" data-id="{{ base64_encode($item->id) }}"><i class="fas fa-trash-restore"></i> Restore</button>
                                            <button class="btn btn-danger btn-sm delete_hard" type="button" data-id="{{ base64_encode($item->id) }}" > <i class='fa fa-trash'></i> Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"><h2 class="text-center">No Data Found</h2></td>
                                </tr>
                            @endif
                            
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

        // delete button hard deleted
        $(document).on('click', '.delete_hard', function() {
            var _this = $(this);
            var id = $(this).data('id');
        
            var table = 'testimonials';
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
                            url: "{{ route('testimonial-hard-delete') }}",
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
    

        //restore banner data
        $(document).on('click', '.restore_data', function() {
            var _this = $(this);
            var id = $(this).data('id');
        
            var table = 'testimonials';
            swal({
                    // icon: "warning",
                    type: "warning",
                    title: "Are You Sure You Want to Restore Data?",
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
                            url: "{{ route('testimonial-restore-data') }}",
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
    </script>

@endpush