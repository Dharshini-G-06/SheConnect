@include('auth.header')

@include('auth.sidebar')

<div class="main-content">

    @yield('content')

</div>

@include('auth.footer')