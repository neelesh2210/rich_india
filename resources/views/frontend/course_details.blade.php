@extends('frontend.layouts.app')
@section('content')
    <div class="rbt-breadcrumb-default bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content">
                        <div class="inner">
                            <div class="rbt-new-badge rbt-new-badge-one">
                                <span class="rbt-new-badge-icon">🏆</span> {{$course->name}}
                            </div>
                            <h2> {{$course->name}}</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <div class="pt-100 pb-75">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    {!!$course->description!!}
                    <div class="course-details-content">
                        <h4 class="title">Course Content </h4>
                        <div class="accordion course-content" id="FaqAccordion">
                            @foreach ($course->topic as $key=>$topic)
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$key}}" aria-expanded="false" aria-controls="collapse{{$key}}">
                                        {{$key+1}}. {{$topic->title}}
                                    </button>
                                    <div id="collapse{{$key}}" class="accordion-collapse collapse" data-bs-parent="#FaqAccordion" style="">
                                        <div class="accordion-body">
                                            <p>
                                                {!!$topic->description!!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sticky-top">
                        <div class="course-sidebar rbt-shadow-box course-sidebar-top">
                            <div class="inner">
                                <div class="video-area">
                                    <div class="video-view">
                                        <img @isset($course->topic[0]) src="{{ asset('backend/img/topic/'.$course->topic[0]->thumbnail_image) }}" @endisset class="img-fluid w-100" alt="image" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/images/video-player.jpg') }}'">
                                        <div class="view-content">
                                            <a @isset($course->topic[0]) href="{{$course->topic[0]->video_url}}" target="_blank" @else href="#" @endisset class="video-btn popup-youtube">
                                                <i class="fas fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="course-details__sidebar__item">
                                    <h3 class="course-details__sidebar__title">Course Features</h3>
                                    <ul class="course-details__sidebar__lists clerfix">
                                        <li><i class="icon-history"></i>Duration:<span>20 Hours</span></li>
                                        <li><i class="icon-reading"></i>Students:<span>Max 15</span></li>
                                        <li><i class="icon-play-border"></i>Videos<span>{{$course->topic_count}}</span></li>
                                        <li><i class="icon-logical-thinking"></i>Skill Level<span>Advanced</span></li>
                                        <li><i class="icon-Digital-marketing"></i>Language:<span>English</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
