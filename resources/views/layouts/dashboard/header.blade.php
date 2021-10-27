<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand" href="{{URL::to('/')}}">Not Your Parent</a>
        {{-- <a class="navbar-brand" href="javascript:void(0)">Not Your Parent</a> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                @if(Auth::user())
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            @if ($notification->unreadCount > 0)
                                <span class="badge badge-danger">{{$notification->unreadCount}}</span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown noti-details" aria-labelledby="navbarDropdownMenuLink1">
                            @forelse ($notification as $noti)
                                @if ($noti->read_flag == 0)
                                    {{-- unread notification --}}
                                    <a href="javascript:void(0)" class="dropdown-item single-noti unread-noti" onclick="readNotification('{{$noti->id}}', '{{($noti->route ? route($noti->route) : '')}}')">
                                        <h6 class="mb-2">{{$noti->title}}</h6>
                                        <p class="small text-muted">{{$noti->message}}</p>
                                        <p class="small text-muted text-right">{{ \Carbon\Carbon::parse($noti->created_at)->diffForHumans() }}</p>
                                    </a>
                                @else
                                    {{-- read notification --}}
                                    <a href="javascript:void(0)" onclick="readNotification('{{$noti->id}}', '{{($noti->route ? route($noti->route) : '')}}')" class="dropdown-item single-noti read-noti">
                                        <h6 class="mb-2">{{$noti->title}}</h6>
                                        <p class="small text-muted">{{$noti->message}}</p>
                                        <p class="small text-muted text-right">{{ \Carbon\Carbon::parse($noti->created_at)->diffForHumans() }}</p>
                                    </a>
                                @endif
                            @empty
                            <a href="javascript:void(0)" class="dropdown-item"><p class="small text-muted text-center">No notifications yet</p></a>
                            @endforelse
                            {{-- <a class="dropdown-item text-center p-0" href="#"><span class="badge badge-light border" style="font-size: 14px;">View all notification</span></a> --}}
                        </div>
                    </li>
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{Auth::user()->image}}" alt="" class="user-avatar-md rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                            <div class="nav-user-info">
                                <h5 class="mb-0 text-white nav-user-name">{{ucwords(Auth::user()->name)}} </h5>
                            </div>
                            <a class="dropdown-item" href="{{url('/home')}}"><i class="fas fa-user mr-2"></i>Dashboard</a>
                            <a class="dropdown-item" href="{{route('user.profile')}}"><i class="fas fa-cog mr-2"></i>Setting</a>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <div id="custom-search" class="top-search-bar">
                            <a href="{{url('login')}}">Login</a> | <a href="#">Register</a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
