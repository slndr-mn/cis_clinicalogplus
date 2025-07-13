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
                            <form id="medicineForm" action="{{ route('admin.addmedicine') }}" method="POST">
                                @csrf
                                <input id="admin_id" name="admin_id" type="hidden" class="form-control"
                                    value="{{ auth()->user()->id ?? '' }}" />
                                <input type="hidden" id="medicineId" name="medicineId" value="" />

                                <div class="form-group mb-3">
                                    <label for="medicineName">Medicine Name</label>
                                    <input type="text"id="medicineName" name="medicineName" class="form-control"
                                        value="{{ old('medicineName') }}" placeholder="Enter medicine name" required>
                                    @error('medicineName')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="form-group mb-3">
                                    <label for="medicineCategory">Category</label>
                                    <input type="text" id="medicineCategory" name="medicineCategory" class="form-control"
                                        placeholder="Enter category" required />
                                </div>
                                <div class="modal-footer border-0 mt-auto">
                                    <button type="submit" class="btn btn-primary" id="addmed"
                                        name="addmed">Submit</button>
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
                            <!-- Table -->
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
                                    @foreach ($medicines as $medicine)
                                        @php
                                            $totalQty = $medicine->medstocks->sum('medstock_qty');
                                            $stockCount = $medicine->medstocks->count();
                                        @endphp

                                        <tr data-id="{{ $medicine->medicine_id }}"
                                            data-name="{{ $medicine->medicine_name }}"
                                            data-category="{{ $medicine->medicine_category }}"
                                            data-stock="{{ $stockCount }}">
                                            <td>{{ $medicine->medicine_id }}</td>
                                            <td>{{ $medicine->medicine_name }}</td>
                                            <td>{{ $medicine->medicine_category }}</td>
                                            <td>{{ $stockCount }}</td>
                                            <td>{{ $totalQty }}</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-lg editMedButton">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

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
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addMedModal">
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
                                        @php
                                            $currentDate = \Carbon\Carbon::now();

                                        @endphp

                                        @foreach ($medstocks as $medstock)
                                            @php
                                                $timeFormatted = \Carbon\Carbon::createFromFormat(
                                                    'H:i:s',
                                                    $medstock->medstock_timeadded,
                                                )->format('h:i A');
                                                $disableStatus =
                                                    $medstock->medstock_disable == 1 ? 'Disabled' : 'Enabled';
                                                $statusColor = $medstock->medstock_disable == 1 ? '#ff6961' : '#77dd77';

                                                if ($medstock->medstock_qty == 0) {
                                                    $statusqtyMessage = 'Out of Stock';
                                                    $qtyColor = '#ff6961'; // red
                                                } else {
                                                    $statusqtyMessage = $medstock->medstock_qty;
                                                    $qtyColor = '#000000'; // black
                                                }

                                                $expirationStatus = \Carbon\Carbon::parse(
                                                    $medstock->medstock_expirationdt,
                                                )->lt($currentDate)
                                                    ? 'Expired'
                                                    : '';
                                            @endphp

                                            <tr data-id="{{ $medstock->medstock_id }}"
                                                data-medid="{{ $medstock->medicine_id }}"
                                                data-name="{{ $medstock->medicine->medicine_name }}"
                                                data-unit="{{ $medstock->medstock_unit }}"
                                                data-qty="{{ $medstock->medstock_origqty }}"
                                                data-dosage="{{ $medstock->medstock_dosage }}"
                                                data-dateadded="{{ $medstock->medstock_dateadded }} {{ $timeFormatted }}"
                                                data-expirationdt="{{ $medstock->medstock_expirationdt }}"
                                                data-disable="{{ $medstock->medstock_disable }}"
                                                style="background-color: {{ $statusColor }}20;">
                                                {{-- Light bg tint --}}

                                                <td>{{ $medstock->medstock_id }}</td>
                                                <td>{{ $medstock->medicine->medicine_name ?? 'N/A' }}
                                                    ({{ $medstock->medstock_unit }})
                                                </td>
                                                <td style="color: {{ $qtyColor }};">{{ $statusqtyMessage }} /
                                                    {{ $medstock->medstock_origqty }}</td>
                                                <td>{{ $medstock->medstock_dosage }}</td>
                                                <td>{{ $medstock->medstock_dateadded }}
                                                    {{ $timeFormatted }}</td>
                                                <td>
                                                    @if ($expirationStatus)
                                                        <span style="color: #ff6961;">{{ $expirationStatus }}</span><br>
                                                    @endif
                                                    <span>{{ $medstock->medstock_expirationdt }}</span>
                                                </td>
                                                <td>
                                                    <span
                                                        style="
                                                        display: inline-block;
                                                        padding: 5px 10px;
                                                        border-radius: 50px;
                                                        background-color: {{ $statusColor }};
                                                        color: white;
                                                        text-align: center;
                                                        min-width: 60px;">
                                                        {{ $disableStatus }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" class="btn btn-link btn-lg editButton">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class="btn btn-link btn-danger btn-lg removeButton"
                                                            data-id="{{ $medstock->medstock_id }}" title="Remove">
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

    @include('admin.partials.modals.add-medicine-stock')
    @include('admin.partials.modals.edit-medicine-stock')
    <x-alert.swal />

    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#add-med').DataTable({
                responsive: true,
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [5]
                }],
                paging: true,
                pageLength: 5, 
                lengthMenu: [5, 10, 25, 50, 100],
            });

            $('#add-med-stock').DataTable({
                responsive: true,
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    orderable: false,
                    targets: [7]
                }],
                paging: true,
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50, 100],
            });
        });
    </script>

@endsection
