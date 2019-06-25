<div class="container">
    <form action="/admin/posts/filter" method="POST" class="posts_search">
        @csrf

        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for.." name="keywords">
            <span class="input-group-btn">
                <button class="btn btn-search" type="submit">
                    <i class="fa fa-search fa-fw"></i> Search
                </button>
            </span>
        </div> 
    </form>
</div>