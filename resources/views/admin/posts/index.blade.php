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
    @include('admin.includes.post_list')

    {{ $posts->links() }}

@endsection