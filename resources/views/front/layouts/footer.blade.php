<footer class="main_footer position-relative">
    <div class="container">
        <div class="footer_logo">
            <a href="{{route('front.home')}}" class="d-block">
                <img class="img-fluid" src="{{asset('front/images/logo.png')}}">
            </a>
        </div>
        <div class="footer_text text-center">
            <p class="darkgray">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially</p>
        </div>
        <div class="footer_contact">
            <ul>
                <li class="footer_address">
                    <i class="fas fa-map-marker-alt"></i>
                    <p class="mb-0">1425 Cressida Dummy address. Charlotte, NC 28210</p>
                </li>
                <li class="footer_number">
                    <i class="fas fa-phone-alt"></i><i class=""></i>
                    <a href="javascript:void(0);">8024-55554-9229</a>
                </li>
            </ul>
        </div>

        <nav class="footer_nav">
            <ul>
                <li><a href="{{route('front.categories')}}">Categories</a></li>
                <li><a href="{{route('front.knowledge-bank')}}">Knowledge Bank</a></li>
                <li><a href="{{route('front.how-it-works')}}">How It Works?</a></li>
                <li><a href="{{route('front.about-us')}}">About Us</a></li>
            </ul>
        </nav>

        <div class="footer_social">
            <ul>
                <li><a href="javascript:void(0);"><i class="fab fa-linkedin-in"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                <li><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>

        <div class="copyright_text text-center">
            <p class="mb-0 proxima_light">Copyright 2021 Notyourparent. | All Rights Reserved</p>
        </div>
    </div>
    <span class="footer_green_plane"><img class="img-fluid" src="{{asset('front/images/green-plane-footer.png')}}"></span>
    <span class="footer_yellow_plane"><img class="img-fluid" src="{{asset('front/images/yellow-plane-footer.png')}}"></span>

</footer>