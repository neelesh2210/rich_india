<div class="navbar-custom">

    <ul class="list-unstyled topbar-menu mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a href="{{route('index')}}" class="mobile-logo text-center logo-light">
                <span class="logo-lg">
                    <img src="{{ asset('backend/img/logo.png') }}" alt="" height="45">
                </span>
            </a>
        </li>
        <li class="dropdown notification-list d-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="{{asset('frontend/images/avatar/'.Auth::guard('web')->user()->avatar)}}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{Auth::guard('web')->user()->name}}</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>
                <form id="delete-form" action="{{route('user.logout')}}" method="POST">
                    @csrf
                    <button href="{{route('user.logout')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Logout</span>
                    </button>

                </form>
                <a href="{{route('user.change-password')}}" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Change Password</span>
                </a>
            </div>
        </li>
    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
</div>
