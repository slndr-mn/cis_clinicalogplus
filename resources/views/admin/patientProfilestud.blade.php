@extends('admin.app')
@section('title', 'Patient Profile Student')
@section('content')

    <!-- Main Content -->

    <div class="container">
        <div class="page-inner">
            <div class=row>
                <div class="mb-3">
                    <a href="{{ route('patientRecord') }}" class="back-nav">
                        <i class="fas fa-arrow-left"></i> Back to Patients' Table
                    </a>
                </div>
            </div>
            <div class="page-inner" id="content">

                <div class="row">
                    <div class="col-md-11 mb-3">
                        <h3 class="fw-bold mb-3">Patient's Profile</h3>
                    </div>
                    <div class="col-md-1  mb-3">
                        <button onclick="generatePDF()" class="btn btn-primary">Download</button>
                    </div>
                </div>

                <!-- Profile Section -->
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="profile-image">
                                <div class="card-header">
                                    <img id="profilePic" src="default-image.jpg" alt="Profile Image" />
                                    <div class="row">
                                        <span
                                            style="
                        display: inline-block;
                        padding: 5px 10px;
                        border-radius: 50px;
                        background-color: #DA6F65;
                        color: white;
                        text-align: center;
                        min-width: 60px;">
                                            Student
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row"
                                style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                <h5 style="color: #59535A; margin: 0;">#<span id="studentID"></span></h5>
                                <h5 style="margin: 0;">
                                    <span id="lastName"></span><span>, </span><span id="firstName"></span> <span
                                        id="middleName"></span>
                                </h5>
                                <h5 style="color: #59535A; margin: 0;"><span id="program"></span></h5>
                                <h5 style="color: #59535A; margin: 0;">Major in <span id="major"></span></h5>
                                <h5 style="color: #59535A; margin: 0;"><span id="year"></span> Year - <span
                                        id="section"></span></h5>
                                <p style="color: #888888; margin-top: 5px;">Status: <span id="Status"></span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Personal Details</h4>
                                </div>
                            </div>
                            <div class="card-body" id="InputInfo">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <h5 style=" margin: 0;"><span id="age"></span></h5>
                                        <label for="dob" class="form-label">Age</label>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h5 style=" margin: 0;"><span id="sex"></span></h5>
                                        <label for="dob" class="form-label">Sex</label>

                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <h5 style=" margin: 0;"><span id="dob"></span></h5>
                                        <label for="dob" class="form-label">Date of Birth</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <h5 style=" margin: 0;">
                                            <span id="street"></span>,
                                            <span id="barangay"></span>,
                                            <span id="municipality"></span>,
                                            <span id="province"></span>,
                                            <span id="region"></span>
                                        </h5>
                                        <label for="dob" class="form-label">Current Address (Strt./Prk., Brgy.,
                                            Municipality, Province, Region)</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <h5 style=" margin: 0;"><span id="email"></span></h5>
                                        <label for="dob" class="form-label">Email Address</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h5 style=" margin: 0;"><span id="contactNumber"></span></h5>
                                        <label for="dob" class="form-label">Contact Number</label>

                                    </div>
                                </div>
                                <div class="row">
                                    <h5 style="margin-top: 9px">Emergency Contact Information</h5>
                                    <div class="col-md-6 mb-3">
                                        <h5 style=" margin: 0;"><span id="emergencyContactName"></span> <label
                                                for="dob" class="form-label" id="relationship">//</label></h5>
                                        <label for="dob" class="form-label">Emergency Contact Name</label>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <h5 style=" margin: 0;"><span id="emergencyContactNumber"></span></h5>
                                        <label for="dob" class="form-label">Emergency Contact Number</label>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Profile Section -->

                <!-- Start Medical Record and consultationTable Section -->
                <?php
                // Example static data arrays for demonstration (no database)
                $medicalRecords = [
                    [
                        'file' => 'MedicalRecord1.pdf',
                        'date' => '2025-07-10 10:00',
                        'comment' => 'Routine checkup, all normal.',
                    ],
                    [
                        'file' => 'MedicalRecord2.pdf',
                        'date' => '2025-07-09 14:30',
                        'comment' => 'Follow-up for previous diagnosis.',
                    ],
                ];
                $consultations = [
                    [
                        'title' => 'Extension 1',
                        'medicine' => 'Paracetamol (10)',
                        'date' => '2025-07-10',
                    ],
                    [
                        'title' => 'Diagnosis 2',
                        'medicine' => 'Ibuprofen (5)',
                        'date' => '2025-07-09',
                    ],
                ];
                ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-equal-height">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">List of Medical Records</h4>
                                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#addMedicalRecModal">
                                        <i class="fa fa-plus"></i>
                                        Add Medical Record
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @include('admin.partials.modals.add-medical-records')
                                @include('admin.partials.modals.edit-medical-records')
                                <div class="table-responsive">
                                    <table id="addmedrecord" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>File Name</th>
                                                <th style="width: 50%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($medicalRecords as $record)
                                                <tr>
                                                    <td>
                                                        <a href="/storage/medical-records/{{ $record['file'] }}"
                                                            target="_blank"
                                                            style="text-decoration: underline; color: #007bff;">{{ $record['file'] }}</a><br>
                                                        <span
                                                            style="color: #888; font-style: italic;">{{ $record['date'] }}</span>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-link btn-success btn-lg viewMedRecordButton"
                                                            data-file="{{ $record['file'] }}"
                                                            data-date="{{ $record['date'] }}"
                                                            data-comment="{{ $record['comment'] }}" data-bs-toggle="modal"
                                                            data-bs-target="#medicalRecordDetailsModal" title="View"><i
                                                                class="fa fa-eye"></i></button>
                                                        <button type="button"
                                                            class="btn btn-link btn-primary btn-lg editMedRecordButton"
                                                            title="Edit"><i class="fa fa-edit"></i></button>
                                                        <button type="button"
                                                            class="btn btn-link btn-danger btn-lg deleteMedRecordButton"
                                                            title="Delete"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Medical Record Details Modal -->
                                <div class="modal fade" id="medicalRecordDetailsModal" tabindex="-1"
                                    aria-labelledby="medicalRecordDetailsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="medicalRecordDetailsModalLabel">Medical Record
                                                    Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>File Name:</strong> <a href="#"
                                                        id="details_med_file_link" target="_blank"><span
                                                            id="details_med_file"></span></a></p>
                                                <p><strong>Date Uploaded:</strong> <span id="details_med_date"></span></p>
                                                <p><strong>Comment:</strong> <span id="details_med_comment"></span></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-equal-height">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">List of Consultations</h4>
                                    <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                        data-bs-target="#addConsultationModal">
                                        <i class="fa fa-plus"></i>
                                        Add Consultation
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @include('admin.partials.modals.add-consultation')
                                @include('admin.partials.modals.edit-consultation')
                                {{-- Include the consultation details modal --}}
                                @include('admin.partials.modals.consultation-details')
                                <div class="table-responsive">
                                    <table id="add-con" class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Consultation</th>
                                                <th style="width: 50%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($consultations as $con)
                                                <tr>
                                                    <td>
                                                        {{ $con['title'] }}<br>
                                                        <span style="color: #888;">{{ $con['medicine'] }}</span><br>
                                                        <span
                                                            style="color: #888; font-style: italic;">{{ $con['date'] }}</span>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-link btn-success btn-lg viewConButton"
                                                            title="View"><i class="fa fa-eye"></i></button>
                                                        <button type="button"
                                                            class="btn btn-link btn-primary btn-lg editConButton"
                                                            title="Edit"><i class="fa fa-edit"></i></button>
                                                        <button type="button"
                                                            class="btn btn-link btn-danger btn-lg deleteConButton"
                                                            title="Delete"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of medical record and consultation tables --}}
            </div>
        </div>
    </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // View button for consultation (show modal and populate all fields)
                $('#add-con').on('click', '.viewConButton', function() {
                    var $row = $(this).closest('tr');
                    // Extract info from the row (adjust selectors as needed)
                    var title = $row.find('td').contents().filter(function() {
                        return this.nodeType === 3;
                    }).text().trim();
                    var medicine = $row.find('span').eq(0).text().trim();
                    var date = $row.find('span').eq(1).text().trim();
                    // If you have more fields, extract them here
                    // Show in modal (adjust modal and field IDs as needed)
                    $('#consultationDetailsModal #details_con_title').text(title);
                    $('#consultationDetailsModal #details_con_medicine').text(medicine);
                    $('#consultationDetailsModal #details_con_date').text(date);
                    // Show the modal
                    $('#consultationDetailsModal').modal('show');
                });
                // Delete button inside the edit modal (removes the correct row)
                $('#editRowModal').on('click', '#deleteMedRecord', function(e) {
                    e.preventDefault();
                    var fileName = $('#editfilename').val();
                    var date = $('#editdate').val();
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you really want to delete this medical record?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Find and remove the row in the table that matches the file name and date
                            var $row = $('#addmedrecord tbody tr').filter(function() {
                                var file = $(this).find('td:first-child a').text().trim();
                                var d = $(this).find('td:first-child span').text().trim();
                                return file === fileName && d === date;
                            }).first();
                            if ($row.length) $row.remove();
                            $('#editRowModal').modal('hide');
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Medical record has been deleted.',
                                icon: 'success',
                                confirmButtonColor: '#77dd77'
                            });
                        }
                    });
                });
                $('#addmedrecord').DataTable({
                    responsive: true,
                    order: [
                        [0, 'asc']
                    ], // Sort by Date column (1st column)
                    columnDefs: [{
                        orderable: false,
                        targets: [1] // Disable sort only on Action column (4th column, index 3)
                    }],
                    paging: true, // Enable pagination
                    pageLength: 5, // Show 5 entries per page by default
                    lengthMenu: [5, 10, 25, 50, 100], // Options for number of rows per page
                });

                $('#add-con').DataTable({
                    responsive: true,
                    order: [
                        [0, 'asc']
                    ], // Sort by Date column (1st column)
                    columnDefs: [{
                        orderable: false,
                        targets: [1] // Disable sort only on Action column (4th column, index 3)
                    }],
                    paging: true, // Enable pagination
                    pageLength: 5, // Show 5 entries per page by default
                    lengthMenu: [5, 10, 25, 50, 100], // Options for number of rows per page
                });
            });

            $(document).ready(function() {

                <?php if (isset($_SESSION['status']) && isset($_SESSION['message'])): ?>
                var status = '<?php echo $_SESSION['status']; ?>';
                var message = '<?php echo htmlspecialchars($_SESSION['message'], ENT_QUOTES); ?>';
                Swal.fire({
                    title: status === 'success' ? "Success!" : "Error!",
                    text: message,
                    icon: status,
                    confirmButtonText: "OK",
                    confirmButtonColor: status === 'success' ? "#77dd77" : "#ff6961"
                }).then(() => {
                    if (status === 'success') {
                        sessionStorage.clear();
                        window.location.href = "patient-studprofile.php";
                    }
                    <?php unset($_SESSION['status'], $_SESSION['message']); ?>
                });
                <?php endif; ?>


                function formatDateToWords(dateString) {
                    if (!dateString || (!dateString.includes('/') && !dateString.includes('-'))) {
                        return '';
                    }

                    const monthNames = [
                        "January", "February", "March", "April", "May", "June",
                        "July", "August", "September", "October", "November", "December"
                    ];

                    dateString = dateString.replace(/-/g, '/');

                    const [year, month, day] = dateString.split('/');

                    if (!year || !month || !day) return '';

                    const monthName = monthNames[parseInt(month, 10) - 1];
                    const dayNumber = parseInt(day, 10);

                    if (!monthName || isNaN(dayNumber)) return '';

                    return `${monthName} ${dayNumber}, ${year}`;
                }


                function getOrdinalSuffix(num) {
                    const suffixes = ["th", "st", "nd", "rd"];
                    const value = num % 100;
                    return suffixes[(value - 20) % 10] || suffixes[value] || suffixes[0];
                }

                $('#downloadBtn').on('click', function() {
                    const imageSrc = $('#profilePic').attr('src');
                    const link = document.createElement('a');
                    link.href = imageSrc;
                    link.download = 'profile-image.jpg';
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                });

            });


            $(document).ready(function() {

                // View button for medical record (show modal and populate fields)
                $('#addmedrecord').on('click', '.viewMedRecordButton', function() {
                    var file = $(this).data('file');
                    var date = $(this).data('date');
                    var comment = $(this).data('comment');
                    $('#details_med_file').text(file);
                    $('#details_med_file_link').attr('href', '/storage/medical-records/' + file);
                    $('#details_med_date').text(date);
                    $('#details_med_comment').text(comment);
                });

                // Edit button for medical record (open modal, populate fields, only file name and comment editable)
                $('#addmedrecord').on('click', '.editMedRecordButton', function() {
                    var $row = $(this).closest('tr');
                    var file = $row.find('td:first-child a').text().trim();
                    var date = $row.find('td:first-child span').text().trim();
                    var comment = $row.find('td:first-child span').next().text().trim();
                    // If comment is not found, fallback to data attribute or just the span text
                    if (!comment) {
                        comment = $row.find('td:first-child span').text().trim();
                    }
                    $('#editfilename').val(file).prop('readonly', false);
                    $('#editcomment').val(comment).prop('readonly', false);
                    $('#editdate').val(date).prop('readonly', true).css({
                        'background': '#f8f9fa',
                        'pointer-events': 'none'
                    });
                    // Disable all other fields if present
                    $('#editRowModal input, #editRowModal textarea').not(
                        '#editfilename, #editcomment, #editdate, [type=hidden]').prop('readonly', true);
                    $('#editRowModal').modal('show');
                });

                // Delete button for medical record
                $('#addmedrecord').on('click', '.deleteMedRecordButton', function() {
                    var $row = $(this).closest('tr');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: 'Do you really want to delete this medical record?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $row.remove();
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Medical record has been deleted.',
                                icon: 'success',
                                confirmButtonColor: '#77dd77'
                            });
                        }
                    });
                });
            });
        </script>

        <script>
            function convertImageToBase64(url, callback) {
                const img = new Image();
                img.crossOrigin = 'Anonymous'; // Prevent CORS issues
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    canvas.width = img.width;
                    canvas.height = img.height;
                    const ctx = canvas.getContext('2d');
                    ctx.drawImage(img, 0, 0);
                    const dataURL = canvas.toDataURL('image/png'); // Convert to base64
                    callback(dataURL);
                };
                img.onerror = function() {
                    callback(null); // Handle errors
                };
                img.src = url;
            }

            function convertImageToBase64Element(id) {
                const image = document.getElementById(id);
                const canvas = document.createElement('canvas');
                const ctx = canvas.getContext('2d');
                canvas.width = image.width;
                canvas.height = image.height;
                ctx.drawImage(image, 0, 0);

                // Convert canvas to base64
                const base64Image = canvas.toDataURL('image/png');
                return base64Image;
            }
        </script>
    @endpush
@endsection
