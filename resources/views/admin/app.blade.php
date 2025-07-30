    <!DOCTYPE html>
    <html lang="en">

    <head>

<style>
    .alert {
        transition: opacity 0.5s ease-in-out;
    }

    .fade-out {
        opacity: 0;
    }
</style>

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>CIS: Clinicalog</title>


        {{-- Laravel Vite Assets --}}
        @vite(['resources/css/app.css', 'resources/css/sidebar.css', 'resources/js/app.js'])

        {{-- Favicon --}}
        <link rel="icon" href="{{ asset('ClinicaLog.ico') }}" type="image/x-icon" />


        {{-- Icons --}}
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <link href="https://unpkg.com/css.gg/icons/all.css" rel="stylesheet" />

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

            body.dark-mode {
                background-color: #212529 !important;
                shadow: none;
            }

            .dark-mode .navbar,
            .dark-mode .dropdown-menu,
            .dark-mode .modal-content,
            .dark-mode .card,
            .dark-mode .table,
            .dark-mode .sidebar,
            .dark-mode .input-group {
                background-color: #343a40 !important;
                color: #e0e0e0 !important;
                border-color: #343a40 !important;
            }

            .dark-mode .table th,
            .dark-mode .table td,
            .dark-mode .page-item {
                background-color: #343a40 !important;
                color: #f8f9fa !important;
            }

            .dark-mode .form-group-default,
            .dark-mode .form-control,
            .dark-mode .form-select {
                background-color: #212529 !important;
                color: #f8f9fa !important;
                border-color: #2c2e30ff !important;
            }

            .dark-mode .card-title,
            .dark-mode .card-category,
            .dark-mode label,
            .dark-mode .dropdown-title,
            .dark-mode .see-all,
            .dark-mode .notif-content,
            .dark-mode .time,
            .dark-mode .text-muted,
            .dark-mode .dropdown-item,
            .dark-mode .dropdown-divider {
                color: #ddd7d7 !important;
            }

            .dark-mode .btn-primary,
            .dark-mode .nav-pattable {
                background-color: #db6079 !important;
                border-color: #db6079 !important;
                color: #f8f9fa !important;
            }

            .dark-mode .btn-search {
                background-color: #212529 !important;
            }

            .dark-mode .nav-item.active {
                background-color: rgba(255, 255, 255, 0.1) !important;
            }

            .dark-mode .bg-light {
                background-color: #1f1f1f !important;
            }

            .dark-mode .text-dark {
                color: #ffffff !important;
            }

            .dark-mode .navbar-nav .topbar-user .profile-pic {
                color: #ddd7d7 !important;
            }

            .dark-mode .card {
                box-shadow: none;
            }

            .dark-mode h1 {
                text-shadow: none;
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

    </body>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        ['success', 'error', 'warning'].forEach(type => {
            const alertBox = document.getElementById(type + 'Alert');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.classList.add('fade-out');
                    setTimeout(() => {
                        alertBox.remove();
                    }, 500); // wait for fade effect
                }, 2000); // show for 2 seconds
            }
        });
    });
</script>


    </html>
