@extends('admin.app')
@section('title', 'Patient Profile Faculty')
@section('content')

    <!-- Main Content -->

    <div class="container">
        <div class="page-inner">
            <div class=row>
                <div class="mb-3">
                    <a href="patient-record.php" class="back-nav">
                        <i class="fas fa-arrow-left "></i> Back to Patients' Table
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
                                            Faculty
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row"
                                style="display: flex; flex-direction: column; align-items: center; text-align: center;">
                                <h5 style="color: #59535A; margin: 0;">#<span id="facultyID"></span></h5>
                                <h5 style="margin: 0;">
                                    <span id="lastName"></span><span>, </span><span id="firstName"></span> <span
                                        id="middleName"></span>
                                </h5>
                                <h5 style="color: #59535A; margin: 0;"><span id="college"></span></h5>
                                <h5 style="color: #59535A; margin: 0;">Department <span id="department"></span></h5>
                                <h5 style="color: #59535A; margin: 0;"><span id="role"></span></h5>
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

                <!-- Start Medical Record Table Section -->
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
                                            <tr>
                                                <td>
                                                    MedicalRecord1.pdf<br>
                                                    <span style="color: #888; font-style: italic;">2025-07-10 10:00</span>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-link btn-success btn-lg viewMedRecordButton"
                                                        title="View"><i class="fa fa-eye"></i></button>
                                                    <button type="button"
                                                        class="btn btn-link btn-primary btn-lg editMedRecordButton"
                                                        title="Edit"><i class="fa fa-edit"></i></button>
                                                    <button type="button"
                                                        class="btn btn-link btn-danger btn-lg deleteMedRecordButton"
                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    MedicalRecord2.pdf<br>
                                                    <span style="color: #888; font-style: italic;">2025-07-09 14:30</span>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-link btn-success btn-lg viewMedRecordButton"
                                                        title="View"><i class="fa fa-eye"></i></button>
                                                    <button type="button"
                                                        class="btn btn-link btn-primary btn-lg editMedRecordButton"
                                                        title="Edit"><i class="fa fa-edit"></i></button>
                                                    <button type="button"
                                                        class="btn btn-link btn-danger btn-lg deleteMedRecordButton"
                                                        title="Delete"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
                                        <tfoot>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Exteension 1<br>
                                                    <span style="color: #888;">Paracetamol (10)</span><br>
                                                    <span style="color: #888; font-style: italic;">2025-07-10</span>
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
                                            <tr>
                                                <td>
                                                    Diagnosis 2<br>
                                                    <span style="color: #888;">Ibuprofen (5)</span><br>
                                                    <span style="color: #888; font-style: italic;">2025-07-09</span>
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
                // View button for consultation (use event delegation for DataTables)
                $('#add-con').on('click', '.viewConButton', function() {
                    var row = $(this).closest('tr');
                    // Populate all modal fields from table row columns
                    $('#details_date').text(row.find('td:eq(0)').text());
                    $('#details_diagnosis').text(row.find('td:eq(1)').text());
                    $('#details_prescribed_medicine').text(row.find('td:eq(2)').text());
                    $('#details_clinician').text(row.find('td:eq(3)').text());
                    $('#details_notes').text(row.find('td:eq(4)').text());
                    $('#details_remark').text(row.find('td:eq(5)').text());
                    // Show the modal
                    $('#consultationDetailsModal').modal('show');
                });

                // Edit button for consultation
                $('.editConButton').on('click', function() {
                    var id = $(this).data('id');
                    // Open edit modal and populate with data
                    $('#yourModalId').modal('show');
                });

                // Delete button for consultation
                $('.deleteConButton').on('click', function() {
                    var id = $(this).data('id');
                    if (confirm('Are you sure you want to delete consultation with ID: ' + id + '?')) {
                        // Send AJAX request to delete
                        alert('Deleted consultation with ID: ' + id);
                    }
                });

            });
            $(document).ready(function() {
                // View button for medical record
                $('.viewMedRecordButton').on('click', function() {
                    var id = $(this).data('id');
                    // Open view modal or fetch and display details
                    $('#yourModalId').modal('show');
                });

                // Edit button for medical record
                $('.editMedRecordnButton').on('click', function() {
                    var id = $(this).data('id');
                    // Open edit modal and populate with data
                    $('#yourModalId').modal('show');
                });

                // Delete button for medical record
                $('.deleteMedRecordButton').on('click', function() {
                    var id = $(this).data('id');
                    if (confirm('Are you sure you want to delete consultation with ID: ' + id + '?')) {
                        // Send AJAX request to delete
                        alert('Deleted consultation with ID: ' + id);
                    }
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
