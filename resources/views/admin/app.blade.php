<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>CIS: Clinicalog</title>

    {{-- Laravel Vite Assets --}}
    @vite([
        'resources/css/app.css',
        'resources/css/sidebar.css', 
        'resources/js/app.js'
    ])

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('ClinicaLog.ico') }}" type="image/x-icon" />

    {{-- WebFont Loader --}}
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: { families: ['Public Sans:300,400,500,600,700'] },
            custom: {
                families: [
                    'Font Awesome 5 Solid',
                    'Font Awesome 5 Regular',
                    'Font Awesome 5 Brands',
                    'simple-line-icons'
                ],
                urls: ['{{ asset('assets/css/fonts.min.css') }}']
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    {{-- Icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://unpkg.com/css.gg/icons/all.css" rel="stylesheet" />

    {{-- Bootstrap & Kaiadmin CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}">

    {{-- DataTables CSS --}}
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

    {{-- Custom Sidebar Style --}}
    <style>
        .sidebar {
            transition: background 0.3s ease;
            background: linear-gradient(to bottom, #DB6079, #DA6F65, #E29AB4);
        }
        .logo-header {
            transition: background 0.3s ease;
        }
        .nav-item.active {
            background-color: rgba(0, 0, 0, 0.1);
            color: #fff;
        }
        .nav-item.active i {
            color: #fff;
        }
    </style>
</head>

 <body>
            <div class="wrapper">
                {{-- Sidebar --}}
                @include('admin.partials.sidebar')

                {{-- Main Panel --}}
                <div class="main-panel">
                    @include('admin.partials.header')
                <div class="container" id="content">
                    <main>
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>

    {{-- jQuery (must come first before other scripts) --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Bootstrap Bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- DataTables --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    {{-- jQuery Scrollbar --}}
    <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    {{-- Kaiadmin Core --}}
    <script src="{{ asset('assets/js/kaiadmin.js') }}"></script>

    {{-- Optional: DataTables Plugin (if needed) --}}
    <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
</body>

</html>
