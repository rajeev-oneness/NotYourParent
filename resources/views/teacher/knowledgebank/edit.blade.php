@extends('layouts.dashboard.master')
@section('title','Edit Knowledge Bank')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Edit Knowledge Bank
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('teacher.knowledgebank.index')}}">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                        </a>
                    </h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('teacher.knowledgebank.update', ['id' => $knowledgebank->id]) }}">
                        @csrf
                        @method('PUT')
                        {{-- <div class="form-group required">
                            <label for="category" class="control-label">Category</label>
                            <select name="category" id="category" class="form-control">
                                @foreach ($knowledgebankcategory as $item)
                                    <option {{ $knowledgebank->category == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                        </div> --}}
                        <input type="hidden" name="category" value="2">
                        <div class="form-group required">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ $knowledgebank->title }}">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="subtitle" class="control-label">Subtitle</label>
                            <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Subtitle" value="{{ $knowledgebank->subtitle }}">
                            @error('subtitle') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="form-group required">
                            <label for="description" class="control-label">Description</label>
                            <textarea name="description" id="description" class="form-control" style="min-height: 100px;max-height: 300px" placeholder="Description">{{ $knowledgebank->description }}</textarea>
                            @error('description') <small class="text-danger">{{ $message }}</small> @enderror
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
