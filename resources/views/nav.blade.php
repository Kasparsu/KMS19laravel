<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Album</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="/posts">Posts</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item">
                        <form method="post" action="{{route('logout')}}">
                            @csrf
                            <input type="submit" class="btn btn-link nav-link" style="display:inline-block" value="Logout">
                        </form>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
