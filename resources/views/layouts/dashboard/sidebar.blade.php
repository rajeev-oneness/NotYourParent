@auth
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- <a class="d-xl-none d-lg-none" href="#">Dashboard</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column pb-4">
                    <li class="nav-divider"> Menu </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(2) === 'dashboard' ? 'active' : null }}" href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>
                    @if(Auth::user()->user_type != 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.points')}}"><i class="fa fa-fw fa-user-circle"></i>My Points</a>
                        </li>
                    @endif

                    <!-- Admin Sidebar -->
                    @if(Auth::user()->user_type == 1)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'user' ? 'active' : null }}" href="{{route('admin.user.index')}}"><i class="fa fa-fw fa-user-circle"></i>Users</a>
                        </li>
                        <!-- Main Section -->
                        <li class="nav-divider">Main</li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'article' ? 'active' : null }}" href="{{route('admin.article.index')}}"><i class="fa fa-fw fa-user-circle"></i>Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'category' ? 'active' : null }}" href="{{route('admin.category.index')}}"><i class="fa fa-fw fa-user-circle"></i>Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'knowledgebank' ? 'active' : null }}" href="{{route('admin.knowledgebank.index')}}"><i class="fa fa-fw fa-user-circle"></i>Knowledge Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'course' ? 'active' : null }}" href="{{route('admin.course.index')}}"><i class="fa fa-fw fa-user-circle"></i>Case studies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'topic' ? 'active' : null }}" href="{{route('admin.topic.index')}}"><i class="fa fa-fw fa-user-circle"></i>Topics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/language*')) ? 'active' : '' }}" href="{{route('admin.language.index')}}"><i class="fa fa-fw fa-user-circle"></i>Language</a>
                        </li>

                        <!-- Report Section -->
                        {{-- <li class="nav-divider">Report</li> --}}

                        <!-- Crud Operation Section -->
                        <li class="nav-divider">Features</li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'testimonial' ? 'active' : null }}" href="{{route('admin.testimonial.index')}}"><i class="fa fa-fw fa-user-circle"></i>Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'faq' ? 'active' : null }}" href="{{route('admin.faq.index')}}"><i class="fa fa-fw fa-user-circle"></i>Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'commission' ? 'active' : null }}" href="{{route('admin.commission.index')}}"><i class="fa fa-fw fa-user-circle"></i>Commissions</a>
                        </li>
                        <li class="nav-item mb-5">
                            <a class="nav-link {{ (request()->is('admin/settings*')) ? 'active' : '' }}" href="javascript:void(0)" data-toggle="collapse" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Settings </a>
                            <div id="submenu-6" class="collapse submenu {{ (request()->is('admin/settings*')) ? 'show' : '' }}">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link {{(request()->is('admin/contact-us*')) ? 'active' : ''}}" href="{{route('admin.contactUs.index')}}">Contact us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{(request()->is('admin/settings/aboutUs*')) ? 'active' : ''}}" href="{{route('admin.aboutUs.index')}}">About us</a>
                                    </li>
                                    {{-- <li class="nav-item">
                                        <a class="nav-link" href="#">Why Choose Us</a>
                                    </li> --}}
                                    <li class="nav-item">
                                        <a class="nav-link {{(request()->is('admin/settings/howItWorks*')) ? 'active' : ''}}" href="{{route('admin.howItWorks.index')}}">How it works</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{(request()->is('admin/settings/terms-and-conditions*')) ? 'active' : ''}}" href="{{route('admin.termsAndConditions.index')}}">Terms & Conditions</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{(request()->is('admin/settings/privact-policy*')) ? 'active' : ''}}" href="{{route('admin.privacyPolicy.index')}}">Privacy policy</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <!-- Admin Sidebar End -->
                    <!-- Supplier Sidebar -->
                    @elseif(Auth::user()->user_type == 2)

                        {{-- here goes teacher sidebar menu --}}
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'my-course' ? 'active' : null }}" href="{{route('teacher.my-course.index')}}"><i class="fa fa-fw fa-user-circle"></i>My Case study</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(3) === 'slotlist' ? 'active' : null }}" href="{{ route('teacher.my-slots.slotList') }}"><i class="fa fa-fw fa-user-circle"></i>My Slots</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('teacher/knowledgebank*')) ? 'active' : '' }}" href="{{ route('teacher.knowledgebank.index') }}"><i class="fa fa-fw fa-user-circle"></i>Knowledge Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('teacher/chat*')) ? 'active' : '' }}" href="{{ route('teacher.chat.index') }}"><i class="fa fa-fw fa-user-circle"></i>Chat</a>
                            {{-- <a class="nav-link {{ Request::segment(3) === 'chat' ? 'active' : null }}" href="{{ route('teacher.chat.index') }}"><i class="fa fa-fw fa-user-circle"></i>Chat</a> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}" href="{{ route('user.profile') }}"><i class="fa fa-fw fa-user-circle"></i>Settings</a>
                        </li>
                        <li class="nav-item mb-5">
                            <a class="nav-link {{ (request()->is('user/status*')) ? 'active' : '' }}" href="{{ route('user.status') }}"><i class="fa fa-fw fa-user-circle"></i> Status</a>
                            {{-- <a class="nav-link {{ (request()->is('user/status*')) ? 'active' : '' }}" href="{{ route('user.status') }}"><i class="fa fa-fw fa-user-circle"></i> Status <i class="fa fa-circle text-{{$user->user_availability->type}}"></i></a> --}}
                        </li>

                    @elseif(Auth::user()->user_type == 3)
                        {{-- here goes user sidebar menu --}}
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}" href="{{ route('user.profile') }}"><i class="fa fa-fw fa-user-circle"></i>Settings</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
@endauth
