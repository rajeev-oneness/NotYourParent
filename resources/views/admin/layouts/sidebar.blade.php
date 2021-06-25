@auth
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- <a class="d-xl-none d-lg-none" href="#">Dashboard</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider"> Menu </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Request::segment(2) === 'dashboard' ? 'active' : null }}" href="{{route('home')}}"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Profile</a>
                    </li>
                    @if(Auth::user()->user_type != 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Your Points</a>
                        </li>
                    @endif

                    <!-- Admin Sidebar -->
                    @if(Auth::user()->user_type == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Membership</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Users</a>
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
                            <a class="nav-link {{ Request::segment(2) === 'course' ? 'active' : null }}" href="{{route('admin.course.index')}}"><i class="fa fa-fw fa-user-circle"></i>Courses</a>
                        </li>

                        <!-- Report Section -->
                        <li class="nav-divider">Report</li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(2) === 'contact-us' ? 'active' : null }}" href="{{route('admin.contactUs.index')}}"><i class="fa fa-fw fa-user-circle"></i>Contact us</a>
                        </li>
                        <!-- Crud Operation Section -->
                        <li class="nav-divider">Features</li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Blogs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Testimonial</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa fa-fw fa-user-circle"></i>Faq</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)" data-toggle="collapse" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i> Settings </a>
                            <div id="submenu-6" class="collapse submenu">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">About us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Why Choose Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">How it works</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    <!-- Admin Sidebar End -->
                    <!-- Supplier Sidebar -->
                    @elseif(Auth::user()->user_type == 2)

                        {{-- here goes teacher sidebar menu --}}

                    @elseif(Auth::user()->user_type == 3)
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
@endauth
