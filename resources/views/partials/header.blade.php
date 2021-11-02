<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="w-75 mx-auto d-flex">
        <a class="navbar-brand" href="#">Iphone huppelepup</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                @auth
                    @if(auth()->user()->is_admin === 1)
                        <li class="nav-item active">
                            <a class="nav-link" href="/users/index">Users Index</a>
                        </li>
                    @endif
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/index">Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Welcome, {{ auth()->user()->name }}!</a>
                    </li>
                    <form action="/logout" method="post">
                        @csrf

                        <button class="btn btn-secondary float-right top-button" type="submit">Logout</button>
                    </form>
                @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
