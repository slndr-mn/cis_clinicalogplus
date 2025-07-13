<div class="modal fade" id="addMedicalRecModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> New</span>
                    <span class="fw-light"> Medical Records </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="small">
                </p>
                <form class="form" action="patientmedrecscontrol.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="patientid" name="patientid" />
                    <input type="hidden" class="form-control" id="patienttype" name="patienttype" />
                    <input id="admin_id" name="admin_id" type="hidden" class="form-control" />
                    <div class="row">
                        <!-- Upload PDF (Medical Record File) -->
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Upload Medical Record (PDF only)</label>
                                <input id="uploadfile" name="uploadfile[]" type="file" class="form-control"
                                    accept="application/pdf" multiple required />
                            </div>
                        </div>
                    </div>

                    <!-- Submit and Close Buttons -->
                    <div class="modal-footer border-0">
                        <button type="submit" name="addmedicalrecs" class="btn btn-primary">
                            Add Medical Record
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            Close
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
