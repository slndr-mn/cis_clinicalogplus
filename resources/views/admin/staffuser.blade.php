@extends('admin.app')

@section('content')
<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<div class="container-fluid" id="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header"> 
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Add User</h4>
                            <button
                                class="btn btn-primary btn-round ms-auto"
                                data-bs-toggle="modal"
                                data-bs-target="#addRowModal"
                            >
                                <i class="fa fa-plus"></i>
                                Add User
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-row" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Profile</th>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>System Role</th>
                                        <th>Date Added</th>
                                        <th>Status</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Dummy users --}}
                                    <tr>
                                        <td><img src="{{ asset('img/profile1.jpg') }}" style="width:50px;height:50px;border-radius:50%;"></td>
                                        <td>20231001</td>
                                        <td>Doe, John A.</td>
                                        <td>john.doe@email.com</td>
                                        <td>Admin Officer</td>
                                        <td>Admin</td>
                                        <td>2024-07-01</td>
                                        <td><span style="
                                                display: inline-block; 
                                                padding: 5px 10px;
                                                border-radius: 50px;
                                                background-color: #77dd77;
                                                color: white; 
                                                text-align: center;
                                                min-width: 60px;">
                                                Active
                                            </span></td>
                                        <td><button class="btn btn-link btn-primary btn-lg editButton" data-bs-toggle="modal" data-bs-target="#editRowModal"><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('img/profile2.jpg') }}" style="width:50px;height:50px;border-radius:50%;"></td>
                                        <td>20231002</td>
                                        <td>Smith, Jane B.</td>
                                        <td>jane.smith@email.com</td>
                                        <td>Clerk</td>
                                        <td>Staff</td>
                                        <td>2024-06-20</td>
                                        <td> <span style="
                                                display: inline-block; 
                                                padding: 5px 10px;
                                                border-radius: 50px;
                                                background-color: #ff6961;
                                                color: white; 
                                                text-align: center;
                                                min-width: 60px;">
                                                Inactive
                                            </span></td>
                                        <td><button class="btn btn-link btn-primary btn-lg editButton" data-bs-toggle="modal" data-bs-target="#editUserModal"><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>               
</div>

{{-- Include Modals --}}
@include('admin.partials.modals.addUserModal')
@include('admin.partials.modals.editUserModal')

<!-- Include DataTables JS -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        $('#add-row').DataTable({
            responsive: true,
            order: [[2, 'asc']],
            columnDefs: [{ orderable: false, targets: [0, 8] }],
            paging: true,
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50, 100],
        });
    });
</script>
@endsection
