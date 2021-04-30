<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    @yield('title')

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    @yield('css')
</head>
<body>
    @yield('content')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        @if(session()->has('error'))
            document.addEventListener("DOMContentLoaded", function(event) {
                swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: "{{ session()->get('error') }}"
                });
            });
        @endif

        @if(session()->has('success'))
            document.addEventListener("DOMContentLoaded", function(event) {
                swal({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session()->get('success') }}"
                });
            });
        @endif
    </script>
    
    @yield('script')
</body>
</html>