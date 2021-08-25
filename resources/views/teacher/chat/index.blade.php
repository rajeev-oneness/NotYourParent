@extends('layouts.dashboard.master')
@section('title','Chat')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card" sty le="border: 0;box-shadow: 0px 1px 2px 1px transparent;">
                <div class="card-header">
                    <h5 class="mb-0">Teacher Chat</h5>
                </div>
                <div class="card-body p-0">
                    <div class="row mx-0">
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-3 px-0">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach($data as $item)
                                            <a class="nav-link rounded-0" id="v-pills-chat-tab-{{ $item->id }}" data-toggle="pill" href="#v-pills-chat-{{ $item->id }}" role="tab" aria-controls="v-pills-chat" aria-selected="false">{{ ucwords($item->name) }}</a>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-9 px-0">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="card-body text-center">
                                                <h6 class="text-muted my-3">Select student to start chat</h6>
                                            </div>
                                        </div>

                                        @foreach($data as $item)
                                            <div class="tab-pane chat__tabs fade" id="v-pills-chat-{{ $item->id }}" role="tabpanel" aria-labelledby="v-pills-chat-tab">
                                                <div class="card mb-0 rounded-0">
                                                    <div class="card-header p-2">
                                                        {{ ucwords($item->name) }}
                                                    </div>
                                                    <div class="card-body" style="min-height: 200px;max-height: 350px;overflow-y: scroll;display: flex;flex-direction: column-reverse;">

                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="alert alert-primary p-1 d-inline-block">
                                                                    hello
                                                                    <p style="font-size: 11px">2 mins ago</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 text-right">
                                                                <div class="alert alert-secondary p-1 d-inline-block">
                                                                    hey ! how are you ?
                                                                    <p style="font-size: 11px">2 mins ago</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="alert alert-primary p-1 d-inline-block">
                                                                    I'm okay
                                                                    <p style="font-size: 11px">2 mins ago</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="alert alert-primary p-1 d-inline-block">
                                                                    Do you need any help ?
                                                                    <p style="font-size: 11px">2 mins ago</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="alert alert-primary p-1 d-inline-block">
                                                                    I'm okay
                                                                    <p style="font-size: 11px">2 mins ago</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="alert alert-primary p-1 d-inline-block">
                                                                    Do you need any help ?
                                                                    <p style="font-size: 11px">2 mins ago</p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="card-footer text-muted p-0">
                                                        <form class="form-inline" method="post" autocomplete="off">
                                                            <div class="form-group" style="width: 90%">
                                                                <input type="text" class="form-control rounded-0 w-100" id="message" name="message" placeholder="Type something...">
                                                            </div>
                                                            <button type="submit" class="btn btn-primary rounded-0 ml-2"><i class="fa fa-fw fa-paper-plane"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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