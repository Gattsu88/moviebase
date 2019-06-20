@extends('layouts.admin')

@section('content')

    <div class="col-sm-5">

        @component('admin.includes.title')
            Edit Category
        @endcomponent
        
        <form action="/admin/categories/{{ $category->id }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Category name</label>
                <input type="text" name="name" class="form-control" placeholder="Add a category" value="{{ $category->name }}">
            </div>

            <button type="submit" class="btn btn-primary">Edit category</button>

            @component('admin.includes.form_errors')
            @endcomponent
        </form>

    </div>
@endsection