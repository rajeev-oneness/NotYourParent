@extends('layouts.dashboard.master')
@section('title','Chat')
@section('content')
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card" sty le="border: 0;box-shadow: 0px 1px 2px 1px transparent;">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6"><h5 class="mb-0">Teacher Chat</h5></div>
                        <div class="col-6 text-right"><a href="#allUserModal" data-toggle="modal" class="btn btn-sm btn-primary">Start new chat</a></div>
                    </div>
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

                                                        {{ route('teacher.chat.single', $item->id) }}

                                                        {{-- @foreach ($message as $item)
                                                            {{ $item->id }}
                                                        @endforeach --}}

                                                        {{-- <div class="row">
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
                                                        </div> --}}

                                                    </div>
                                                    <div class="card-footer text-muted p-0">
                                                        <form action="{{ route('teacher.chat.create') }}" class="form-inline" method="post" autocomplete="off">
                                                        @csrf
                                                            <div class="form-group" style="width: 90%">
                                                                <input type="hidden" name="conversation_id" value="{{ $item->id }}">
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

<div class="modal fade" id="allUserModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Select student to start new chat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <p class="small">Select users from following</p>
                    @foreach ($user as $item)
                        <div class="mb-2">
                            <form action="{{ route('teacher.chat.new') }}" method="POST">
                            @csrf
                                <input type="hidden" name="student_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-sm btn-primary">{{ $item->name }}</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection