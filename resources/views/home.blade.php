@extends('layouts.app')

@section('content')

@if($postsSliders)
    <div class="slick-home">
        @foreach($postsSliders as $postsSlide)
            <div>
                <div class="slick-item" style="background:url(/images/posts/{{ $postsSlide->photo['filename'] }})">
                    <a href="{{ url('/post/'.$postsSlide->slug) }}" class="slick-wrapper">
                        <div class="slick-content">
                            <div class="wrapper">
                                <div class="slick-movie">{{ $postsSlide->name }}</div>
                                <div class="slick-category">{{ $postsSlide->category->name }}</div>
                                <div class="slick-title">{{ $postsSlide->title }}</div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <script src="{{ asset('js/scripts.js') }}"></script>

@endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($posts)
                    <div class="home_post_list">
                        <h3>Reviews</h3>
                        <div class="row">
                            @foreach($posts as $post)
                                <div class="col-md-6">
                                    <div class="item">
                                        <div class="date">
                                            Created: {{ $post->created_at->diffForHumans() }}
                                        </div>
                                        <div class="category">
                                            {{ $post->category->name }}
                                        </div>
                                        <div class="name">
                                            {{ $post->name }}
                                        </div>
                                        <div class="text-wrapper">
                                            <a href="{{ url('/post/'.$post->slug) }}" class="title">{{ $post->title }}</a>
                                        </div>
                                        <div class="desc">
                                            {{ str_limit($post->description, 250) }}
                                            <br>...read more
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="home_top_post_list">
                    <h3>Popular reviews</h3>
                    @if($topPosts)
                        <div>
                            @foreach($topPosts as $topPost)
                                <a href="{{ url('/post/'.$topPost->slug) }}" class="item">
                                    <div class="name">{{ $topPost->name }}</div>
                                    <div class="title">{{ $topPost->title }}</div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection