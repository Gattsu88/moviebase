@extends('layouts.admin')

@section('content')

    <div class="col-sm-11">
    
        @component('admin.includes.title')
            Edit Post
        @endcomponent
        
        @if(!empty($post))

        <form action="/admin/posts/{{ $post->id }}" method="POST" style="text-align: right">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete post</button>
        </form>

        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="file">Movie cover</label>
                        <div>
                            <img src="{{ url('images/posts/'.$post->photo['filename']) }}" alt="" id="profile-img-tag" width="100%">
                        </div>
                        <input type="file" name="file" id="profile-img">
                    </div>
                </div>

                <div class="col-sm-8">

                    <div class="form-group">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter a post title.." value="{{ $post->name }}">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" id="" class="form-control">
                                <option value="" disabled selected>Select category:</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="review">Review</label>
                            <textarea class="form-control" name="review" id="article-ckeditor" cols="6" rows="10" width="295">{{ $post->review }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit post</button>
                    </div>

                    @component('admin.includes.form_errors')
                        Add Administrators / Authors
                    @endcomponent
                    
                </div>
            </div>                    
        </form>
        @else
            <div>Sorry, no posts..</div>
        @endif
    </div>

    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{ csrf_token() }}',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{ csrf_token() }}'
        };

        CKEDITOR.replace( 'article-ckeditor', options);

        function readURL(input) {
            if(input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#profile-img').change(function() {
            readURL(this);
        });
    </script>
@endsection