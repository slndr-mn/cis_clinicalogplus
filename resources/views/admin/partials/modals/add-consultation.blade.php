<!-- Add Consultation Modal -->
<div class="modal fade" id="addConsultationModal" tabindex="-1" role="dialog" aria-labelledby="addConsultationModalLabel"
    aria-hidden="true">
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
                                <input type="text" id="pname" name="pname" class="form-control"
                                    placeholder="Name or ID" autocomplete="off" readonly>
                                <input type="hidden" id="selected_patient_id" name="selected_patient_id">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="Diagnosis">Diagnosis:</label>
                                <textarea id="Diagnosis" name="Diagnosis" class="form-control" placeholder="Type the diagnosis (e.g., Hypertension)"
                                    rows="2" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group mb-3">
                                <label for="prescribemed">Medicine:</label>
                                <div class="row g-2 align-items-end">
                                    <div class="col-md-7">
                                        <input type="text" id="prescribemed" name="prescribemed" class="form-control"
                                            placeholder="Search medicine" autocomplete="off">
                                        <input type="hidden" id="selected_medicine_id" name="selected_medicine_id">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" id="presmedqty" name="presmedqty" class="form-control"
                                            placeholder="Qty" min="1" required>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn w-100" id="addMedicineBtn"
                                            style="background-color:#e75480;color:#fff;">Add</button>
                                    </div>
                                </div>
                                <div id="med-suggestion" class="form-control mt-2" style="display: none;"></div>
                                <div id="qty-message" class="text-danger mt-1" style="color: red; display: none;"></div>
                                <div id="added-medicine-list" class="mt-2"></div>
                            </div>
                        </div>
                        @push('scripts')
                            <script>
                                $(document).ready(function() {
                                    var addedMedicines = [];

                                    function renderMedicineList() {
                                        var $list = $('#added-medicine-list');
                                        $list.empty();
                                        addedMedicines.forEach(function(med, idx) {
                                            $list.append(
                                                '<span class="badge rounded-pill me-2 d-inline-flex align-items-center" style="background:#fff;color:#888;font-size:1rem;padding:0.6em 1em 0.6em 1em;border:1px solid #ccc;">' +
                                                med.name +
                                                ' <span class="bg-white text-secondary ms-2 px-2 py-1 rounded-pill" style="font-size:0.9em;border:1px solid #eee;">' +
                                                med.qty + '</span>' +
                                                '<button type="button" class="btn btn-sm btn-close ms-2 remove-medicine" data-idx="' +
                                                idx + '" style="font-size:0.9em;filter:invert(0.5);"></button>' +
                                                '</span>'
                                            );
                                        });
                                    }

                                    $('#addMedicineBtn').on('click', function() {
                                        var medName = $('#prescribemed').val().trim();
                                        var medId = $('#selected_medicine_id').val();
                                        var qty = $('#presmedqty').val();
                                        if (!medName) {
                                            $('#qty-message').text('Please enter/select a medicine.').show();
                                            return;
                                        }
                                        if (!qty || qty < 1) {
                                            $('#qty-message').text('Please enter a valid quantity.').show();
                                            return;
                                        }
                                        $('#qty-message').hide();
                                        addedMedicines.push({
                                            name: medName,
                                            id: medId,
                                            qty: qty
                                        });
                                        renderMedicineList();
                                        $('#prescribemed').val('');
                                        $('#selected_medicine_id').val('');
                                        $('#presmedqty').val('');
                                    });

                                    $('#added-medicine-list').on('click', '.remove-medicine', function() {
                                        var idx = $(this).data('idx');
                                        addedMedicines.splice(idx, 1);
                                        renderMedicineList();
                                    });

                                    // On form submit, add medicines as hidden inputs
                                    $('#addConsultationForm').on('submit', function() {
                                        // Remove previous hidden fields
                                        $('.added-medicine-hidden').remove();
                                        addedMedicines.forEach(function(med, idx) {
                                            $('<input>').attr({
                                                type: 'hidden',
                                                name: 'medicines[' + idx + '][name]',
                                                value: med.name,
                                                class: 'added-medicine-hidden'
                                            }).appendTo('#addConsultationForm');
                                            $('<input>').attr({
                                                type: 'hidden',
                                                name: 'medicines[' + idx + '][id]',
                                                value: med.id,
                                                class: 'added-medicine-hidden'
                                            }).appendTo('#addConsultationForm');
                                            $('<input>').attr({
                                                type: 'hidden',
                                                name: 'medicines[' + idx + '][qty]',
                                                value: med.qty,
                                                class: 'added-medicine-hidden'
                                            }).appendTo('#addConsultationForm');
                                        });
                                    });
                                });
                            </script>
                        @endpush
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="presmednotes">Notes:</label>
                                <textarea id="presmednotes" name="presmednotes" class="form-control"
                                    placeholder="Enter any notes regarding the treatment (optional)" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group mb-3">
                                <label for="Remarks">Remarks:</label>
                                <textarea id="Remarks" name="Remarks" class="form-control"
                                    placeholder="Enter any important remarks (e.g., follow-up needed)" rows="3" required></textarea>
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
