<div class="modal fade" id="addMedModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> New</span>
                    <span class="fw-light"> Medicine Stock </span>
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Removed backend form route and CSRF -->
            <form method="POST" action="{{ route('admin.addmedstock') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="admin_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="medstock_dateadded" value="{{ now()->format('Y-m-d') }}">
                    <input type="hidden" name="medstock_timeadded" value="{{ now()->format('H:i:s') }}">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label for="addname">Medicine Name</label>
                                <select id="addname" name="medicine_id" class="form-control" required>
                                    <option value="" disabled selected hidden>Choose medicine</option>
                                    @foreach ($medicines as $med)
                                        <option value="{{ $med->medicine_id }}">{{ $med->medicine_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label>Quantity</label>
                                <input id="addquantity" name="medstock_qty" type="number" class="form-control"
                                    placeholder="fill quantity" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Dosage Strength</label>
                                <input id="addDS" name="medstock_dosage" type="text" class="form-control"
                                    placeholder="fill dosage strength">
                            </div>
                        </div>

                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label for="addunit">Medicine Unit</label>
                                <select id="addunit" name="medstock_unit" class="form-control" required>
                                    <option value="" disabled selected>Select a unit</option>
                                    <option value="Sachet">Sachet</option>
                                    <option value="Capsule">Capsule</option>
                                    <option value="Tablet">Tablet</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Expiration Date</label>
                                <input id="addED" name="medstock_expirationdt" type="date" class="form-control"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>
