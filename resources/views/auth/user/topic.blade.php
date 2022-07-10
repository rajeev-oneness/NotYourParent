@extends('front.layouts.master')
@section('head-script-style')
@endsection

@section('title')
    Topic
@endsection

@section('content')
<section class="job_listing header_padding">

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-12">
            <div class="card text-left">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h5 class="mb-0">Category & Topic</h5></div>
                        <div class="col-6 text-right"><a href="{{route('user.profile')}}" class="btn btn-sm"> <i class="fa fa-chevron-left"></i> Back to Settings</a></div>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::get('error'))
                        <div class="alert alert-danger">{{(Session::get('error'))}}</div>
                    @endif

                    <h5 class="text-muted">Expert in {{$user->user_primary_category->name;}}. you can not change this.</h5>

                    <div class="btn-group" role="group" aria-label="Basic example">
                    @forelse ($teacher_topics as $item)
                        <button type="button" class="btn btn-secondary">
                            {{ucwords($item->topicDetail->name)}}
                            <a href="{{route('user.topic.delete', ["id" => $item->id])}}" class="ml-3 text-warning"> <i class="fa fa-times"></i> </a>
                        </button>
                    @empty
                        <p class="small">No topics added yet</p>
                    @endforelse
                    </div>

                    <br>
                    <br>

                    <form action="{{route('user.topic.save')}}" class="form-inline" method="POST">
                    @csrf
                    @method('PUT')
                        <select name="topicId" class="mr-3">
                            <option value="" selected disabled>Add new topic</option>
                            @foreach ($topics as $item)
                                <option value="{{$item->id}}">{{ucwords($item->name)}}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-sm btn-primary">Save</button>

                        <p class="small text-danger ml-2">@error('topicId'){{$message}}@enderror</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@section('script')
    <script type="text/javascript"></script>
@stop
@endsection