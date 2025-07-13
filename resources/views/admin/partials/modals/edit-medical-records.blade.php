<div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">Edit File Name and Comment</span>
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="edit-exit">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!--Start Edit Form-->
                <form class="form" action="patientmedrecscontrol.php" method="POST">
                    <input type="hidden" class="form-control" id="patientid" name="patientid" />
                    <input type="hidden" class="form-control" id="patienttype" name="patienttype" />
                    <input id="admin_id" name="admin_id" type="hidden" class="form-control" />
                    <input type="hidden" id="editid" name="editid" class="form-control" />
                    <div class="row">
                        <div class="col-md-12 pe-0">
                            <div class="form-group form-group-default">
                                <label>File Name</label>
                                <input id="editfilename" name="editfilename" type="text" class="form-control" />
                            </div>
                        </div>
                        <!-- Date (display only, not editable) -->
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Date Uploaded</label>
                                <input id="editdate" name="editdate" type="text" class="form-control" readonly style="background:#f8f9fa;pointer-events:none;" />
                            </div>
                        </div>
                        <!-- Comment/Description -->
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Comment/Description</label>
                                <textarea id="editcomment" name="editcomment" rows="4" class="form-control"
                                    placeholder="Write a brief description or comment"></textarea>
                            </div>
                        </div>
                    </div>
                    <script>
                        
                        // Populate edit modal with correct file name, date, and comment/description
                        $(document).ready(function() {
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
                            $('#addmedrecord').on('click', '.editMedRecordButton', function() {
                                var $row = $(this).closest('tr');
                                var fileName = $row.find('td:first-child a').text().trim();
                                var date = $row.find('td:first-child span').text().trim();
                                // Assume comment is in the second or third td (adjust index as needed)
                                var comment = $row.find('td.comment, td[data-comment]').text().trim();
                                if (!comment) {
                                    // Try second or third td if class/data attribute not found
                                    comment = $row.find('td').eq(1).text().trim();
                                    if (!comment || comment === fileName || comment === date) {
                                        comment = $row.find('td').eq(2).text().trim();
                                    }
                                }
                                $('#editfilename').val(fileName);
                                $('#editdate').val(date);
                                $('#editcomment').val(comment);
                            });
                        });
                        // Delete button for medical record (SweetAlert confirmation and remove row)
                        $(document).ready(function() {
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
                        // Disable all fields except file name and comment, and ensure date is readonly
                        $(document).ready(function() {
                            $('#editRowModal').on('show.bs.modal', function() {
                                $('#editfilename, #editcomment').prop('readonly', false);
                                $('#editdate').prop('readonly', true).css({'background':'#f8f9fa','pointer-events':'none'});
                                $(this).find('input, textarea').not('#editfilename, #editcomment, #editdate, [type=hidden]').prop('readonly', true);
                            });

                            // Save changes for edit-medical-records (database-free, update table row in-place)
                            $('#editRowModal .form').on('submit', function(e) {
                                e.preventDefault();
                                var newFile = $('#editfilename').val();
                                var newComment = $('#editcomment').val();
                                var newDate = $('#editdate').val();
                                // Find the row in the table that matches the old file name and date
                                var $row = $('#addmedrecord tbody tr').filter(function() {
                                    var file = $(this).find('td:first-child a').text().trim();
                                    var date = $(this).find('td:first-child span').text().trim();
                                    return file === newFile || date === newDate;
                                }).first();
                                // Update the row's file name and comment
                                if ($row.length) {
                                    $row.find('td:first-child a').text(newFile);
                                    $row.find('td:first-child span').text(newDate);
                                    // If you want to show the comment somewhere, you can add it after the date
                                    // For now, just update the data-comment attribute for the view/edit buttons
                                    $row.find('.viewMedRecordButton, .editMedRecordButton').data('comment', newComment);
                                }
                                $('#editRowModal').modal('hide');
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Medical record updated.',
                                    icon: 'success',
                                    confirmButtonText: 'OK',
                                    confirmButtonColor: '#77dd77'
                                });
                            });
                        });
                    </script>


                    <!-- Modal Footer -->
                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-primary" name="editmedrecs">
                            Save changes
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>
                <!-- End Edit Form -->

                <!--End Edit Form-->
            </div>
        </div>
    </div>
</div>
