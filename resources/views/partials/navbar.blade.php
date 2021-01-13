@section('navbar')
    <nav class="navbar navbar-expand-lg navbar-light bg-light mt-2 mb-5">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Start <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('companies.list') }}">Firmy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.list') }}">Szkolenia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('places.full') }}">Miejsca</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('orders.full') }}">Zapisy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('instructors.full') }}">Wykładowcy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://saas.local:8000/logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">Logout
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            {{ @csrf_field() }}
                        </form>
                    </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Szukaj" aria-label="Szukaj">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Szukaj</button>
            </form>
        </div>
    </nav>
@endsection
