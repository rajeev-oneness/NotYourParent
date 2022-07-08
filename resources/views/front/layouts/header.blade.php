<header class="{{(request()->routeIs('front.experts.*') || request()->routeIs('front.experts') || request()->routeIs('front.how-it-works') || request()->routeIs('front.knowledge-bank') || request()->routeIs('front.articles'))?'experts_header':'main_header'}}">
    <div class="header_top position-relative">
        <div class="container">
            <div class="row no-gutters justify-content-between align-items-center">
                <a href="{{route('front.home')}}" class="logo">
                    <img src="{{asset('front/images/logo.png')}}" alt="Logo">
                </a>
                <div class="header_right">
                    <ul class="right-nav">
                        @auth
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle nav-link" href="#" type="button" id="findWork" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Find Work
                            </a>
                            <div class="dropdown-menu user-nav" aria-labelledby="findWork">
                                <a class="dropdown-item" href="{{ route('front.jobs.index') }}">
                                    Find Work
                                </a>
                                <a class="dropdown-item" href="{{ route('front.saved.jobs') }}">
                                    Saved Jobs
                                </a>
                                <a class="dropdown-item" href="{{ route('front.my.jobs') }}">
                                    My Jobs
                                </a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('front.jobs.add') }}" class="btn secondary_btn post_job_btn">Post Job</a>
                        </li>
                        @if(Auth::user())
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#" type="button" id="notificationBell" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <div class="dropdown-menu noti-menu" aria-labelledby="notificationBell">
                                @forelse ($notification as $noti)
                                @if ($noti->read_flag == 0)
                                    {{-- unread notification --}}
                                    <a href="javascript:void(0)" class="dropdown-item single-noti unread-noti" onclick="readNotification('{{$noti->id}}', '{{($noti->route ? route($noti->route) : '')}}')">
                                        <h6 class="mb-2">{{$noti->title}}</h6>
                                        <p class="small text-muted">{{$noti->message}}</p>
                                        <p class="small text-muted text-right">{{ \Carbon\Carbon::parse($noti->created_at)->diffForHumans() }}</p>
                                    </a>
                                @else
                                <a href="javascript:void(0)" class="dropdown-item single-noti read-noti">
                                    <h6 class="mb-2">{{$noti->title}}</h6>
                                        <p class="small text-muted">{{$noti->message}}</p>
                                        <p class="small text-muted text-right">{{ \Carbon\Carbon::parse($noti->created_at)->diffForHumans() }}</p>
                                    </a>
                                @endif
                            @empty
                            <a href="javascript:void(0)" class="dropdown-item"><p class="small text-muted text-center">No notifications yet</p></a>
                            @endforelse
                                </a>
                                {{-- <a href="javascript:void(0)" class="dropdown-item single-noti read-noti">
                                    <h6>Now you can talk to Lisa Kudrow</h6>
                                    <p>case study purchased, Guitar Chords basic training</p>
                                    <small>7 months ago</small>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item single-noti unread-noti">
                                    <h6>Thanks for purchasing Case study</h6>
                                    <p>case study purchased, test tailor</p>
                                    <small>7 months ago</small>
                                </a>
                                <a href="javascript:void(0)" class="dropdown-item single-noti read-noti">
                                    <h6>Now you can talk to Alexander Pierce</h6>
                                    <p>case study purchased, test tailor</p>
                                    <small>7 months ago</small>
                                </a> --}}
                            </div>
                        </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="far fa-user-circle"></i>
                            </a>
                            <div class="dropdown-menu user-nav" aria-labelledby="userDropdown">
                                <a class="dropdown-item userName" href="#">
                                    {{ucwords(Auth::user()->name)}}
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-tachometer-alt"></i>
                                    Dashboard
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-credit-card"></i>
                                    Transactions
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-play"></i>
                                    Video sessions
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-book"></i>
                                    Case studies
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-comment"></i>
                                    Chat
                                </a>
                            </div>
                        </li>

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






