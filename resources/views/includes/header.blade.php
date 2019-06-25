<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a href="/" class="navbar-brand">Moviebase</a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="#" class="nav-item nav-link active">Home</a>
                <a href="#" class="nav-item nav-link">Featured</a>
                <a href="#" class="nav-item nav-link">Pricing</a>
            </div>
        </div>
        @if(Auth::user())
            <a href="{{ url('/admin') }}" class="nav-link nav-user-img">
                <i class="fas fa-user mr-2"></i>
            </a>
        @endif
    </nav>
</header>