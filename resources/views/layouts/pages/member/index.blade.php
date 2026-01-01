<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{$memberType}} List</h4>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="display " style="min-width: 845px">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Member Type</th>
                                @canany('Super-Admin')
                                <th>Certificate</th>
                                <th>Approve By</th>
                                @endcanany
                                @canany('Member','Member edit', 'Member view', 'Member delete')
                                <th class="text-right">Action</th>
                                @endcanany
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td><img class="img-fluid" src="{{asset('public')}}/images/profile/{{ $row->profile_photo_path }}" width="40" height="40" alt=""></td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->email}}</td>
                                    <td>{{ $row->infoPersonal->contact_number ?? 'null' }}</td>
                                    <td>{{$row->memberType->name ?? 'null'}}</td>
                                    <td>
                                        <a href="{{ route('member-certificate.download', $row->id) }}" class="btn btn-sm btn-secondary p-1 px-2 m-1">
                                            <i class="flaticon-381-download"></i><span class="btn-icon-add"></span> Dwonload
                                        </a>
                                    </td>
                                    @canany('Super-Admin')
                                    <td>
                                        <button class="badge light badge-info">{{$row->parentUser->name ?? 'null'}}</i></button>
                                    </td>
                                    @endcanany
                                    <td class="text-right">
                                        @canany('Member edit')
                                        <a href="{{ route('info_member.edit', $row->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        @endcanany
                                        @canany('Member', 'Member view')
                                        <a href="{{ route('profile_show', $row->id) }}" class="btn btn-info shadow btn-xs sharp mr-1"><i class="flaticon-381-view"></i></a>
                                        @endcanany
                                        @canany('Member delete')
                                        {{-- <a href="{{ route('users.edit', $row->id) }}" class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash"></i></a> --}}
                                        @endcanany
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
    


</x-app-layout>
