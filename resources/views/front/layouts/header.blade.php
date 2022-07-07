<header class="{{(request()->routeIs('front.experts.*') || request()->routeIs('front.experts') || request()->routeIs('front.how-it-works') || request()->routeIs('front.knowledge-bank') || request()->routeIs('front.articles'))?'experts_header':'main_header'}}">
    <div class="container">
        <div class="header_top position-relative">
            <div class="row no-gutters justify-content-center">
                <div class="logo">
                    <a href="{{route('front.home')}}">
                        <img src="{{asset('front/images/logo.png')}}" alt="Logo">
                    </a>
                </div>
                <div class="header_right">
                    <ul>
                        <li class="expart_btn"><a href="{{route('front.job.index')}}">Post Job</a></li>
                        @auth
                        <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </a>
                        @if(Auth::user())
                    <li class="nav-item dropdown nav-user">
                        <a class="nav-link nav-user-img bell-icon" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            @php
                                $notificationCount = $notification->unreadCount;

                                if ($notificationCount > 0) {
                                    if ($notificationCount > 99) {
                                        $notificationCount = '99+';
                                    }
                                    echo '<span class="badge badge-danger">'.$notificationCount.'</span>';
                                }
                            @endphp
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
                    @endif
                            <li class="expart_btn"><a href="{{url('/home')}}">{{ucwords(auth()->user()->name)}}</a></li>
                            <li class="sign_up_btn"><a href="{{route('logout')}}"><img src="{{asset('front/images/sign-up-icon.png')}}" alt=""> Log Out</a></li>
                        @endauth
                        @guest
                            <li class="expart_btn"><a href="{{route('front.sign-up',['userType' => 2])}}">Become an Expert</a></li>
                            <li class="sign_up_btn mr-1"><a href="{{url('login')}}"><img src="{{asset('front/images/sign-up-icon.png')}}" alt=""> Login</a></li>
                            <li class="sign_up_btn"><a href="{{route('front.sign-up',['userType' => 3])}}"><img src="{{asset('front/images/sign-up-icon.png')}}" alt=""> Sign Up</a></li>
                        @endguest
                    </ul>
                </div>
            </div>
            <button type="button" class="menu_btn"><img src="{{asset('front/images/menu.svg')}}"></button>
        </div>
        <nav class="main_navigation">
            <ul>
                <li><a href="{{route('front.categories')}}">Categories</a></li>
                <li><a href="{{route('front.knowledge-bank')}}">Knowledge Bank</a></li>
                <li><a href="{{route('front.how-it-works')}}">How It Works?</a></li>
                <li><a href="{{route('front.about-us')}}">About Us</a></li>
            </ul>
        </nav>
    </div>
    <div class="menu_overlay"></div>
</header>
