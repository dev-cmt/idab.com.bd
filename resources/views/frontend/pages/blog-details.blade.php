@extends('frontend.layouts.app')
@section('title', 'Blog Details')

<style>
    .recent-blog-item h1 {
        font-size: 16px;
        font-weight: 600;
        color: #ff0000;
        padding-top: 10px;
    }
</style>

@section('content')
@include('frontend.layouts.partial.banner')

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            
            <!-- Blog Details Section -->
            <div class="col-lg-12">
                <img class="img-fluid my-4" src="{{asset('public')}}/{{$data->image_path}}" alt="" width="100%">
                <article class="blog-post">
                    <h1 class="news-title">{{$data->title}}</h1>

                    
                    {!! $data->content !!}
                </article>

                <hr>
                <div class="text-end">
                    Published: <span class="date"><i class="fa fa-clock-o"></i>{{ $data->publish_date->format('d F Y') }}</span>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Blog End -->

@endsection
