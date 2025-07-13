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
=======
    <div class="container-fluid" id="content">
        <div class="page-inner">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Clinic Personnels</h4>
                                <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                    data-bs-target="#addRowModal">
                                    <i class="fa fa-plus"></i>
                                    Add
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

                        <div class="card-body">
                            <!-- Controls -->
                            <div class="row mb-3">
                                <div class="col-sm-12 col-md-6">
                                    <label>
                                        Show
                                        <select id="entriesSelect" class="form-select d-inline-block w-auto mx-2">
                                            <option value="5">5</option>
                                            <option value="10" selected>10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select>
                                        entries
                                    </label>
                                </div>
                                <div class="col-sm-12 col-md-6 text-end">
                                    <label>
                                        Search:
                                        <input type="search" id="tableSearch"
                                            class="form-control d-inline-block w-auto ms-2" placeholder=""
                                            aria-controls="add-row">
                                    </label>
                                </div>
                            </div>

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

                            <!-- Pagination Section -->
                            <div class="row mt-3">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                                        Showing 1 to 4 of 4 entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7 d-flex justify-content-end">
                                    <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                        <ul class="pagination mb-0">
                                            <li class="paginate_button page-item previous disabled" id="add-row_previous">
                                                <a href="#" aria-controls="add-row" data-dt-idx="0" tabindex="0"
                                                    class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item active">
                                                <a href="#" aria-controls="add-row" data-dt-idx="1" tabindex="0"
                                                    class="page-link">1</a>
                                            </li>
                                            <li class="paginate_button page-item next disabled" id="add-row_next">
                                                <a href="#" aria-controls="add-row" data-dt-idx="2" tabindex="0"
                                                    class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- End Pagination Section -->



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

    </div>

    {{-- Include Modals --}}
    @include('admin.partials.modals.addUserModal')
    @include('admin.partials.modals.editUserModal')
    <x-alert.swal />

    {{-- Table script --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const table = document.getElementById("add-row");
            const tbody = document.getElementById("userTableBody");
            const searchInput = document.getElementById("tableSearch");
            const entriesSelect = document.getElementById("entriesSelect");
            const tableInfo = document.getElementById("tableInfo");
            const paginationList = document.getElementById("paginationList");

            let rows = Array.from(tbody.querySelectorAll("tr"));
            let currentPage = 1;
            let entriesPerPage = parseInt(entriesSelect.value);

            function filterAndPaginate() {
                const searchTerm = searchInput.value.toLowerCase();

                const filteredRows = rows.filter(row =>
                    row.textContent.toLowerCase().includes(searchTerm)
                );

                const totalEntries = filteredRows.length;
                const totalPages = Math.ceil(totalEntries / entriesPerPage);
                currentPage = Math.min(currentPage, totalPages || 1);

                tbody.innerHTML = "";
                const startIdx = (currentPage - 1) * entriesPerPage;
                const paginatedRows = filteredRows.slice(startIdx, startIdx + entriesPerPage);

                paginatedRows.forEach(row => tbody.appendChild(row));

                // Info
                const startEntry = totalEntries === 0 ? 0 : startIdx + 1;
                const endEntry = startIdx + paginatedRows.length;
                tableInfo.textContent = `Showing ${startEntry} to ${endEntry} of ${totalEntries} entries`;

                // Pagination
                paginationList.innerHTML = "";

                if (totalPages > 1) {
                    for (let i = 1; i <= totalPages; i++) {
                        const li = document.createElement("li");
                        li.className = `paginate_button page-item ${i === currentPage ? "active" : ""}`;
                        li.innerHTML = `<a href="#" class="page-link">${i}</a>`;
                        li.addEventListener("click", (e) => {
                            e.preventDefault();
                            currentPage = i;
                            filterAndPaginate();
                        });
                        paginationList.appendChild(li);
                    }
                }
            }

            searchInput.addEventListener("input", () => {
                currentPage = 1;
                filterAndPaginate();
            });

            entriesSelect.addEventListener("change", () => {
                entriesPerPage = parseInt(entriesSelect.value);
                currentPage = 1;
                filterAndPaginate();
            });

            filterAndPaginate();
        });
    </script>

@endsection
