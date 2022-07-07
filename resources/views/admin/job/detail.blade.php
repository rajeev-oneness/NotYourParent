@extends('layouts.dashboard.master')
@section('title','Job Details')
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
                    <h5 class="mb-0">Job Details
                        <a class="headerbuttonforAdd addBlogCategory" href="{{route('admin.job.index')}}">
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
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>{{ $job->title }}</h3>
                                            <p class="small">{{ $job->description }}</p>
                                            <p class="small">{{ $job->skill }}</p>
                                            <p class="small">{{ $job->scope }}</p>
                                            <p class="small">{{ $job->budget }}</p>
                                            <p class="small">{{ $job->start_date }}-{{ $data->end_date }}</p>
                                            <hr>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="text-muted">Applied User</h3>
                                            <p></p>

                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th class="text-center"><i class="fi fi-br-picture"></i></th>
                                                    <th>Name</th>
                                                    <th>Contact Details</th>
                                                    <th>Bio</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($jobuser as $index => $item)
                                                    <tr>
                                                        <td class="text-center column-thumb">
                                                            <img src="{{ asset($item->image) }}" />
                                                        </td>

                                                        <td>{{$item->user->name}}</td>
                                                        <td>{{$item->user->email}}<br>{{$item->user->mobile}}</td>
                                                        <td>
                                                            {{$item->user->bio}}

                                                    </tr>
                                                    @empty
                                                    <tr><td colspan="100%" class="small text-muted">No data found</td></tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
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
