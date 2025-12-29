@extends('frontend.layouts.app')
@section('title', 'Membership Payment')
@section('style')
    <style>
        .input-hidden {
            position: absolute;
            left: -9999px;
        }
        input[type=radio]:checked + label>img {
            border: 1px solid #fff;
            box-shadow: 0 0 3px 3px #ff0000;
        }
        input[type=radio] + label>img {
            border: 1px dashed #444;
            width: 95px;
            height: 95px;
            transition: 500ms all;
            margin-bottom: 10px;
        }
        input[type=radio]:checked + label>img {
            transform: scale(0.8);
        }
        .box{
            display: none;
        }
    </style>
@endsection
@section('content')
@include('frontend.layouts.partial.banner')
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="card" style="border-radius: 0">
                        <div class="card-header pt-4">
                            <h4 class="card-title">Memeber Details</h4>
                        </div>
                        <div class="card-body">
                            <div class="bootstrap-media">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-12 text-center">
                                        <img class="img-fluid rounded" width="120" src="{{asset('public')}}/images/profile/{{ Auth::user()->profile_photo_path }}" alt="DexignZone">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Member ID <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{Auth::user()->member_code}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{Auth::user()->name}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{Auth::user()->email}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Member Type <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{Auth::user()->memberType->name}}</span>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6 col-5">
                                        <h5 class="f-w-500">Joining Date <span class="pull-right">:</span>
                                        </h5>
                                    </div>
                                    <div class="col-sm-6 col-7"><span>{{date("j F, Y", strtotime(Auth::user()->created_at))}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 form">
                    @if (session()->has('success'))
                        <strong class="text-success">{{session()->get('success')}}</strong>
                    @endif
                    <form action="{{route('registation-payment.store')}}" method="post" enctype="multipart/form-data" class="php-email-form"> 
                        @csrf
                        <input type="hidden" name="payment_reason_id" value="1">
                        <input type="hidden" name="ref_reason_id">
                        <div class="row g-3">
                            <div class="d-flex justify-content-center" style="border-bottom: 1px dashed #ff0000;">
                                <div>
                                    <input type="radio" name="payment_method_id" id="bKash" class="input-hidden" value="1"/>
                                    <label for="bKash"><img src="{{asset('public/images')}}/payment/bKash.png" alt="Payment bKash" /></label>
                                
                                    {{-- <input type="radio" name="payment_method_id" id="roket" class="input-hidden" value="2"/>
                                    <label for="roket"><img src="{{asset('public/images')}}/payment/roket.png" alt="Payment roket" /></label>
                                
                                    <input type="radio" name="payment_method_id" id="nagad" class="input-hidden" value="3"/>
                                    <label for="nagad"><img src="{{asset('public/images')}}/payment/nagad.png" alt="Payment nagad" /></label> --}}
                                    
                                    <input type="radio" name="payment_method_id" id="city-bank" class="input-hidden" value="2"/>
                                    <label for="city-bank"><img src="{{asset('public/images')}}/payment/city-bank.jpg" alt="Payment upay"/></label>

                                    @error('payment_method_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6 mt-2">
                                    <label class="form-label" id="labelChange">Payment Number 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="payment_number" id="payment_number" class="form-control form-select  @error('payment_number') is-invalid @enderror" style="height: 40px;">
                                        <option selected disabled>Not Found</option>
                                    </select>
                                    @error('payment_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2" id="slip" style="display: none">
                                    <label class="form-label">Bank Slip</label>
                                    <input type="file" id="slip" name="slip" class="form-control @error('slip') is-invalid @enderror" value="{{old('slip')}}" accept=".pdf,.jpeg,.jpg,.png,.gif,.doc,.docx">
                                    @error('slip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2" id="transactionNumber">
                                    <label class="form-label">Transaction Number
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="transaction_number" class="form-control @error('transaction_number') is-invalid @enderror" value="{{old('transaction_number')}}" placeholder="XXXXXXXXX">
                                    @error('transaction_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2" id="transferNumber">
                                    <label class="form-label">Transfer Number
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" name="transfer_number" class="form-control @error('transfer_number') is-invalid @enderror" placeholder="01X-XXXX-XXXX" value="{{old('transfer_number') }}">
                                    @error('transfer_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label class="form-label">Amount</label>
                                    {{--<input type="text" id="amount" class="form-control" value="{{auth::user()->memberType->registration_fee}}" disabled>--}}
                                    <input type="text" name="amount" class="form-control" value="{{auth::user()->memberType->registration_fee}}">
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 mt-2">
                                    <label class="form-label">Message</label>
                                    <textarea class="form-control py-3" name="message" value="{{old('message')}}" rows="2" placeholder="Enter your message here..."></textarea>
                                </div>
                                
                                <div class="col-md-12 mt-2" id="bKash-qr" style="display: none">
                                    <img src="{{asset('public/images')}}/payment/qr_bKash.jpg" style="width:70%; margin:auto;" alt="Payment upay"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10 mt-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection
@section('script')
    <script>
        //======Get Item Group All Data
        $(document).on('click', 'input[type="radio"]', function() {
            var methodId = $(this).attr("value");
            $.ajax({
                url: '{{ route('get-payment-number')}}', // Make sure the route is correct
                method: 'GET',
                dataType: "json",
                data: {'method_id': methodId},
                success: function(response) {
                    //--Get Customer Type Data
                    var datas = response.data;
                    var payment_number_dr = $('#payment_number');
                    payment_number_dr.empty();
                    // payment_number_dr.append('<option disabled selected>--Select--</option>');
                    if(datas.length > 0){
                        $.each(datas, function(index, option) {
                            payment_number_dr.append('<option value="' + option.number + '">' + option.number + '</option>');
                        });
                    }else{
                        payment_number_dr.append('<option disabled selected>Not available</option>');
                    }
                },
                error: function() {
                    alert('Sorry try agian...');
                }
            });
            if(methodId == 2){
                $('#bKash-qr').hide();
                $('#transferNumber').hide();
                $('#transactionNumber').hide();
                $('#labelChange').html('Bank-Number');
                $('#slip').show();
            }else{
                $('#bKash-qr').show();
                $('#transferNumber').show();
                $('#transactionNumber').show();
                $('#labelChange').html('Payment Number');
                $('#slip').hide();
            }
        });
    </script>
@endsection