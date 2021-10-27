@extends('layouts.dashboard.master')
@section('title','Add Case study')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Add Case study
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
                                    <option value="{{$category->id}}" {{ (old('categoryId') == $category->id ? 'selected' : '') }}>{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('categoryId') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="teacherId" class="control-label">Select Expert</label>
                            <select class="form-control" id="teacherId" name="teacherId">
                                <option disabled selected>Select Expert</option>
                                @foreach ($experts as $expert)
                                    <option value="{{$expert->id}}" {{ (old('teacherId') == $expert->id ? 'selected' : '') }}>{{$expert->name}}</option>
                                @endforeach
                            </select>
                            @error('teacherId') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control-file" name="image" id="image">
                            @error('image') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="preview_video_url" class="control-label">Preview video</label>
                                <input type="file" class="form-control-file" name="preview_video_url" id="preview_video_url">
                                @error('preview_video_url') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="original_video_url" class="control-label">Original video<span class="text-danger">*</span> </label>
                                <input type="file" class="form-control-file" name="original_video_url" id="original_video_url">
                                @error('original_video_url') <p class="text-danger">{{$message}}</p> @enderror
                            </div>
                        </div>
                        <div class="form-group required">
                          <label for="name" class="control-label">Name</label>
                          <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Course name">
                          @error('name') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3">{{old('description')}}</textarea>
                            @error('description') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="duration" class="control-label">Duration (In Minutes)</label>
                            <input type="number" class="form-control" name="duration" id="duration"  placeholder="example 15 minutes" value="{{old('duration')}}">
                            @error('duration') <p class="text-danger">{{$message}}</p> @enderror
                          </div>
                          <div class="form-group required">
                            <label for="price" class="control-label">Price</label>
                            <input type="number" class="form-control" name="price" id="price"  placeholder="example 30" value="{{old('price')}}">
                            @error('price') <p class="text-danger">{{$message}}</p> @enderror
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
