@extends('frontend.layouts.app')
@section('content')
    <!-- ======= Contact Section ======= --><br><br>
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2 class="reveal">If You Have Any Query, Feel Free To Contact Us</h2>
                <!--<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sitin iste officiis commodi quidem hic quas.</p>-->
            </div>
<!--contact-->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                     <div class="row contact-info">
                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="bi bi-geo-alt"></i>
                        <h3>Address</h3>
                        <address> Rain Razzak Plaza,2 Shahid Tazuddin Soroni, Moghbazar, Dhaka-1217, Bangladesh</address>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-phone">
                        <i class="bi bi-phone"></i>
                        <h3>Phone Number</h3>
                        <p><a href="tel:+8801806428222">+880 1806 428 222</a></p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="contact-email">
                        <i class="bi bi-envelope"></i>
                        <h3>Email</h3>
                        <p><a href="mailto:contact.idab@gmail.com">contact.idab@gmail.com</a></p>
                    </div>
                </div>
            </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">Get in Touch</p>
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                                    <label for="name">Your Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                                    <label for="email">Your Email</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    <label for="subject">Subject</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Leave a message here" id="message"
                                        style="height: 100px"></textarea>
                                    <label for="message">Message</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                       <iframe class="position-relative rounded w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14607.834029397985!2d90.403193!3d23.748859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b88fd8f1da15%3A0x7373d2a193bb69f5!2sRazzak%20Plaza!5e0!3m2!1sen!2sus!4v1692525384856!5m2!1sen!2sus" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>




<!--contact-->
            <!--<div class="row contact-info">-->
            <!--    <div class="col-md-4">-->
            <!--        <div class="contact-address">-->
            <!--            <i class="bi bi-geo-alt"></i>-->
            <!--            <h3>Address</h3>-->
            <!--            <address> Rain Razzak Plaza,2 Shahid Tazuddin Soroni, Moghbazar, Dhaka-1217, Bangladesh</address>-->
            <!--        </div>-->
            <!--    </div>-->

            <!--    <div class="col-md-4">-->
            <!--        <div class="contact-phone">-->
            <!--            <i class="bi bi-phone"></i>-->
            <!--            <h3>Phone Number</h3>-->
            <!--            <p><a href="tel:01725151515">01725151515</a></p>-->
            <!--        </div>-->
            <!--    </div>-->

            <!--    <div class="col-md-4">-->
            <!--        <div class="contact-email">-->
            <!--            <i class="bi bi-envelope"></i>-->
            <!--            <h3>Email</h3>-->
            <!--            <p><a href="mailto:contact.idab@gmail.com">contact.idab@gmail.com</a></p>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</div>-->
            <div class="row g-5">
                <!--<div class="col-lg-6 form">
                    <form action="{{route('contact-us.store')}}" method="post" enctype="multipart/form-data" class="php-email-form"> 
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" @guest value="{{ old('name')}}" @endguest @auth value="{{Auth::user()->name}}" @endauth  placeholder="Your Name" style="height: 55px;">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" @guest value="{{old('email')}}" @endguest @auth value="{{Auth::user()->email}}" @endauth placeholder="Your Email" style="height: 55px;">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" value="{{old('subject')}}" placeholder="Subject" style="height: 55px;">
                                @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <textarea class="form-control py-3 @error('description') is-invalid @enderror" name="description" value="{{old('description')}}" rows="4" placeholder="Message"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>-->
                <!--<div class="col-lg-12 wow slideInUp" data-wow-delay="0.6s">-->
                <!--    <iframe class="position-relative rounded w-100" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14607.834029397985!2d90.403193!3d23.748859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b88fd8f1da15%3A0x7373d2a193bb69f5!2sRazzak%20Plaza!5e0!3m2!1sen!2sus!4v1692525384856!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
                <!--</div>-->
            </div>

        </div>
    </section><!-- End Contact Section -->

    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Your message was sent successfully.',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route("/") }}';
                }
            });
        </script>
    @endif
@endsection