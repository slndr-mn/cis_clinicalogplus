@extends('admin.app')
@section('title', 'Add Student Patient')
@section('content')
{{ Breadcrumbs::render('patientRecord.addstudent') }}
    <div class="container" id="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h2>Add Student Patient</h2>
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Personal Details</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Form Starts Here -->
                            <form id="studentForm" action="patientcontrol.php" method="POST" enctype="multipart/form-data"
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

                                <!-- ID and Academic Info -->
                                <div class="row">
                                    <div class="col-md-2 mb-3">
                                        <label for="studentID" class="form-label">ID Number</label>
                                        <input type="text" class="form-control" id="studentID" name="studentID"
                                            placeholder="Enter ID number" required />
                                        <div class="invalid-feedback">ID number is required.</div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="program" class="form-label">Program</label>
                                        <select class="form-select form-control" id="program" name="program" required>
                                            <option value="">Select or add a program</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a program.</div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="major" class="form-label">Major</label>
                                        <select class="form-select form-control" id="major" name="major" required>
                                            <option value="">Select or add a major</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a major.</div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="year" class="form-label">Year</label>
                                        <select class="form-select form-control" id="year" name="year" required>
                                            <option selected disabled>Select Year</option>
                                            <option value="1">1st Year</option>
                                            <option value="2">2nd Year</option>
                                            <option value="3">3rd Year</option>
                                            <option value="4">4th Year</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a year.</div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="section" class="form-label">Section</label>
                                        <input type="text" class="form-control" id="section" name="section"
                                            placeholder="e.g., 3A" required />
                                        <div class="invalid-feedback">Section is required.</div>
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
                                        <button type="submit" class="btn btn-primary" id="addstudentpatient"
                                            name="addstudentpatient">Submit</button>
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

            function initializeSelect2WithSession() {
                $('#program').select2({
                    tags: true,
                    placeholder: "Select or add a Program",
                    allowClear: true
                });

                $('#major').select2({
                    tags: true,
                    placeholder: "Select or add a major",
                    allowClear: true
                });

                const programMajor = {
                    "Bachelor of Elementary Education (BEEd)": ["None"],
                    "Bachelor of Secondary Education (BSEd)": ["English", "Filipino", "Mathematics"],
                    "Bachelor of Technical-Vocational Teacher Education (BTVTEd)": ["Agricultural Crop Production",
                        "Animal Production"
                    ],
                    "Bachelor of Early Childhood Education (BECEd)": ["None"],
                    "Bachelor of Special Needs Education (BSNEd)": ["None"],
                    "Bachelor of Science in Information Technology (BSIT)": ["Information Security"],
                    "Bachelor of Science in Agricultural and Biosystems Engineering (BSABE)": ["None"],
                    "Bachelor of Science in Agriculture (BSA)": ["None"],
                    "Bachelor of Science in Forestry (BSF)": ["None"],
                    "Master of Engineering in Environmental Management (MEEM)": ["None"],
                    "Master of Science in Education (MSE)": ["None"],
                    "Master of Science in Environmental Resource Management (MSERM)": ["None"],
                    "Master of Science in Agriculture (MSA)": ["None"],
                    "Master of Science in Land and Water Resource Technology (MS LawTreat)": ["None"],
                    "Master of Science in Horticulture (MS Horti)": ["None"],
                    "Master of Science in Forestry (MSF)": ["None"],
                    "Master of Science in Soil Science (MS Soil Science)": ["None"],
                    "Master of Extension Education (MExEd)": ["None"],
                    "Master of Science in Agricultural Extension (MS AgEx)": ["None"],
                    "Doctor of Education (EdD)": ["None"],
                    "Doctor of Philosophy in Horticulture (PhD Horti)": ["None"],
                    "School of Medicine (SoM)": ["None"],
                };

                // Populate the 'program' select options
                Object.keys(programMajor).forEach(program => {
                    $('#program').append(new Option(program, program, false, false));
                });

                // Fetch stored values from sessionStorage
                const savedProgram = sessionStorage.getItem('selectedprogram'); // Use consistent variable name
                const savedMajor = sessionStorage.getItem('selectedmajor'); // Same for major

                // If a program was saved, set it as the selected value
                if (savedProgram) {
                    $('#program').val(savedProgram).trigger('change');
                }

                // Handle program change
                $('#program').change(function() {
                    const selectedProgram = $(this).val();

                    // Clear and populate the 'major' select options based on the selected program
                    $('#major').empty().append('<option value="" disabled selected>Select or add a major</option>');
                    const majors = programMajor[selectedProgram] || [];
                    majors.forEach(major => {
                        $('#major').append(new Option(major, major, false, false));
                    });

                    // If the saved program and major match, preselect the major
                    if (selectedProgram === savedProgram && savedMajor) {
                        $('#major').val(savedMajor).trigger('change');
                    }

                    // Store the selected program in sessionStorage
                    sessionStorage.setItem('selectedprogram', selectedProgram);
                });

                // Handle major change
                $('#major').on('change', function() {
                    const selectedMajor = $(this).val();
                    console.log('Selected major: ', selectedMajor);

                    // Store the selected major in sessionStorage
                    sessionStorage.setItem('selectedmajor', selectedMajor);
                });

                // If a saved program exists, prepopulate the 'major' select options
                if (savedProgram) {
                    const majors = programMajor[savedProgram] || [];
                    majors.forEach(major => {
                        $('#major').append(new Option(major, major, false, false));
                    });

                    // If a saved major exists, preselect it
                    if (savedMajor) {
                        $('#major').val(savedMajor).trigger('change');
                    }
                }
            }

            // Function to restore form fields from sessionStorage
            function restoreFormFields() {
                const formFields = ['lastName', 'firstName', 'middleName', 'dob', 'sex', 'studentID', 'program', 'major',
                    'year', 'section', 'region', 'province', 'municipality', 'barangay', 'street', 'email', 'contactNumber',
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
            function confirmCancelPatient() {
                $('#canceladdpatient').click(function(event) {
                    event.preventDefault();

                    let isFormFilled = false;

                    $('#studentForm input, studentForm select, studentForm textarea').each(function() {
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


            (function() {
                'use strict';
                const form = document.getElementById('studentForm');
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
