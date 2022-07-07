@extends('layouts.dashboard.master')
@section('title','Add Job Category')
@section('css')
    <link rel="stylesheet" href="{{ asset('design/vendor/select2/css/select2.css') }}">
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
                    <h5 class="mb-0">Add Job Category
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.jobcat.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    @if(Session::has('message'))
                        <p class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>{{ Session::get('message') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-8">
                            <form method="POST" action="{{ route('admin.jobcat.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group required">
                                  <label for="title" class="control-label">Title</label>
                                  <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title"  placeholder="Give some meaningful title" required>
                                </div>
                                <div class="form-group required">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea class="form-control" name="description" value="{{ old('description') }}" id="description" rows="3" required></textarea>
                                  </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('design/vendor/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();

        $('form').submit(function(){
            $(this).children('button[type=submit]').prop('disabled', true);
        });
    });

</script>
@endsection
