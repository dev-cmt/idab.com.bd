<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Verification - IDAB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 30px 15px;
        }
        .verification-card {
            max-width: 850px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            padding: 40px;
        }
        .profile-img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #28a745;
            margin: 0 auto 20px;
            display: block;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .profile-img.expired {
            border-color: #dc3545;
            filter: grayscale(80%);
        }
        .badge-status {
            padding: 8px 20px;
            border-radius: 30px;
            display: inline-block;
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 20px;
        }
        .badge-verified {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .badge-expired {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .section-header {
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 8px;
            margin-top: 25px;
            margin-bottom: 15px;
            color: #0d6efd;
            font-weight: 700;
        }
        .info-row {
            padding: 8px 0;
            border-bottom: 1px solid #f8f9fa;
        }
        .info-label {
            font-weight: 600;
            color: #495057;
        }
        .info-value {
            color: #212529;
        }
        .social-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            color: white;
            margin-right: 10px;
            margin-bottom: 10px;
            text-decoration: none;
            transition: transform 0.2s;
        }
        .social-link:hover {
            transform: translateY(-3px);
            color: white;
        }
        .bg-facebook { background-color: #3b5998; }
        .bg-linkedin { background-color: #0077b5; }
        .bg-twitter { background-color: #1da1f2; }
        .bg-instagram { background-color: #e1306c; }
        .bg-youtube { background-color: #ff0000; }
        .bg-whatsapp { background-color: #25d366; }
        .bg-website { background-color: #0d6efd; }
        .qr-code {
            width: 140px;
            height: 140px;
            margin: 15px auto;
            display: block;
        }
    </style>
</head>
<body>
    <div class="verification-card">

        @if(!empty($isPaidCurrentYear) && $user->status == 1)

            <!-- ================= ACTIVE / PAID MEMBER VIEW ================= -->
            <div class="text-center mb-4">
                <div class="badge-status badge-verified">
                    <i class="fas fa-check-circle me-2"></i> Verified Active Member
                </div>
            </div>

            @if($user->profile_photo_path)
            <img src="{{ asset('public/images/profile/' . $user->profile_photo_path) }}" 
                 alt="Profile Photo" 
                 class="profile-img"
                 onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=28a745&color=fff'">
            @endif

            <h2 class="text-center fw-bold mb-1">{{ $user->name }}</h2>
            <p class="text-center text-muted mb-4">Member Code: <strong>{{ $user->member_code ?? 'IDAB-' . $user->id }}</strong></p>

            <!-- Basic Membership Overview -->
            <div class="row bg-light p-3 rounded mb-4">
                <div class="col-md-4 col-6 mb-2">
                    <div class="info-label"><i class="fas fa-id-badge text-primary me-2"></i>Member Type:</div>
                    <div class="info-value fw-bold">{{ $user->memberType->name ?? 'Member' }}</div>
                </div>
                <div class="col-md-4 col-6 mb-2">
                    <div class="info-label"><i class="fas fa-calendar-alt text-primary me-2"></i>Member Since:</div>
                    <div class="info-value">{{ date('F j, Y', strtotime($user->created_at)) }}</div>
                </div>
                <div class="col-md-4 col-12 mb-2">
                    <div class="info-label"><i class="fas fa-clock text-primary me-2"></i>Validity:</div>
                    <div class="info-value text-success fw-bold">
                        {{ now()->month > 6 
                            ? now()->addYear()->month(6)->endOfMonth()->format('d F Y') 
                            : now()->month(6)->endOfMonth()->format('d F Y') 
                        }}
                    </div>
                </div>
            </div>

            <!-- Personal Information -->
            <h5 class="section-header"><i class="fas fa-user me-2"></i>Personal Information</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Email:</span>
                        <span class="info-value">{{ $user->email }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Contact Number:</span>
                        <span class="info-value">{{ $user->infoPersonal->contact_number ?? 'N/A' }}</span>
                    </div>
                </div>
                @if($user->infoPersonal->dob ?? false)
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Date of Birth:</span>
                        <span class="info-value">{{ date('d M Y', strtotime($user->infoPersonal->dob)) }}</span>
                    </div>
                </div>
                @endif
                @if($user->infoPersonal->present_address ?? false)
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Address:</span>
                        <span class="info-value">{{ $user->infoPersonal->present_address }}</span>
                    </div>
                </div>
                @endif
            </div>

            <!-- Company & Designation Details -->
            @if($user->infoCompany)
            <h5 class="section-header"><i class="fas fa-building me-2"></i>Company & Professional Information</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Company Name:</span>
                        <span class="info-value fw-bold">{{ $user->infoCompany->company_name ?? 'N/A' }}</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Designation:</span>
                        <span class="info-value fw-bold">{{ $user->infoCompany->designation ?? 'N/A' }}</span>
                    </div>
                </div>
                @if($user->infoCompany->address)
                <div class="col-md-12">
                    <div class="info-row">
                        <span class="info-label">Office Address:</span>
                        <span class="info-value">{{ $user->infoCompany->address }}</span>
                    </div>
                </div>
                @endif
                @if($user->infoCompany->web_url)
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Website:</span>
                        <span class="info-value">
                            <a href="{{ Str::startsWith($user->infoCompany->web_url, ['http://', 'https://']) ? $user->infoCompany->web_url : 'http://' . $user->infoCompany->web_url }}" target="_blank" class="text-decoration-none">
                                {{ $user->infoCompany->web_url }} <i class="fas fa-external-link-alt ms-1 fs-6"></i>
                            </a>
                        </span>
                    </div>
                </div>
                @endif
            </div>
            @endif

            <!-- Educational Qualification -->
            @if($user->infoAcademic)
            <h5 class="section-header"><i class="fas fa-graduation-cap me-2"></i>Educational Qualification</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Qualification:</span>
                        <span class="info-value">{{ $user->infoAcademic->mastQualification->name ?? 'N/A' }}</span>
                    </div>
                </div>
                @if($user->infoAcademic->institute)
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Institute:</span>
                        <span class="info-value">{{ $user->infoAcademic->institute }}</span>
                    </div>
                </div>
                @endif
                @if($user->infoAcademic->subject)
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Subject / Discipline:</span>
                        <span class="info-value">{{ $user->infoAcademic->subject }}</span>
                    </div>
                </div>
                @endif
                @if($user->infoAcademic->passing_year)
                <div class="col-md-6">
                    <div class="info-row">
                        <span class="info-label">Passing Year:</span>
                        <span class="info-value">{{ $user->infoAcademic->passing_year }}</span>
                    </div>
                </div>
                @endif
            </div>
            @endif

            <!-- Social Media & Contact Links -->
            @if($user->infoOther)
            @php $other = $user->infoOther; @endphp
            @if($other->facebook_url || $other->linkedin_url || $other->twitter_url || $other->instagram_url || $other->youtube_url || $other->whatsapp_url)
            <h5 class="section-header"><i class="fas fa-share-alt me-2"></i>Social Media Links</h5>
            <div class="mt-3">
                @if($other->facebook_url)
                    <a href="{{ Str::startsWith($other->facebook_url, 'http') ? $other->facebook_url : 'https://' . $other->facebook_url }}" target="_blank" class="social-link bg-facebook" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                @endif
                @if($other->linkedin_url)
                    <a href="{{ Str::startsWith($other->linkedin_url, 'http') ? $other->linkedin_url : 'https://' . $other->linkedin_url }}" target="_blank" class="social-link bg-linkedin" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                @endif
                @if($other->twitter_url)
                    <a href="{{ Str::startsWith($other->twitter_url, 'http') ? $other->twitter_url : 'https://' . $other->twitter_url }}" target="_blank" class="social-link bg-twitter" title="Twitter"><i class="fab fa-twitter"></i></a>
                @endif
                @if($other->instagram_url)
                    <a href="{{ Str::startsWith($other->instagram_url, 'http') ? $other->instagram_url : 'https://' . $other->instagram_url }}" target="_blank" class="social-link bg-instagram" title="Instagram"><i class="fab fa-instagram"></i></a>
                @endif
                @if($other->youtube_url)
                    <a href="{{ Str::startsWith($other->youtube_url, 'http') ? $other->youtube_url : 'https://' . $other->youtube_url }}" target="_blank" class="social-link bg-youtube" title="YouTube"><i class="fab fa-youtube"></i></a>
                @endif
                @if($other->whatsapp_url)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $other->whatsapp_url) }}" target="_blank" class="social-link bg-whatsapp" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                @endif
            </div>
            @endif
            @endif

            <!-- QR Code Section -->
            <div class="text-center mt-5 pt-3 border-top">
                @php
                    $verificationUrl = route('member-verify', $user->id);
                @endphp
                <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={{ urlencode($verificationUrl) }}" alt="QR Code" class="qr-code">
                <p class="text-muted small mb-0">Verified Official Member Record</p>
                <p class="text-muted small">IDAB Verification System &bull; {{ date('F j, Y') }}</p>
            </div>

        @else

            <!-- ================= EXPIRED / UNPAID MEMBER VIEW ================= -->
            <div class="text-center my-4">
                <div class="badge-status badge-expired display-6 py-3 px-4">
                    <i class="fas fa-exclamation-triangle me-2"></i> Membership Expired
                </div>
            </div>

            @if($user->profile_photo_path)
            <img src="{{ asset('public/images/profile/' . $user->profile_photo_path) }}" 
                 alt="Profile Photo" 
                 class="profile-img expired"
                 onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=dc3545&color=fff'">
            @endif

            <h3 class="text-center text-muted fw-bold mb-1">{{ $user->name }}</h3>
            <p class="text-center text-muted mb-4">Member ID: {{ $user->member_code ?? 'IDAB-' . $user->id }}</p>

            <div class="alert alert-danger text-center p-4 my-4 rounded-3 shadow-sm">
                <h4 class="alert-heading fw-bold mb-2"><i class="fas fa-ban me-2"></i>সদস্যপদ মেয়াদোত্তীর্ণ (Membership Expired)</h4>
                <p class="mb-0 fs-5">
                    এই সদস্য চলতি বছরের Membership Fee অথবা Renewal Fee প্রদান করেননি।
                </p>
                <hr class="my-3">
                <p class="mb-0 text-muted small">
                    This member has not paid the current year's membership or renewal fee. Detailed profile, company information, and document downloads are restricted for expired memberships.
                </p>
            </div>

            <div class="text-center mt-4 text-muted">
                <small>IDAB Verification System &bull; Checked on {{ date('F j, Y') }}</small>
            </div>

        @endif

    </div>
</body>
</html>