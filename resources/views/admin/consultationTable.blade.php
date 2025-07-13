<!-- Start Medical Record and consultation Table Section -->
                <div class="row">
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

@push('scripts')
<script>


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
        @endpush
