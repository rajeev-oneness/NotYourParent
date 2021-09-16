@extends('layouts.dashboard.master')
@section('title','Edit How it works')
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
                    <h5 class="mb-0">Edit How it works
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.howItWorks.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.howItWorks.update', ['id' => $howitworks->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        @if ($howitworks->key == 'how_it_works_main')
                        <span class="badge badge-primary rounded-0">MAIN content</span>
                        @else
                        <span class="badge badge-info rounded-0">CHILD content</span> 
                        @endif

                        <br>

                        <img src="{{asset($howitworks->image)}}" class="img-fluid" alt="content-image" style="height: 100px;">
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control-file" name="image" value="{{asset($howitworks->image)}}" id="image">
                        </div>
                        <div class="form-group required">
                            <label for="heading" class="control-label">Heading</label>
                            <input type="text" class="form-control" name="heading" id="heading" value="{{$howitworks->heading}}" placeholder="Heading" required>
                            @error('heading') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <textarea type="text" class="form-control" name="description" id="description" placeholder="Description">{{$howitworks->description}}</textarea>
                            @error('description') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="form-group">
                            <label for="link" class="control-label">Link</label>
                            <input type="text" class="form-control" name="link" value="{{$howitworks->link}}" id="link" placeholder="Link">
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
