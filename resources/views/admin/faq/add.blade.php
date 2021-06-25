@extends('admin.layouts.master')
@section('title','Add FAQs')
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
                    <h5 class="mb-0">Add FAQs
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.faq.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.faq.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group required">
                          <label for="title" class="control-label">Title</label>
                          <input type="text" class="form-control" name="title" id="title"  placeholder="Give some meaningful title" required>
                        </div>
                        <div class="form-group required">
                            <label for="description" class="control-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                          </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


