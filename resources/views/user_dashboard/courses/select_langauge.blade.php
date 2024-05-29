@extends('user_dashboard.layouts.app')
@section('content')
<style>
    .teams h5 {
        padding: 10px;
        color: #fff;
        text-transform: uppercase;
        background: #034f82;
        font-size: 15px;
        text-align: center;
        letter-spacing: 0.5px;
        line-height: 25px;
        margin: 0;
    }
</style>
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row mt-3 mb-3 justify-content-center">
                    @foreach (App\Models\Language::where('is_delete','0')->whereIn('id',$languages)->oldest('name')->get() as $language)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="teams">
                                    <a href="{{route('user.course.detail',[encrypt($course_detail->id),encrypt($language->id)])}}">
                                        <h5>{{$language->name}}</h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
