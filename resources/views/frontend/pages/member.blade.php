@extends('frontend.layouts.app')
@section('title', $membersType)
@section('content')
    @include('frontend.layouts.partial.banner')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">

        <div class="container">
            <!--Member Verification-->
            <div class="row">
                <div class="col-lg-12 m-auto">
                    <div class="alert alert-danger alert-dismissible fade show error_message" role="alert">
                        <strong>Sorry. Not Found!</strong> This id not match in record. Please try anyother Number.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="d-flex mb-4">
                        <input type="text" name="member_code" id="member-code" class="form-control @error('member_code') is-invalid @enderror px-4" placeholder="Enter Your Member-ID..." value="{{ Auth::user()->member_code ?? '' }}">
                        <button class="btn btn-primary ml-2" id="find-member">VERIFICATION</button>
                    </div>
                    
                </div>

                 <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Member Verify</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 text-center">
                                        <img class="img-fluid rounded" id="memberProfilePhoto" width="120" src="{{ asset('public') }}/images/profile/{{auth::user()->profile_photo_path ?? ''}}" alt="">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Member ID <span class="pull-right">:</span></h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span id="memberCode">{{Auth::user()->member_code ?? ''}}</span></div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span id="memberName">{{Auth::user()->name ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span id="memberEmail">{{Auth::user()->email ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Member Type <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span id="memberType">{{Auth::user()->memberType->name ?? ''}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Joining Date <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span id="memberJoin">{{Auth::user()->join_date ?? ''}}</span></div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                <h5 class="text-success"><i class="bx bxl-rights"></i>Verified</h5>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>


            <div class="section-title">
                <h2 class="reveal">Members List</h2>
            </div>
            <div class="row">
                @foreach ($data as $key=> $row )
                <div class="col-lg-3 mb-3">
                    <div class="hover_card_pages wow slideInUp" data-wow-delay="0.3s">
                        <div class="imgBx">
                            <img src="{{ asset('public/images/profile/'. $row->profile_photo_path) }}" alt="images">
                        </div>
                        <div class="hover_card_details">
                            <h4><span>{{$row->member_code}}</span></h4>
                            <h6>{{$row->name}}</h6>
                            @if ($row->infoCompany && ($row->infoCompany->company_name || $row->infoCompany->designation))
                                <h2><span>{{$row->infoCompany->designation}}</span></h2>
                                <h4><span>({{$row->infoCompany->company_name ?? ''}})</span></h4>
                            @elseif ($row->infoStudent && ($row->infoStudent->student_institute || $row->infoStudent->semester))
                                <h2><span>{{$row->infoStudent->student_institute}}</span></h2>
                            @endif
                        </div>
                        {{-- <a href="{{route('page.member_details', $row->user_id)}}" class="member_dettails_btn btn btn-primary py-2 px-4 mt-4">Details</a> --}}
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.error_message').hide();
            $('#staticBackdrop').modal('hide');

            // var memberCode = $('#member-code').val();
            // getMember(memberCode);

            $('#find-member').click(function() {
                var memberCode = $('#member-code').val();
                getMember(memberCode);
            });

            function getMember(memberCode){
                if (!memberCode) {
                    alert("Please enter a Member ID!");
                    return;
                }
                $.ajax({
                    url: "{{ route('member.find') }}", // Replace with your actual route
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        member_code: memberCode
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#staticBackdrop').modal('show');
                            $('.error_message').hide();

                            let member = response; // Extract member details from response

                            // Update UI with member information
                            $('#memberId').val(member.id);
                            $('#memberCode').text(member.member_code);
                            $('#memberName').text(member.name);
                            $('#memberEmail').text(member.email);
                            $('#memberType').text(member.member_type);
                            $('#memberJoin').text(new Date(member.join_date).toLocaleDateString('en-GB'));

                            // Update profile photo if available
                            if (member.profile_photo_path) {
                                $('#memberProfilePhoto').attr('src', "{{ asset('public') }}/images/profile/" + member.profile_photo_path);
                            }
                        } else {
                            $('.error_message').show().text(response.message);
                            $('#staticBackdrop').modal('hide');
                        }
                    },
                    error: function(xhr) {
                        $('.error_message').show().text("Error fetching member data.");
                        $('#staticBackdrop').modal('hide');
                    }
                });
            }
        });
    </script>
@endsection