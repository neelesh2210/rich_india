<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('backend/img/logo.png')}}" alt="RichIND Logo" class="brand-image">
    </a>
    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar side-nav-second-level flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link @if(Route::currentRouteName() == 'admin.dashboard') active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @can('course-list')
                    <li class="nav-item">
                        <a href="{{route('admin.course.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.course.index' || Route::currentRouteName() == 'admin.course.create' || Route::currentRouteName() == 'admin.course.edit') active @endif">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Courses</p>
                        </a>
                    </li>
                @endcan
                @can('topic-list')
                    <li class="nav-item">
                        <a href="{{route('admin.topic.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.topic.index' || Route::currentRouteName() == 'admin.topic.create' || Route::currentRouteName() == 'admin.topic.edit') active @endif">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Topics</p>
                        </a>
                    </li>
                @endcan
                @can('plan-list')
                    <li class="nav-item">
                        <a href="{{route('admin.plan.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.plan.index' || Route::currentRouteName() == 'admin.plan.create' || Route::currentRouteName() == 'admin.plan.edit') active @endif">
                            <i class="nav-icon fas fa-clipboard"></i>
                            <p>Plans</p>
                        </a>
                    </li>
                @endcan
                @can('user-list')
                    <li class="nav-item">
                        <a href="{{route('admin.user.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.user.index' || Route::currentRouteName() == 'admin.add.user') active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.error.registration')}}" class="nav-link @if(Route::currentRouteName() == 'admin.error.registration') active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Error Registration</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item">
                        <a href="{{route('admin.unpaidUserList')}}" class="nav-link @if(Route::currentRouteName() == 'admin.unpaidUserList') active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Unpaid User List</p>
                        </a>
                    </li> --}}
                @endcan
                <li class="nav-item">
                    <a href="{{route('admin.get.old.users')}}" class="nav-link @if(Route::currentRouteName() == 'admin.get.old.users') active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Manage Old Users</p>
                    </a>
                </li>
                @can('order-list')
                    <li class="nav-item">
                        <a href="{{route('admin.payment.transaction.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.payment.transaction.index') active @endif">
                            <i class="nav-icon fas fa-shopping-cart"></i>
                            <p>Orders</p>
                        </a>
                    </li>
                @endcan
               {{--  <li class="nav-item">
                    <a href="{{route('admin.coupons.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.coupons.index') active @endif">
                        <img class="nav-icon" src="{{asset('backend/img/icon/coupon.png')}}">
                        <p>Coupons</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('admin.withdrawal.request.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.withdrawal.request.index') active @endif">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Withdrawal Request</p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('admin.payout.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.payout.index') active @endif">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Payouts</p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{route('admin.emerging.associate')}}" class="nav-link @if(Route::currentRouteName() == 'admin.emerging.associate') active @endif">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Target Achiever</p>
                    </a>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'admin.payout.transaction.index' || Route::currentRouteName() == 'admin.failed.payout.transaction.index') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Route::currentRouteName() == 'admin.payout.transaction.index' || Route::currentRouteName() == 'admin.failed.payout.transaction.index') active @endif">
                        <i class="nav-icon fas fa-money-bill-alt" aria-hidden="true"></i>
                        <p>Payout Transaction
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.payout.transaction.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.payout.transaction.index') active @endif">
                                <p>Success</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.failed.payout.transaction.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.failed.payout.transaction.index') active @endif">
                                <p>Failed</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if(Route::currentRouteName() == 'admin.total.pending.wallet.amount' || Route::currentRouteName() == 'admin.payment.transaction.report') menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(Route::currentRouteName() == 'admin.total.pending.wallet.amount' || Route::currentRouteName() == 'admin.payment.transaction.report') active @endif">
                        <i class="nav-icon fas fa-money-bill-alt" aria-hidden="true"></i>
                        <p>Report
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.total.pending.wallet.amount')}}" class="nav-link @if(Route::currentRouteName() == 'admin.total.pending.wallet.amount') active @endif">
                                <p>Pending Wallet Balance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.payment.transaction.report')}}" class="nav-link @if(Route::currentRouteName() == 'admin.payment.transaction.report') active @endif">
                                <p>Payment Transaction</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{route('admin.payout.transaction.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.payout.transaction.index') active @endif">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Payout Transaction</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="{{route('admin.leaderboard.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.leaderboard.index') active @endif">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>Leaderboard</p>
                    </a>
                </li> --}}
                @can('referral_income-list')
                    <li class="nav-item">
                        <a href="{{route('admin.commission.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.commission.index') active @endif">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>Referral Income</p>
                        </a>
                    </li>
                @endcan
                {{-- @can('earning-list')
                    <li class="nav-item">
                        <a href="{{route('admin.earning')}}" class="nav-link @if(Route::currentRouteName() == 'admin.earning') active @endif">
                            <i class="nav-icon fas fa-hand-holding-usd"></i>
                            <p>Earnings</p>
                        </a>
                    </li>
                @endcan --}}
                {{-- @can('role-list')
                    <li class="nav-item">
                        <a href="{{route('admin.roles.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.roles.index' || Route::currentRouteName() == 'admin.roles.create' || Route::currentRouteName() == 'admin.roles.edit') active @endif">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>Roles</p>
                        </a>
                    </li>
                @endcan
                @can('staff-list')
                    <li class="nav-item">
                        <a href="{{route('admin.staff.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.staff.index' || Route::currentRouteName() == 'admin.staff.create' || Route::currentRouteName() == 'admin.roles.edit') active @endif">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Staff</p>
                        </a>
                    </li>
                @endcan --}}
                {{-- <li class="nav-item">
                    <a href="{{route('admin.withdrawal')}}" class="nav-link @if(Route::currentRouteName() == 'admin.withdrawal') active @endif">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Withdrawals</p>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Accociates</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{route('admin.webinars.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.webinars.index' || Route::currentRouteName() == 'admin.webinars.create' || Route::currentRouteName() == 'admin.webinars.edit') active @endif">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Webinars</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.trainings.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.trainings.index' || Route::currentRouteName() == 'admin.trainings.create' || Route::currentRouteName() == 'admin.trainings.edit') active @endif">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Trainings</p>
                    </a>
                </li> --}}

                {{-- <li class="nav-item">
                    <a href="{{route('admin.offers.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.offers.index') active @endif">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>Offer</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.marketing-materials.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.marketing-materials.index') active @endif">
                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>MarketingMaterial</p>
                    </a>
                </li> --}}

                @canany(['slider-list', 'social_media_link-list', 'instructor-list', 'review-list', 'media-section', 'faq-section', 'testimonial_video-section', 'commission_setting-section'])
                    <li class="nav-item @if(Route::currentRouteName() == 'admin.websitesetting.index' || Route::currentRouteName() == 'admin.faq.index' || Route::currentRouteName() == 'admin.faq.edit' || Route::currentRouteName() == 'admin.testimonialvideo.index' || Route::currentRouteName() == 'admin.commission-setting.index' || Route::currentRouteName() == 'admin.instructors.index' || Route::currentRouteName() == 'admin.instructors.create' || Route::currentRouteName() == 'admin.instructors.edit' || Route::currentRouteName() == 'admin.reviews.index' || Route::currentRouteName() == 'admin.reviews.create' || Route::currentRouteName() == 'admin.reviews.edit' || Route::currentRouteName() == 'admin.medias.index') menu-is-opening menu-open @endif">
                        <a href="#" class="nav-link @if(Route::currentRouteName() == 'admin.websitesetting.index' || Route::currentRouteName() == 'admin.faq.index' || Route::currentRouteName() == 'admin.faq.edit' || Route::currentRouteName() == 'admin.testimonialvideo.index' || Route::currentRouteName() == 'admin.commission-setting.index' || Route::currentRouteName() == 'admin.instructors.index' || Route::currentRouteName() == 'admin.instructors.create' || Route::currentRouteName() == 'admin.instructors.edit' || Route::currentRouteName() == 'admin.reviews.index' || Route::currentRouteName() == 'admin.reviews.create' || Route::currentRouteName() == 'admin.reviews.edit' || Route::currentRouteName() == 'admin.medias.index') active @endif">
                            <i class="nav-icon fa fa-cogs" aria-hidden="true"></i>
                            <p>Website Setting
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('slider-list')
                                <li class="nav-item">
                                    <a href="{{route('admin.websitesetting.index')}}?type=sliders" class="nav-link @if(Route::currentRouteName() == 'admin.websitesetting.index') @if(request()->type == 'sliders') active @endif @endif">
                                        <p>Sliders</p>
                                    </a>
                                </li>
                            @endcan
                            @can('social_media_link-list')
                                <li class="nav-item">
                                    <a href="{{route('admin.websitesetting.index')}}?type=social" class="nav-link @if(Route::currentRouteName() == 'admin.websitesetting.index') @if(request()->type == 'soial') active @endif @endif">
                                        <p>Social Media Link</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.websitesetting.index')}}?type=social_handle" class="nav-link @if(Route::currentRouteName() == 'admin.websitesetting.index') @if(request()->type == 'social_handle') active @endif @endif">
                                        <p>Social Media  Handles</p>
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item">
                                <a href="{{route('admin.websitesetting.index')}}?type=website_data" class="nav-link @if(Route::currentRouteName() == 'admin.websitesetting.index') @if(request()->type == 'website_data') active @endif @endif">
                                    <p>Website Data</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{route('admin.websitesetting.index')}}?type=meetup" class="nav-link @if(Route::currentRouteName() == 'admin.websitesetting.index') @if(request()->type == 'meetup') active @endif @endif">
                                    <p>Meetup</p>
                                </a>
                            </li> --}}
                            @can('instructor-list')
                                <li class="nav-item">
                                    <a href="{{route('admin.instructors.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.instructors.index' || Route::currentRouteName() == 'admin.instructors.create' || Route::currentRouteName() == 'admin.instructors.edit') active @endif">
                                        <p>Instructors</p>
                                    </a>
                                </li>
                            @endcan
                            @can('review-list')
                                <li class="nav-item">
                                    <a href="{{route('admin.reviews.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.reviews.index' || Route::currentRouteName() == 'admin.reviews.create' || Route::currentRouteName() == 'admin.reviews.edit') active @endif">
                                        <p>Reviews</p>
                                    </a>
                                </li>
                            @endcan
                            {{-- @can('media-section')
                                <li class="nav-item">
                                    <a href="{{route('admin.medias.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.medias.index') active @endif">
                                        <p>Media</p>
                                    </a>
                                </li>
                            @endcan --}}
                            @can('faq-section')
                                <li class="nav-item">
                                    <a href="{{route('admin.faq.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.faq.index' || Route::currentRouteName() == 'admin.faq.edit') active @endif">
                                        <p>FAQs</p>
                                    </a>
                                </li>
                            @endcan
                            {{-- @can('testimonial_video-section')
                                <li class="nav-item">
                                    <a href="{{route('admin.testimonialvideo.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.testimonialvideo.index') active @endif">
                                        <p>Testimonial Video</p>
                                    </a>
                                </li>
                            @endcan --}}
                            @can('commission_setting-section')
                                <li class="nav-item">
                                    <a href="{{route('admin.commission-setting.index')}}" class="nav-link @if(Route::currentRouteName() == 'admin.commission-setting.index') active @endif">
                                        <p>Commission</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcanany
            </ul>
        </nav>
    </div>
</aside>
