@extends('layouts.dashboard.master')
@section('title','Add Course')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Add Course
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.course.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.course.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group required">
                            <label for="category" class="control-label">Select Category</label>
                            <select class="form-control" id="category" name="categoryId" required>
                                <option disabled selected>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control-file" name="image" id="image" required>
                        </div>
                        <div class="form-group required">
                          <label for="name" class="control-label">Name</label>
                          <input type="text" class="form-control" name="name" id="name"  placeholder="Course name" required>
                        </div>
                        <div class="form-group required">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                        </div>
                        <div class="form-group required">
                            <label for="duration" class="control-label">Duration (In Minutes)</label>
                            <input type="number" class="form-control" name="duration" id="duration"  placeholder="example 15 minutes" required>
                          </div>
                          <div class="form-group required">
                            <label for="price" class="control-label">Price</label>
                            <input type="number" class="form-control" name="price" id="price"  placeholder="example 30" required>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('css')
<style>
    .form-group.required .control-label:after {
    content:"*";
    color:red;
 }
</style>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('form').submit(function(){
                $(this).find('button[type=submit]').prop('disabled', true);
            });
        });
    </script>
@endsection
