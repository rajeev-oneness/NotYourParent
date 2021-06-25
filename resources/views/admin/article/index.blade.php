@extends('admin.layouts.master')
@section('title','Articles')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Articles
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.article.add')}}">
                            <i class="fa fa-plus" aria-hidden="true"></i>Add
                        </a>
                    </h5>
                    <!-- <p>This example shows FixedHeader being styled by the Bootstrap 4 CSS framework.</p> -->
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Posted by</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($articles as $article)
                            <tbody>
                                <tr>
                                    <td>{{$article->id}}</td>
                                    <td><img src="{{asset($article->image)}}" width="60" /></td>
                                    <td>{{$article->title}}</td>
                                    <td>{{$article->author->name}}</td>
                                    <td><a href="{{route('admin.article.edit',['id' => $article->id])}}">Edit</a> | <a href="{{route('admin.article.delete',['id' => $article->id])}}" class="text-danger">Delete</a></td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#example4').DataTable();
    });
</script>
@stop
@endsection
