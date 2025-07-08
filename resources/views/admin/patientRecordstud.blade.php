@extends('admin.app')
@section('title', 'Patient Records - Student')
@section('content')
    <div class="container" id="content">
        <div class="page-inner">
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border"
                                role="tablist">
                                <li>
                                    <a class="nav-link" href="patient-record.php" role="tab">All</a>
                                </li>
                                <li>
                                    <a class="nav-link  active" href="patient-recordstud.php" role="tab">Student</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="patient-recordfac.php" role="tab">Faculty</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="patient-recordstaff.php" role="tab">Staff</a>
                                </li>
                                <li>
                                    <a class="nav-link" href="patient-recordexten.php" role="tab">Extension</a>
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
                                                    <a href="addstudent.php">
                                                        <button type="button"
                                                            class="btn btn-primary btn-round ms-auto custom-button"
                                                            id="addbutton">
                                                            Student
                                                        </button>
                                                    </a>
                                                    <!-- Button for Staff Patient -->
                                                    <a href="addfaculty.php">
                                                        <button type="button"
                                                            class="btn btn-primary btn-round ms-auto custom-button"
                                                            id="addbutton">
                                                            Faculty
                                                        </button>
                                                    </a>
                                                    <a href="addstaff.php">
                                                        <button type="button"
                                                            class="btn btn-primary btn-round ms-auto custom-button"
                                                            id="addbutton">
                                                            Staff
                                                        </button>
                                                    </a>
                                                    <a href="addextension.php">
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
                                                <th>Program & Major</th>
                                                <th>Year & Section</th>
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
                                                <th>Program & Major</th>
                                                <th>Year & Section</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $patientTables = new PatientTablesbyType($conn);
                                            $students = $patientTables->getAllStudents();
                                            $counter = 1;

                                            foreach ($students as $student) {
                                                // Determine the status and color for each student
                                                $statusText = isset($student->student_status) && $student->student_status == 'Inactive' ? 'Disabled' : 'Enabled';
                                                $statusColor = isset($student->student_status) && $student->student_status == 'Inactive' ? '#ff6961' : '#77dd77';

                                                echo '<tr>';
                                                echo '<td>' . $counter++ . '</td>';
                                                echo '<td>' . $student->full_name . '</td>';
                                                echo '<td>' . $student->student_email . '</td>';
                                                echo '<td>' . $student->student_sex . '</td>';
                                                echo '<td>' . $student->student_program . ' - ' . $student->student_major . '</td>';
                                                echo '<td>' . $student->student_year . ' - ' . $student->student_section . '</td>';

                                                // Status span with dynamic color and text
                                                echo '<td>
                                                                                    <span style="display: inline-block;
                                                                                                padding: 5px 10px;
                                                                                                border-radius: 50px;
                                                                                                background-color: ' .
                                                    $statusColor .
                                                    '; /* Color based on status */
                                                                                                color: white;
                                                                                                text-align: center;
                                                                                                min-width: 60px;">
                                                                                        ' .
                                                    $statusText .
                                                    '
                                                                                    </span>
                                                                                  </td>';

                                                echo '<td>
                                                                                <div class="form-button-action">
                                                                                    <button type="submit" class="btn btn-link btn-primary btn-lg viewButton"
                                                                                            data-id="' .
                                                    $student->patient_id .
                                                    '" data-type="' .
                                                    $student->patient_type .
                                                    '">
                                                                                        <i class="fa fa-eye"></i>
                                                                                    </button>
                                                                                    <button type="submit" class="btn btn-link btn-primary btn-lg editButton"
                                                                                            data-id="' .
                                                    $student->patient_id .
                                                    '" data-type="' .
                                                    $student->patient_type .
                                                    '">
                                                                                        <i class="fa fa-edit"></i>
                                                                                    </button>
                                                                                </div>
                                                                            </td>';
                                                echo '</tr>';
                                            }
                                            ?>
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
