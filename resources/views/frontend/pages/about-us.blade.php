@extends('frontend.layouts.app')
@section('title', 'About-Us')
@section('content')
<div style="background: url({{asset('public/images')}}/pages/about-banner.jpg);min-height: 100%;background-repeat: no-repeat; background-size: cover; background-attachment: fixed;">

 <section id="about" class="about" style="padding-top: 120px">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch ">
                    <div class="content d-flex flex-column justify-content-center">
                        <h3>About IDAB</h3>
                        <p>The Interior Designers Association of Bangladesh (IDAB) was founded in 2019 by a group of visionary and dedicated interior designers committed to advancing the interior design profession in Bangladesh. As the premier association representing the industry, IDAB serves as a collective platform to uphold excellence, foster innovation, and integrate Bangladesh’s rich artistic and architectural heritage into contemporary global design practices.</p><br>
                        <p>IDAB is dedicated to elevating the standards of the interior design profession, ensuring recognition, and advocating for policies that support its members while nurturing future generations of designers.</p>
                        <h4 class="mt-4">Vision:</h4>
                        <p>To establish Bangladesh as a distinguished global leader in interior design by promoting professional excellence, innovation, and the integration of cultural heritage into contemporary design.</p>
                    </div>
                </div>
                <div class="image animate__animated animate__fadeInDown col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" style="background: url({{asset('public/images')}}/pages/about.jpg) center center no-repeat;">
                </div>
                <div class="col-xl-12 ps-0 ps-lg-5">
                    <h4 class=" mb-4">Mission:</h4>
                     <p><li>To unite professionals in the fields of interior design and architecture, fostering collaboration and knowledge exchange.</li><br>
                        <li>To advocate for the recognition of interior design as a vital aspect of the built environment.</li><br>
                        <li>To provide a robust platform for professional development, skill enhancement, and lifelong learning.</li><br>
                        <li>To mentor and nurture young designers, ensuring the sustainable growth of the industry.</li><br>
                        <li>To uphold the highest ethical standards and best practices within the profession.</li><br>
                </div>
                
                 <div class="col-xl-12 ps-0 ps-lg-5">
                    <h4 class=" mb-4">Core Objectives</h4>
                     <p><strong>1. Professional Development:</strong>IDAB offers continuous education through workshops, seminars, conferences, and certification programs. Our initiatives ensure members stay updated on global trends, emerging technologies, and best industry practices.<br><br>
                        <strong>2. Networking & Collaboration:</strong>We facilitate meaningful engagement among designers, educators, and industry leaders through networking events, design competitions, and collaborative projects that showcase Bangladeshi design excellence on an international stage.<br><br>
                        <strong>3. Advocacy & Representation:</strong>IDAB actively engages with policymakers, academic institutions, and industry stakeholders to advocate for professional recognition, accreditation systems, and regulatory support that empower interior designers in Bangladesh.<br><br>
                        <strong>4. Cultural & Heritage Integration in Design:</strong>IDAB promotes the incorporation of Bengali artistry, craftsmanship, and traditional design elements into modern interior solutions, positioning Bangladesh as a unique and influential design force globally.<br><br>
                        <strong>5. Sustainability & Inclusive Design:</strong>We campaign eco-conscious and socially responsible design principles, encouraging members to integrate sustainability, accessibility, and community well-being into their work.<br><br>
                        <strong>6. Ethics & Professional Standards:</strong>IDAB upholds the highest ethical standards, ensuring professionalism, integrity, and accountability among its members. Our code of conduct fosters credibility and trust within the industry.</p><br>
                        <h4 class=" mb-4">Join IDAB & Shape the Future of Interior Design</h4>
                         <p>As Bangladesh’s leading association for interior designers, IDAB provides an essential platform for career advancement, professional networking, and international recognition. Our members gain access to exclusive industry resources, a directory of esteemed professionals, case studies of exemplary projects, and a wealth of scholarly research and publications.</p>
                        <p>We welcome interior designers, architects, students, and industry partners to join our dynamic community dedicated to shaping the future of design in Bangladesh and beyond. Let us collectively celebrate creativity, innovation, and the transformative power of interior design.</p>
                        <p>Welcome to IDAB – Where Heritage Inspires Innovation and Design Transforms Spaces!</p>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!--<section id="about" class="about pt-0">-->
    <!--    <div class="container">-->
            <!-- ITEM -->
    <!--        <div class="row" id="historyidab">-->
    <!--            <div class="image animate__animated animate__fadeInDown col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" style="background: url({{asset('public/images')}}/pages/about.jpg) center center no-repeat;">-->

    <!--            </div>-->
    <!--            <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">-->
    <!--                <div class="content d-flex flex-column justify-content-center">-->
    <!--                   <p>IDAB (Interior designer’s Association Of Bangladesh) founded in 2019 with some young and energetic Bangladeshi Interior Designers to represent the Interior designers & interior design industry as a whole of Bangladesh.</p>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
            <!-- ITEM -->
    <!--        <div class="row" id="whyidab">-->
    <!--            <p>As a member of IDAB, you gain access to a wide range of benefits designed to support your professional growth and success. We offer educational workshops, seminars, and webinars conducted by industry experts, where you can expand your knowledge, enhance your skills, and stay abreast of emerging design concepts and technologies. Our networking events and design competitions provide opportunities to connect with fellow designers, build valuable relationships, and showcase your talent on a broader stage.</p>-->
    <!--        </div>-->
            <!-- ITEM -->
    <!--        <div class="row" id="vision-mission">-->
    <!--            <p>To elevate the Interior Design Industry in Bangladesh to the highest possible level of professionalism and integrity.Our mission is to bring together professionals in the field of Interior Architecture/Design, and to work towards a common goal of raising awareness for good design; in order to create an environment of sharing of ideas and experiences for the benefit of members and the industry. We also aim to mentor and nurture young talent so that they may be able to lead the industry towards greater heights; and to encourage lifelong learning and continual upgrading of skills and knowledge for all members.</p>-->
    <!--        </div>-->
            
            <!-- ITEM -->
    <!--        <div class="row" id="objectives">-->
    <!--            <p>1. Professional Development: We provide opportunities for skill enhancement, knowledge sharing, and learning through workshops, seminars, webinars, and other educational programs. Our goal is to equip our members with the latest trends, techniques, and best practices in the field.<br>2. Networking and Collaboration: We organize networking events, design competitions, and social gatherings that facilitate interaction and exchange of ideas. <br>3. Advocacy and Representation: IDAB is committed to advocating for the interests of interior designers and promoting their contributions to the built environment. <br>4. Knowledge Sharing and Research: We encourage our members to contribute to the body of knowledge by conducting research, publishing articles, and participating in conferences. <br>5. Sustainable and Inclusive Design: We aim to promote environmentally responsible design solutions and advocate for accessibility and inclusivity in the built environment. By encouraging sustainable design principles and addressing social and cultural aspects, we contribute to the well-being of individuals and communities.<br>6. Professional Ethics and Standards: IDAB upholds high ethical standards within the interior design profession. We promote professionalism, integrity, and excellence among our members. Through our code of ethics, we ensure that interior designers adhere to ethical guidelines and conduct themselves in a manner that upholds the reputation of the profession</p><br>-->
    <!--            <p>As you navigate our website, you will find a wealth of resources, including a directory of our esteemed members, a portfolio of exceptional design projects, and a comprehensive library of articles and publications. Our goal is to provide a valuable online hub where you can find inspiration, seek guidance, and connect with the interior design community in Bangladesh.<br><br>Thank you for visiting IDAB. We invite you to join our association and become a part of a dynamic community that is dedicated to shaping the future of interior design in Bangladesh. Together, let's celebrate creativity, innovation, and the transformative power of design.<br><br>Welcome to IDAB, where imagination meets inspiration!</p>-->
    <!--        </div>
            
            <!-- ITEM -->
    <!--        <div class="row faq" id="whybe">-->
    <!--            <div class="faq-list">-->
    <!--                <ul>-->
    <!--                    <li data-aos="fade-up" style="background: #ebebeb">-->
    <!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"-->
    <!--                            data-bs-target="#faq-list-1">Why be a Member?<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
    <!--                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">-->
    <!--                            <p>-->
    <!--                                1. When you join the association, you become a part of a national and international network of Interior -->
    <!--                                designers.<br><br>-->
    <!--                                2. We are more than an association. IDAB vision and mission must remind to contribute selflessly to -->
    <!--                                interior design industries and designers in Bangladesh. IDAB always believe on first track skilled and -->
    <!--                                knowledge on Interior design.<br><br>-->
    <!--                                3. As a non-profit association governed by law, we do believe on standard of professionalism of Interior -->
    <!--                                designers, but to be able to resolve industries issue. It has solemn duty to promote the creativity and -->
    <!--                                professionalism in Bangladesh interior design in the world.<br><br>-->
    <!--                                4. Our all members and committee are made up of Interior Design (ID) professional and academic who -->
    <!--                                are working selflessly to give of their time, share their work experience with all of us and it makes our ID -->
    <!--                                industry more professional.<br><br>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </li>-->
                
    <!--                    <li data-aos="fade-up" data-aos-delay="100" style="background: #ebebeb">-->
    <!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"-->
    <!--                            class="collapsed">Recognition <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
    <!--                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">-->
    <!--                            <p>-->
    <!--                                1) IDAB certificate/ cote pin/ members crest identifies you as a member of IDAB to your clients that who -->
    <!--                                except our code of conduct.<br>-->
    <!--                                2) Provides clients with knowledge they are working with a well-educated, professional designer in -->
    <!--                                Bangladesh.<br><br>-->
    <!--                                Knowledge:<br>-->
    <!--                                1) IDAB will organize forum, seminar, workshop and events.<br>-->
    <!--                                2) Local and regional events program which is involved with education units.<br>-->
    <!--                                3) International seminars with renewed speaker. <br>-->
    <!--                                4) Regular update on latest technical, materials developments in industry.<br>-->
    <!--                                5) E-news later, which will be the hot topics in Bangladesh and international design, materials news and -->
    <!--                                tips to improve your business regular.<br><br>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </li>-->


    <!--                    <li data-aos="fade-up" data-aos-delay="100" style="background: #ebebeb">-->
    <!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"-->
    <!--                            class="collapsed">Networking <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
    <!--                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">-->
    <!--                            <p>-->
    <!--                                1) IDAB local chapter meeting, seminar, educational events, activities will make a network with our all -->
    <!--                                members with you, so it is easy to find all materials manufacturer, traded and importer.<br>-->
    <!--                                2) Link up with government agencies, national and international enterprise, design associations and -->
    <!--                                professional creative individuals.<br><br>Resources:<br>-->
    <!--                                1) Gain access to government (SME) grants and financial assistance opportunities.<br>-->
    <!--                                2) Employment-student job connection.<br>-->
    <!--                                3) Easy to access employment list of designers.<br>-->
    <!--                                4) Allow design company to post short-term assignment.<br><br>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </li>-->

    <!--                    <li data-aos="fade-up" data-aos-delay="100" style="background: #ebebeb">-->
    <!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"-->
    <!--                            class="collapsed">Marketing <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
    <!--                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">-->
    <!--                            <p>-->
    <!--                                1) Use of IDAB logo in front of your office or shop that identifies your membership and increase your -->
    <!--                                business with good faith.<br>-->
    <!--                                2) IDAB membership mark, logo and number on your e-mail signature, online profile, website, facebook -->
    <!--                                and printed materials such as business card or resume to promote your membership in IDAB and your -->
    <!--                                professionalism.<br><br>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </li>-->

    <!--                    <li data-aos="fade-up" data-aos-delay="100" style="background: #ebebeb">-->
    <!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"-->
    <!--                            class="collapsed">Accreditation <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
    <!--                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">-->
    <!--                            <p>-->
    <!--                                1) IDAB protects you interest by supporting design in Bangladesh which could affect to rights to practice -->
    <!--                                in interior design in Bangladesh.<br>-->
    <!--                                2) IDAB member mark could potentially provide further authority and trust for your organization since a -->
    <!--                                member of IDAB could empower your customer, audience, and clients to reach you in IDAB website with -->
    <!--                                good faith. <br><br>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </li>-->


    <!--                    <li data-aos="fade-up" data-aos-delay="100" style="background: #ebebeb">-->
    <!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"-->
    <!--                            class="collapsed">Overseas Alliance <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
    <!--                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">-->
    <!--                            <p>-->
    <!--                                1) IDAB will endorse with several countries ID association and society soon. So, you will be a part of this -->
    <!--                                international interior designer’s society.<br>-->
    <!--                                2) This alliance program will make a great opportunity to share experience with overseas interior -->
    <!--                                designer with you.<br>-->
    <!--                                3) All IDAB members can be the part of this program.<br><br>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </li>-->

    <!--                    <li data-aos="fade-up" data-aos-delay="100" style="background: #ebebeb">-->
    <!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"-->
    <!--                            class="collapsed">Discount<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
    <!--                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">-->
    <!--                            <p>-->
    <!--                                1) Preferential rate for IDAB members for IDAB events, seminars and workshops.<br>-->
    <!--                                2) Member rates for IDAB members with a wide range of materials and service with CORPORATE -->
    <!--                                PARTNERS.<br>-->
    <!--                                3) Member rates for IDAB book late and magazine.<br><br>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </li>-->

    <!--                    <li data-aos="fade-up" data-aos-delay="100" style="background: #ebebeb">-->
    <!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"-->
    <!--                            class="collapsed">Contribute to Society<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
    <!--                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">-->
    <!--                            <p>-->
    <!--                                1) Volunteer opportunities for student’s member to do work with great designer for get more -->
    <!--                                educational and experience.<br>-->
    <!--                                2) Members can be critics, judge and marking design students.<br>-->
    <!--                                3) With trade members, all members can offer materials and resource to design school and design -->
    <!--                                students.<br>-->
    <!--                                4) Members can offer sponsorship or scholarship to practicing designers or students.<br><br>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </li>-->

    <!--                    <li data-aos="fade-up" data-aos-delay="100" style="background: #ebebeb">-->
    <!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-2"-->
    <!--                            class="collapsed">Publicity<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
    <!--                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">-->
    <!--                            <p>-->
    <!--                                1) Expend your business in all over Bangladesh.<br>-->
    <!--                                2) Gain branding opportunities in TV, Daily newspaper and magazine with online platform.<br>-->
    <!--                                3) Gain branding opportunities in IDAB Facebook page, group and YOUTUBE channel.<br>-->
    <!--                                4) Gain branding opportunities in IDAB website and newsletter.<br>-->
    <!--                                5) Ability to participate in an independent international forum provided by IDAB</p>-->
    <!--                            </p>-->
    <!--                        </div>-->
    <!--                    </li>-->


    <!--                </ul>-->
    <!--            </div>-->
    <!--        </div>-->

            <!-- ITEM -->
    <!--        <div class="row" id="requirements">-->
    <!--            <div class="col-lg-4 nav nav-pills" style="height: 380px;overflow: hidden;">-->
    <!--                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#tab-pane-1" type="button">-->
    <!--                    <i class="bi bi-card-text me-3"></i>Student member-->
    <!--                </button>-->
    <!--                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-2" type="button">-->
    <!--                    <i class="bi bi-card-text me-3"></i>Candidate member-->
    <!--                </button>-->
    <!--                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-3" type="button">-->
    <!--                    <i class="bi bi-card-text me-3"></i>Professional member-->
    <!--                </button>-->
    <!--                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-4" type="button">-->
    <!--                    <i class="bi bi-card-text me-3"></i>Associate member-->
    <!--                </button>-->
    <!--                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-5" type="button">-->
    <!--                    <i class="bi bi-card-text me-3"></i>Trade member-->
    <!--                </button>-->
    <!--                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#tab-pane-6" type="button">-->
    <!--                    <i class="bi bi-card-text me-3"></i>Corporate member-->
    <!--                </button>-->
    <!--            </div>-->
    <!--            <div class="col-lg-8">-->
    <!--                <div class="tab-content">-->
    <!--                    <div class="tab-pane fade show active" id="tab-pane-1">-->
    <!--                        <div class="row g-4">-->
    <!--                            <div class="col-md-6">-->
    <!--                                <div class="position-relative h-100">-->
    <!--                                    <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-1.jpg" style="object-fit: cover;" alt="">-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-6">-->
    <!--                                <h4 class="mb-4"><i class="bi bi-amd text-danger"></i> First 100 Member 50% Discount</h4>-->
    <!--                                <h5 class="mb-4">Student Member</h5>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>1.Student Member</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>2. Educational Certificate (SSC/HSC)</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>3. Educational Certificate (ID, ARCH, IAR)</p>-->
    <!--                                <p class="mb-4">(Registration Fee 1000/-)</p>-->
    <!--                                <a href="#" class="button">Read More</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane fade" id="tab-pane-2">-->
    <!--                        <div class="row g-4">-->
    <!--                            <div class="col-md-6">-->
    <!--                                <div class="position-relative h-100">-->
    <!--                                    <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-2.jpg" style="object-fit: cover;" alt="">-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-6">-->
    <!--                                <h3 class="mb-4">Candidate Member</h3>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>2.Educational Certificate (SSC/HSC)</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>3.Educational Certificate (ID, ARCH, IAR)</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>4.Valid Trade License</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>5.Valid TIN Certificate</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>6. NID</p>-->
    <!--                                <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>-->
    <!--                                <a href="#" class="button">Read More</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane fade" id="tab-pane-3">-->
    <!--                        <div class="row g-4">-->
    <!--                            <div class="col-md-6">-->
    <!--                                <div class="position-relative h-100">-->
    <!--                                    <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-3.jpg" style="object-fit: cover;" alt="">-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-6">-->
    <!--                                <h3 class="mb-4">Professional Member</h3>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>2.Educational Certificate (SSC/HSC)</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>3.Educational Certificate (ID, ARCH, IAR)</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>4.Job Experience Certificate </p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>5.Valid Trade License</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>6.Valid Tin Certificate</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>7.NID</p>-->
    <!--                                <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>-->
    <!--                                <a href="#" class="button">Read More</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="tab-pane fade" id="tab-pane-4">-->
    <!--                        <div class="row g-4">-->
    <!--                            <div class="col-md-6">-->
    <!--                                <div class="position-relative h-100">-->
    <!--                                    <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-4.jpg" style="object-fit: cover;" alt="">-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-6">-->
    <!--                                <h3 class="mb-4">Associate Member</h3>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>2.Educational Certificate (SSC/HSC)</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>3.Job Experience Certificate</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>5.Valid Tin Certificate</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>6.NID (They don't have voting rights.)</p>-->
    <!--                                <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 4000/-)</p>-->
    <!--                                <a href="#" class="button">Read More</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                        <div class="tab-pane fade" id="tab-pane-5">-->
    <!--                        <div class="row g-4">-->
    <!--                            <div class="col-md-6">-->
    <!--                                <div class="position-relative h-100">-->
    <!--                                    <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-5.jpg" style="object-fit: cover;" alt="">-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-6">-->
    <!--                                <h3 class="mb-4">Trade Member</h3>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>2.Valid Trade License</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>3.Valid Tin Certificate</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>4.NID (They don't have voting rights.)</p>-->
    <!--                                <p class="mb-4">(Registration Fee 2000/-) (Annual Fee 10000/-)</p>-->
    <!--                                <a href="#" class="button">Read More</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                        <div class="tab-pane fade" id="tab-pane-6">-->
    <!--                        <div class="row g-4">-->
    <!--                            <div class="col-md-6">-->
    <!--                                <div class="position-relative h-100">-->
    <!--                                    <img class="position-absolute rounded w-100 h-100" src="{{asset('public/frontend')}}/img/portfolio/portfolio-6.jpg" style="object-fit: cover;" alt="">-->
    <!--                                </div>-->
    <!--                            </div>-->
    <!--                            <div class="col-md-6">-->
    <!--                                <h3 class="mb-4">Corporate Member</h3>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>1.Passport Size Picture</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>4.Job Experience Certificate </p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>5.Valid Trade License</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>6.Valid Tin Certificate</p>-->
    <!--                                <p><i class="bi bi-check-lg me-3"></i>7.NID</p>-->
    <!--                                <p class="mb-4">(Registration Fee 000/-) (Annual Fee 0000/-)</p>-->
    <!--                                <a href="#" class="button">Read More</a>-->
    <!--                            </div>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->

    <!--    </div>-->
    <!--</section><!-- End Portfolio Section -->
</div>
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
