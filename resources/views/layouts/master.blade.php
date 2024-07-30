<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        {{-- summernote css link- --}}
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.datatables.net/2.1.0/css/dataTables.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.1.0/css/dataTables.bootstrap5.css">
        <style>
            div.dt-container .dt-paging .dt-paging-button {
                margin-left: 0 !important;
                padding: 0 !important;
            }
        </style>
    </head>

    <body>
        @include('layouts.inc.admin-navbar')
        <div id="layoutSidenav">
            @include('layouts.inc.admin-sidebar')

            <div id="layoutSidenav_content">
                <main>

                    @yield('content')

                </main>
                @include('layouts.inc.admin-footer')
            </div>
        </div>
        {{-- summernote css link- --}}
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script src="//cdn.datatables.net/2.1.0/js/dataTables.min.js"></script>

        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/scripts.js') }}"></script>
        <script src="https://cdn.datatables.net/2.1.0/js/dataTables.bootstrap5.js"></script>

        {{-- summernote Code --}}
        <script>
            $(document).ready(function() {
                $('#descriptionsummernote').summernote({
                    height: 250,
                });

                $('.dropdown-toggle').dropdown();
            });
            let table = new DataTable('#mydataTable');
        </script>
        @yield('script')
    </body>

</html>
