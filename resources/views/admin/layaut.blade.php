<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title', 'Dashboard')</title>
    <!-- General CSS Files -->
    @include('admin.include.style')
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>

            {{-- navbar --}}
            @include('admin.include.navbar')

            {{-- SIDEBAR --}}

            @include('admin.include.sidebar')
            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">
                        <!-- add content here -->

                        @yield('content')

                    </div>
                </section>

            </div>
        @include('admin.include.footer')
        </div>
    </div>
    <!-- General JS Scripts -->
    @include('admin.include.js')
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->

</html>
