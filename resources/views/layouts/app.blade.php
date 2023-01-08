<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">



        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- Vendor JS Files -->
        <script src="{{ config('app.url') . '/assets/vendor/purecounter/purecounter_vanilla.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/aos/aos.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/glightbox/js/glightbox.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/isotope-layout/isotope.pkgd.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/swiper/swiper-bundle.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/waypoints/noframework.waypoints.js' }}" type="text/javascript"></script>
        <script src="{{ config('app.url') . '/assets/vendor/php-email-form/validate.js' }}" type="text/javascript"></script>
        <!-- Select2 -->
        <script src="{{ config('app.url') . '/assets/vendor/select2/js/select2.full.min.js' }}"></script>

        <!-- DataTables  & Plugins -->
        <script src="{{ config('app.url') . '/assets/vendor/datatables/jquery.dataTables.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/datatables-responsive/js/dataTables.responsive.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/datatables-responsive/js/responsive.bootstrap4.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/datatables-buttons/js/dataTables.buttons.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/datatables-buttons/js/buttons.bootstrap4.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/jszip/jszip.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/pdfmake/pdfmake.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/pdfmake/vfs_fonts.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/datatables-buttons/js/buttons.html5.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/datatables-buttons/js/buttons.print.min.js' }}"></script>
        <script src="{{ config('app.url') . '/assets/vendor/datatables-buttons/js/buttons.colVis.min.js' }}"></script>
    </body>
</html>
