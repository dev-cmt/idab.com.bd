<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>About IDAB</h3>
                        <p>The Interior Designers Association of Bangladesh (IDAB) is the national institute representing the interior design profession in Bangladesh.</p><br>
                        <a href="{{Route('page.about-us')}}" class="button text-white">Read More</a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Member List</h4>
                    <ul>
                        @foreach ($memberType as $item)
                            <li><i class="bx bx-chevron-right"></i> <a href="{{Route('page.member', $item->id )}}">{{$item->name}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{Route('login')}}">Login</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{Route('page.about-us')}}">About IDAB</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{Route('page.events')}}">Events</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{Route('page.terms-condition')}}">Terms & Condition</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{Route('page.privacy-policy')}}">Privacy Policy</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('view.pdf')}}">Memoradum & Article Of Association</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{Route('page.contact-us')}}">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <div class="footer-info">
                        <h3>IDAB</h3>
                        <p>Rain Razzak Plaza, 2 Shahid Tazuddin Soroni, Moghbazar, Dhaka-1217, Bangladesh <br><br>
                            <strong>Phone:</strong>+88-01725151515<br>
                            <strong>Email:</strong> <a href="mailto:contact.idab@gmail.com">contact.idab@gmail.com</a><br>
                            
                        </p>
                        <div class="social-links mt-3">
                            <a href="https://www.facebook.com/share/1CUz75MfdB/" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.youtube.com/@Idabbd" class="Youtube"><i class="bx bxl-youtube"></i></a>
                            <!--<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>-->
                            <a href="https://www.instagram.com/idab_bd" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <!--<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>-->
                            <a href="https://www.linkedin.com/company/interior-designers-association-of-bangladesh/" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span class="text-danger">Interior Designer’s Association Of Bangladesh (IDAB)</span></strong>. All Rights Reserved <span style="float: right">Designed & Developed by <a href="https://iconisl.com"><img src="{{asset('public/images')}}/iconisl.png" style="background: white;border-radius: 4px; padding: 1px 5px" width="60"></a></span>
        </div>
    </div>
</footer><!-- End Footer -->

