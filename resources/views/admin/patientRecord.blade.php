@extends('admin.app')
@section('title', 'Patient Record')
@section('content')
    {{ Breadcrumbs::render('patientRecord') }}

    <div class="container" id="content">
        <div class="page-inner">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border"
                                role="tablist">
                                <li>
                                    <a href="{{ route('patientRecord') }}" class="nav-link nav-pattable">All</a>
                                </li>
                                <li>
                                    <a href="{{ route('patientRecordstud') }}" class="nav-link nav-pattable">Student</a>
                                </li>
                                <li>
                                    <a href="{{ route('patientRecordfac') }}" class="nav-link nav-pattable">Faculty</a>
                                </li>
                                <li>
                                    <a href="{{ route('patientRecordstaff') }}" class="nav-link nav-pattable">Staff</a>
                                </li>
                                <li>
                                    <a href="{{ route('patientRecordexten') }}" class="nav-link nav-pattable">Extension</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Patients</h4>
                                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#addPatientModal" id="addbutton">
                                        <i class="fa fa-plus"></i>
                                        Add Patient
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!-- Modal -->
                                <div class="modal fade" id="addPatientModal" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document" id="AddPatient">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title">
                                                    <span class="fw-mediumbold">Add Patient</span>
                                                </h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close" id="edit-exit">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="modalButton">
                                                    <!-- Button for Student Patient -->
                                                    <a href="{{ route('addStudent') }}">
                                                        <button type="button"
                                                            class="btn btn-primary btn-round ms-auto custom-button"
                                                            id="addbutton">
                                                            Student
                                                        </button>
                                                    </a>
                                                    <!-- Button for Faculty Patient -->
                                                    <a href="{{ route('addFaculty') }}">
                                                        <button type="button"
                                                            class="btn btn-primary btn-round ms-auto custom-button"
                                                            id="addbutton">
                                                            Faculty
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('addStaff') }}">
                                                        <button type="button"
                                                            class="btn btn-primary btn-round ms-auto custom-button"
                                                            id="addbutton">
                                                            Staff
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('addExtension') }}">
                                                        <button type="button"
                                                            class="btn btn-primary btn-round ms-auto custom-button"
                                                            id="addbutton">
                                                            Extension
                                                        </button>
                                                    </a>
                                                </form>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table id="add-patient" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Number</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Sex</th>
                                                <th>Type</th>
                                                <th>Status</th>
                                                <th style="width: 10%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $patients = [
                                                    [
                                                        'id' => 1,
                                                        'id_number' => '2023001',
                                                        'full_name' => 'Ashley Cruz',
                                                        'email' => 'ashley.cruz@gmail.com',
                                                        'sex' => 'female',
                                                        'type' => 'student',
                                                        'status' => 'active',
                                                    ],
                                                    [
                                                        'id' => 2,
                                                        'id_number' => '2023002',
                                                        'full_name' => 'Brian Lee',
                                                        'email' => 'brian.lee@gmail.com',
                                                        'sex' => 'male',
                                                        'type' => 'faculty',
                                                        'status' => 'inactive',
                                                    ],
                                                    [
                                                        'id' => 3,
                                                        'id_number' => '2023003',
                                                        'full_name' => 'Carla Santos',
                                                        'email' => 'carla.santos@gmail.com',
                                                        'sex' => 'female',
                                                        'type' => 'staff',
                                                        'status' => 'active',
                                                    ],
                                                    [
                                                        'id' => 4,
                                                        'id_number' => '2023004',
                                                        'full_name' => 'David Tan',
                                                        'email' => 'david.tan@gmail.com',
                                                        'sex' => 'male',
                                                        'type' => 'extension',
                                                        'status' => 'inactive',
                                                    ],
                                                ];
                                            @endphp
                                            @foreach ($patients as $i => $patient)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $patient['id_number'] }}</td>
                                                    <td>{{ $patient['full_name'] }}</td>
                                                    <td>{{ $patient['email'] }}</td>
                                                    <td>{{ $patient['sex'] }}</td>
                                                    <td>{{ $patient['type'] }}</td>
                                                    <td>
                                                        @if ($patient['status'] === 'active')
                                                            <span class="badge"
                                                                style="background:#e6f4ea;color:#219653;border:1.5px solid #219653;padding:0.4em 1em 0.4em 1em;border-radius:16px;">active</span>
                                                        @else
                                                            <span class="badge"
                                                                style="background:#faeaea;color:#c0392b;border:1.5px solid #c0392b;padding:0.4em 1em 0.4em 1em;border-radius:16px;">inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div style="display: flex; gap: 8px;">
                                                            @php
                                                                // Determine route names based on type
                                                                $profileRoutes = [
                                                                    'student' => 'patientProfilestud',
                                                                    'faculty' => 'patientProfilefaculty',
                                                                    'staff' => 'patientProfilestaff',
                                                                    'extension' => 'patientProfileextension',
                                                                ];
                                                                $editRoutes = [
                                                                    'student' => 'editStudent',
                                                                    'faculty' => 'editFaculty',
                                                                    'staff' => 'editStaff',
                                                                    'extension' => 'editExtension',
                                                                ];
                                                                $type = $patient['type'];
                                                            @endphp
                                                            <a href="{{ route($profileRoutes[$type], ['id' => $patient['id']]) }}"
                                                                class="btn btn-link btn-success btn-sm viewPatientButton"
                                                                title="View"><i class="fa fa-eye"></i></a>
                                                            <a href="{{ route($editRoutes[$type], ['id' => $patient['id']]) }}"
                                                                class="btn btn-link btn-primary btn-sm editPatientButton"
                                                                title="Edit"><i class="fa fa-edit"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot></tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#add-patient').DataTable({
                    responsive: true,
                    order: [
                        [2, 'asc']
                    ], // Optional: sort by 3rd column ascending
                    columnDefs: [{
                            orderable: false,
                            targets: [4, 5, 6, 7]
                        } // Disable sort on Sex, Type, Status, and Action columns
                    ],
                    paging: true, // Enable pagination
                    pageLength: 2, // Show 10 entries per page by default
                    lengthMenu: [5, 10, 25, 50, 100], // Options for number of rows per page
                });
            });
        </script>
    @endpush
@endsection
