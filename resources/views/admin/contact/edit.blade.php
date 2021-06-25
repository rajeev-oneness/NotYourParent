@extends('admin.layouts.master')
@section('title','Edit Contact Us')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Contact Us
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.contactUs.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.contactUs.update', ['id' => $contactUs->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group required">
                            <label for="image" class="control-label">Image</label>
                            <input type="file" class="form-control-file" name="image" value="{{$contactUs->image}}" id="image">
                        </div>
                        <div class="form-group required">
                          <label for="name" class="control-label">Name</label>
                          <input type="text" class="form-control" name="name" value="{{$contactUs->name}}" id="name"  placeholder="Name" required>
                        </div>
                        <div class="form-group required">
                            <label for="address" class="control-label">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3" required>{{$contactUs->address}}</textarea>
                        </div>
                        <div class="form-group required">
                            <label for="email" class="control-label">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{$contactUs->email}}" id="email" placeholder="Enter email">
                        </div>
                        <div class="form-group required">
                            <label for="phone_number" class="control-label">Phone Number</label>
                            <input type="tel" class="form-control" name="phone_number" value="{{$contactUs->phone}}" id="phone_number" placeholder="example: [88] 657 524 332">
                        </div>
                        <div class="form-group required">
                            <label for="facebook" class="control-label">Facebook</label>
                            <input type="text" class="form-control" name="facebook" value="{{$contactUs->facebook}}" id="facebook" placeholder="example: https://www.facebook.com/username">
                        </div>
                        <div class="form-group required">
                            <label for="linkedIn" class="control-label">LinkedIn</label>
                            <input type="text" class="form-control" name="linkedin" value="{{$contactUs->linkedin}}" id="linkedIn" placeholder="example: https://www.linkedin.com/companyname">
                        </div>
                        <div class="form-group required">
                            <label for="youtube" class="control-label">Youtube</label>
                            <input type="text" class="form-control" name="youtube" value="{{$contactUs->youtube}}" id="youtube" placeholder="example: https://www.youtube.com/username">
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
