@extends('admin.layouts.master')
@section('title','Edit Course')
@section('css')
<style>
    .form-group.required .control-label:after {
    content:"*";
    color:red;
 }
</style>
@endsection
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Course
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.course.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.course.update', ['id' => $course->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group required">
                            <label for="category" class="control-label">Select Category</label>
                            <select class="form-control" id="category" name="categoryId" required>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{ $category->id == $course->categoryId ? 'selected' : '' }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control-file" name="image" value="{{$course->image}}" id="image">
                        </div>
                        <div class="form-group required">
                          <label for="name" class="control-label">Name</label>
                          <input type="text" class="form-control" name="name" id="name" value="{{$course->name}}"  placeholder="Course name" required>
                        </div>
                        <div class="form-group required">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" required>{{$course->description}}</textarea>
                        </div>
                        <div class="form-group required">
                            <label for="duration" class="control-label">Duration (In Minutes)</label>
                            <input type="number" class="form-control" name="duration" value="{{$course->duration}}" id="duration"  placeholder="example 15 minutes" required>
                          </div>
                          <div class="form-group required">
                            <label for="price" class="control-label">Price</label>
                            <input type="number" class="form-control" name="price" value="{{$course->price}}" id="price"  placeholder="example 30" required>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
