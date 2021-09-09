@extends('layouts.dashboard.master')
@section('title','Status')

@section('content')

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-12">
            <div class="card text-left">
                <div class="card-header">
                    <h5 class="mb-0">Your Status</h5>
                </div>
                <div class="card-body">
                    <p class="card-title">Current status <span class="badge badge-{{$user->user_availability->type}}">{{strtoupper($user->user_availability->name)}}</span></p>

                    <p class="card-title">Change status</p>
                    <form action="{{route('user.status.save')}}" class="form-inline" method="POST">
                    @csrf
                    @method('PUT')
                        <select name="status" class="mr-3">
                            <option value="" selected disabled>SELECT</option>
                            @foreach ($UserAvailability as $item)
                                <option value="{{$item->id}}">{{strtoupper($item->name)}}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    <script type="text/javascript"></script>
@stop
@endsection