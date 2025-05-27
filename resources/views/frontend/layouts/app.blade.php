<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicons -->
    <link href="{{asset('public/images')}}/favicon.png" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('public/frontend')}}/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="{{asset('public/frontend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('public/frontend')}}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('public/frontend')}}/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        
    <!-- Owl Carousel -->
    <link href="{{asset('public/frontend')}}/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="{{asset('public/frontend')}}/vendor/owl-carousel/owl.theme.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('public/frontend')}}/css/style.css" rel="stylesheet">
    <link href="{{asset('public/frontend')}}/css/intro-effect.css" rel="stylesheet">
    <link href="{{asset('public/frontend')}}/css/custom.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>
    @yield('style')
</head>
<body>
    <!-- Spinner End -->
    @include('frontend.layouts.partial.header')
    
    @if (Route::currentRouteName() == '/')
        @include('frontend.layouts.partial.slider')
    @endif

    @yield('content')
    @include('frontend.layouts.partial.footer')

    
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    
    <script src="{{asset('public/frontend')}}/js/jquery-3.7.1.min.js"></script> 
    <!-- Vendor JS Files -->
    <script src="{{asset('public/frontend')}}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{asset('public/frontend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('public/frontend')}}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{asset('public/frontend')}}/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('public/frontend')}}/vendor/owl-carousel/owl.carousel.js"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('public/frontend')}}/js/particles.js"></script>
    <script src="{{asset('public/frontend')}}/js/particles-config.js"></script>
    <script src="{{asset('public/frontend')}}/js/gsap.min.js"></script>
    <script src="{{asset('public/frontend')}}/js/ScrollTrigger.min.js"></script>
    <script src="{{asset('public/frontend')}}/js/main.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#homePageModal').modal('hide');
        });
    </script>
    <script>
        // Initialize GSAP - ScrollTrigger
        const reveal = gsap.utils.toArray('.reveal');
        reveal.forEach((text, i) => {
            ScrollTrigger.create({
                trigger:text,
                toggleClass:'active',
                // start: "top 90%",
                // end: "top 10%",
            })
        })
        // Initialize owl - Slider
        // $(document).ready(function() {
        //     $("#owl-upcoming-events").owlCarousel({
        //         navigation: false,
        //         slideSpeed: 300,
        //         paginationSpeed: 400,
        //         singleItem: true,
        //         autoPlay : 3000,
        //     });

        // });
        $(document).ready(function () {
            $("#owl-team-member").owlCarousel({
                items: 4
            });
            $('.link').on('click', function (event) {
                var $this = $(this);
                if ($this.hasClass('clicked')) {
                    $this.removeAttr('style').removeClass('clicked');
                } else {
                    $this.css('background', '#7fc242').addClass('clicked');
                }
            });
        });
        $(document).ready(function() {
            $("#owl-upcoming-events").owlCarousel({
                items: 1,
                navigation: false,
            });

            $('.link').on('click', function (event) {
                var $this = $(this);
                if ($this.hasClass('clicked')) {
                    $this.removeAttr('style').removeClass('clicked');
                } else {
                    $this.css('background', '#7fc242').addClass('clicked');
                }
            });

        });
        $(document).ready(function() {
            $("#owl-clients").owlCarousel({
                items: 3,
                navigation: false,
            });

            $('.link').on('click', function (event) {
                var $this = $(this);
                if ($this.hasClass('clicked')) {
                    $this.removeAttr('style').removeClass('clicked');
                } else {
                    $this.css('background', '#7fc242').addClass('clicked');
                }
            });

        });
        $(document).ready(function() {
            $("#owl-partners").owlCarousel({
                items: 4,
                navigation: false,
            });

            $('.link').on('click', function (event) {
                var $this = $(this);
                if ($this.hasClass('clicked')) {
                    $this.removeAttr('style').removeClass('clicked');
                } else {
                    $this.css('background', '#7fc242').addClass('clicked');
                }
            });

        });
    </script>
    
    <script>
        // Function to add the class with the left show animation after a delay
        function showLeftAnimation() {
            const introCover = document.querySelector('.intro-cover');
            const introTitle = document.querySelector('.intro-title');
            const introText = document.querySelector('.intro-text');
            introCover.classList.add('active');
            introTitle.classList.add('active');
            introText.classList.add('active');
        }
        // Wait for 5 seconds (5000 milliseconds) before triggering the animation
        setTimeout(showLeftAnimation, 1000);
    </script>

    @yield('script')
    
    @stack('script')
</body>
</html>
