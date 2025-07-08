<!-- Edit User Modal -->
<div class="modal fade" id="editRowModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title"><span class="fw-mediumbold">Edit Staff User's Profile</span></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" id="edit-exit">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- Edit Form -->
        <form id="editForm" action="#" method="POST" enctype="multipart/form-data">
          <input id="admin_id" name="admin_id" type="hidden" class="form-control" value="" />

          <div class="row">
            <div class="col-md-6">
              <p class="fw-light">Date Added: <span id="dateadded"></span></p>
            </div>

            <div class="col-md-12 text-center mb-4">
              <div class="profile-display">
                <img id="currentProfile" src="" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 150px; height: 150px;" />
                <br>
                <label for="editprofile" class="btn btn-outline-primary mt-3">Edit Profile</label>
                <input id="editprofile" name="editprofile" type="file" class="form-control d-none" accept=".png, .jpg, .jpeg" />
              </div>
            </div>

            <div class="col-md-12">
              <div class="form-group form-group-default">
                <label>ID</label>
                <input id="editid" name="editid" type="text" class="form-control" placeholder="fill ID" />
                <input id="editoldid" name="editoldid" type="text" class="form-control" hidden />
              </div>
            </div>
            <div class="col-md-6 pe-0">
              <div class="form-group form-group-default">
                <label>First Name</label>
                <input id="editfname" name="editfname" type="text" class="form-control" placeholder="fill first name" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Last Name</label>
                <input id="editlname" name="editlname" type="text" class="form-control" placeholder="fill last name" />
              </div>
            </div>
            <div class="col-md-6 pe-0">
              <div class="form-group form-group-default">
                <label>Middle Name</label>
                <input id="editmname" name="editmname" type="text" class="form-control" placeholder="fill middle name" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Email</label>
                <input id="editemail" name="editemail" type="text" class="form-control" placeholder="fill email" />
              </div>
            </div>
            <div class="col-md-6 pe-0">
              <div class="form-group form-group-default">
                <label>Position</label>
                <input id="editposition" name="editposition" type="text" class="form-control" placeholder="fill position" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>System Role</label>
                <select id="editrole" name="editrole" class="form-control">
                  <option value="Super Admin">Super Admin</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 pe-0">
              <div class="form-group form-group-default">
                <label>Status</label>
                <select id="editstatus" name="editstatus" class="form-control">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
                </select>
              </div>
            </div>
          </div>

          <div class="modal-footer border-0">
            <button type="submit" class="btn btn-primary" name="updateuser">Save changes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
