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
                        <a class="nav-link {{ Request::segment(2) === 'dashboard' ? 'active' : null }}" href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    {{-- @if(Auth::user()->user_type != 1) --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link {{(request()->is('user/points*') ? 'active' : '')}}" href="{{route('user.points')}}"><i class="fas fa-dollar-sign"></i>My Points</a>
                        </li> --}}
                    {{-- @endif --}}

                    <!-- Admin Sidebar -->
                    @if(Auth::user()->user_type == 1)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'user' ? 'active' : null }}" href="{{route('admin.user.index')}}"><i class="fas fa-users"></i>Users</a>
                        </li>
                        <li class="nav-divider">Main</li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'article' ? 'active' : null }}" href="{{route('admin.article.index')}}"><i class="fas fa-rss-square"></i>Articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'category' ? 'active' : null }}" href="{{route('admin.category.index')}}"><i class="fas fa-clipboard-list"></i>Categories</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'knowledgebank' ? 'active' : null }}" href="{{route('admin.knowledgebank.index')}}"><i class="fas fa-box-open"></i>Knowledge Bank</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'course' ? 'active' : null }}" href="{{route('admin.course.index')}}"><i class="fa fa-book"></i>Case studies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'topic' ? 'active' : null }}" href="{{route('admin.topic.index')}}"><i class="fas fa-list"></i>Topics</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('admin/language*')) ? 'active' : '' }}" href="{{route('admin.language.index')}}"><i class="fas fa-language"></i>Language</a>
                        </li>
                        <li class="nav-divider">Report</li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/report/transaction*')) ? 'active' : '' }}" href="{{ route('user.transactions.index') }}"><i class="fas fa-credit-card"></i>Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/report/session*')) ? 'active' : '' }}" href="{{ route('user.sessions.index') }}"><i class="fas fa-play"></i>Video sessions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/report/case-study*')) ? 'active' : '' }}" href="{{ route('user.caseStudy.index') }}"><i class="fa fa-book"></i>Case studies</a>
                        </li>
                        <li class="nav-divider">Features</li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'testimonial' ? 'active' : null }}" href="{{route('admin.testimonial.index')}}"><i class="fas fa-comment-alt"></i>Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'faq' ? 'active' : null }}" href="{{route('admin.faq.index')}}"><i class="fab fa-rocketchat"></i>Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'commission' ? 'active' : null }}" href="{{route('admin.commission.index')}}"><i class="fas fa-dollar-sign"></i>Commissions</a>
                        </li>
                        <li class="nav-item mb-5">
                            <a class="nav-link {{ (request()->is('admin/settings*')) ? 'active' : '' }}" href="javascript:void(0)" data-toggle="collapse" data-target="#submenu-6" aria-controls="submenu-6"><i class="fa fa-cog"></i> Settings </a>
                            <div id="submenu-6" class="collapse submenu {{ (request()->is('admin/settings*')) ? 'show' : '' }}">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link {{(request()->is('admin/settings/contact-us*')) ? 'active' : ''}}" href="{{route('admin.contactUs.index')}}">Contact us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{(request()->is('admin/settings/aboutUs*')) ? 'active' : ''}}" href="{{route('admin.aboutUs.index')}}">About us</a>
                                    </li>
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
                    <!-- Expert Sidebar start -->
                    @elseif(Auth::user()->user_type == 2)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'my-course' ? 'active' : null }}" href="{{route('teacher.my-course.index')}}"><i class="fas fa-book"></i>My Case study</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(3) === 'slotlist' ? 'active' : null }}" href="{{ route('teacher.my-slots.slotList') }}"><i class="fas fa-bookmark"></i>My Slots</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('teacher/knowledgebank*')) ? 'active' : '' }}" href="{{ route('teacher.knowledgebank.index') }}"><i class="fas fa-box-open"></i>Knowledge Bank</a>
                        </li>
                        <li class="nav-divider">Purchase related</li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/report/transaction*')) ? 'active' : '' }}" href="{{ route('user.transactions.index') }}"><i class="fas fa-credit-card"></i>Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/report/session*')) ? 'active' : '' }}" href="{{ route('user.sessions.index') }}"><i class="fas fa-play"></i>Video sessions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/report/case-study*')) ? 'active' : '' }}" href="{{ route('user.caseStudy.index') }}"><i class="fa fa-book"></i>Case studies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/chat*')) ? 'active' : '' }}" href="{{ route('user.chat.index') }}"><i class="fa fa-comment"></i>Chat</a>
                        </li>
                        <li class="nav-divider">Settings</li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}" href="{{ route('user.profile') }}"><i class="fa fa-cog"></i>Settings</a>
                        </li>
                        <li class="nav-item mb-5">
                            <a class="nav-link {{ (request()->is('user/status*')) ? 'active' : '' }}" href="{{ route('user.status') }}"><i class="fas fa-circle-notch"></i> Status</a>
                        </li>
                    <!-- Expert Sidebar end -->
                    <!-- Student Sidebar start -->
                    @elseif(Auth::user()->user_type == 3)
                        {{-- here goes user sidebar menu --}}
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/report/transaction*')) ? 'active' : '' }}" href="{{ route('user.transactions.index') }}"><i class="fas fa-credit-card"></i>Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/report/session*')) ? 'active' : '' }}" href="{{ route('user.sessions.index') }}"><i class="fas fa-play"></i>Video sessions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/report/case-study*')) ? 'active' : '' }}" href="{{ route('user.caseStudy.index') }}"><i class="fa fa-book"></i>Case studies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/chat*')) ? 'active' : '' }}" href="{{ route('user.chat.index') }}"><i class="fa fa-comment"></i>Chat</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/review*')) ? 'active' : '' }}" href="{{ route('user.review.index') }}"><i class="fa fa-star"></i>Review</a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('user/profile*')) ? 'active' : '' }}" href="{{ route('user.profile') }}"><i class="fa fa-cog"></i>Settings</a>
                        </li>
                    @endif
                    <!-- Student Sidebar end -->
                </ul>
            </div>
        </nav>
    </div>
</div>
@endauth
