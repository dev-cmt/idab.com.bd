<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registation Fee (Online Payment)</h4>
                    @can('Member approve access')
                    <a href="{{route('members-approve.index')}}" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="btn-icon-add"></span>Member Approve</a>
                    @endcanany
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Member Info.</th>
                                <th>Receive Info.</th>
                                <th>Transfer</th>
                                <th>Payment</th>
                                <th class="text-right">Approval</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><strong>Name: </strong>{{$row->member->name}} <br> <strong>Type: </strong> {{$row->member->memberType->name}}</td>
                                    <td><strong>Number: </strong>{{$row->payment_number}} <br> <strong>Method: </strong>{{$row->paymentMethod->name}}</td>
                                    <td><strong>Transfer No.: </strong>{{$row->transfer_number}} <br> <strong>Transaction No.: </strong>{{$row->transaction_number}}</td>
                                    <td><strong>Date: </strong>{{date("j F, Y", strtotime($row->payment_date))}}<br> <strong>Amount: </strong>{{$row->paid_amount}}</td>
                                    @can('Membership fees approved')
                                    <td class="d-flex justify-content-end">
                                        <form action="{{route('transaction-registation.approve', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-info p-1 mr-1">Approve</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{route('transaction-registation.cancel', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-danger p-1">Canceled</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registation Fee (Bank Payment)</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Member Info.</th>
                                <th>Receive Info.</th>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th>Slip</th>
                                <th class="text-right">Approval</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($bank as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img class="img-fluid" src="{{asset('public')}}/images/profile/{{ $row->member->profile_photo_path }}" width="40" height="40" alt=""></td>
                                    <td><strong>Name: </strong>{{$row->member->name}} <br> <strong>Type: </strong> {{$row->member->memberType->name}}</td>
                                    <td><strong>Number: </strong>{{$row->payment_number}} <br> <strong>Method: </strong>{{$row->paymentMethod->name}}</td>
                                    <td>{{date("j F, Y", strtotime($row->payment_date))}}</td>
                                    <td>{{$row->paid_amount}}</td>
                                    <td>
                                        @if($row->slip)
                                        <a href="{{ route('transaction-document.download', $row->id) }}" target="_blank" class="btn btn-sm btn-secondary p-1 px-2 mr-1">
                                            <span class="flaticon-381-download"></span>
                                        </a>
                                        @endif
                                    </td>
                                    @can('Membership fees approved')
                                    <td class="d-flex justify-content-end">
                                        <form action="{{route('transaction-registation.approve', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-info p-1 m-1">Approve</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                        <form action="{{route('transaction-registation.cancel', $row->id)}}" method="post">
                                            <button class="btn btn-sm btn-danger p-1 m-1">Canceled</i></button>
                                            @csrf
                                            @method('PATCH')
                                        </form>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('Membership fees record')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registation Fee Record</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Member Info.</th>
                                <th>Receive Info.</th>
                                <th>Payment</th>
                                <th>Receive By</th>
                                <th>Status</th>
                                <th class="text-right">Approval</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($record as $key=> $row)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td><img class="img-fluid" src="{{asset('public')}}/images/profile/{{ $row->member->profile_photo_path }}" width="40" height="40" alt=""></td>
                                    <td><strong>Name: </strong>{{$row->member->name}} <br> <strong>Type: </strong> {{$row->member->memberType->name}}</td>
                                    <td><strong>Number: </strong>{{$row->payment_number}} <br> <strong>Method: </strong>{{$row->paymentMethod->name}}</td>
                                    <td><strong>Date: </strong>{{date("j F, Y", strtotime($row->payment_date))}}<br> <strong>Amount: </strong>{{$row->paid_amount}}</td>
                                    <td>
                                        <a href="{{route('profile_show', $row->approveBy->id )}}" class="btn btn-sm btn-secondary p-1 px-2">{{$row->approveBy->name ?? 'null'}}</i></a>
                                    </td>
                                    <td>@if($row->status == 1)
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i> Approve
                                        </span>
                                        @elseif($row->status == 2)
                                        <span class="badge light badge-danger">
                                            <i class="fa fa-circle text-danger mr-1"></i> Canceled
                                        </span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ route('transaction-registration.details', $row->id) }}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="flaticon-381-view"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan
 
</x-app-layout>
