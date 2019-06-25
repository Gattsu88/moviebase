@extends('layouts.admin')

@section('content')

    <div class="col-sm-6">
    
        @component('admin.includes.title')
            Site Data
        @endcomponent

        @if(Session::has('flash_admin'))
            <div class="flash_message">
                {{ Session('flash_admin') }}
            </div>
        @endif

        <div class="row">
            <div class="col-sm-5">
                <form action="/admin/site/{{ $site->id }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ $site->address }}">
                    </div>
                    <div class="form-group">
                        <label for="business_hours">Business hours</label>
                        <input type="text" class="form-control" name="business_hours" value="{{ $site->business_hours }}">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $site->phone }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Change data</button>
                </form>
            </div>            
        </div>
        
    </div>
@endsection