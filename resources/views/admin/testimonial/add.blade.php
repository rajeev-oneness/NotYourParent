@extends('layouts.dashboard.master')
@section('title','Add new Testimonials')
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
                    <h5 class="mb-0">Add a New Testimonials
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.testimonial.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.testimonial.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group required">
                            <label for="category" class="control-label">Select Teacher</label>
                            <select class="form-control" id="category" name="teacherId" required>
                                <option disabled selected>Select Teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control-file" name="image" id="image" required>
                        </div>
                        <div class="form-group required">
                          <label for="name" class="control-label">Name</label>
                          <input type="text" class="form-control" name="name" id="name"  placeholder="example. John Doe" required>
                        </div>
                        <div class="form-group required">
                          <label for="designation" class="control-label">Designation</label>
                          <input type="text" class="form-control" name="designation" id="designation"  placeholder="example. Charlotte, NC" required>
                        </div>
                        <div class="form-group required">
                          <label for="title" class="control-label">Title</label>
                          <input type="text" class="form-control" name="title" id="title"  placeholder="example. Software Developer" required>
                        </div>
                        <div class="form-group required">
                            <label for="quote" class="control-label">Quote</label>
                            <textarea class="form-control" name="quote" id="quote" rows="3" required></textarea>
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


