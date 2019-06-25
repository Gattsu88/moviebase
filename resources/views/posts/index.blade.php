@extends('layouts.app')

@section('content')

    <div class="container post_container">
        <div class="row justify-content-center">
            <div class="wrapper">
                <div class="col-md-12">
                    <div class="date">
                        {{ $post->created_at->format('M d Y') }}
                    </div>
                    <div class="title">
                        {{ $post->title }}
                    </div>
                    <div class="reviewer_top">
                        Created by: <span>{{ $post->user->name }}</span>
                    </div>
                    <div class="review_container">
                        {!! html_entity_decode($post->review) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection