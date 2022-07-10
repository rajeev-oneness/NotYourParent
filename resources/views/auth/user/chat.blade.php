@extends('front.layouts.master')
@section('head-script-style')
@endsection

@section('title')
    Chat
@endsection

@section('content')
<section class="job_listing header_padding">
<div class="container  dashboard-content">
    <div class="row m-0 justify-content-center chat_section">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <h5>Chat</h5>
            {{-- <div class="col-6 text-right"><a href="#allUserModal" data-toggle="modal" class="btn btn-sm btn-primary">Start new chat</a></div> --}}
                    <div class="row m-0">
                        <div class="col-md-12">
                            <div class="row">
                                @if (count($data) > 0)
                                <div class="col-md-3 px-0 bg-white">
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach($data as $index => $user)
                                            @php
                                                if ($user->message_from == auth()->user()->id) {
                                                    $displayName = $user->user_to->name;
                                                    $displayImage = asset($user->user_to->image);
                                                } else {
                                                    $displayName = $user->user_from->name;
                                                    $displayImage = asset($user->user_from->image);
                                                }
                                            @endphp
                                            <a class="nav-link rounded-0 {{$index == 0 ? 'active' : ''}} chatSeriel{{$index}}" data-toggle="pill" href="javascript: void(0)" onclick="chatChange('{{$displayName}}', '{{json_encode($user->messages)}}', {{$user->id}}, '{{$displayImage}}')">
                                                <img src="{{$displayImage}}" alt="user" height="27" class="rounded-circle">
                                                {{$displayName}}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-md-9 px-0">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        {{-- <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div class="card-body text-center">
                                                <h6 class="text-muted my-3">Select student to start chat</h6>
                                            </div>
                                        </div> --}}

                                        <div class="tab-pane chat__tabs fade show active" id="v-pills-chat">
                                            <div class="card mb-0 rounded-0">
                                                <div class="card-header p-2">
                                                    please wait...
                                                </div>
                                                <div class="card-body" style="min-height: 200px;max-height: 350px;overflow-y: scroll;display: flex;flex-direction: column-reverse;">
                                                    <div class="row" id="userMessages"></div>
                                                </div>
                                                <div class="card-footer text-muted p-0 border-bottom-0">
                                                    <form action="{{ route('user.chat.create') }}" class="form-inline" method="post" autocomplete="off" id="createNewChat">
                                                        <div class="form-group" style="width: 90%">
                                                            <input type="hidden" id="conversation_id" name="conversation_id" value="">
                                                            <input type="text" class="form-control rounded-0 w-100" id="typed_message" name="message" placeholder="Type something...">
                                                        </div>
                                                        <button type="submit" class="btn chat_send"><i class="fa fa-fw fa-paper-plane"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="col-md-12 text-center my-5">
                                        <p class="text-muted"><em>No chats yet</em></p>
                                        <p class="small text-muted mt-3">You can talk to experts after you purchase their contents</p>
                                        <a href="{{route('front.experts')}}" class="btn btn-sm btn-primary">View all experts</a>
                                    </div>
                                @endif
                            </div>
                        </div>                       
                    </div>
            </div>
        </div>
    </div>
</div>
</section>
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
                    {{-- @foreach ($user as $item)
                        <div class="mb-2">
                            <form action="{{ route('user.chat.new') }}" method="POST">
                            @csrf
                                <input type="hidden" name="student_id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-sm btn-primary">{{ $item->name }}</button>
                            </form>
                        </div>
                    @endforeach --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function chatChange(userName, message, conversationId, image) {
        $('#v-pills-chat .card-header').html('<img src="'+image+'" alt="user" height="27" class="rounded-circle"> '+userName);
        $('#conversation_id').val(conversationId);
        var messages = JSON.parse(message);
        var chat = '';
        if (messages.length > 0) {
            $.each(messages,function(index, value){
                if ('{{auth()->user()->id}}' == value.from_id) {
                    chat += '<div class="col-12 text-right"><div class="alert alert-primary p-1 d-inline-block" style="max-width: 60%;">'+value.message+'<p style="font-size: 11px">'+moment(value.created_at).fromNow()+'</p></div></div>';
                } else {
                    chat += '<div class="col-12"><div class="alert alert-secondary p-1 d-inline-block" style="max-width: 60%;">'+value.message+'<p style="font-size: 11px">'+moment(value.created_at).fromNow()+'</p></div></div>';
                }
            });
        } else {
            chat += '<div class="col-12 text-center"><p class="small text-muted">Start chat with '+userName+'</p></div>';
        }
        $('#typed_message').focus();
        $('#userMessages').empty().append(chat);
    }

    $(document).ready(function () {
        $('.chatSeriel0').trigger('click');
    });

    $('#createNewChat').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url : $(this).prop('action'),
            method : $(this).prop('method'),
            data : {'_token' : '{{csrf_token()}}', conversation_id : $('#conversation_id').val(), message : $('#typed_message').val()},
            success : function(result) {
                $('#userMessages').append('<div class="col-12 text-right"><div class="alert alert-primary p-1 d-inline-block" style="max-width: 60%;">'+result.data.message+'<p style="font-size: 11px">'+moment(result.data.created_at).fromNow()+'</p></div></div>');
                $('#typed_message').val('');
            }
        });
    });
</script>   

<script src="https://www.gstatic.com/firebasejs/7.23.0/firebase.js"></script>

<script>
    var firebaseConfig = {
        apiKey: "AIzaSyAYJjqz2ZIqdGMFO5SoWVJXkOaFNZ9eQ1U",
        authDomain: "rajeevpushnotification.firebaseapp.com",
        projectId: "rajeevpushnotification",
        storageBucket: "rajeevpushnotification.appspot.com",
        messagingSenderId: "22286065452",
        appId: "1:22286065452:web:cfa73197b76a279d111689",
        measurementId: "G-SEC697RZE8"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();
    initFirebaseMessagingRegistration();
    function initFirebaseMessagingRegistration() {
        messaging.requestPermission().then(function () {
            return messaging.getToken()
        }).then(function(token) {
            console.log('Web Token Is',token);
            $('#webToken').val(token);
        }).catch(function (err) {
            console.log('User Chat Token Error'+ err);
        });
    }

    messaging.onMessage(function(payload) {
        console.log(payload);
    });
</script>
@endsection