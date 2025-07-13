<!-- Consultation Edit Modal -->
<div class="modal fade" id="editConModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Edit</span>
                    <span class="fw-light"> Consultation </span>
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="edit-exit">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editConForm" action="consultationcontrol.php" method="POST">
                    <input id="admin_id" name="admin_id" type="hidden" class="form-control"
                        />
                    <input id="edit_consult_id" name="edit_consult_id" type="text" class="form-control" hidden />
                    <input id="edit_patient_id" name="edit_patient_id" type="text" class="form-control" hidden />
                    <div class="form-group mb-3">
                        <label>Patient Name</label>
                        <input id="edit_patient_name" name="edit_patient_name" type="text" class="form-control"
                            readonly />
                    </div>
                    <div class="form-group mb-3">
                        <label for="edit_diagnosis">Diagnosis</label>
                        <input id="edit_diagnosis" name="edit_diagnosis" type="text" class="form-control" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="edit_medicine">Edit Medicine</label>
                        <input id="edit_medicine" name="edit_medicine" type="text" class="form-control"
                            placeholder="Search medicine" autocomplete="off">
                        <div id="edit-suggestion" class="form-control" style="display: none;"></div>
                        <input type="hidden" id="edit_medicine_id" name="edit_medicine_id">
                    </div>

                    <script>
                        // Ensure only patient name and date are readonly, all other fields editable
                        // View button for consultation (show modal and populate all fields from data attributes)
                        $(document).ready(function() {
                            $('#add-con').on('click', '.viewConButton', function() {
                                var $btn = $(this);
                                var title = $btn.data('title') || '';
                                var medicine = $btn.data('medicine') || '';
                                var date = $btn.data('date') || '';
                                var diagnosis = $btn.data('diagnosis') || '';
                                var clinician = $btn.data('clinician') || '';
                                var notes = $btn.data('notes') || '';
                                var remarks = $btn.data('remarks') || '';
                                // Populate modal fields (adjust IDs as needed)
                                $('#consultationDetailsModal #details_con_title').text(title);
                                $('#consultationDetailsModal #details_con_medicine').text(medicine);
                                $('#consultationDetailsModal #details_con_date').text(date);
                                $('#consultationDetailsModal #details_con_diagnosis').text(diagnosis);
                                $('#consultationDetailsModal #details_con_clinician').text(clinician);
                                $('#consultationDetailsModal #details_con_notes').text(notes);
                                $('#consultationDetailsModal #details_con_remarks').text(remarks);
                                $('#consultationDetailsModal').modal('show');
                            });
                        });
                        // Edit button for consultation (show edit modal and populate fields)
                        $(document).ready(function() {
                            $('#add-con').on('click', '.editConButton', function() {
                                var $row = $(this).closest('tr');
                                var $btn = $(this);
                                // Try to get all data from data attributes if present
                                var title = $btn.data('title') || $row.find('td').contents().filter(function() { return this.nodeType === 3; }).text().trim();
                                var medicine = $btn.data('medicine') || $row.find('span').eq(0).text().trim();
                                var date = $btn.data('date') || $row.find('span').eq(1).text().trim();
                                var diagnosis = $btn.data('diagnosis') || '';
                                var clinician = $btn.data('clinician') || '';
                                var notes = $btn.data('notes') || '';
                                var remarks = $btn.data('remarks') || '';
                                // Populate modal fields (adjust IDs as needed)
                                $('#editConModal #edit_patient_name').val(title);
                                $('#editConModal #edit_medicine').val(medicine);
                                $('#editConModal #edit_date').val(date);
                                $('#editConModal #edit_diagnosis').val(diagnosis);
                                $('#editConModal #edit_notes').val(notes);
                                $('#editConModal #edit_remarks').val(remarks);
                                $('#editConModal #edit_clinician').val(clinician);
                                // Show the modal
                                $('#editConModal').modal('show');
                            });
                        });
                        $(document).ready(function() {
                            $('#edit_medicine').on('keyup', function() {
                                var query = $(this).val();
                                if (query.length > 2) {
                                    $.ajax({
                                        url: 'addconsultation.php',
                                        method: 'POST',
                                        data: {
                                            prescribemed: query
                                        },
                                        success: function(data) {
                                            $('#edit-suggestion').html(data).show();
                                        },
                                        error: function(xhr, status, error) {
                                            console.error('Error fetching suggestions:', error);
                                        }
                                    });
                                } else {
                                    $('#edit-suggestion').html('').hide();
                                }
                            });

                            // Make sure the suggestions are clickable
                            $(document).on('click', '.med-suggestion', function() {
                                var medName = $(this).text().split(' (')[0];
                                var medId = $(this).data('id');
                                $('#edit_medicine_id').val(medId);
                                $('#edit_medicine').val(medName);
                                $('#edit-suggestion').html('').hide();
                            });
                        });
                    </script>
                    <div class="form-group mb-3">
                        <label for="edit_quantity">Quantity</label>
                        <input id="edit_quantity" name="edit_quantity" type="number" min="1"
                            class="form-control" required />
                        <div id="qty-message" class="text-danger" style="color: red; display: none;"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="edit_notes">Notes</label>
                        <input id="edit_notes" name="edit_notes" type="text" class="form-control" />
                    </div>
                    <div class="form-group mb-3">
                        <label for="edit_remarks">Remarks</label>
                        <input id="edit_remarks" name="edit_remarks" type="text" class="form-control" required />
                    </div>
                    <div class="form-group mb-3">
                        <label for="edit_date">Date</label>
                        <input id="edit_date" name="edit_date" type="date" class="form-control" readonly />
                    </div>

                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-primary" name="editcon" id="editcon">Save</button>
                        <button type="submit" class="btn btn-danger" name="delete" id="delete">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
