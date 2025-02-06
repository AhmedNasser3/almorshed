@extends('frontend.master')
@section('frontendContent')
<div class="article">
    <div class="article_container">
        <div class="article_content">
            <div class="article_container">
                <div class="article_url">
                   <h2> رئيسية <span>></span> مقال <span>></span> {{ $article->title }}</h2>
                </div>
                <div class="article_subtitle">
                   <h1>{{ \Illuminate\Support\Str::words($article->subtitle, 8, '...') }}</h1>
                </div>
                <div class="article_meta_description">
                   <h3>{{ \Illuminate\Support\Str::words($article->meta_description, 25, '...') }}</h3>
                </div>
            </div>
            @if (!$article->image && $article->video)
            <div class="article_body_video">
                <video src="{{   asset('storage/'.$article->video) }}"></video>
            </div>
            @elseif(!$article->image && !$article->video)
            <p style="color: white">لا يوجد صورة او فيديو </p>
            @else
            <div class="article_img">
                <img src="{{ asset('storage/'.$article->image) }}" alt="image">
            </div>
            @endif
        </div>
    </div>
    <div class="article_body">
        <div class="article_body_container">
            <div class="article_body_content">
                <div class="article_body_data">
                    <div class="article_body_box">
                        <div class="article_body_video">
                            @if (!$article->video && $article->image)
                            <div class="article_img">
                                <img src="{{ asset('storage/'.$article->image) }}" alt="image">
                            </div>
                            @elseif(!$article->image && !$article->video)
                            <p style="color: white">لا يوجد صورة او فيديو </p>
                            @else
                            <video src="{{   asset('storage/'.$article->video) }}"></video>
                            @endif
                        </div>
                        <div class="article_body_video_title">
                            <h2>
                                {{ $article->title }}
                            </h2>
                        </div>
                        <div class="article_body_articles">

                        </div>
                    </div>
                    <div class="article_body_titles">
                        <div class="article_body_main_title">
                            <h2>{{ $article->title }}</h2>
                            <h3>{{ $article->subtitle }}</h3>
                            <p>{{ $article->meta_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
