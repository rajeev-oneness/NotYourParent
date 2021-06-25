@extends('admin.layouts.master')
@section('title','Courses')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Courses
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.course.add')}}">
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
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Teacher</th>
                                    <th>Duration (Minutes)</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($courses as $key => $course)
                            <tbody>
                                <tr>
                                    <td>{{$key + 1}}</td>
                                    <td><img src="{{asset($course->image)}}" width="60" /></td>
                                    <td>{{$course->categoryDetail->name}}</td>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->teacherDetail->name}}</td>
                                    <td>{{$course->duration}}</td>
                                    <td>{{$course->price}}</td>
                                    <td><a href="{{route('admin.course.edit',['id' => $course->id])}}">Edit</a> | <a href="{{route('admin.course.delete',['id' => $course->id])}}" class="text-danger">Delete</a></td>
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
