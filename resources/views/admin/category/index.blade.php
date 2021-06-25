@extends('admin.layouts.master')
@section('title','Categories')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Categories
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.category.add')}}">
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
                                    <th>name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($categories as $category)
                            <tbody>
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td><a href="{{route('admin.category.edit',['id' => $category->id])}}">Edit</a> | <a href="{{route('admin.category.delete',['id' => $category->id])}}" class="text-danger">Delete</a></td>
                                </tr>
                            </tbody>
                            @endforeach
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
