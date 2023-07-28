@extends('user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="page-title-right float-start">
                                <div class="text-center mb-2">
                                    <img src="{{ 'user_dashboard/images/users/avatar-1.jpg' }}" alt="user-image" height="80" class="rounded-circle shadow-sm">
                                </div>
                                <p class="leftbar-user-name">{{Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User'}}</p>
                                <p class="text-center">{{Auth::guard('web')->user()->referrer_code}}</p>
                            </div>
                            <h4 class="page-title float-end">Dashboard</h4>
                        </div>
                    </div>
                </div> --}}
                <div class="row mt-4">
                    <div class="col-lg-3">
                        <div class="left-side-menu">
                            <div class="ribbon">
                                <span>Platinum</span>
                            </div>
                            <div class="user-box text-center mb-2">
                                <img src="{{asset('frontend/images/avatar/'.Auth::guard('web')->user()->avatar)}}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" height="100" class="rounded-circle shadow-sm">
                            </div>
                            <p class="leftbar-user-name">
                                {{ Auth::guard('web')->user()->name ? Auth::guard('web')->user()->name : 'User' }}</p>
                            <div class="text-center">
                                <input type="hidden" value="{{env('APP_URL')}}?referrer_code={{ encrypt(Auth::guard('web')->user()->referrer_code) }}" id="referral_link">
                                <p class="text-center fw-bolder mr-2">ID: {{ Auth::guard('web')->user()->referrer_code }}
                                    <a class="btn btn-success pb" onclick="copyText()"><i class="uil-copy" style="font-size: 20px;"></i></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card widget-flat gradient-45deg-light-blue-cyan" data-aos="fade-left" data-aos-duration="500" data-aos-once="true">
                                    <div class="card-body">
                                        <img src="{{ 'user_dashboard/images/circle.svg' }}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">525</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Customers">Today's Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card widget-flat gradient-45deg-red-pink">
                                    <div class="card-body">
                                        <img src="{{ 'user_dashboard/images/circle.svg' }}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">2450</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Orders">Last 7 Days Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card widget-flat statistic-bg-purple">
                                    <div class="card-body">
                                        <img src="{{ 'user_dashboard/images/circle.svg' }}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">1024578</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Orders">Last 30 Days Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card widget-flat gradient-45deg-green-teal">
                                    <div class="card-body">
                                        <img src="{{ 'user_dashboard/images/circle.svg' }}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">1124578</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Orders">All Time Earning</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card widget-flat gradient-45deg-amber-amber">
                                    <div class="card-body">
                                        <img src="{{ 'user_dashboard/images/circle.svg' }}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">5485</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Orders">Team Helping Bonus</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="card widget-flat bg-gradient-moonlit">
                                    <div class="card-body">
                                        <img src="{{ 'user_dashboard/images/circle.svg' }}" alt="circle-image">
                                        <h3 class="text-white"><small>₹</small> <span class="counter-value">6548</span></h3>
                                        <div class="progress my-2 bg-white-transparent" style="height:4px;">
                                            <div class="progress-bar bg-white" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <h5 class="text-white fw-normal mt-0" title="Number of Customers">Pending Amount</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="dropdown float-end">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                                        <a href="javascript:void(0);" class="dropdown-item">Download</a>
                                        <a href="javascript:void(0);" class="dropdown-item">Upload</a>
                                        <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    </div>
                                </div>
                                <h4 class="header-title">Revenue Report</h4>
                                <div class="mt-3 text-center">
                                    <div class="row pt-2">
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                            <h4> ₹12,365</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                            <h4><i class="fe-arrow-down text-danger"></i> ₹365</h4>
                                        </div>
                                        <div class="col-4">
                                            <p class="text-muted font-15 mb-1 text-truncate">Last Month</p>
                                            <h4><i class="fe-arrow-up text-success"></i> ₹8,501</h4>
                                        </div>
                                    </div>
                                    <div dir="ltr">
                                        <div id="revenue-report" class="apex-charts" data-colors="#526dee,#e3eaef" style="min-height: 280px;">
                                            <div id="apexcharts3vmjwehll" class="apexcharts-canvas apexcharts3vmjwehll apexcharts-theme-light" style="width: 265px; height: 265px;">
                                                <svg id="SvgjsSvg1783" width="265" height="265" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                                    <g id="SvgjsG1785" class="apexcharts-inner apexcharts-graphical" transform="translate(53.42695617675781, 30)">
                                                        <defs id="SvgjsDefs1784">
                                                            <linearGradient id="SvgjsLinearGradient1790" x1="0" y1="0" x2="0" y2="1">
                                                                <stop id="SvgjsStop1791" stop-opacity="0.4" stop-color="rgba(216,227,240,0.4)" offset="0"></stop>
                                                                <stop id="SvgjsStop1792" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                                <stop id="SvgjsStop1793" stop-opacity="0.5" stop-color="rgba(190,209,230,0.5)" offset="1"></stop>
                                                            </linearGradient>
                                                            <clipPath id="gridRectMask3vmjwehll">
                                                                <rect id="SvgjsRect1795" width="207.5730438232422" height="177.55080051676433" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                            <clipPath id="forecastMask3vmjwehll"></clipPath>
                                                            <clipPath id="nonForecastMask3vmjwehll"></clipPath>
                                                            <clipPath id="gridRectMarkerMask3vmjwehll">
                                                                <rect id="SvgjsRect1796" width="205.5730438232422" height="179.55080051676433" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                                            </clipPath>
                                                        </defs>
                                                        <rect id="SvgjsRect1794" width="4.199438412984212"
                                                            height="175.55080051676433" x="0" y="0"
                                                            rx="0" ry="0" opacity="1"
                                                            stroke-width="0" stroke-dasharray="3"
                                                            fill="url(#SvgjsLinearGradient1790)"
                                                            class="apexcharts-xcrosshairs" y2="175.55080051676433"
                                                            filter="none" fill-opacity="0.9"></rect>
                                                        <g id="SvgjsG1826" class="apexcharts-xaxis"
                                                            transform="translate(0, 0)">
                                                            <g id="SvgjsG1827" class="apexcharts-xaxis-texts-g"
                                                                transform="translate(0, -10)"><text id="SvgjsText1829"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="8.398876825968424" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 9.39887809753418 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1830">Jan</tspan>
                                                                    <title>Jan</title>
                                                                </text><text id="SvgjsText1832"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="25.196630477905273" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 26.19662857055664 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1833">Feb</tspan>
                                                                    <title>Feb</title>
                                                                </text><text id="SvgjsText1835"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="41.994384129842125" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 43.21100616455078 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1836">Mar</tspan>
                                                                    <title>Mar</title>
                                                                </text><text id="SvgjsText1838"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="58.79213778177897" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 59.50531768798828 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1839">Apr</tspan>
                                                                    <title>Apr</title>
                                                                </text><text id="SvgjsText1841"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="75.5898914337158" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 76.77694702148438 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1842">May</tspan>
                                                                    <title>May</title>
                                                                </text><text id="SvgjsText1844"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="92.38764508565265" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 93.38764190673828 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1845">Jun</tspan>
                                                                    <title>Jun</title>
                                                                </text><text id="SvgjsText1847"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="109.1853987375895" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 110.22545623779297 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1848">Jul</tspan>
                                                                    <title>Jul</title>
                                                                </text><text id="SvgjsText1850"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="125.98315238952635" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 126.483154296875 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1851">Aug</tspan>
                                                                    <title>Aug</title>
                                                                </text><text id="SvgjsText1853"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="142.78090604146323" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 143.78089904785156 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1854">Sep</tspan>
                                                                    <title>Sep</title>
                                                                </text><text id="SvgjsText1856"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="159.57865969340008" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 160.72608947753906 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1857">Oct</tspan>
                                                                    <title>Oct</title>
                                                                </text><text id="SvgjsText1859"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="176.37641334533694" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 177.54490661621094 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1860">Nov</tspan>
                                                                    <title>Nov</title>
                                                                </text><text id="SvgjsText1862"
                                                                    font-family="Helvetica, Arial, sans-serif"
                                                                    x="193.1741669972738" y="198.55080051676433"
                                                                    text-anchor="end" dominant-baseline="auto"
                                                                    font-size="12px" font-weight="400" fill="#373d3f"
                                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                                    style="font-family: Helvetica, Arial, sans-serif;"
                                                                    transform="rotate(-45 194.35565185546875 193.55079650878906)">
                                                                    <tspan id="SvgjsTspan1863">Dec</tspan>
                                                                    <title>Dec</title>
                                                                </text></g>
                                                        </g>
                                                        <g id="SvgjsG1878" class="apexcharts-grid">
                                                            <g id="SvgjsG1879" class="apexcharts-gridlines-horizontal">
                                                                <line id="SvgjsLine1894" x1="0" y1="0"
                                                                    x2="201.5730438232422" y2="0"
                                                                    stroke="#e0e0e0" stroke-dasharray="0"
                                                                    stroke-linecap="butt" class="apexcharts-gridline">
                                                                </line>
                                                                <line id="SvgjsLine1895" x1="0"
                                                                    y1="35.11016010335287" x2="201.5730438232422"
                                                                    y2="35.11016010335287" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1896" x1="0"
                                                                    y1="70.22032020670574" x2="201.5730438232422"
                                                                    y2="70.22032020670574" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1897" x1="0"
                                                                    y1="105.3304803100586" x2="201.5730438232422"
                                                                    y2="105.3304803100586" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1898" x1="0"
                                                                    y1="140.44064041341147" x2="201.5730438232422"
                                                                    y2="140.44064041341147" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                                <line id="SvgjsLine1899" x1="0"
                                                                    y1="175.55080051676435" x2="201.5730438232422"
                                                                    y2="175.55080051676435" stroke="#e0e0e0"
                                                                    stroke-dasharray="0" stroke-linecap="butt"
                                                                    class="apexcharts-gridline"></line>
                                                            </g>
                                                            <g id="SvgjsG1880" class="apexcharts-gridlines-vertical"></g>
                                                            <line id="SvgjsLine1881" x1="0"
                                                                y1="176.55080051676433" x2="0"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1882" x1="16.797753651936848"
                                                                y1="176.55080051676433" x2="16.797753651936848"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1883" x1="33.595507303873696"
                                                                y1="176.55080051676433" x2="33.595507303873696"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1884" x1="50.39326095581055"
                                                                y1="176.55080051676433" x2="50.39326095581055"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1885" x1="67.19101460774739"
                                                                y1="176.55080051676433" x2="67.19101460774739"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1886" x1="83.98876825968424"
                                                                y1="176.55080051676433" x2="83.98876825968424"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1887" x1="100.78652191162108"
                                                                y1="176.55080051676433" x2="100.78652191162108"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1888" x1="117.58427556355792"
                                                                y1="176.55080051676433" x2="117.58427556355792"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1889" x1="134.38202921549478"
                                                                y1="176.55080051676433" x2="134.38202921549478"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1890" x1="151.17978286743164"
                                                                y1="176.55080051676433" x2="151.17978286743164"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1891" x1="167.9775365193685"
                                                                y1="176.55080051676433" x2="167.9775365193685"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1892" x1="184.77529017130536"
                                                                y1="176.55080051676433" x2="184.77529017130536"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1893" x1="201.57304382324222"
                                                                y1="176.55080051676433" x2="201.57304382324222"
                                                                y2="182.55080051676433" stroke="#e0e0e0"
                                                                stroke-dasharray="0" stroke-linecap="butt"
                                                                class="apexcharts-xaxis-tick"></line>
                                                            <line id="SvgjsLine1901" x1="0"
                                                                y1="175.55080051676433" x2="201.5730438232422"
                                                                y2="175.55080051676433" stroke="transparent"
                                                                stroke-dasharray="0" stroke-linecap="butt"></line>
                                                            <line id="SvgjsLine1900" x1="0" y1="1"
                                                                x2="0" y2="175.55080051676433"
                                                                stroke="transparent" stroke-dasharray="0"
                                                                stroke-linecap="butt"></line>
                                                        </g>
                                                        <g id="SvgjsG1797"
                                                            class="apexcharts-bar-series apexcharts-plot-series">
                                                            <g id="SvgjsG1798" class="apexcharts-series"
                                                                seriesName="Actual" rel="1" data:realIndex="0">
                                                                <path id="SvgjsPath1800"
                                                                    d="M 6.299157619476318 175.55080051676433L 6.299157619476318 118.49679034881592Q 6.299157619476318 118.49679034881592 6.299157619476318 118.49679034881592L 8.49859603246053 118.49679034881592Q 8.49859603246053 118.49679034881592 8.49859603246053 118.49679034881592L 8.49859603246053 118.49679034881592L 8.49859603246053 175.55080051676433L 8.49859603246053 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 6.299157619476318 175.55080051676433L 6.299157619476318 118.49679034881592Q 6.299157619476318 118.49679034881592 6.299157619476318 118.49679034881592L 8.49859603246053 118.49679034881592Q 8.49859603246053 118.49679034881592 8.49859603246053 118.49679034881592L 8.49859603246053 118.49679034881592L 8.49859603246053 175.55080051676433L 8.49859603246053 175.55080051676433z"
                                                                    pathFrom="M 6.299157619476318 175.55080051676433L 6.299157619476318 175.55080051676433L 8.49859603246053 175.55080051676433L 8.49859603246053 175.55080051676433L 8.49859603246053 175.55080051676433L 8.49859603246053 175.55080051676433L 8.49859603246053 175.55080051676433L 6.299157619476318 175.55080051676433"
                                                                    cy="118.49679034881592" cx="22.096911271413166"
                                                                    j="0" val="65"
                                                                    barHeight="57.0540101679484"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1801"
                                                                    d="M 23.096911271413166 175.55080051676433L 23.096911271413166 123.76331436431886Q 23.096911271413166 123.76331436431886 23.096911271413166 123.76331436431886L 25.296349684397377 123.76331436431886Q 25.296349684397377 123.76331436431886 25.296349684397377 123.76331436431886L 25.296349684397377 123.76331436431886L 25.296349684397377 175.55080051676433L 25.296349684397377 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 23.096911271413166 175.55080051676433L 23.096911271413166 123.76331436431886Q 23.096911271413166 123.76331436431886 23.096911271413166 123.76331436431886L 25.296349684397377 123.76331436431886Q 25.296349684397377 123.76331436431886 25.296349684397377 123.76331436431886L 25.296349684397377 123.76331436431886L 25.296349684397377 175.55080051676433L 25.296349684397377 175.55080051676433z"
                                                                    pathFrom="M 23.096911271413166 175.55080051676433L 23.096911271413166 175.55080051676433L 25.296349684397377 175.55080051676433L 25.296349684397377 175.55080051676433L 25.296349684397377 175.55080051676433L 25.296349684397377 175.55080051676433L 25.296349684397377 175.55080051676433L 23.096911271413166 175.55080051676433"
                                                                    cy="123.76331436431886" cx="38.894664923350014"
                                                                    j="1" val="59"
                                                                    barHeight="51.787486152445474"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1802"
                                                                    d="M 39.894664923350014 175.55080051676433L 39.894664923350014 105.3304803100586Q 39.894664923350014 105.3304803100586 39.894664923350014 105.3304803100586L 42.09410333633423 105.3304803100586Q 42.09410333633423 105.3304803100586 42.09410333633423 105.3304803100586L 42.09410333633423 105.3304803100586L 42.09410333633423 175.55080051676433L 42.09410333633423 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 39.894664923350014 175.55080051676433L 39.894664923350014 105.3304803100586Q 39.894664923350014 105.3304803100586 39.894664923350014 105.3304803100586L 42.09410333633423 105.3304803100586Q 42.09410333633423 105.3304803100586 42.09410333633423 105.3304803100586L 42.09410333633423 105.3304803100586L 42.09410333633423 175.55080051676433L 42.09410333633423 175.55080051676433z"
                                                                    pathFrom="M 39.894664923350014 175.55080051676433L 39.894664923350014 175.55080051676433L 42.09410333633423 175.55080051676433L 42.09410333633423 175.55080051676433L 42.09410333633423 175.55080051676433L 42.09410333633423 175.55080051676433L 42.09410333633423 175.55080051676433L 39.894664923350014 175.55080051676433"
                                                                    cy="105.3304803100586" cx="55.692418575286865"
                                                                    j="2" val="80"
                                                                    barHeight="70.22032020670572"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1803"
                                                                    d="M 56.692418575286865 175.55080051676433L 56.692418575286865 104.45272630747478Q 56.692418575286865 104.45272630747478 56.692418575286865 104.45272630747478L 58.89185698827108 104.45272630747478Q 58.89185698827108 104.45272630747478 58.89185698827108 104.45272630747478L 58.89185698827108 104.45272630747478L 58.89185698827108 175.55080051676433L 58.89185698827108 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 56.692418575286865 175.55080051676433L 56.692418575286865 104.45272630747478Q 56.692418575286865 104.45272630747478 56.692418575286865 104.45272630747478L 58.89185698827108 104.45272630747478Q 58.89185698827108 104.45272630747478 58.89185698827108 104.45272630747478L 58.89185698827108 104.45272630747478L 58.89185698827108 175.55080051676433L 58.89185698827108 175.55080051676433z"
                                                                    pathFrom="M 56.692418575286865 175.55080051676433L 56.692418575286865 175.55080051676433L 58.89185698827108 175.55080051676433L 58.89185698827108 175.55080051676433L 58.89185698827108 175.55080051676433L 58.89185698827108 175.55080051676433L 58.89185698827108 175.55080051676433L 56.692418575286865 175.55080051676433"
                                                                    cy="104.45272630747478" cx="72.49017222722371"
                                                                    j="3" val="81"
                                                                    barHeight="71.09807420928955"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1804"
                                                                    d="M 73.49017222722371 175.55080051676433L 73.49017222722371 126.39657637207031Q 73.49017222722371 126.39657637207031 73.49017222722371 126.39657637207031L 75.68961064020792 126.39657637207031Q 75.68961064020792 126.39657637207031 75.68961064020792 126.39657637207031L 75.68961064020792 126.39657637207031L 75.68961064020792 175.55080051676433L 75.68961064020792 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 73.49017222722371 175.55080051676433L 73.49017222722371 126.39657637207031Q 73.49017222722371 126.39657637207031 73.49017222722371 126.39657637207031L 75.68961064020792 126.39657637207031Q 75.68961064020792 126.39657637207031 75.68961064020792 126.39657637207031L 75.68961064020792 126.39657637207031L 75.68961064020792 175.55080051676433L 75.68961064020792 175.55080051676433z"
                                                                    pathFrom="M 73.49017222722371 175.55080051676433L 73.49017222722371 175.55080051676433L 75.68961064020792 175.55080051676433L 75.68961064020792 175.55080051676433L 75.68961064020792 175.55080051676433L 75.68961064020792 175.55080051676433L 75.68961064020792 175.55080051676433L 73.49017222722371 175.55080051676433"
                                                                    cy="126.39657637207031" cx="89.28792587916055"
                                                                    j="4" val="56"
                                                                    barHeight="49.154224144694005"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1805"
                                                                    d="M 90.28792587916055 175.55080051676433L 90.28792587916055 97.43069428680421Q 90.28792587916055 97.43069428680421 90.28792587916055 97.43069428680421L 92.48736429214476 97.43069428680421Q 92.48736429214476 97.43069428680421 92.48736429214476 97.43069428680421L 92.48736429214476 97.43069428680421L 92.48736429214476 175.55080051676433L 92.48736429214476 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 90.28792587916055 175.55080051676433L 90.28792587916055 97.43069428680421Q 90.28792587916055 97.43069428680421 90.28792587916055 97.43069428680421L 92.48736429214476 97.43069428680421Q 92.48736429214476 97.43069428680421 92.48736429214476 97.43069428680421L 92.48736429214476 97.43069428680421L 92.48736429214476 175.55080051676433L 92.48736429214476 175.55080051676433z"
                                                                    pathFrom="M 90.28792587916055 175.55080051676433L 90.28792587916055 175.55080051676433L 92.48736429214476 175.55080051676433L 92.48736429214476 175.55080051676433L 92.48736429214476 175.55080051676433L 92.48736429214476 175.55080051676433L 92.48736429214476 175.55080051676433L 90.28792587916055 175.55080051676433"
                                                                    cy="97.43069428680421" cx="106.0856795310974"
                                                                    j="5" val="89"
                                                                    barHeight="78.12010622996011"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1806"
                                                                    d="M 107.0856795310974 175.55080051676433L 107.0856795310974 140.44064041341147Q 107.0856795310974 140.44064041341147 107.0856795310974 140.44064041341147L 109.2851179440816 140.44064041341147Q 109.2851179440816 140.44064041341147 109.2851179440816 140.44064041341147L 109.2851179440816 140.44064041341147L 109.2851179440816 175.55080051676433L 109.2851179440816 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 107.0856795310974 175.55080051676433L 107.0856795310974 140.44064041341147Q 107.0856795310974 140.44064041341147 107.0856795310974 140.44064041341147L 109.2851179440816 140.44064041341147Q 109.2851179440816 140.44064041341147 109.2851179440816 140.44064041341147L 109.2851179440816 140.44064041341147L 109.2851179440816 175.55080051676433L 109.2851179440816 175.55080051676433z"
                                                                    pathFrom="M 107.0856795310974 175.55080051676433L 107.0856795310974 175.55080051676433L 109.2851179440816 175.55080051676433L 109.2851179440816 175.55080051676433L 109.2851179440816 175.55080051676433L 109.2851179440816 175.55080051676433L 109.2851179440816 175.55080051676433L 107.0856795310974 175.55080051676433"
                                                                    cy="140.44064041341147" cx="122.88343318303424"
                                                                    j="6" val="40"
                                                                    barHeight="35.11016010335286"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1807"
                                                                    d="M 123.88343318303424 175.55080051676433L 123.88343318303424 147.46267243408204Q 123.88343318303424 147.46267243408204 123.88343318303424 147.46267243408204L 126.08287159601846 147.46267243408204Q 126.08287159601846 147.46267243408204 126.08287159601846 147.46267243408204L 126.08287159601846 147.46267243408204L 126.08287159601846 175.55080051676433L 126.08287159601846 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 123.88343318303424 175.55080051676433L 123.88343318303424 147.46267243408204Q 123.88343318303424 147.46267243408204 123.88343318303424 147.46267243408204L 126.08287159601846 147.46267243408204Q 126.08287159601846 147.46267243408204 126.08287159601846 147.46267243408204L 126.08287159601846 147.46267243408204L 126.08287159601846 175.55080051676433L 126.08287159601846 175.55080051676433z"
                                                                    pathFrom="M 123.88343318303424 175.55080051676433L 123.88343318303424 175.55080051676433L 126.08287159601846 175.55080051676433L 126.08287159601846 175.55080051676433L 126.08287159601846 175.55080051676433L 126.08287159601846 175.55080051676433L 126.08287159601846 175.55080051676433L 123.88343318303424 175.55080051676433"
                                                                    cy="147.46267243408204" cx="139.6811868349711"
                                                                    j="7" val="32"
                                                                    barHeight="28.08812808268229"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1808"
                                                                    d="M 140.6811868349711 175.55080051676433L 140.6811868349711 118.49679034881592Q 140.6811868349711 118.49679034881592 140.6811868349711 118.49679034881592L 142.88062524795532 118.49679034881592Q 142.88062524795532 118.49679034881592 142.88062524795532 118.49679034881592L 142.88062524795532 118.49679034881592L 142.88062524795532 175.55080051676433L 142.88062524795532 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 140.6811868349711 175.55080051676433L 140.6811868349711 118.49679034881592Q 140.6811868349711 118.49679034881592 140.6811868349711 118.49679034881592L 142.88062524795532 118.49679034881592Q 142.88062524795532 118.49679034881592 142.88062524795532 118.49679034881592L 142.88062524795532 118.49679034881592L 142.88062524795532 175.55080051676433L 142.88062524795532 175.55080051676433z"
                                                                    pathFrom="M 140.6811868349711 175.55080051676433L 140.6811868349711 175.55080051676433L 142.88062524795532 175.55080051676433L 142.88062524795532 175.55080051676433L 142.88062524795532 175.55080051676433L 142.88062524795532 175.55080051676433L 142.88062524795532 175.55080051676433L 140.6811868349711 175.55080051676433"
                                                                    cy="118.49679034881592" cx="156.47894048690796"
                                                                    j="8" val="65"
                                                                    barHeight="57.0540101679484"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1809"
                                                                    d="M 157.47894048690796 175.55080051676433L 157.47894048690796 123.76331436431886Q 157.47894048690796 123.76331436431886 157.47894048690796 123.76331436431886L 159.67837889989218 123.76331436431886Q 159.67837889989218 123.76331436431886 159.67837889989218 123.76331436431886L 159.67837889989218 123.76331436431886L 159.67837889989218 175.55080051676433L 159.67837889989218 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 157.47894048690796 175.55080051676433L 157.47894048690796 123.76331436431886Q 157.47894048690796 123.76331436431886 157.47894048690796 123.76331436431886L 159.67837889989218 123.76331436431886Q 159.67837889989218 123.76331436431886 159.67837889989218 123.76331436431886L 159.67837889989218 123.76331436431886L 159.67837889989218 175.55080051676433L 159.67837889989218 175.55080051676433z"
                                                                    pathFrom="M 157.47894048690796 175.55080051676433L 157.47894048690796 175.55080051676433L 159.67837889989218 175.55080051676433L 159.67837889989218 175.55080051676433L 159.67837889989218 175.55080051676433L 159.67837889989218 175.55080051676433L 159.67837889989218 175.55080051676433L 157.47894048690796 175.55080051676433"
                                                                    cy="123.76331436431886" cx="173.27669413884482"
                                                                    j="9" val="59"
                                                                    barHeight="51.787486152445474"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1810"
                                                                    d="M 174.27669413884482 175.55080051676433L 174.27669413884482 105.3304803100586Q 174.27669413884482 105.3304803100586 174.27669413884482 105.3304803100586L 176.47613255182904 105.3304803100586Q 176.47613255182904 105.3304803100586 176.47613255182904 105.3304803100586L 176.47613255182904 105.3304803100586L 176.47613255182904 175.55080051676433L 176.47613255182904 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 174.27669413884482 175.55080051676433L 174.27669413884482 105.3304803100586Q 174.27669413884482 105.3304803100586 174.27669413884482 105.3304803100586L 176.47613255182904 105.3304803100586Q 176.47613255182904 105.3304803100586 176.47613255182904 105.3304803100586L 176.47613255182904 105.3304803100586L 176.47613255182904 175.55080051676433L 176.47613255182904 175.55080051676433z"
                                                                    pathFrom="M 174.27669413884482 175.55080051676433L 174.27669413884482 175.55080051676433L 176.47613255182904 175.55080051676433L 176.47613255182904 175.55080051676433L 176.47613255182904 175.55080051676433L 176.47613255182904 175.55080051676433L 176.47613255182904 175.55080051676433L 174.27669413884482 175.55080051676433"
                                                                    cy="105.3304803100586" cx="190.07444779078168"
                                                                    j="10" val="80"
                                                                    barHeight="70.22032020670572"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1811"
                                                                    d="M 191.07444779078168 175.55080051676433L 191.07444779078168 104.45272630747478Q 191.07444779078168 104.45272630747478 191.07444779078168 104.45272630747478L 193.2738862037659 104.45272630747478Q 193.2738862037659 104.45272630747478 193.2738862037659 104.45272630747478L 193.2738862037659 104.45272630747478L 193.2738862037659 175.55080051676433L 193.2738862037659 175.55080051676433z"
                                                                    fill="rgba(82,109,238,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="0" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 191.07444779078168 175.55080051676433L 191.07444779078168 104.45272630747478Q 191.07444779078168 104.45272630747478 191.07444779078168 104.45272630747478L 193.2738862037659 104.45272630747478Q 193.2738862037659 104.45272630747478 193.2738862037659 104.45272630747478L 193.2738862037659 104.45272630747478L 193.2738862037659 175.55080051676433L 193.2738862037659 175.55080051676433z"
                                                                    pathFrom="M 191.07444779078168 175.55080051676433L 191.07444779078168 175.55080051676433L 193.2738862037659 175.55080051676433L 193.2738862037659 175.55080051676433L 193.2738862037659 175.55080051676433L 193.2738862037659 175.55080051676433L 193.2738862037659 175.55080051676433L 191.07444779078168 175.55080051676433"
                                                                    cy="104.45272630747478" cx="206.87220144271853"
                                                                    j="11" val="81"
                                                                    barHeight="71.09807420928955"
                                                                    barWidth="4.199438412984212"></path>
                                                            </g>
                                                            <g id="SvgjsG1812" class="apexcharts-series"
                                                                seriesName="Projection" rel="2"
                                                                data:realIndex="1">
                                                                <path id="SvgjsPath1814"
                                                                    d="M 6.299157619476318 118.49679034881592L 6.299157619476318 40.376684118855806Q 6.299157619476318 40.376684118855806 6.299157619476318 40.376684118855806L 8.49859603246053 40.376684118855806Q 8.49859603246053 40.376684118855806 8.49859603246053 40.376684118855806L 8.49859603246053 40.376684118855806L 8.49859603246053 118.49679034881592L 8.49859603246053 118.49679034881592z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 6.299157619476318 118.49679034881592L 6.299157619476318 40.376684118855806Q 6.299157619476318 40.376684118855806 6.299157619476318 40.376684118855806L 8.49859603246053 40.376684118855806Q 8.49859603246053 40.376684118855806 8.49859603246053 40.376684118855806L 8.49859603246053 40.376684118855806L 8.49859603246053 118.49679034881592L 8.49859603246053 118.49679034881592z"
                                                                    pathFrom="M 6.299157619476318 118.49679034881592L 6.299157619476318 118.49679034881592L 8.49859603246053 118.49679034881592L 8.49859603246053 118.49679034881592L 8.49859603246053 118.49679034881592L 8.49859603246053 118.49679034881592L 8.49859603246053 118.49679034881592L 6.299157619476318 118.49679034881592"
                                                                    cy="40.376684118855806" cx="22.096911271413166"
                                                                    j="0" val="89"
                                                                    barHeight="78.12010622996011"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1815"
                                                                    d="M 23.096911271413166 123.76331436431886L 23.096911271413166 88.653154260966Q 23.096911271413166 88.653154260966 23.096911271413166 88.653154260966L 25.296349684397377 88.653154260966Q 25.296349684397377 88.653154260966 25.296349684397377 88.653154260966L 25.296349684397377 88.653154260966L 25.296349684397377 123.76331436431886L 25.296349684397377 123.76331436431886z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 23.096911271413166 123.76331436431886L 23.096911271413166 88.653154260966Q 23.096911271413166 88.653154260966 23.096911271413166 88.653154260966L 25.296349684397377 88.653154260966Q 25.296349684397377 88.653154260966 25.296349684397377 88.653154260966L 25.296349684397377 88.653154260966L 25.296349684397377 123.76331436431886L 25.296349684397377 123.76331436431886z"
                                                                    pathFrom="M 23.096911271413166 123.76331436431886L 23.096911271413166 123.76331436431886L 25.296349684397377 123.76331436431886L 25.296349684397377 123.76331436431886L 25.296349684397377 123.76331436431886L 25.296349684397377 123.76331436431886L 25.296349684397377 123.76331436431886L 23.096911271413166 123.76331436431886"
                                                                    cy="88.653154260966" cx="38.894664923350014"
                                                                    j="1" val="40"
                                                                    barHeight="35.11016010335286"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1816"
                                                                    d="M 39.894664923350014 105.3304803100586L 39.894664923350014 77.24235222737632Q 39.894664923350014 77.24235222737632 39.894664923350014 77.24235222737632L 42.09410333633423 77.24235222737632Q 42.09410333633423 77.24235222737632 42.09410333633423 77.24235222737632L 42.09410333633423 77.24235222737632L 42.09410333633423 105.3304803100586L 42.09410333633423 105.3304803100586z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 39.894664923350014 105.3304803100586L 39.894664923350014 77.24235222737632Q 39.894664923350014 77.24235222737632 39.894664923350014 77.24235222737632L 42.09410333633423 77.24235222737632Q 42.09410333633423 77.24235222737632 42.09410333633423 77.24235222737632L 42.09410333633423 77.24235222737632L 42.09410333633423 105.3304803100586L 42.09410333633423 105.3304803100586z"
                                                                    pathFrom="M 39.894664923350014 105.3304803100586L 39.894664923350014 105.3304803100586L 42.09410333633423 105.3304803100586L 42.09410333633423 105.3304803100586L 42.09410333633423 105.3304803100586L 42.09410333633423 105.3304803100586L 42.09410333633423 105.3304803100586L 39.894664923350014 105.3304803100586"
                                                                    cy="77.24235222737632" cx="55.692418575286865"
                                                                    j="2" val="32"
                                                                    barHeight="28.08812808268229"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1817"
                                                                    d="M 56.692418575286865 104.45272630747478L 56.692418575286865 47.39871613952638Q 56.692418575286865 47.39871613952638 56.692418575286865 47.39871613952638L 58.89185698827108 47.39871613952638Q 58.89185698827108 47.39871613952638 58.89185698827108 47.39871613952638L 58.89185698827108 47.39871613952638L 58.89185698827108 104.45272630747478L 58.89185698827108 104.45272630747478z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 56.692418575286865 104.45272630747478L 56.692418575286865 47.39871613952638Q 56.692418575286865 47.39871613952638 56.692418575286865 47.39871613952638L 58.89185698827108 47.39871613952638Q 58.89185698827108 47.39871613952638 58.89185698827108 47.39871613952638L 58.89185698827108 47.39871613952638L 58.89185698827108 104.45272630747478L 58.89185698827108 104.45272630747478z"
                                                                    pathFrom="M 56.692418575286865 104.45272630747478L 56.692418575286865 104.45272630747478L 58.89185698827108 104.45272630747478L 58.89185698827108 104.45272630747478L 58.89185698827108 104.45272630747478L 58.89185698827108 104.45272630747478L 58.89185698827108 104.45272630747478L 56.692418575286865 104.45272630747478"
                                                                    cy="47.39871613952638" cx="72.49017222722371"
                                                                    j="3" val="65"
                                                                    barHeight="57.0540101679484"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1818"
                                                                    d="M 73.49017222722371 126.39657637207031L 73.49017222722371 74.60909021962485Q 73.49017222722371 74.60909021962485 73.49017222722371 74.60909021962485L 75.68961064020792 74.60909021962485Q 75.68961064020792 74.60909021962485 75.68961064020792 74.60909021962485L 75.68961064020792 74.60909021962485L 75.68961064020792 126.39657637207031L 75.68961064020792 126.39657637207031z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 73.49017222722371 126.39657637207031L 73.49017222722371 74.60909021962485Q 73.49017222722371 74.60909021962485 73.49017222722371 74.60909021962485L 75.68961064020792 74.60909021962485Q 75.68961064020792 74.60909021962485 75.68961064020792 74.60909021962485L 75.68961064020792 74.60909021962485L 75.68961064020792 126.39657637207031L 75.68961064020792 126.39657637207031z"
                                                                    pathFrom="M 73.49017222722371 126.39657637207031L 73.49017222722371 126.39657637207031L 75.68961064020792 126.39657637207031L 75.68961064020792 126.39657637207031L 75.68961064020792 126.39657637207031L 75.68961064020792 126.39657637207031L 75.68961064020792 126.39657637207031L 73.49017222722371 126.39657637207031"
                                                                    cy="74.60909021962485" cx="89.28792587916055"
                                                                    j="4" val="59"
                                                                    barHeight="51.787486152445474"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1819"
                                                                    d="M 90.28792587916055 97.43069428680421L 90.28792587916055 27.21037408009849Q 90.28792587916055 27.21037408009849 90.28792587916055 27.21037408009849L 92.48736429214476 27.21037408009849Q 92.48736429214476 27.21037408009849 92.48736429214476 27.21037408009849L 92.48736429214476 27.21037408009849L 92.48736429214476 97.43069428680421L 92.48736429214476 97.43069428680421z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 90.28792587916055 97.43069428680421L 90.28792587916055 27.21037408009849Q 90.28792587916055 27.21037408009849 90.28792587916055 27.21037408009849L 92.48736429214476 27.21037408009849Q 92.48736429214476 27.21037408009849 92.48736429214476 27.21037408009849L 92.48736429214476 27.21037408009849L 92.48736429214476 97.43069428680421L 92.48736429214476 97.43069428680421z"
                                                                    pathFrom="M 90.28792587916055 97.43069428680421L 90.28792587916055 97.43069428680421L 92.48736429214476 97.43069428680421L 92.48736429214476 97.43069428680421L 92.48736429214476 97.43069428680421L 92.48736429214476 97.43069428680421L 92.48736429214476 97.43069428680421L 90.28792587916055 97.43069428680421"
                                                                    cy="27.21037408009849" cx="106.0856795310974"
                                                                    j="5" val="80"
                                                                    barHeight="70.22032020670572"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1820"
                                                                    d="M 107.0856795310974 140.44064041341147L 107.0856795310974 69.34256620412192Q 107.0856795310974 69.34256620412192 107.0856795310974 69.34256620412192L 109.2851179440816 69.34256620412192Q 109.2851179440816 69.34256620412192 109.2851179440816 69.34256620412192L 109.2851179440816 69.34256620412192L 109.2851179440816 140.44064041341147L 109.2851179440816 140.44064041341147z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 107.0856795310974 140.44064041341147L 107.0856795310974 69.34256620412192Q 107.0856795310974 69.34256620412192 107.0856795310974 69.34256620412192L 109.2851179440816 69.34256620412192Q 109.2851179440816 69.34256620412192 109.2851179440816 69.34256620412192L 109.2851179440816 69.34256620412192L 109.2851179440816 140.44064041341147L 109.2851179440816 140.44064041341147z"
                                                                    pathFrom="M 107.0856795310974 140.44064041341147L 107.0856795310974 140.44064041341147L 109.2851179440816 140.44064041341147L 109.2851179440816 140.44064041341147L 109.2851179440816 140.44064041341147L 109.2851179440816 140.44064041341147L 109.2851179440816 140.44064041341147L 107.0856795310974 140.44064041341147"
                                                                    cy="69.34256620412192" cx="122.88343318303424"
                                                                    j="6" val="81"
                                                                    barHeight="71.09807420928955"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1821"
                                                                    d="M 123.88343318303424 147.46267243408204L 123.88343318303424 98.30844828938802Q 123.88343318303424 98.30844828938802 123.88343318303424 98.30844828938802L 126.08287159601846 98.30844828938802Q 126.08287159601846 98.30844828938802 126.08287159601846 98.30844828938802L 126.08287159601846 98.30844828938802L 126.08287159601846 147.46267243408204L 126.08287159601846 147.46267243408204z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1" clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 123.88343318303424 147.46267243408204L 123.88343318303424 98.30844828938802Q 123.88343318303424 98.30844828938802 123.88343318303424 98.30844828938802L 126.08287159601846 98.30844828938802Q 126.08287159601846 98.30844828938802 126.08287159601846 98.30844828938802L 126.08287159601846 98.30844828938802L 126.08287159601846 147.46267243408204L 126.08287159601846 147.46267243408204z"
                                                                    pathFrom="M 123.88343318303424 147.46267243408204L 123.88343318303424 147.46267243408204L 126.08287159601846 147.46267243408204L 126.08287159601846 147.46267243408204L 126.08287159601846 147.46267243408204L 126.08287159601846 147.46267243408204L 126.08287159601846 147.46267243408204L 123.88343318303424 147.46267243408204"
                                                                    cy="98.30844828938802" cx="139.6811868349711"
                                                                    j="7" val="56"
                                                                    barHeight="49.154224144694005"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1822"
                                                                    d="M 140.6811868349711 118.49679034881592L 140.6811868349711 40.376684118855806Q 140.6811868349711 40.376684118855806 140.6811868349711 40.376684118855806L 142.88062524795532 40.376684118855806Q 142.88062524795532 40.376684118855806 142.88062524795532 40.376684118855806L 142.88062524795532 40.376684118855806L 142.88062524795532 118.49679034881592L 142.88062524795532 118.49679034881592z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1"
                                                                    clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 140.6811868349711 118.49679034881592L 140.6811868349711 40.376684118855806Q 140.6811868349711 40.376684118855806 140.6811868349711 40.376684118855806L 142.88062524795532 40.376684118855806Q 142.88062524795532 40.376684118855806 142.88062524795532 40.376684118855806L 142.88062524795532 40.376684118855806L 142.88062524795532 118.49679034881592L 142.88062524795532 118.49679034881592z"
                                                                    pathFrom="M 140.6811868349711 118.49679034881592L 140.6811868349711 118.49679034881592L 142.88062524795532 118.49679034881592L 142.88062524795532 118.49679034881592L 142.88062524795532 118.49679034881592L 142.88062524795532 118.49679034881592L 142.88062524795532 118.49679034881592L 140.6811868349711 118.49679034881592"
                                                                    cy="40.376684118855806" cx="156.47894048690796"
                                                                    j="8" val="89"
                                                                    barHeight="78.12010622996011"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1823"
                                                                    d="M 157.47894048690796 123.76331436431886L 157.47894048690796 88.653154260966Q 157.47894048690796 88.653154260966 157.47894048690796 88.653154260966L 159.67837889989218 88.653154260966Q 159.67837889989218 88.653154260966 159.67837889989218 88.653154260966L 159.67837889989218 88.653154260966L 159.67837889989218 123.76331436431886L 159.67837889989218 123.76331436431886z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1"
                                                                    clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 157.47894048690796 123.76331436431886L 157.47894048690796 88.653154260966Q 157.47894048690796 88.653154260966 157.47894048690796 88.653154260966L 159.67837889989218 88.653154260966Q 159.67837889989218 88.653154260966 159.67837889989218 88.653154260966L 159.67837889989218 88.653154260966L 159.67837889989218 123.76331436431886L 159.67837889989218 123.76331436431886z"
                                                                    pathFrom="M 157.47894048690796 123.76331436431886L 157.47894048690796 123.76331436431886L 159.67837889989218 123.76331436431886L 159.67837889989218 123.76331436431886L 159.67837889989218 123.76331436431886L 159.67837889989218 123.76331436431886L 159.67837889989218 123.76331436431886L 157.47894048690796 123.76331436431886"
                                                                    cy="88.653154260966" cx="173.27669413884482"
                                                                    j="9" val="40"
                                                                    barHeight="35.11016010335286"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1824"
                                                                    d="M 174.27669413884482 105.3304803100586L 174.27669413884482 48.276470142110206Q 174.27669413884482 48.276470142110206 174.27669413884482 48.276470142110206L 176.47613255182904 48.276470142110206Q 176.47613255182904 48.276470142110206 176.47613255182904 48.276470142110206L 176.47613255182904 48.276470142110206L 176.47613255182904 105.3304803100586L 176.47613255182904 105.3304803100586z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1"
                                                                    clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 174.27669413884482 105.3304803100586L 174.27669413884482 48.276470142110206Q 174.27669413884482 48.276470142110206 174.27669413884482 48.276470142110206L 176.47613255182904 48.276470142110206Q 176.47613255182904 48.276470142110206 176.47613255182904 48.276470142110206L 176.47613255182904 48.276470142110206L 176.47613255182904 105.3304803100586L 176.47613255182904 105.3304803100586z"
                                                                    pathFrom="M 174.27669413884482 105.3304803100586L 174.27669413884482 105.3304803100586L 176.47613255182904 105.3304803100586L 176.47613255182904 105.3304803100586L 176.47613255182904 105.3304803100586L 176.47613255182904 105.3304803100586L 176.47613255182904 105.3304803100586L 174.27669413884482 105.3304803100586"
                                                                    cy="48.276470142110206" cx="190.07444779078168"
                                                                    j="10" val="65"
                                                                    barHeight="57.0540101679484"
                                                                    barWidth="4.199438412984212"></path>
                                                                <path id="SvgjsPath1825"
                                                                    d="M 191.07444779078168 104.45272630747478L 191.07444779078168 52.6652401550293Q 191.07444779078168 52.6652401550293 191.07444779078168 52.6652401550293L 193.2738862037659 52.6652401550293Q 193.2738862037659 52.6652401550293 193.2738862037659 52.6652401550293L 193.2738862037659 52.6652401550293L 193.2738862037659 104.45272630747478L 193.2738862037659 104.45272630747478z"
                                                                    fill="rgba(227,234,239,1)" fill-opacity="1"
                                                                    stroke="transparent" stroke-opacity="1"
                                                                    stroke-linecap="round" stroke-width="2"
                                                                    stroke-dasharray="0" class="apexcharts-bar-area"
                                                                    index="1"
                                                                    clip-path="url(#gridRectMask3vmjwehll)"
                                                                    pathTo="M 191.07444779078168 104.45272630747478L 191.07444779078168 52.6652401550293Q 191.07444779078168 52.6652401550293 191.07444779078168 52.6652401550293L 193.2738862037659 52.6652401550293Q 193.2738862037659 52.6652401550293 193.2738862037659 52.6652401550293L 193.2738862037659 52.6652401550293L 193.2738862037659 104.45272630747478L 193.2738862037659 104.45272630747478z"
                                                                    pathFrom="M 191.07444779078168 104.45272630747478L 191.07444779078168 104.45272630747478L 193.2738862037659 104.45272630747478L 193.2738862037659 104.45272630747478L 193.2738862037659 104.45272630747478L 193.2738862037659 104.45272630747478L 193.2738862037659 104.45272630747478L 191.07444779078168 104.45272630747478"
                                                                    cy="52.6652401550293" cx="206.87220144271853"
                                                                    j="11" val="59"
                                                                    barHeight="51.787486152445474"
                                                                    barWidth="4.199438412984212"></path>
                                                            </g>
                                                            <g id="SvgjsG1799" class="apexcharts-datalabels"
                                                                data:realIndex="0"></g>
                                                            <g id="SvgjsG1813" class="apexcharts-datalabels"
                                                                data:realIndex="1"></g>
                                                        </g>
                                                        <line id="SvgjsLine1902" x1="0" y1="0"
                                                            x2="201.5730438232422" y2="0" stroke="#b6b6b6"
                                                            stroke-dasharray="0" stroke-width="1"
                                                            stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                                        <line id="SvgjsLine1903" x1="0" y1="0"
                                                            x2="201.5730438232422" y2="0" stroke-dasharray="0"
                                                            stroke-width="0" stroke-linecap="butt"
                                                            class="apexcharts-ycrosshairs-hidden"></line>
                                                        <g id="SvgjsG1904" class="apexcharts-yaxis-annotations"></g>
                                                        <g id="SvgjsG1905" class="apexcharts-xaxis-annotations"></g>
                                                        <g id="SvgjsG1906" class="apexcharts-point-annotations"></g>
                                                    </g>
                                                    <g id="SvgjsG1864" class="apexcharts-yaxis" rel="0"
                                                        transform="translate(8.426956176757812, 0)">
                                                        <g id="SvgjsG1865" class="apexcharts-yaxis-texts-g"><text
                                                                id="SvgjsText1866"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="20" y="31.5" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1867">200k</tspan>
                                                                <title>200k</title>
                                                            </text><text id="SvgjsText1868"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="20" y="66.61016010335287" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1869">160k</tspan>
                                                                <title>160k</title>
                                                            </text><text id="SvgjsText1870"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="20" y="101.72032020670574"
                                                                text-anchor="end" dominant-baseline="auto"
                                                                font-size="11px" font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1871">120k</tspan>
                                                                <title>120k</title>
                                                            </text><text id="SvgjsText1872"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="20" y="136.8304803100586" text-anchor="end"
                                                                dominant-baseline="auto" font-size="11px"
                                                                font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1873">80k</tspan>
                                                                <title>80k</title>
                                                            </text><text id="SvgjsText1874"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="20" y="171.94064041341147"
                                                                text-anchor="end" dominant-baseline="auto"
                                                                font-size="11px" font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1875">40k</tspan>
                                                                <title>40k</title>
                                                            </text><text id="SvgjsText1876"
                                                                font-family="Helvetica, Arial, sans-serif"
                                                                x="20" y="207.05080051676435"
                                                                text-anchor="end" dominant-baseline="auto"
                                                                font-size="11px" font-weight="400" fill="#373d3f"
                                                                class="apexcharts-text apexcharts-yaxis-label "
                                                                style="font-family: Helvetica, Arial, sans-serif;">
                                                                <tspan id="SvgjsTspan1877">0k</tspan>
                                                                <title>0k</title>
                                                            </text></g>
                                                    </g>
                                                    <g id="SvgjsG1786" class="apexcharts-annotations"></g>
                                                </svg>
                                                <div class="apexcharts-legend" style="max-height: 132.5px;"></div>
                                                <div class="apexcharts-tooltip apexcharts-theme-light">
                                                    <div class="apexcharts-tooltip-title"
                                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 1;"><span
                                                            class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(82, 109, 238);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="apexcharts-tooltip-series-group" style="order: 2;"><span
                                                            class="apexcharts-tooltip-marker"
                                                            style="background-color: rgb(227, 234, 239);"></span>
                                                        <div class="apexcharts-tooltip-text"
                                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                                            <div class="apexcharts-tooltip-y-group"><span
                                                                    class="apexcharts-tooltip-text-y-label"></span><span
                                                                    class="apexcharts-tooltip-text-y-value"></span></div>
                                                            <div class="apexcharts-tooltip-goals-group"><span
                                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                                    class="apexcharts-tooltip-text-goals-value"></span>
                                                            </div>
                                                            <div class="apexcharts-tooltip-z-group"><span
                                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                                    <div class="apexcharts-yaxistooltip-text"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="header-title">Revenue</h4>
                                    <div class="btn-group mb-2">
                                        <button type="button" class="btn btn-xs btn-light active">Today</button>
                                        <button type="button" class="btn btn-xs btn-light">Weekly</button>
                                        <button type="button" class="btn btn-xs btn-light">Monthly</button>
                                    </div>
                                </div>

                                <div class="row mt-4 text-center">
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Current Month</p>
                                        <h4><i class="fe-arrow-up text-success me-1"></i>₹1.4k</h4>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Previous Month</p>
                                        <h4><i class="fe-arrow-down text-danger me-1"></i>₹15k</h4>
                                    </div>
                                    <div class="col-4">
                                        <p class="text-muted font-15 mb-1 text-truncate">Target</p>
                                        <h4><i class="fe-arrow-down text-danger me-1"></i>₹7.8k</h4>
                                    </div>
                                </div>

                                <div class="mt-3" dir="ltr">
                                    <div id="revenue-chart" class="apex-charts" data-colors="#02a8b5,#ced4dc"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.counter-value').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        });

        function copyText() {
            navigator.clipboard.writeText($('#referral_link').val());
        }
    </script>
@endsection
