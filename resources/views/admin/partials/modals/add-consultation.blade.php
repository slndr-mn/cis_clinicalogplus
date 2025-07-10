<!-- Add Consultation Modal -->
<div class="modal fade" id="addConsultationModal" tabindex="-1" role="dialog" aria-labelledby="addConsultationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="addConsultationModalLabel">Add Consultation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addConsultationForm" action="consultationcontrol.php" method="POST">
                    <input id="admin_id" name="admin_id" type="hidden" class="form-control" />
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="pname">Name or ID Number:</label>
                                <input type="text" id="pname" name="pname" class="form-control" placeholder="Name or ID" autocomplete="off" readonly>
                                <input type="hidden" id="selected_patient_id" name="selected_patient_id">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="Diagnosis">Diagnosis:</label>
                                <textarea id="Diagnosis" name="Diagnosis" class="form-control" placeholder="Type the diagnosis (e.g., Hypertension)" rows="2" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="prescribemed">Medicine:</label>
                                <input type="text" id="prescribemed" name="prescribemed" class="form-control" placeholder="Search medicine" autocomplete="off" required>
                                <div id="med-suggestion" class="form-control" style="display: none;"></div>
                                <input type="hidden" id="selected_medicine_id" name="selected_medicine_id" onchange="checkQuantity()">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="presmedqty">Quantity:</label>
                                <input type="number" id="presmedqty" name="presmedqty" class="form-control" placeholder="Enter quantity" min="1" required oninput="checkQuantity()">
                                <div id="qty-message" class="text-danger" style="color: red; display: none;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="presmednotes">Notes:</label>
                                <textarea id="presmednotes" name="presmednotes" class="form-control" placeholder="Enter any notes regarding the treatment (optional)" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="Remarks">Remarks:</label>
                                <textarea id="Remarks" name="Remarks" class="form-control" placeholder="Enter any important remarks (e.g., follow-up needed)" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 mt-auto">
                        <button type="submit" class="btn btn-primary" name="addcon" id="addcon">Submit</button>
                        <button type="reset" class="btn btn-secondary ms-2">Clear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
