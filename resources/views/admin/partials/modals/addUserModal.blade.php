<!-- Add User Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <span class="fw-mediumbold"> New</span>
                    <span class="fw-mediumbold"> Staff User </span> 
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body"> 
                <p class="small">Create new user for the system. Make sure to fill all of them.</p>
               
                <!-- Start Add Modal Form -->
                <form class="form" action="{{ route("admin.staffadd") }}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <input id="admin_id" name="admin_id" type="hidden" class="form-control" value="" />

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>ID</label>
                                <input id="id" name="id" type="text" class="form-control"
                                    placeholder="fill ID" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Profile Upload</label>
                                <input id="addprofile" name="addprofile" type="file" class="form-control"
                                    accept=".png, .jpg, .jpeg" />
                            </div>
                        </div>
                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label>First Name</label>
                                <input id="addfname" name="addfname" type="text" class="form-control"
                                    placeholder="fill first name" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Last Name</label>
                                <input id="addlname" name="addlname" type="text" class="form-control"
                                    placeholder="fill last name" required />
                            </div>
                        </div>
                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label>Middle Name</label>
                                <input id="addmname" name="addmname" type="text" class="form-control"
                                    placeholder="fill middle name" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Email</label>
                                <input id="email" name="email" type="text" class="form-control"
                                    placeholder="fill email" required />
                            </div>
                        </div>
                        <div class="col-md-6 pe-0">
                            <div class="form-group form-group-default">
                                <label>Position</label>
                                <input id="addposition" name="addposition" type="text" class="form-control"
                                    placeholder="fill position" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>System Role</label>
                                <select id="addrole" name="addrole" class="form-control">
                                    <option value="Super Admin">Super Admin</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pe-0">
                            <div class="mb-3">
                                <label for="addstatus" class="form-label">Status</label>
                                <select id="addstatus" name="addstatus" class="form-select">
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-primary" name="addstaff">Add</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
                <!-- End Add Modal Form -->
            </div>
        </div>
    </div>
</div>
