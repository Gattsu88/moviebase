@extends('layouts.admin')

@section('content')

    <div class="col-sm-11">

        @component('admin.includes.title')
            All Categories
        @endcomponent
        
        <div class="row">
            <div class="col-sm-4">
                <table class="table table-striped admin_users_table">
                    <thead>
                        <th>ID</th>
                        <th>Category name</th>
                    </thead>
                    <tbody>
                        @if($categories)                            
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <span class="badge badge-pill badge-danger pull-right">{{ $category->posts->count() }}</span>&nbsp;
                                        <a href="{{ url('admin/categories/'.$category->id.'/edit') }}">{{ $category->name }}</a>
                                    </td>
                                </tr>
                                @endforeach                            
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-sm-5">
                <form action="/admin/categories" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" name="name" class="form-control" placeholder="Add a category">
                    </div>

                    <button type="submit" class="btn btn-primary">Add category</button>

                    @component('admin.includes.form_errors')
                    @endcomponent
                </form>
            </div>
        </div>

    </div>
@endsection