@extends('layouts.dashboard.master')
@section('title','Dashboard')

@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Student Dashboard</h5>
                </div>
                <div class="card-body">
                    <p>Welcome, {{ucwords(Auth::user()->name)}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection