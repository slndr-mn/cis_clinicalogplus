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
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addRowModal">
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
                                    <tbody id="userTableBody">
                                        @foreach ($adminusers as $adminuser)
                                            {{-- Dummy users --}}
                                            <tr>
                                                <td><img src="{{ $adminuser->user_profile ? route('profile-image', $adminuser->user_profile) : asset('img/default-image.jpg') }}"
                                                        style="width:50px;height:50px;border-radius:50%;"></td>
                                                <td>{{ $adminuser->user_idnum }}</td>
                                                <td>{{ $adminuser->user_fname }} {{ $adminuser->user_mname }}
                                                    {{ $adminuser->user_lname }}</td>
                                                <td>{{ $adminuser->user_email }}</td>
                                                <td>{{ $adminuser->user_position }}</td>
                                                <td>{{ $adminuser->user_role }}</td>
                                                <td>{{ $adminuser->created_at }}</td>
                                                <td><span
                                                        style="
                                                    display: inline-block; 
                                                    padding: 5px 10px;
                                                    border-radius: 50px;
                                                    background-color: {{ $adminuser->user_status === 'Active' ? '#77dd77' : '#ff6961' }};
                                                    color: white; 
                                                    text-align: center;
                                                    min-width: 60px;">
                                                        {{ $adminuser->user_status }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="d-flex gap-1">
                                                        <button class="btn btn-link btn-lg editButton"
                                                            data-bs-toggle="modal" data-bs-target="#editRowModal"
                                                            data-adminid="{{ $adminuser->user_id }}"
                                                            data-profile="{{ $adminuser->user_profile }}"
                                                            data-id="{{ $adminuser->user_idnum }}"
                                                            data-fname="{{ $adminuser->user_fname }}"
                                                            data-mname="{{ $adminuser->user_mname }}"
                                                            data-lname="{{ $adminuser->user_lname }}"
                                                            data-email="{{ $adminuser->user_email }}"
                                                            data-position="{{ $adminuser->user_position }}"
                                                            data-role="{{ $adminuser->user_role }}"
                                                            data-status="{{ $adminuser->user_status }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>

                                                        <button class="btn btn-link btn-danger btn-lg removeButton"
                                                            data-id="{{ $adminuser->user_id }}" title="Remove">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </td>


                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>





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
    <x-alert.swal />
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#add-row').DataTable({
                responsive: true,
                order: [
                    [2, 'asc']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [0, 8]
                }],
                paging: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
            });
        });
    </script>

    </div>
@endsection
