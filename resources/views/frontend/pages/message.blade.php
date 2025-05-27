@extends('frontend.layouts.app')
@section('title', 'Welcome Message from the President')
@section('content')
<div style="background: url({{asset('public/images')}}/pages/about-banner.jpg);min-height: 100%;background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">

    <section id="about" class="about" style="padding-top: 120px">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="content d-flex flex-column justify-content-center">
                            <h4>Welcome President’s Words<br>Syed Quamrul Ahsan</h4>
                            <p>
                                President, Interior Designers Association of Bangladesh (IDAB) (2024-2025) <br>
                                It is a great honor to serve as the President of the Interior Designers Association of Bangladesh (IDAB) for the 2024-2025 term. I sincerely thank my fellow members for their trust and support. IDAB has been instrumental in elevating the interior design profession in Bangladesh, and as the only government-certified trade organization for interior designers, our responsibility is greater than ever. <br><br>
                                With over 20 years of experience in interior design, structural engineering, consulting, and education, I have witnessed the transformative power of design in shaping environments, businesses, and communities. As we move forward, our focus will be on strengthening professional development, promoting design excellence, and ensuring global recognition for Bangladeshi designers. <br><br>
                                Our priorities include expanding educational programs, fostering collaboration with international organizations, and advocating for policies that support the profession. We will work to integrate sustainable practices, preserve and modernize traditional craftsmanship, and embrace technological advancements such as AI and virtual design tools that are reshaping our industry. <br><br>
                                IDAB aims to broaden its reach and deepen its impact. Through strategic initiatives, industry partnerships, and knowledge-sharing platforms, we will create greater opportunities for designers, strengthen our community, and establish Bangladesh as a center for interior design excellence. By working together, we can push boundaries, set new standards, and showcase our unique design identity on the global stage. <br><br>
                                I invite all members to actively participate in this journey. With collaboration, dedication, and a shared vision, we can drive innovation, uphold professional excellence, and elevate Bangladesh’s interior design industry to new heights. The future of design is ours to shape, and together, we will make a lasting impact.
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <img class="img-fluid pt-5 mt-5" src="{{asset('public')}}/images/pages/Syed Quamrul Ahsan.jpg" alt="">
                    </div>
                </div>
            </div>
    </section>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        const sections = [
            '#historyidab',
            '#whyidab',
            '#vision-mission',
            '#objectives',
            '#whybe',
            '#requirements'
        ];

        // Initially show the first section and hide others
        $(sections.join(', ')).hide();
        $(sections[0]).show();

        // Click event handling for sections
        $('.section-button').on('click', function() {
            const index = $(this).index();
            $('.section-button').removeClass('filter-active');
            $(this).addClass('filter-active');
            
            $(sections.join(', ')).hide();
            $(sections[index]).show();
        });
    });

</script>
@endsection
