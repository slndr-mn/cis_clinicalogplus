<div class="modal fade" id="editMedModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> Edit</span>
                    <span class="fw-light"> Medicine Stock</span>
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="edit-exit">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- FRONT-END ONLY: No real form submission -->
            <form  id="editForm" action="{{ route('admin.upmedstock') }}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="fw-light">Date & Time Added: <span id="editdatetimeadded">2025-07-07 08:00</span>
                            </p>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>ID</label>
                                <input id="editid" name="editid" type="text" class="form-control" readonly
                                    value="00123">
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="editname">Medicine Name</label>
                                <select id="editname" name="editname" class="form-control">
                                    <option value="" disabled selected hidden>Choose medicine</option>
                                    @foreach ($medicines as $med)
                                        <option value="{{ $med->medicine_id }}">{{ $med->medicine_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Quantity</label>
                                <input id="editquantity" name="editquantity" type="number" class="form-control"
                                    value="100">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Dosage Strength</label>
                                <input id="editDS" name="editDS" type="text" class="form-control" value="500mg">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Expiration Date</label>
                                <input id="editED" name="editED" type="date" class="form-control"
                                    value="2026-12-31">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label for="editunit">Medicine Unit</label>
                                <select id="editunit" name="editunit" class="form-control">
                                    <option value="Sachet">Sachet</option>
                                    <option value="Capsule">Capsule</option>
                                    <option value="Tablet">Tablet</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Disable</label>
                                <select id="editDisable" name="editDisable" class="form-control">
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary" id="updatemedicine">Edit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="edit-close">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
  $(document).on('click', '.editButton', function() {
        var row = $(this).closest('tr');
        var id = row.data('id');
        var name = row.data('medid');
        var unit = row.data('unit');
        var qty = row.data('qty');
        var dosage = row.data('dosage');
        var dateadded = row.data('dateadded');
        var expirationdt = row.data('expirationdt');
        var disable = row.data('disable'); 

        $("#editid").val(id); 
        $("#editname").val(name); 
        $("#editunit").val(unit);
        $("#editquantity").val(qty);
        $("#editDS").val(dosage);
        $("#editdatetimeadded").text(dateadded);
        $("#editED").val(expirationdt);
        $("#editDisable").val(disable); 

        $("#editname option").filter(function() {
            return $(this).text() == name; 
        }).prop('selected', true);

        
        var myModal = new bootstrap.Modal(document.getElementById('editMedModal'));
        myModal.show();
    });

</script>