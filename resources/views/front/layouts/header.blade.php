<header class="{{(request()->routeIs('front.experts.*') || request()->routeIs('front.experts') || request()->routeIs('front.how-it-works') || request()->routeIs('front.knowledge-bank'))?'experts_header':'main_header'}}">
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
                        @auth
                        <li class="expart_btn"><a href="javascript:void(0);">{{auth()->user()->name}}</a></li>
                        <li class="sign_up_btn"><a href="{{route('logout')}}"><img src="{{asset('front/images/sign-up-icon.png')}}" alt=""> Log Out</a></li>
                        @endauth
                        @guest
                        <li class="expart_btn"><a href="{{route('front.sign-up',['userType' => 2])}}">Become an Expert</a></li>
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