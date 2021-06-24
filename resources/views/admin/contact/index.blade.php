@extends('admin.layouts.master')
@section('title','Contact Us')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Contact Us
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Phone no</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$contactUs->id}}</td>
                                    <td><img src="{{asset($contactUs->image)}}" width="60" /></td>
                                    <td>{{$contactUs->name}}</td>
                                    <td>{{$contactUs->phone}}</td>
                                    <td>{{$contactUs->email}}</td>
                                    <td>{{$contactUs->address}}</td>
                                    <td><a href="{{route('admin.contactUs.edit',['id' => $contactUs->id])}}">Edit</a> </td>
                                </tr>
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
</script>
@stop
@endsection
