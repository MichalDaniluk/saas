
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title', 'Administracja')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon" />

    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

</head>

<body class="page-index">
<div id="app">
    <div class="container">
        @include('partials.message')
        <header class="mainHeader">
            @include('partials.navbar')
            @yield('navbar')
        </header>
        <section class="mainContent">
            @yield('content')
        </section>
    </div>
</div>
</body>
</html>
