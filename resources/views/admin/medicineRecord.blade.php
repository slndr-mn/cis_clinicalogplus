@extends('admin.app')
@section('title', 'Medicine')
@section('content')

    <div class="container" id="content">
        <div class="page-inner">
               <div class="page-inner">
                    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
                        <div>
                            <h3> </h3>
                        </div>
                    </div>
                    
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
                  <!-- First Table Controls -->
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <label class="d-flex align-items-center">
                            Show
                            <select id="entriesSelectMedList" class="form-control form-control-sm ms-2" style="width: 80px;">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            entries
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                        <label class="d-flex align-items-center">
                            Search:
                            <input type="search" id="medListSearch" class="form-control ms-2" placeholder="">
                        </label>
                    </div>
                </div>

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
                            <tbody>
                                {{-- Replace with dynamic rows --}}
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

                    <!-- Pagination -->
                    <div class="row mt-3 align-items-center">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" role="status" aria-live="polite">
                                Showing 1 to 2 of 2 entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex justify-content-end">
                            <ul class="pagination mb-0">
                                <li class="paginate_button page-item previous disabled">
                                    <a href="#" class="page-link">Previous</a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item next disabled">
                                    <a href="#" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Pagination -->
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

                      <!-- Top Controls -->
                    <!-- Second Table Controls -->
                    <div class="row mb-3">
                        <div class="col-sm-12 col-md-6">
                            <label class="d-flex align-items-center">
                                Show
                                <select id="entriesSelectStock" class="form-control form-control-sm ms-2" style="width: 80px;">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>
                        </div>
                        <div class="col-sm-12 col-md-6 d-flex justify-content-end">
                            <label class="d-flex align-items-center">
                                Search:
                                <input type="search" id="medStockSearch" class="form-control ms-2" placeholder="">
                            </label>
                        </div>
                    </div>


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
                                <td>
                                    <span style='
                                        display: inline-block;
                                        padding: 5px 10px;
                                        border-radius: 50px;
                                        background-color: #28a745;
                                        color: white;
                                        text-align: center;
                                        min-width: 60px;'>
                                        Enabled
                                    </span>
                                </td>
                                <td>
                    <button class="btn btn-link btn-primary btn-lg editMedButton" data-bs-toggle="modal" data-bs-target="#editMedModal">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>202</td>
                                <td>Amoxicillin</td>
                                <td>30</td>
                                <td>250mg</td>
                                <td>2025-07-05 02:15 PM</td>
                                <td>2026-01-15</td>
                                <td>
                                    <span style='
                                        display: inline-block;
                                        padding: 5px 10px;
                                        border-radius: 50px;
                                        background-color: #dc3545;
                                        color: white;
                                        text-align: center;
                                        min-width: 60px;'>
                                        Disabled
                                    </span>
                                </td>
                                <td>
                                     <button class="btn btn-link btn-primary btn-lg editMedButton" data-bs-toggle="modal" data-bs-target="#editMedModal">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>203</td>
                                <td>Ibuprofen</td>
                                <td>80</td>
                                <td>400mg</td>
                                <td>2025-07-01 11:00 AM</td>
                                <td>2026-12-31</td>
                                <td>
                                    <span style='
                                        display: inline-block;
                                        padding: 5px 10px;
                                        border-radius: 50px;
                                        background-color: #28a745;
                                        color: white;
                                        text-align: center;
                                        min-width: 60px;'>
                                        Enabled
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-link btn-primary btn-lg editMedButton" data-bs-toggle="modal" data-bs-target="#editMedModal">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>204</td>
                                <td>Vitamin C</td>
                                <td>100</td>
                                <td>1000mg</td>
                                <td>2025-06-30 08:00 AM</td>
                                <td>2027-01-01</td>
                                <td>
                                    <span style='
                                        display: inline-block;
                                        padding: 5px 10px;
                                        border-radius: 50px;
                                        background-color: #28a745;
                                        color: white;
                                        text-align: center;
                                        min-width: 60px;'>
                                        Enabled
                                    </span>
                                </td>
                                <td>
                                     <button class="btn btn-link btn-primary btn-lg editMedButton" data-bs-toggle="modal" data-bs-target="#editMedModal">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>


                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="row mt-3">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" role="status" aria-live="polite">
                                Showing 1 to 4 of 4 entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-7 d-flex justify-content-end">
                            <ul class="pagination mb-0">
                                <li class="paginate_button page-item previous disabled">
                                    <a href="#" class="page-link">Previous</a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item next disabled">
                                    <a href="#" class="page-link">Next</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Pagination -->
                </div>
            </div>
        </div>
    </div>
</div>



@include('admin.partials.modals.add-medicine-stock')
@include('admin.partials.modals.edit-medicine-stock')


{{-- Scripts --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    setupFrontEndTable(
        "add-med", // table ID
        "medListSearch", // search input ID
        "entriesSelectMedList", // entries select ID
        "tableInfoMedList", // table info display ID
        "paginationListMedList" // pagination list ID
    );

    setupFrontEndTable(
        "add-med-stock",
        "medStockSearch",
        "entriesSelectStock",
        "tableInfoMedStock",
        "paginationListMedStock"
    );
});

function setupFrontEndTable(tableId, searchInputId, entriesSelectId, tableInfoId, paginationListId) {
    const table = document.getElementById(tableId);
    const tbody = table.querySelector("tbody");
    const searchInput = document.getElementById(searchInputId);
    const entriesSelect = document.getElementById(entriesSelectId);
    const tableInfo = document.getElementById(tableInfoId);
    const paginationList = document.getElementById(paginationListId);

    if (!table || !searchInput || !entriesSelect || !tableInfo || !paginationList) return;

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

        const startEntry = totalEntries === 0 ? 0 : startIdx + 1;
        const endEntry = startIdx + paginatedRows.length;
        tableInfo.textContent = `Showing ${startEntry} to ${endEntry} of ${totalEntries} entries`;

        paginationList.innerHTML = "";

        if (totalPages > 1) {
            const prev = document.createElement("li");
            prev.className = `paginate_button page-item ${currentPage === 1 ? "disabled" : ""}`;
            prev.innerHTML = `<a href="#" class="page-link">Previous</a>`;
            prev.addEventListener("click", (e) => {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    filterAndPaginate();
                }
            });
            paginationList.appendChild(prev);

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

            const next = document.createElement("li");
            next.className = `paginate_button page-item ${currentPage === totalPages ? "disabled" : ""}`;
            next.innerHTML = `<a href="#" class="page-link">Next</a>`;
            next.addEventListener("click", (e) => {
                e.preventDefault();
                if (currentPage < totalPages) {
                    currentPage++;
                    filterAndPaginate();
                }
            });
            paginationList.appendChild(next);
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
}
</script>

@endsection
