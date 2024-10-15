<div class="wrapper">
    <div class="leftside-menu">
                <a href="{{route('index')}}" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{ asset('backend/img/logo.png') }}" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('backend/img/favicon.png') }}" alt="" height="40">
            </span>
        </a>
        <div class="user-bgs" style="border-bottom: 1px solid #dddddd61;">
            <div class="container">
                        <div class="user-desk row">
                            <div class="col-4 px-1">
                                <div class="user-box-imgs text-center mt-2 mb-2">
                                    <img src="{{ asset('frontend/images/avatar/' . Auth::guard('web')->user()->avatar) }}"
                                        onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'"
                                        class=" shadow-sm img-fluid">
                                </div>
                            </div>
                            <div class="col-8 px-1">
                                <div class="user-box-content">
                                    <p class="leftbar-user-names mb-2">
                                        {{ Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User' }}
                                    </p>
                                    <p class="plan-names">
                                        <div class="button-list">
                                            <a href="#" class="btn bg-icn waves-effect waves-light"><i class="fad fa-user"></i></a>
                                            <a href="#" class="btn bg-icn waves-effect waves-light"><i class="fad fa-power-off"></i></a>
                                            <a href="#" class="btn bg-icn waves-effect waves-light"><i class="fad fa-copy"></i></a>
                                        </div>
                                        {{-- <b><span>{{ Auth::guard('web')->user()->userDetail->plan->title }}</span></b> --}}
                                    </p>
                                </div>
                                <div class="text-center">
                                    <input type="hidden"
                                        value="{{ env('APP_URL') }}?referrer_code={{ Auth::guard('web')->user()->referrer_code }}"
                                        id="referral_link">
                                </div>
                            </div>
                            {{-- <div class="col-12">
                                <p class="text-center fw-bolder mr-2">ID: {{ Auth::guard('web')->user()->referrer_code }}
                                    <a class="btn btn-success brder-rds pb" onclick="copyText()"><i class="uil-copy"
                                            style="font-size: 20px;"></i></a>
                                </p>
                            </div> --}}
                        </div>

            </div>
        </div>

        <div class="h-100" id="leftside-menu-container" data-simplebar>
            <ul class="side-nav">
                <li class="side-nav-item">
                    <a href="{{route('user.dashboard')}}" class="side-nav-link active">
                        <i class="fad fa-home"></i>
                        <span> Affiliate Dashboard </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.user.profile')}}" class="side-nav-link">
                        <i class="fad fa-user"></i>
                        <span>My Profile </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.bank.detail')}}" class="side-nav-link">
                        <i class="fad fa-wallet"></i>
                        <span> KYC </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.plan')}}" class="side-nav-link">
                        <i class="fad fa-file"></i>
                        <span> My Plan </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.registration.request')}}" class="side-nav-link">
                        <i class="fad fa-file-alt"></i>
                        <span> Registration Request </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.upgrade.plan.request.list')}}" class="side-nav-link">
                        <i class="fad fa-pen-square"></i>
                        <span> Upgrade Request </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.traffic')}}" class="side-nav-link">
                        <i class="fad fa-user-friends"></i>
                        <span> My Team </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.social.media.handles')}}" class="side-nav-link">
                        <i class="fad fa-share"></i>
                        <span> Group Links </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.leaderboard')}}" class="side-nav-link">
                        <i class="fad fa-cash-register"></i>
                        <span> Leaderboard </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.course')}}" class="side-nav-link">
                        <i class="fad fa-book-open"></i>
                        <span> My Courses </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.affiliate.links')}}" class="side-nav-link">
                        <i class="fad fa-link"></i>
                        <span> Affiliate Link </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.wallet.transaction.index')}}" class="side-nav-link">
                        <i class="fad fa-money-check"></i>
                        <span> Wallet Transaction </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.payouts')}}" class="side-nav-link">
                        <i class="fad fa-receipt"></i>
                        <span> Payout Transaction </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.withdrawal.request.index')}}" class="side-nav-link">
                        <i class="fad fa-money-check-edit"></i>
                        <span> Withdrawal Request</span>
                    </a>
                </li>
                <li class="side-nav-item mb-5">
                    <a href="#" class="side-nav-link">
                        <i class="fad fa-lock"></i>
                        <span> Security </span>
                    </a>
                </li>
                {{-- <li class="side-nav-item">
                    <a href="{{route('user.change-password')}}" class="side-nav-link">
                        <i class="uil-key-skeleton"></i>
                        <span> Change Password </span>
                    </a>
                </li> --}}
                {{-- <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="mdi mdi-logout"></i>
                        <span> Sign Out</span>
                    </a>
                </li> --}}
                {{-- <li class="side-nav-item">
                    <a href="{{route('user.plan')}}" class="side-nav-link">
                        <i class="uil-book-open"></i>
                        <span> Plan </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-video"></i>
                        <span> Startup Video </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.associates')}}" class="side-nav-link">
                        <i class="uil-users-alt"></i>
                        <span> My Sales </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-wallet"></i>
                        <span> Funds </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.offer')}}" class="side-nav-link">
                        <i class="uil-volume"></i>
                        <span> Offers </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.marketing_materials')}}" class="side-nav-link">
                        <i class="uil-clipboard-notes"></i>
                        <span> Marketing Material </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.change-password')}}" class="side-nav-link">
                        <i class="uil-key-skeleton"></i>
                        <span> Change Password </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.payouts')}}" class="side-nav-link">
                        <i class="uil-money-bill"></i>
                        <span> Payouts </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.webinar')}}" class="side-nav-link">
                        <i class="uil-rss"></i>
                        <span> Upcoming Webinar </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.training')}}" class="side-nav-link">
                        <i class="uil-rss"></i>
                        <span> Tranings </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-file-question-alt"></i>
                        <span> Q & A Session </span>
                    </a>
                </li> --}}

                {{-- <li class="side-nav-item menuitem-active">
                    <a data-bs-toggle="collapse" href="#affiliates" aria-expanded="false" aria-controls="affiliates" class="side-nav-link active">
                        <i class="uil-focus-target"></i>
                        <span> Affiliates </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="affiliates">
                        <ul class="side-nav-second-level">
                            <li><a href="{{route('user.affiliate.links')}}">Affiliate Link</a></li>
                            <li><a href="{{route('user.associates')}}">Associates</a></li>
                            <li><a href="{{route('user.traffic')}}">Traffic</a></li>
                            <li><a href="#">Funds</a></li>
                            <li><a href="#">Offers</a></li>
                            <li><a href="#">Marketing Material</a></li>
                            <li><a href="{{route('user.leaderboard')}}">Leaderboard</a></li>
                            <li><a href="{{route('user.change-password')}}">Change Password</a></li>
                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#payment" aria-expanded="false" aria-controls="payment" class="side-nav-link">
                        <i class="uil-atm-card"></i>
                        <span> Payment Section </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="payment">
                        <ul class="side-nav-second-level">
                            <li><a href="{{route('user.bank.details')}}">Bank Details</a></li>
                            <li><a href="{{route('user.payouts')}}">Payouts</a></li>
                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="side-nav-item">
                    <a data-bs-toggle="collapse" href="#traning" aria-expanded="false" aria-controls="traning" class="side-nav-link">
                        <i class="uil-book-reader"></i>
                        <span> Traning Section </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="traning">
                        <ul class="side-nav-second-level">
                            <li><a href="#">Upcoming Webinar</a></li>
                            <li><a href="#">Tranings</a></li>
                            <li><a href="#">Q & A Session</a></li>
                        </ul>
                    </div>
                </li> --}}
                {{-- <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-phone"></i>
                        <span> Support No. </span>
                    </a>
                </li> --}}
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
