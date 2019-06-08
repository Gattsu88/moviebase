@extends('layouts.admin')

@section('content')

    <div class="col-sm-6">
    
        @component('admin.includes.title')
            Add Administrators / Authors
        @endcomponent

        <form action="/admin/users" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter a username..">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter a email..">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter a password..">
            </div>
            <div class="form-group">
                <label for="role_id">Role</label>
                <select name="role_id" class="form-control">
                    <option disabled selected>Select a role:</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <select name="active" class="form-control">
                    <option disabled selected>Select a status:</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>

            @component('admin.includes.form_errors')
                Add Administrators / Authors
            @endcomponent

            <button type="submit" class="btn btn-primary">Add user</button>
        </form>
    </div>
@endsection