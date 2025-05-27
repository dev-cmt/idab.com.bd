<x-app-layout>
    <style>
        /*__________________Image Profile______________________*/
        .avatar-upload {
            position: relative;
            max-width: 240px;
            margin: 10px auto;
        }
        .avatar-upload .avatar-edit {
        position: absolute;
        right: 5px;
        z-index: 1;
        top: 10px;
        }
        .avatar-upload .avatar-edit input {
        display: none;
        }
        .avatar-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 0%;
        background: #ff0000;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
        padding: 7px 9px;
        color: #fff;
        }
        .avatar-upload .avatar-edit input + label:hover {
        background: #c00000;
        }
        .avatar-upload .avatar-preview {
            width: 240px;
            height: 240px;
            position: relative;
            border-radius: 0%;
            border: 6px solid #ff0000;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 0%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
    <div class="row">
        <div class="col-md-12 col-sm-10 mx-auto">
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="p-4 bg-dark">
                    <div class="media align-items-end profile-header">
                        <div class="profile mr-4">
                            <div class="rounded mb-2 img-thumbnail" style="width:150px;height:150px;overflow:hidden">
                                <img src="{{asset('public/images')}}/profile/{{ $user->profile_photo_path }}" alt="..." style="height: 100%;width: 100%;object-fit: cover;">
                            </div>
                            @if ($user->id == Auth::user()->id)
                                <a href="{{route('info_member.edit', $user->id)}}" class="btn btn-primary light text-white btn-sl-sm btn-block"><i class="fa fa-pencil mr-2"></i> Edit profile</a>
                            @endif
                        </div>
                        <div class="media-body mb-5 text-white">
                            <h4 class="text-white">{{$user->name}}</h4>
                            <p class="small mb-5"><i class="fa fa-calendar-o mr-2"></i>{{date("j F, Y", strtotime($user->created_at))}}</p>
                        </div>
                    </div>
                </div>
    
                <div class="card-body">
                    <div class="profile-tab">
                        <div class="custom-tab-1">
                            @if ($user->id == Auth::user()->id)
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#my-posts" data-toggle="tab" class="nav-link {{Session::has('info_update') ? '' : 'active'}}">Member Information</a></li>
                                    <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link {{Session::has('info_update') ? 'active' : ''}}">Other Information</a></li>
                                    <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link {{Session::has('messege') || $errors->any() ? 'active' : ''}}">Setting</a></li>
                                </ul>
                            @endif

                            <div class="tab-content">
                                <div id="my-posts" class="tab-pane fade {{Session::has('messege') || Session::has('info_update') || $errors->any() ? '' : 'active show'}}">
                                    <!--=====// Personal Information//=====-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-primary my-3">Personal Information</h6>
                                        </div>
                                        <!--Item-->
                                        {{-- <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Name <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$user->name }}</span></div>
                                            </div>
                                        </div> --}}
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Email <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{ $user->email }}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Contact Number <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{ $infoPersonal->contact_number ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        {{-- <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">NID No.<span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{ $infoPersonal->nid_no ?? "Null"}}</span></div>
                                            </div>
                                        </div> --}}
                                        <!--Item-->
                                        {{-- <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Gender <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoPersonal->gender ?? "Null" == '0' ? 'Male': 'Female' }}</span></div>
                                            </div>
                                        </div> --}}
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Date Of Birth <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{date('d-m-Y', strtotime($infoPersonal->dob ?? "Null"))}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Blood Group <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7">
                                                    @if (!empty($infoPersonal) && isset($infoPersonal->blood_group))
                                                        @php
                                                            $bloodGroups = [
                                                                1 => 'A Positive (A+)',
                                                                2 => 'A Negative (A-)',
                                                                3 => 'B Positive (B+)',
                                                                4 => 'B Negative (B-)',
                                                                5 => 'AB Positive (AB+)',
                                                                6 => 'AB Negative (AB-)',
                                                                7 => 'O Positive (O+)',
                                                                8 => 'O Negative (O-)',
                                                            ];
                                                        @endphp
                                                
                                                        <span>{{ $bloodGroups[$infoPersonal->blood_group] ?? 'Unknown Blood Group' }}</span>
                                                    @else
                                                        <span>Unknown Blood Group</span>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!--Item-->
                                        {{-- <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Marrital Status <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7">
                                                    @if ($infoPersonal->marrital_status ?? "Null" == 0)
                                                    <span>Unmarried</span>
                                                    @elseif ($infoPersonal->marrital_status ?? "Null" == 1)
                                                    <span>Married</span>
                                                    @elseif ($infoPersonal->marrital_status ?? "Null" == 2)
                                                    <span>Divorce</span>
                                                    @elseif ($infoPersonal->marrital_status ?? "Null" == 3)
                                                    <span>Widowed</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Present Address <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoPersonal->present_address ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Parmanent Address <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoPersonal->parmanent_address ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--=====// Academic Information//=====-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-primary my-3">Academic Information</h6>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Institute Name <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoAcademic->institute ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Qualification<span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoAcademic->mastQualification->name  ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Subject  <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoAcademic->subject ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Passing Year<span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoAcademic->passing_year ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Other Qualification<span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoAcademic->other_qualification ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    @if (!is_null($infoCompany))
                                    <!--=====// Company Information//=====-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-primary my-3">Company Information</h6>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Company Name <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoCompany->company_name ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Designation <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoCompany->designation ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Company Email <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoCompany->company_email ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Company Phone <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoCompany->company_phone ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Address <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoCompany->address ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Web Site Url<span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span><a href="{{$infoCompany->web_url ?? "Null"}}">{{$infoCompany->web_url }}</a></span></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @if (!is_null($infoStudent))
                                    <!--=====// Student Information//=====-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-primary my-3">Student Information</h6>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Institute Name<span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoStudent->student_institute ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Semester <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoStudent->semester ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Head Faculty Name <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoStudent->head_faculty_name ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                        <!--Item-->
                                        <div class="col-xl-6 col-sm-12">
                                            <div class="row mb-2">
                                                <div class="col-sm-6 col-5">
                                                    <h6 class="f-w-500">Head Faculty Number <span class="pull-right">:</span></h6>
                                                </div>
                                                <div class="col-sm-6 col-7"><span>{{$infoStudent->head_faculty_number ?? "Null"}}</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <!--Child Details-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if (!is_null($infoChildDetails) && is_countable($infoChildDetails) && count($infoChildDetails) > 0)
                                            <div class="table-responsive mt-2">
                                                <table class="table header-border table-hover verticle-middle">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Child Name</th>
                                                            <th scope="col">Gender</th>
                                                            <th scope="col">Birth Day</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($infoChildDetails as $key=> $row)
                                                        <tr>
                                                            <th>{{++$key}}</th>
                                                            <td>{{$row->child_name}}</td>
                                                            <td>{{$row->child_gender == '0' ? 'Male' : 'Female'}}</td>
                                                            <td>{{date('d M, y', strtotime($row->child_dob))}}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div id="about-me" class="tab-pane fade {{Session::has('info_update') ? 'active show' : ''}}">
                                    <!--=====// Other Information //=====-->
                                    @if (!is_null($infoOther) && !is_null($infoOther->id))
                                        <form action="{{ route('info_other.update', $infoOther->id )}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-lg-12 mt-3">
                                                    <div class="form-group row">
                                                        <label class="col-lg-2 col-form-label">About Me</label>
                                                        <div class="col-lg-10">
                                                            <textarea name="about_me" class="form-control @error('about_me') is-invalid @enderror" rows="2" id="comment" placeholder="What would you like to see?">{{$infoOther->about_me}}</textarea>
                                                            @error('about_me')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Facebook Link</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group mb-3  input-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-facebook"></i></span>
                                                                </div>
                                                                <input type="text" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror" placeholder="https://www.facebook.com" value="{{$infoOther->facebook_url}}">
                                                                @error('facebook_url')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Youtube Link</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group mb-3  input-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-youtube"></i></span>
                                                                </div>
                                                                <input type="text" name="youtube_url" class="form-control @error('facebook_url') is-invalid @enderror" placeholder="https://www.youtube.com" value="{{$infoOther->youtube_url}}">
                                                                @error('youtube_url')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Twitter Link</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group mb-3  input-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-twitter"></i></span>
                                                                </div>
                                                                <input type="text" name="twitter_url" class="form-control @error('twitter_url') is-invalid @enderror" placeholder="https://twitter.com" value="{{$infoOther->twitter_url}}">
                                                                @error('twitter_url')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Instagram Link</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group mb-3  input-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                                                </div>
                                                                <input type="text" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror" placeholder="https://www.instagram.com" value="{{$infoOther->instagram_url}}">
                                                                @error('instagram_url')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 col-form-label">Linkedin Link</label>
                                                        <div class="col-lg-8">
                                                            <div class="input-group mb-3  input-success">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-linkedin"></i></span>
                                                                </div>
                                                                <input type="text" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror" placeholder="https://www.linkedin.com" value="{{$infoOther->linkedin_url}}">
                                                                @error('linkedin_url')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                                <div id="profile-settings" class="tab-pane fade {{Session::has('messege') || $errors->any() ? 'active show' : ''}}">
                                     <!--=====// Change Profile //=====-->
                                     <form method="POST" action="{{ route('change.password', $user->id) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <!--Item-->
                                            <div class="col-lg-12">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger solid alert-dismissible fade show mt-2">
                                                        @foreach ($errors->all() as $error)
                                                            <svg viewBox="0 0 24 24" width="24 " height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                            <strong>Error!</strong> {{$error}}.
                                                            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span></button>
                                                        @endforeach
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-xl-7 col-sm-12 mt-3">
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Email</label>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="" value="{{$user->email }}" disabled>                                     
                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Member ID</label>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="form-control @error('member_code') is-invalid @enderror" name="name" placeholder="" value="{{$user->member_code }}" disabled>                                     
                                                        @error('member_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">Member Name
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="" value="{{$user->name }}">                                     
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="current_password" class="col-lg-5 col-form-label">Current Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-7">
                                                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{old('current_password')}}" autocomplete="current-password">
                                                        @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-5 col-form-label">New Password
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-7">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" autocomplete="new-password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-5 col-sm-12 ">
                                                <div class="skip-email text-center">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' name="profile_photo_path" class="@error('profile_photo_path') is-invalid @enderror form-control" id="imageUpload" accept=".png,.jpg,.jpeg,.gif,.svg" value="{{old('profile_photo_path')}}"/>                                    <label for="imageUpload"><i class="fa fa-camera"></i></label>
                                                            @error('profile_photo_path')
                                                                <span class="invalid-feedback" role="alert" style="position: absolute;top: 195px;left: -180px;width: 300px;">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <label for="imageUpload">
                                                            <div class="avatar-preview">
                                                                <div id="imagePreview" style="background-image: url('{{asset('public/images')}}/profile/{{ $user->profile_photo_path }}');"></div>
                                                            </div>
                                                        </label>
                                                        <button type="submit" class="btn btn-primary d-flex" style="width:100%;justify-content: center;">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End profile widget -->
    
        </div>
    </div>
    <!--Image Profile-->
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
            $('.submit-btn').css('background-color', '#68cf29');
            $(".submit-btn").removeAttr('disabled');
        });
    </script>
</x-app-layout>
  

