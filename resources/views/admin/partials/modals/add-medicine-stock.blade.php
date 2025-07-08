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
      <form>
        <div class="modal-body">
          <!-- Dummy hidden input for admin -->
          <input type="hidden" name="admin_id" value="1">

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group form-group-default">
                <label for="addname">Medicine Name</label>
                <select id="addname" name="addname" class="form-control">
                  <option value="" disabled selected hidden>fill medicine name</option>
                  <!-- Dummy static options -->
                  <option value="1">Paracetamol</option>
                  <option value="2">Amoxicillin</option>
                  <option value="3">Ibuprofen</option>
                </select>
              </div>
            </div>

            <div class="col-md-6 pe-0">
              <div class="form-group form-group-default">
                <label>Quantity</label>
                <input id="addquantity" name="addquantity" type="number" class="form-control" placeholder="fill quantity">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Dosage Strength</label>
                <input id="addDS" name="addDS" type="text" class="form-control" placeholder="fill dosage strength">
              </div>
            </div>

            <div class="col-md-6 pe-0">
              <div class="form-group form-group-default">
                <label for="addunit">Medicine Unit</label>
                <select id="addunit" name="addunit" class="form-control">
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
                <input id="addED" name="addED" type="date" class="form-control">
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
