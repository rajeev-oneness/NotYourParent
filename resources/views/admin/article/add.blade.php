@extends('layouts.dashboard.master')
@section('title','Add Article')
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
                    <h5 class="mb-0">Add Article
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.article.index')}}">
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
                            <form method="POST" action="{{ route('admin.article.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group required">
                                    <label for="image" class="control-label">Image</label>
                                    <input type="file" class="form-control-file" name="image" value="{{ old('image') }}" id="image" required>
                                  </div>
                                <div class="form-group required">
                                  <label for="title" class="control-label">Title</label>
                                  <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title"  placeholder="Give some meaningful title" required>
                                </div>
                                <div class="form-group required">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea class="form-control" name="description" value="{{ old('description') }}" id="description" rows="3" required></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="tags">Tags</label>
                                    {{-- <input type="text" class="form-control js-example-basic-multiple" name="tags[]" id="tags"  multiple="multiple" placeholder=""> --}}
                                    <select class="js-example-basic-multiple" name="tags[]" multiple="multiple" id="tags">
                                        @foreach ($tags as $tag)
                                            <option value="{{$tag->id}}">{{ $tag->name }}</option>
                                        @endforeach
                                      </select>
                                  </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Add new Tag
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.tag.store')}}" method="post">
                                        @csrf
                                        <div class="form-group ">
                                            <label for="name" >Name</label>
                                            <input type="text" class="form-control" name="name" id="name"  placeholder="Tag name" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary add-tag">Add</button>
                                    </form>
                                </div>
                            </div>
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
