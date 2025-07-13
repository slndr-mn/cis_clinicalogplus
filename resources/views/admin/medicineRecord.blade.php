@extends('admin.app')
@section('title', 'Medicine')
@section('content')

<!-- Include DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

<div class="container" id="content">
    <div class="page-inner">
        <div class="row">
            <!-- Medicine Form Card -->
            <div class="col-md-4">
                <div class="card card-equal-height">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Medicine Details</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="medicineForm" method="POST">
                            @csrf
                            <input id="admin_id" name="admin_id" type="hidden" class="form-control" value="{{ auth()->user()->id ?? '' }}" />
                            <input type="hidden" id="medicineId" name="medicineId" value="" />

                            <div class="form-group mb-3">
                                <label for="medicineName">Medicine Name</label>
                                <input type="text" id="medicineName" name="medicineName" class="form-control" placeholder="Enter medicine name" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="medicineCategory">Category</label>
                                <input type="text" id="medicineCategory" name="medicineCategory" class="form-control" placeholder="Enter category" required />
                            </div>
                            <div class="modal-footer border-0 mt-auto">
                                <button type="submit" class="btn btn-primary" id="addmed" name="addmed">Submit</button>
                                <button type="reset" class="btn btn-secondary ms-2">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Medicines Table Card -->
            <div class="col-md-8">
                <div class="card card-equal-height">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">List of Medicine</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-med" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Stocks</th>
                                        <th>Total Quantity</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Stocks</th>
                                        <th>Total Quantity</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr data-id="101" data-name="Paracetamol" data-category="Painkiller" data-stock="25">
                                        <td>101</td>
                                        <td>Paracetamol</td>
                                        <td>Painkiller</td>
                                        <td>25</td>
                                        <td>100</td>
                                        <td>
                                            <button type="button" class="btn btn-link btn-primary btn-lg editMedButton">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Additional Medicine Stock Section --}}
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4 class="card-title">Medicine Stock</h4>
                        <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addMedModal">
                            <i class="fa fa-plus"></i> Add Medicine Stock
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="add-med-stock" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Dosage Strength</th>
                                        <th>Date & Time Added</th>
                                        <th>Expiration Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Dosage Strength</th>
                                        <th>Date & Time Added</th>
                                        <th>Expiration Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>201</td>
                                        <td>Paracetamol</td>
                                        <td>50</td>
                                        <td>500mg</td>
                                        <td>2025-07-06 09:30 AM</td>
                                        <td>2026-07-06</td>
                                        <td><span class="badge bg-success">Enabled</span></td>
                                        <td><button class="btn btn-link btn-primary btn-lg editMedButton" data-bs-toggle="modal" data-bs-target="#editMedModal"><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>202</td>
                                        <td>Amoxicillin</td>
                                        <td>30</td>
                                        <td>250mg</td>
                                        <td>2025-07-05 02:15 PM</td>
                                        <td>2026-01-15</td>
                                        <td><span class="badge bg-danger">Disabled</span></td>
                                        <td><button class="btn btn-link btn-primary btn-lg editMedButton" data-bs-toggle="modal" data-bs-target="#editMedModal"><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>203</td>
                                        <td>Ibuprofen</td>
                                        <td>80</td>
                                        <td>400mg</td>
                                        <td>2025-07-01 11:00 AM</td>
                                        <td>2026-12-31</td>
                                        <td><span class="badge bg-success">Enabled</span></td>
                                        <td><button class="btn btn-link btn-primary btn-lg editMedButton" data-bs-toggle="modal" data-bs-target="#editMedModal"><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                    <tr>
                                        <td>204</td>
                                        <td>Vitamin C</td>
                                        <td>100</td>
                                        <td>1000mg</td>
                                        <td>2025-06-30 08:00 AM</td>
                                        <td>2027-01-01</td>
                                        <td><span class="badge bg-success">Enabled</span></td>
                                        <td><button class="btn btn-link btn-primary btn-lg editMedButton" data-bs-toggle="modal" data-bs-target="#editMedModal"><i class="fa fa-edit"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.modals.add-medicine-stock')
    @include('admin.partials.modals.edit-medicine-stock')

    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#add-med').DataTable({
                responsive: true,
                order: [[1, 'asc']],
                columnDefs: [{ orderable: false, targets: [5] }],
                paging: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
            });

            $('#add-med-stock').DataTable({
                responsive: true,
                order: [[1, 'asc']],
                columnDefs: [{ orderable: false, targets: [7] }],
                paging: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
            });
        });
    </script>

@endsection
