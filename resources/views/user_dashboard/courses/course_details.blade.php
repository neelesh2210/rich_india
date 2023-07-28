@extends('user_dashboard.layouts.app')
@section('content')
<style>
    body[data-leftbar-compact-mode=condensed]:not(.authentication-bg) .wrapper .leftside-menu {
    position: fixed !important;
    padding-top: 0;
    width: 70px;
    z-index: 5;
    padding-top: 70px;
}
</style>
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-10">
                        <div class="row mt-sm-4 mt-3 mb-3 reverse">
                            <div class="col-lg-4">
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne" style="margin:0">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <i class="mdi mdi-help-circle me-1 text-primary"></i>
                                                <h5 class="m-0">{{ $course_detail->name }} <small class="mr-2">
                                                        (5/6)</small></h5>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                @foreach ($topic_list as $key => $topic_data)
                                                    <div class="tutor-course-topic-item">
                                                        <a href="{{ Request::url() }}?page={{ $key + 1 }}"
                                                            class="@if ($topics[0]->id == $topic_data->id) active @endif">
                                                            <div class="tutor-d-flex">
                                                                <span class="tutor-mr-8 tutor-mt-2" area-hidden="true"> <img
                                                                        src="{{ asset('user_dashboard/images/youtube.png') }}"></span>
                                                                <span
                                                                    class="tutor-course-topic-item-title tutor-fs-7 tutor-fw-medium">
                                                                    {{ $topic_data->title }}</span>
                                                            </div>
                                                            <div class="tutor-d-flex tutor-ml-auto tutor-flex-shrink-0">
                                                                {{-- <span class="tutor-fs-7 tutor-fw-medium tutor-color-muted tutor-mr-8">00:00</span> --}}
                                                                    <input checked="" type="checkbox" class="tutor-form-check-input tutor-form-check-circle">
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="navbar-customs">
                                    <div class="row">
                                        <div class="col-md-4">
                                        <h5 class="pts">Affiliate Marketing Mastery </h5>
                                        </div>
                                        <div class="col-md-4">
                                        <span class="pts1">Your Progress: 6 of 9 (67%)</span>
                                        </div>
                                        <div class="col-md-4 d-lg-block d-md-block d-none">
                                        <h5 class="m-1"><button type="button" class="btn btn-outline-secondary rounded-pill w-100"><i class="mdi mdi-check-all"></i> Mark as Complete</button></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="header-title mb-4 d-lg-block d-md-block d-none">{{ $course_detail->name }} <small><a href="#" onclick="full_screen()" class="float-end btn btn-primary">View Full Screen</a></small></h3>
                                        @foreach ($topics as $topic)
                                            <div class="ratio ratio-16x9" id="video_full">
                                                <iframe src="{{ $topic->video_url }}"></iframe>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-center">{!! $topics->links() !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var elem = document.getElementById("video_full");
        function full_screen(){
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.webkitRequestFullscreen) { /* Safari */
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { /* IE11 */
            elem.msRequestFullscreen();
        }

        }
    </script>
@endsection
