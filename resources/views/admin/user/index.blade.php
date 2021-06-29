@extends('admin.layouts.master')
@section('title','Users')
@section('css')
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Users
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.user.add')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add
                        </a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><img src="{{asset($user->image)}}" width="60" /></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->mobile}}</td>
                                    {{-- <td>{{$user->status}}</td> --}}
                                    <td>
                                        <input id="toggle-block" type="checkbox"  data-toggle="toggle" data-size="sm" name="status" class="checkbox btn-radius" data-user_id="{{ $user->id }}" {{ $user->status == 1 ? 'checked' : '' }}>
                                    </td>
                                    <td><a href="{{route('admin.user.edit',['id' => $user->id])}}">Edit</a> | <a href="#" data-id="{{$user->id}}" class="text-danger delete-confirm">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example4').DataTable();
    });


    $('input[id="toggle-block"]').change(function() {
            var user_id = $(this).data('user_id');
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var status = 0;
          if($(this).is(":checked")){
              status = 1;
          }else{
            status = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('admin.user.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:user_id, status:status},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                }
              });
        });

        //confirm delete
        $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = "user/delete/";
        const id = $(this).data('id');
        swal({
            title: 'Are you sure?',
            text: 'This record will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
            }).then(function(value) {
            if (value) {
                swal("Deleted!", "Successful!", "success");
                window.location.href = url + id;
                }
            });
        });
</script>
@stop
@endsection
