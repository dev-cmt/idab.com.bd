<x-app-layout>
    @push('style')
    <style>
        .input-hidden {
            position: absolute;
            left: -9999px;
        }

        input[type=radio]:checked + label>img {
            border: 1px solid #fff;
            box-shadow: 0 0 3px 3px #090;
        }
        /* Stuff after this is only to make things more pretty */
        input[type=radio] + label>img {
            border: 1px dashed #444;
            width: 95px;
            height: 95px;
            transition: 500ms all;
            margin-bottom: 10px;
            cursor: pointer;
        }
        input[type=radio]:checked + label>img {
            transform: scale(0.8);
        }
        .box{
            display: none;
        }
    </style>
    @endpush
    <div class="row">
        <div class="col-xl-5 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Annual Fees</h4>
                    <a href="{{route('transaction-annual.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Back</a>
                </div>
                <div class="card-body">
                    <div class="bootstrap-media">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 text-center">
                                <img class="img-fluid rounded" width="165" src="{{asset('public')}}/images/profile/{{ Auth::user()->profile_photo_path }}" alt="">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-5">
                                <h5 class="f-w-500">Member ID<span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-sm-6 col-7"><span>{{Auth::user()->member_code}}</span></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-5">
                                <h5 class="f-w-500">Name <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-sm-6 col-7"><span>{{Auth::user()->name}}</span></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-5">
                                <h5 class="f-w-500">Email <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-sm-6 col-7"><span>{{Auth::user()->email}}</span></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-5">
                                <h5 class="f-w-500">Number <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-sm-6 col-7"><span>{{Auth::user()->infoPersonal->contact_number ?? 'null'}}</span></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6 col-5">
                                <h5 class="f-w-500">Joining Date <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-sm-6 col-7"><span>{{date("j F, Y", strtotime(Auth::user()->created_at))}}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Payment Details</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        @if (session()->has('success'))
                            <strong class="text-success">{{session()->get('success')}}</strong>
                        @endif
                        <form action="{{route('registation-payment.store')}}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            <input type="hidden" name="payment_reason_id" value="3">
                            <input type="hidden" name="ref_reason_id">
                            <div class="d-flex justify-content-center" style="border-bottom: 1px dashed #ff0000;">
                                <div>
                                    <input type="radio" name="payment_method_id" id="bKash" class="input-hidden" value="1"/>
                                    <label for="bKash"><img src="{{asset('public/images')}}/payment/bKash.png" alt="Payment bKash" /></label>
                                    
                                    <input type="radio" name="payment_method_id" id="city-bank" class="input-hidden" value="2"/>
                                    <label for="city-bank"><img src="{{asset('public/images')}}/payment/city-bank.jpg" alt="Payment upay"/></label>

                                    @error('payment_method_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row form-group pt-4">
                                <div class="form-group col-md-6">
                                    <label class="form-label" id="labelChange">Payment Number 
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="payment_number" id="payment_number" class="form-control form-select @error('payment_number') is-invalid @enderror" style="height: 40px;">
                                        <option selected disabled>Not Found</option>
                                    </select>
                                    @error('payment_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" id="slip" style="display: none">
                                    <label class="form-label">Bank Slip
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" id="slip" name="slip" class="form-control @error('slip') is-invalid @enderror" value="{{old('slip')}}" accept=".pdf,.jpeg,.jpg,.png,.gif,.doc,.docx">
                                    @error('slip')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6" id="transactionNumber">
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
                                <div class="form-group col-md-6" id="transferNumber">
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
                                <div class="form-group col-md-6">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="message" rows="1" placeholder="Enter your message here..."></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="d-flex justify-content-center">
                                        <div class="col-10 text-center">
                                            <label><strong>Dues Amount</strong></label>
                                            <div class="input-group input-primary">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">৳</span>
                                                </div>
                                                <input type="hidden" name="amount" id="amount" value="{{ Auth::user()->membertype ? Auth::user()->membertype->annual_fee : 0 }}">
                                                <input type="text" id="TOTAL" class="form-control" value="{{ Auth::user()->membertype ? Auth::user()->membertype->annual_fee : 0 }}" disabled>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bKash QR Code Modal -->
    <div class="modal fade" id="bKashModal" tabindex="-1" role="dialog" aria-labelledby="bKashModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bKashModalLabel">bKash Payment QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <img src="{{asset('public/images')}}/payment/qr_bKash.jpg" class="img-fluid" alt="bKash QR Code">
                </div>
            </div>
        </div>
    </div>

    @push('script')
    <script>
        $(document).ready(function(){
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                var targetBox = $("." + inputValue);
                $(".box").not(targetBox).hide();
                $(targetBox).show();
            });
        });

        $(document).on('click', 'input[type="radio"]', function() {
            var methodId = $(this).attr("value");
            $("#loading").show();
            $.ajax({
                url: '{{ route('get-payment-number')}}',
                method: 'GET',
                dataType: "json",
                data: {'method_id': methodId},
                success: function(response) {
                    var datas = response.data;
                    var payment_number_dr = $('#payment_number');
                    payment_number_dr.empty();
                    if(datas.length > 0){
                        $.each(datas, function(index, option) {
                            payment_number_dr.append('<option value="' + option.number + '">' + option.number + '</option>');
                        });
                    }else{
                        payment_number_dr.append('<option disabled selected>Not available</option>');
                    }
                    $("#loading").hide();
                },
                error: function() {
                    $("#loading").hide();
                    alert('Sorry try again!');
                }
            });

            if(methodId == 1){
                $('#transferNumber').show();
                $('#transactionNumber').show();
                $('#labelChange').html('Payment Number');
                $('#slip').hide();
                // Trigger Modal trigger for bKash
                $('#bKashModal').modal('show');
            } else if(methodId == 2){
                $('#transferNumber').hide();
                $('#transactionNumber').hide();
                $('#labelChange').html('Bank-Number');
                $('#slip').show();
            } else {
                $('#transferNumber').show();
                $('#transactionNumber').show();
                $('#labelChange').html('Payment Number');
                $('#slip').hide();
            }
        });
    </script>
    @endpush
</x-app-layout>