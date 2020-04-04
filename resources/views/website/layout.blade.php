<!DOCTYPE html>
<html lang="en">
<head>
    @include('../layouts/head')

</head>
<body>
    @include('../layouts/navbar')
    <div class="container">
        @yield('content')
    </div>

    @include('../layouts/footer')
    @include('../layouts/scripts')
</body>
</html>