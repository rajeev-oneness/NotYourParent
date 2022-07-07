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
                    {{-- <p>Welcome, {{ucwords(Auth::user()->name)}}</p> --}}
                    <span>MAIN</span>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('admin.user.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-users"></i>
                                        <p>Users</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('admin.article.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-rss-square"></i>
                                        <p>Articles</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('admin.category.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-clipboard-list"></i>
                                        <p>Categories</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('admin.knowledgebank.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-box-open"></i>
                                        <p>Knowledge Bank</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('admin.course.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fa fa-book"></i>
                                        <p>Case studies</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('admin.topic.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-list"></i>
                                        <p>Topics</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('admin.language.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-language"></i>
                                        <p>Language</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <span>REPORT</span>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{ route('user.transactions.index') }}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-credit-card"></i>
                                        <p>Transactions</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('user.sessions.index') }}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-play"></i>
                                        <p>Video sessions</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('user.caseStudy.index') }}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fa fa-book"></i>
                                        <p>Case studies</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <span>FEATURES</span>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('admin.testimonial.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-comment-alt"></i>
                                        <p>Testimonial</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('admin.faq.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fab fa-rocketchat"></i>
                                        <p>Faq</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{route('admin.commission.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-dollar-sign"></i>
                                        <p>Commissions</p>
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
