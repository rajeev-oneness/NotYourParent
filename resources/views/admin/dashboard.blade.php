@extends('layouts.dashboard.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Admin Dashboard</h5>
                </div>
                <div class="card-body">
                    <p>Welcome, {{ucwords(Auth::user()->name)}}</p>

                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{route('admin.user.index')}}" class="text-decoration-none">
                                <div class="card parent-card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fa fa-user-circle mr-2"></i> All Users</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('admin.user.students')}}" class="text-decoration-none">
                                <div class="card child-card">
                                    <div class="card-body">
                                        <h4 class="card-title">Users</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('admin.user.teachers')}}" class="text-decoration-none">
                                <div class="card child-card">
                                    <div class="card-body">
                                        <h4 class="card-title">Experts</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{route('admin.article.index')}}" class="text-decoration-none">
                                <div class="card parent-card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fa fa-user-circle mr-2"></i> Articles</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('admin.category.index')}}" class="text-decoration-none">
                                <div class="card parent-card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fa fa-user-circle mr-2"></i> Categories</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route('admin.knowledgebank.index')}}" class="text-decoration-none">
                                <div class="card parent-card">
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fa fa-user-circle mr-2"></i> Knowledge bank</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
