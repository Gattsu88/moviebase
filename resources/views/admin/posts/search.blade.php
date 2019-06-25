@extends('layouts.admin')

@section('content')

    @component('admin.includes.title')
        All Posts
    @endcomponent

    @if(Session::has('flash_admin'))
        <div class="flash_message">
            {{ Session('flash_admin') }}
        </div>
    @endif

    @include('admin.includes.search_form')

    <a href="{{ url('/admin/posts') }}">See all posts</a>

    @if($posts)
        <div class="count">Posts founded: <strong>{{ count($posts) }}</strong></div>
        @include('admin.includes.post_list')
    @else
        <div>Sorry, no posts found..</div>
    @endif 

@endsection