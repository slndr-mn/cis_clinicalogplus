    <style>
        /* Remove default Bootstrap breadcrumb slash separator and set custom > separator */
        .breadcrumb-item + .breadcrumb-item::before {
            content: ">" !important;
            color: #6c757d;
            padding: 0 0.5rem;
        }
        .breadcrumb .breadcrumb-item a {
            color: #6c757d !important;
            text-decoration: underline;
        }
        .breadcrumb .breadcrumb-item a:hover {
            color: #d63384 !important;
        }
        /* Breadcrumbs lower and right-aligned */
        .breadcrumb {
            margin-top: 2rem;
            justify-content: flex-start;
            display: flex;
            margin-left: 70px;
        }
    </style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CIS: Clinicalog</title>

    {{-- Laravel Vite Assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('ClinicaLog.ico') }}" type="image/x-icon" />

    {{-- Font Awesome --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />

    {{-- Remix Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- HEAD -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- CSS.GG Icons (no need to include twice) --}}
    <link href="https://unpkg.com/css.gg/icons/all.css" rel="stylesheet" />

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery (already included in most Laravel admin themes) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Datatables -->
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="../assets/js/kaiadmin.min.js"></script>
    <script src="../assets/js/kaiadmin.min.js"></script>

    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>

    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #f8d7da;
            color: #721c24 !important;
            border: 1px solid #f5c6cb;
            border-radius: 20px;
            margin: 0 2px;
            padding: 5px 15px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:not(.current):hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button:not(.current):focus,
        .dataTables_wrapper .dataTables_paginate .paginate_button:not(.current):active {
            background: #ff69b4 !important;
            /* Pink */
            color: #fff !important;
            border-radius: 20px !important;
            border-color: #ff69b4 !important;
            box-shadow: none !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #e83e8c !important;
            color: #fff !important;
            border-color: #e83e8c;
            border-radius: 20px;
        }

        .dataTables_wrapper .dataTables_paginate {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin-top: 1rem;
        }
    </style>

</head>
@stack('scripts')

<body>
    {{-- Header --}}
    @include('admin.partials.header')

    <div class="d-flex">
        {{-- Sidebar --}}
        @include('admin.partials.sidebar')

        {{-- Main Content --}}
        <main class="p-4 flex-grow-1">
            @yield('content')
        </main>
    </div>
</body>

</html>
