
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    
    <div class="container d-flex align-items-center justify-content-center z-index">

        <!-- <h1 class="logo"><a href="index.html">Groovin</a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!--<a href="{{url('/')}}" class="logo"><img src="{{asset('public/images')}}/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar mb-0">
            <ul>
                <li><a class="nav-link scrollto {{ (Route::currentRouteName() == '/') ? 'active' : '' }}" href="{{Route('/')}}">Home</a></li>
                <!--<li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.about-us') ? 'active' : '' }}" href="{{Route('page.about-us')}}">About</a></li>-->
                 <li class="dropdown"><a href="#"><span>About</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.about-us') ? 'active' : '' }}" href="{{Route('page.about-us')}}">About IDAB</a></li>
                        <li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.memorandum') ? 'active' : '' }}" href="{{Route('page.memorandum')}}">Memorandum & Articles of Association</a></li>
                        <li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.message') ? 'active' : '' }}" href="{{Route('page.message')}}">Message from the President</a></li>
                        <!--<li><a href="#">Why be a Member?</a></li>-->
                        <!--<li><a href="#">Membership Requirements</a></li>-->
                        <!--<li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>-->
                        <!--    <ul>-->
                        <!--        <li><a href="#">Deep Drop Down 1</a></li>-->
                        <!--        <li><a href="#">Deep Drop Down 2</a></li>-->
                        <!--        <li><a href="#">Deep Drop Down 3</a></li>-->
                        <!--        <li><a href="#">Deep Drop Down 4</a></li>-->
                        <!--        <li><a href="#">Deep Drop Down 5</a></li>-->
                        <!--    </ul>-->
                        <!--</li> -->
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Committee</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach ($committeeType as $item)
                            <li><a href="{{Route('page.committee', $item->id )}}" >{{$item->name}} </a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Members</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @foreach ($memberType as $item)
                            <li><a href="{{Route('page.member', $item->id )}}" >{{$item->name}} </a></li>
                        @endforeach
                    </ul>
                </li>
                <!--<li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.why-be-member') ? 'active' : '' }}" href="{{Route('page.why-be-member')}}">Why be a Member</a></li>-->
                <!--<li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.requirements') ? 'active' : '' }}" href="{{Route('page.requirements')}}">Requirements</a></li>-->
                <!--<li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.gallery-cover') ? 'active' : '' }}" href="{{Route('page.gallery-cover')}}">Gallery</a></li>-->
                <li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.events') ? 'active' : '' }}" href="{{Route('page.events')}}">Events</a></li>
                <li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.corporate-partners') ? 'active' : '' }}" href="{{Route('page.corporate-partners')}}">Job Apply</a></li>
                <li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.blogs') ? 'active' : '' }}" href="{{Route('page.blogs')}}">News</a></li>
                <li><a class="nav-link scrollto {{ (Route::currentRouteName() == 'page.contact-us') ? 'active' : '' }}" href="{{Route('page.contact-us')}}">Contact</a></li>
                @guest
                    <a class="getstarted" href="{{Route('member_register.create')}}">Become A Member</a>
                    <a class="getstarted-login" href="{{Route('login')}}">Login</a>
                @endguest
                @auth
                <li class="dropdown"><a href="#" class="getstarted scrollto"><span>{{Auth::user()->name}}</span><i class="bi bi-chevron-down"></i></a>
                    <ul>
                        @if (Auth::user()->is_admin == "1" && Auth::user()->status == "1")
                            <li><a href="{{ Route('profile_show', auth()->user()->id )}}">Profile</a></li>
                        @endif
                        @if (Auth::user()->is_admin == "0" && Auth::user()->status == "0")
                            <li><a href="{{ Route('registation-payment.create') }}">Payment Fee</a></li>
                        @endif
                        @if (Auth::user()->is_admin == "1" && Auth::user()->status == "0")
                            <li><a href="{{ Route('member-approve.padding') }}">Waiting Approval</a></li>
                        @endif
                        
                        <form method="POST" action="{{ Route('logout') }}">
                            @csrf
                            <li><a href="{{ Route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a></li>
                        </form>
                    </ul>
                </li>
                @endauth
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->