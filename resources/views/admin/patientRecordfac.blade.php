@extends('admin.app')
@section('title', 'Patient Records - Faculty')
@section('content')
{{ Breadcrumbs::render('patientRecord.faculty') }}
    <body>
        <!-- Main Content -->

        <div class="container" id="content">
            <div class="page-inner">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div>
                                <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border"
                                    role="tablist">
                                    <li>
                                        <a href="{{ route('patientRecord') }}" class="nav-link">All</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('patientRecordstud') }}" class="nav-link">Student</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('patientRecordfac') }}" class="nav-link">Faculty</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('patientRecordstaff') }}" class="nav-link">Staff</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('patientRecordexten') }}" class="nav-link">Extension</a>
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
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="add-patient" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name & ID</th>
                                                    <th>Email</th>
                                                    <th>Sex</th>
                                                    <th>College & Department</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Name & ID</th>
                                                    <th>Email</th>
                                                    <th>Sex</th>
                                                    <th>College & Department</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>John Doe (123456)</td>
                                                    <td>john.doe@example.com</td>
                                                    <td>john.doe@example.com</td>
                                                    <td>1</td>
                                                    <td>John Doe (123456)</td>
                                                    <td>john.doe@example.com</td>
                                                    <td></td>
                                                </tr>

                                                <tr>
                                                    <td>1</td>
                                                    <td>J D (123456)</td>
                                                    <td>john.doe@example.com</td>
                                                    <td>john.doe@example.com</td>
                                                    <td>1</td>
                                                    <td>John Doe (123456)</td>
                                                    <td>john.doe@example.com</td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
                        pageLength: 1, // Show 10 entries per page by default
                        lengthMenu: [5, 10, 25, 50, 100], // Options for number of rows per page
                    });
                });
            </script>
        @endpush
    @endsection
