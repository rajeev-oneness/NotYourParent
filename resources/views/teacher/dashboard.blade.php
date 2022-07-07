@extends('layouts.dashboard.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Teacher Dashboard</h5>
                </div>
                <div class="card-body">
                    <p>Welcome, {{ucwords(Auth::user()->name)}}</p>
                    <span>MENU</span>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('teacher.my-course.index')}}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-book"></i>
                                        <p>My Case study</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('teacher.my-slots.slotList') }}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-bookmark"></i>
                                        <p>My Slots</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('teacher.knowledgebank.index') }}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-box-open"></i>
                                        <p>Knowledge Bank</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <span>PURCHASE RELATED</span>
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
                        <div class="col-3">
                            <a href="{{ route('user.chat.index') }}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fa fa-comment"></i>
                                        <p>Chat</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <span>SETTINGS</span>
                    <div class="row">
                        <div class="col-3">
                            <a href="{{ route('user.profile') }}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fa fa-cog"></i>
                                        <p>Settings</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-3">
                            <a href="{{ route('user.status') }}">
                                <div class="card inner-card">
                                    <div class="card-body p-0 d-flex">
                                        <i class="fas fa-circle-notch"></i>
                                        <p>Status</p>
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
