@extends('frontend.layouts.app')
@section('title', 'Why Be Member')
@section('content')
@include('frontend.layouts.partial.banner')
    <!-- ======= Why Us Section ======= -->
    <section id="why-us" class="why-us">
        <div class="container">

            <div class="section-title">
                <!--<h2 class="reveal">Why Be A Member?</h2>-->
                <!--<p>IDAB a complete association of people who are passionate about Interior Design in Bangladesh.</p>-->
            </div>

            <div class="row">

                    <div class="col-lg-4 my-2">
                        <div class="box" style="height:460px">
                            <span><img src="https://idab.com.bd/public/images/icon/Identification.png" class="img-fluid" alt="" width="160px;" height="160px;"></span>
                            <h4>Identification</h4>
                            <ul>
                                <li>IDAB- Organized Events, Seminars & Workshops.</li>
                                <li>Regional & Local Programs.</li>
                                <li>Updates on latest Developments in the Industry.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="box" style="height:460px">
                             <span><img src="https://idab.com.bd/public/images/icon/Knowledge.png" class="img-fluid" alt="" width="160px;" height="160px;"></span>
                            <h4>Knowledge</h4>
                            <ul>
                                <li>IDAB- Membership Certificate identifies you as a current Interior Design Society member who accepts our Code of Ethics.</li>
                                <li>Provides clients with knowledge they are working with a well-informed & educated designer</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="box" style="height:460px">
                            <span><img src="https://idab.com.bd/public/images/icon/Networking.png" class="img-fluid" alt="" width="160px;" height="160px;"></span>
                            <h4>Networking</h4>
                            <ul>
                                <li>IDAB local chapter meeting, activities, educational seminars & special events.</li>
                                <li>Link up with Government Agencies, Local & International Enterprises, Design Associations, & Professional creative individuals.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="box" style="height:460px">
                            <span><img src="https://idab.com.bd/public/images/icon/Resources.png" class="img-fluid" alt="" width="160px;" height="160px;"></span>
                            <h4>Resources</h4>
                            <ul>
                                <li>Employment Student bridging.</li>
                                <li>Access to designers’ job portal for easier recruitment.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="box" style="height:460px">
                            <span><img src="https://idab.com.bd/public/images/icon/Authorization.png" class="img-fluid" alt="" width="160px;" height="160px;"></span>
                            <h4>Authorization</h4>
                            <ul>
                                <li>IDAB Member could potentially provide further authority & for your organization since being a member of IDAB could empower your customers, audience & clients to reach you easier through to the IDAB website.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="box" style="height:460px">
                             <span><img src="https://idab.com.bd/public/images/icon/Overseas Networking.png" class="img-fluid" alt="" width="160px;" height="160px;"></span>
                            <h4>Overseas Networking</h4>
                            <ul>
                                <li>Gain Access to resources from local partners who worked overseas.</li>
                                <li>Link up with overseas government agencies and updates on latest developments in the overseas industries.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="box" style="height:460px">
                            <span><img src="https://idab.com.bd/public/images/icon/Discount.png" class="img-fluid" alt="" width="160px;" height="160px;"></span>
                            <h4>Discount</h4>
                            <ul>
                                <li>Potentials rates for IDAB-organized Award, Events, Seminars, Workshops.</li>
                                <li>Member rates for a wide range of products, & services with industry partners.</li>
                                <li>Member rates to designer cafeterias & online store.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="box" style="height:460px">
                            <span><img src="https://idab.com.bd/public/images/icon/Publicity.png" class="img-fluid" alt="" width="160px;" height="160px;"></span>
                            <h4>Publicity</h4>
                            <ul>
                                <li>Expand your business locally & regionally</li>
                                <li>Recognition & promotion of members through IDAB communications like website, FB Page.</li>
                                <li>Endorsement, mention of design related events organized by members.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="box" style="height:460px">
                            <span><img src="https://idab.com.bd/public/images/icon/Contribute to society.png" class="img-fluid" alt="" width="160px;" height="160px;"></span>
                            <h4>Contribute To Society</h4>
                            <ul>
                                <li>Volunteer Opportunities, can make a difference, give back.</li>
                                <li>Members can offer sponsorship or scholarships to students.</li>
                                <li>Members can offer materials, or resources to design schools for resources.</li>
                            </ul>
                        </div>
                    </div>

                </div>

        </div>
    </section><!-- End Why Us Section -->
    

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