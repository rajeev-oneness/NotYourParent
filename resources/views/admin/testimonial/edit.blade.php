@extends('layouts.dashboard.master')
@section('title','Edit Testimonial')
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
                    <h5 class="mb-0">Edit Testimonial
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.testimonial.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.testimonial.update', ['id' => $testimonial->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group required">
                            <label for="teacher" class="control-label">Select Teacher</label>
                            <select class="form-control" id="teacher" name="teacherId" required>
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}" {{ $teacher->id == $testimonial->teacherId ? 'selected' : '' }}>{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control-file" name="image" value="{{$testimonial->image}}" id="image">
                        </div>
                        <div class="form-group required">
                          <label for="name" class="control-label">Name</label>
                          <input type="text" class="form-control" name="name" id="name" value="{{$testimonial->name}}"  placeholder="testimonial name" required>
                        </div>
                        <div class="form-group required">
                            <label for="designation" class="control-label">Designation</label>
                            <input type="text" class="form-control" name="designation" value="{{$testimonial->designation}}" id="designation"  placeholder="example 15 minutes" required>
                          </div>
                          <div class="form-group required">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$testimonial->title}}" id="quote"  placeholder="example 30" required>
                          </div>
                        <div class="form-group required">
                            <label for="quote" class="control-label">Quote</label>
                            <textarea class="form-control" name="quote" id="quote" rows="3" required>{{$testimonial->quote}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
