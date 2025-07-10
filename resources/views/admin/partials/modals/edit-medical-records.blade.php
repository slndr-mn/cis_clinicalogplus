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
                    <input type="hidden" class="form-control" id="patientid" name="patientid" + />
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
                        <!-- Comment/Description -->
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Comment/Description</label>
                                <textarea id="editcomment" name="editcomment" rows="4" class="form-control"
                                    placeholder="Write a brief description or comment"></textarea>
                            </div>
                        </div>
                    </div>


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
