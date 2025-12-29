    <!--**********************************
                Sidebar start
    ***********************************-->
    <div class="deznav scrollbar">
        <div class="main-profile">
            <div class="image-bx">
                <img src="{{asset('public')}}/images/profile/{{ Auth::user()->profile_photo_path }}" alt="">
                <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
            </div>
            <h5 class="name">{{Auth::user()->name}}</h5>
            <p class="email"><a href="mailto:<nowiki> {{Auth::user()->email}}" class="__cf_email__">[{{Auth::user()->email}}]</a></p>
        </div>
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li><a href="{{ route('dashboard') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-144-layout"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            
            @canany('Member', 'Student Member', 'Candidate Member', 'Professional Member', 'Associate Member', 'Trade Member', 'Corporate Member')
            <li>
                <a href="{{ route('dashboard-gallery.all')}}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-picture"></i><span class="nav-text">Gallery</span>
                </a>
            </li>
            @endcanany

            @canany('Member', 'Student Member', 'Candidate Member', 'Professional Member', 'Associate Member', 'Trade Member', 'Corporate Member')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user-9"></i>
                    <span class="nav-text">Member</span>
                </a>
                <ul aria-expanded="false">
                    @foreach ($memberType as $item)
                        <li><a href="{{Route('member.index', $item->id )}}">{{$item->name}} </a></li>
                    @endforeach
                    @canany('Member approve access','Member approved', 'Member approve record')
                    <li><a href="{{Route('members-approve.index')}}">Member Approve</a></li>
                    @endcanany
                    @canany('Member approve access','Member approved', 'Member approve record')
                    <li><a href="{{Route('member-csv.download')}}">Report Member</a></li>
                    @endcanany
                    
                    @canany('Data Setting')
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Data Setting</a>
                        <ul aria-expanded="false">
                            @canany('CommitteeType access','CommitteeType create','CommitteeType edit','CommitteeType view', 'CommitteeType delete')
                                <li><a href="{{Route('committee-type.index')}}">Add Committee Types</a></li>
                            @endcanany
                            @canany('MemberType access','MemberType create','MemberType edit','MemberType view', 'MemberType delete')
                                <li><a href="{{Route('member-type.index')}}">Add Member Types</a></li>
                            @endcanany
                            @canany('Qualification access','Qualification create','Qualification edit','Qualification view', 'Qualification delete')
                                <li><a href="{{Route('member-qualification.index')}}">Add Qualification</a></li>
                            @endcanany
                        </ul>
                    </li>
                    @endcanany
                </ul>
            </li>
            @endcanany

            @canany('Member', 'Student Member', 'Candidate Member', 'Professional Member', 'Associate Member', 'Trade Member', 'Corporate Member')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-003-diamond"></i>
                    <span class="nav-text">My Transactions</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ Route('transaction-annual.index')}}">Annual Fee</a></li>
                    <li><a href="{{ Route('transaction-event.index')}}">Event Fee</a></li>
                </ul>
            </li>
            @endcanany

            @canany('Payment menu access')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                <i class="flaticon-381-database"></i>
                    <span class="nav-text">Payment History</span>
                </a>
                <ul aria-expanded="false">
                    @canany('Annual fees access', 'Annual fees approved', 'Annual fees record')
                    <li><a href="{{Route('transaction-annual-approve.index')}}">Annual Fee Details</a></li>
                    @endcanany
                    @canany('Event fees access', 'Event fees approved', 'Event fees record')
                    <li><a href="{{Route('transaction-event-approve.index')}}">Event Fee Details</a></li>
                    @endcanany
                    @canany('Membership fees access', 'Membership fees approved', 'Membership fees record')
                    <li><a href="{{Route('transaction-registation-approve.index')}}">Membership Fee Details</a></li>
                    @endcanany
                    @canany('Data Setting')
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Data Setting</a>
                        <ul aria-expanded="false">
                            @canany('Pyment number access','Pyment number create','Pyment number edit', 'Pyment number view', 'Pyment number delete')
                            <li><a href="{{Route('transaction-payment-number.index')}}">Setup Payment Number</a></li>
                            @endcanany
                            @canany('Pyment fees access','Pyment annual fees','Pyment membership fees')
                            <li><a href="{{Route('transaction-payment-fees.index')}}">Setup Payment Fee</a></li>
                            @endcanany
                        </ul>
                    </li>
                    @endcanany
                </ul>
            </li>
            @endcanany

            @canany('Post menu access')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-pad"></i>
                    <span class="nav-text">Web Post</span>
                </a>
                <ul aria-expanded="false">
                    @canany('Gallery access','Gallery create','Gallery edit','Gallery delete')
                        <li><a href="{{ Route('gallery.index')}}">Photo Gallery</a></li>
                    @endcanany
                    @canany('Event access','Event create','Event edit','Event delete')
                    <li><a href="{{route('event.index')}}">Manage Events</a></li>
                    @endcanany
                    @canany('Event access','Event create','Event edit','Event delete')
                    <li><a href="{{route('blog.index')}}">Manage Blog</a></li>
                    @endcanany
                    @canany('Event access','Event create','Event edit','Event delete')
                    <li><a href="{{route('newsletters.index')}}">Manage Newsletter</a></li>
                    @endcanany
                </ul>
            </li>
            @endcanany

            @canany('Setting menu access')
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    @canany('Contact access','Contact reply', 'Contact delete')
                    <li><a href="{{route('contact-us.index')}}">Contact Us</a></li>
                    @endcanany

                    @canany('Role access','Role create','Role edit','Role delete')
                        <li><a href="{{ route('roles.index') }}">Manage Role</a></li>
                    @endcanany

                    @canany('User access','User create','User edit','User delete')
                    <li><a href="{{ Route('users.index')}}">Manage User</a></li>
                    @endcanany
                    
                </ul>
            </li>
            @endcanany

        </ul>
        <div class="copyright py-4 my-4">
            {{-- <p><strong>Pune Club</strong><!-- © 2023 All Rights Reserved--></p>
            <p class="fs-12">Made with <span class="heart"></span> by <a href="http://www.iconisl.com/"><img src="{{asset('public/frontend')}}/images/icon.png" alt="Icon Information Systems Ltd." style="width:30px;"></a></p> --}}
        </div>
    </div>

    <!--**********************************
                Sidebar end
    ***********************************-->