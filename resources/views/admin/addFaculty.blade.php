@extends('admin.app')
@section('title', 'Add Faculty Patient')
@section('content')
{{ Breadcrumbs::render('patientRecord.addfaculty') }}
    <!-- Main Content -->
    <div class="container" id="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Faculty Patient</h2>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Personal Details</h4>
                            </div>
                        </div>
                        <div class="card-body" id="InputInfo">
                            <!-- Form Starts Here -->
                            <form id="facultyForm" action="patientcontrol.php" method="POST" enctype="multipart/form-data"
                                novalidate>
                                <input id="admin_id" name="admin_id" type="hidden" class="form-control"
                                     />
                                <!-- Name Fields -->
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="Profile" class="form-label">Profile Upload</label>
                                        <input id="addprofile" name="addprofile" type="file" class="form-control"
                                            accept=".png, .jpg, .jpeg" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="lastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName"
                                            placeholder="Enter last name" required />
                                        <div class="invalid-feedback">Last name is required.</div>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="firstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName"
                                            placeholder="Enter first name" required />
                                        <div class="invalid-feedback">First name is required.</div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="middleName" class="form-label">Middle Name</label>
                                        <input type="text" class="form-control" id="middleName" name="middleName"
                                            placeholder="Enter middle name" />
                                    </div>

                                    <!-- Date of Birth -->
                                    <div class="col-md-2 mb-3">
                                        <label for="dob" class="form-label">Date of Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob" required />
                                        <div class="invalid-feedback">Date of birth is required.</div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="sex" class="form-label">Sex</label>
                                        <select class="form-select form-control" id="sex" name="sex" required>
                                            <option selected disabled>Select Sex</option>
                                            <option value="Female">Female</option>
                                            <option value="Male">Male</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a gender.</div>
                                    </div>
                                </div>

                                <!-- ID and Work Info -->
                                <div class="row">
                                    <div class="col-md-2 mb-3">
                                        <label for="facultyID" class="form-label">ID Number</label>
                                        <input type="text" class="form-control" id="facultyID" name="facultyID"
                                            placeholder="Enter ID number" required />
                                        <div class="invalid-feedback">ID number is required.</div>
                                    </div>


                                    <!-- College Dropdown -->
                                    <div class="col-md-4 mb-3">
                                        <label for="college" class="form-label">College</label>
                                        <select class="form-select form-control" id="college" name="college" required>
                                        </select>
                                        <div class="invalid-feedback">Please select a college.</div>
                                    </div>

                                    <!-- department Dropdown -->
                                    <div class="col-md-4 mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <select class="form-select form-control" id="department" name="department" required>
                                            <option value="">Select or add a department</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a department.</div>
                                    </div>

                                    <div class="col-md-2 mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <input type="text" class="form-control" id="role" name="role"
                                            placeholder="Enter Role" required />
                                        <div class="invalid-feedback">Please select a role.</div>
                                    </div>
                                </div>

                                <!-- Address Fields -->
                                <h5>Current Address</h5>
                                <div class="row">
                                    <!-- Region Dropdown -->
                                    <div class="col-md-2 mb-3">
                                        <label for="region" class="form-label">Region</label>
                                        <select class="form-select form-control" id="region" name="region" required>
                                            <option value="" disabled selected>Select Region</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a region.</div>
                                    </div>

                                    <!-- Province Dropdown -->
                                    <div class="col-md-3 mb-3">
                                        <label for="province" class="form-label">Province</label>
                                        <select class="form-select form-control" id="province" name="province" required>
                                            <option value="" disabled selected>Select Province</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a province.</div>
                                    </div>

                                    <!-- Municipality Dropdown -->
                                    <div class="col-md-3 mb-3">
                                        <label for="municipality" class="form-label">Municipality</label>
                                        <select class="form-select form-control" id="municipality" name="municipality"
                                            required>
                                            <option value="" disabled selected>Select Municipality</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a municipality.</div>
                                    </div>

                                    <!-- Barangay Dropdown -->
                                    <div class="col-md-2 mb-3">
                                        <label for="barangay" class="form-label">Barangay</label>
                                        <select class="form-select form-control" id="barangay" name="barangay" required>
                                            <option value="" disabled selected>Select Barangay</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a barangay.</div>
                                    </div>

                                    <!-- Street Input (Text Field) -->
                                    <div class="col-md-2 mb-3">
                                        <label for="street" class="form-label">Purok/Block No./Street</label>
                                        <input type="text" class="form-control" id="street" name="street"
                                            placeholder="Enter street address" required />
                                    </div>
                                </div>


                                <!-- Contact Information -->
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email" required />
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="contactNumber" class="form-label">Contact Number</label>
                                        <input type="tel" class="form-control" id="contactNumber"
                                            name="contactNumber" placeholder="Enter contact number" required />
                                        <div class="invalid-feedback">Please enter a valid contact number.</div>
                                    </div>
                                </div>

                                <!-- Emergency Contact Information -->
                                <h5>Emergency Contact Information</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="emergencyContactName" class="form-label">Emergency Contact
                                            Name</label>
                                        <input type="text" class="form-control" id="emergencyContactName"
                                            name="emergencyContactName" placeholder="Enter emergency contact name" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="relationship" class="form-label">Relationship</label>
                                        <input type="text" class="form-control" id="relationship" name="relationship"
                                            placeholder="Enter relationship" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="emergencyContactNumber" class="form-label">Emergency Contact
                                            Number</label>
                                        <input type="tel" class="form-control" id="emergencyContactNumber"
                                            name="emergencyContactNumber" placeholder="Enter emergency contact number" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary" id="addfacultypatient"
                                            name="addfacultypatient">Submit</button>
                                        <button type="button" class="btn btn-primary ms-3"
                                            id="canceladdpatient">Back</button>
                                    </div>
                                </div>
                            </form>
                            <!-- End of Form -->
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
            function handleLoadError(response, status, xhr) {
                if (status == "error") {
                    console.log("Error loading file: " + xhr.status + " " + xhr.statusText);
                }
            }

            // Function to initialize Select2 with session storage support
            function initializeSelect2WithSession() {

                // Initialize Select2 for both dropdowns
                $('#college').select2({
                    tags: true, // Enable adding new colleges
                    placeholder: "Select or add a college",
                    allowClear: true
                });

                $('#department').select2({
                    tags: true, // Enable adding new departments
                    placeholder: "Select or add a department",
                    allowClear: true
                });


                const collegeDepartments = {
                    "College of Teacher Education and Technology": [
                        "Department of Elementary Education",
                        "Department of Special Needs Education",
                        "Department of Early Childhood Education",
                        "Department of Secondary Education",
                        "Department of Science in Information Technology",
                        "Department of Technical-Vocational Teacher Education"
                    ],
                    "College of Engineering": [
                        "Department of Science in Agricultural and Biosystems Engineering"
                    ],
                    "School of Medicine": [
                        "Doctor of Medicine"
                    ]
                };

                Object.keys(collegeDepartments).forEach(college => {
                    $('#college').append(new Option(college, college, false, false));
                });

                const savedCollege = sessionStorage.getItem('selectedCollege');
                const savedDepartment = sessionStorage.getItem('selectedDepartment');

                if (savedCollege) {
                    $('#college').val(savedCollege).trigger('change');
                }

                $('#college').change(function() {
                    const selectedCollege = $(this).val();

                    $('#department').empty().append(
                        '<option value="" disabled selected>Select or add a department</option>');
                    const departments = collegeDepartments[selectedCollege] || [];
                    departments.forEach(department => {
                        $('#department').append(new Option(department, department, false, false));
                    });

                    if (selectedCollege === savedCollege && savedDepartment) {
                        $('#department').val(savedDepartment).trigger('change');
                    }

                    sessionStorage.setItem('selectedCollege', selectedCollege);
                });

                $('#department').on('change', function() {
                    const selectedDepartment = $(this).val();
                    console.log('Selected department: ', selectedDepartment);

                    sessionStorage.setItem('selectedDepartment', selectedDepartment);
                });

                if (savedCollege) {
                    const departments = collegeDepartments[savedCollege] || [];
                    departments.forEach(department => {
                        $('#department').append(new Option(department, department, false, false));
                    });

                    if (savedDepartment) {
                        $('#department').val(savedDepartment).trigger('change');
                    }
                }
            }

            // Function to restore form fields from sessionStorage
            function restoreFormFields() {
                const formFields = ['lastName', 'firstName', 'middleName', 'dob', 'sex', 'facultyID', 'college', 'department',
                    'role', 'region', 'province', 'municipality', 'barangay', 'street', 'email', 'contactNumber',
                    'emergencyContactName', 'relationship', 'emergencyContactNumber'
                ];

                formFields.forEach(function(field) {
                    if (sessionStorage.getItem(field)) {
                        $('#' + field).val(sessionStorage.getItem(field));
                    }
                });

                formFields.forEach(function(field) {
                    $('#' + field).on('input', function() {
                        sessionStorage.setItem(field, $(this).val());
                    });
                });
            }

            // Function to confirm cancel action
            // Function to confirm cancel action
            function confirmCancelPatient() {
                $('#canceladdpatient').click(function(event) {
                    event.preventDefault();

                    let isFormFilled = false;

                    $('#facultyForm input, facultyForm select, facultyForm textarea').each(function() {
                        if ($(this).val() !== '') {
                            isFormFilled = true; // Mark as filled if any field contains a value
                            return false; // Exit loop as we found a filled field
                        }
                    });

                    // If form is filled, show the confirmation dialog
                    if (isFormFilled) {
                        Swal.fire({
                            title: "Are you sure?",
                            text: "Do you really want to cancel adding this patient? Unsaved information will be lost.",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes, cancel it!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                sessionStorage.clear();
                                window.location.href = "patient-record.php";
                            }
                        });
                    } else {
                        // If no fields are filled, go back without confirmation
                        window.location.href = "patient-record.php";
                    }
                });
            }
            // JavaScript to apply custom Bootstrap validation
            (function() {
                'use strict';

                // Fetch the form element
                const form = document.getElementById('facultyForm');

                // Apply Bootstrap validation styles
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            })();
        </script>
    @endpush
@endsection
