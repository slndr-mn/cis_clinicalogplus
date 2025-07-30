@extends('admin.app')

@section('content')
<div class="container-fluid mt-4" id="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                {{-- ROLES CARD --}}
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Roles Access Control</h4>
                            <button class="btn btn-primary btn-round position-absolute end-0 me-4" data-bs-toggle="modal" data-bs-target="#editPermissionModal">
                                <i class="fa fa-pen"></i> Edit
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        {{-- Alerts --}}
                        @foreach (['success', 'error', 'warning'] as $msg)
                            @if(session($msg))
                            <div class="alert alert-{{ $msg === 'error' ? 'danger' : $msg }} mt-3" id="{{ $msg }}Alert" role="alert">
                                {{ session($msg) }}
                            </div>
                            @php session()->forget($msg); @endphp
                        @endif
                    @endforeach          

                        {{-- View-only Permission Table --}}
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped">
                                <thead class="table-success text-center align-middle">
                                    <tr>
                                        <th>Permission</th>
                                        @foreach ($roles as $role)
                                            <th class="text-center fw-bold">{{ $role->name }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                        <tr>
                                            <td class="align-middle fw-semibold">{{ Str::title($permission->name) }}</td>
                                            @foreach ($roles as $role)
                                                <td class="text-center">
                                                    <input type="checkbox"
                                                           class="form-check-input"
                                                           {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                                           disabled>
                                                </td>
                                            @endforeach
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

{{-- Modal for editing permissions --}}
<div class="modal fade" id="editPermissionModal" tabindex="-1" aria-labelledby="editPermissionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <form method="POST" action="{{ route('rbac.update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Role Permissions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body" style="padding: 0;">
                    <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                        <table class="table table-bordered table-striped mb-0">
                            <thead class="table-success text-center align-middle" style="position: sticky; top: 0; background: #d4edda; z-index: 1;">
                                <tr>
                                    <th>Permission</th>
                                    @foreach ($roles as $role)
                                        <th class="text-center">{{ $role->name }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td class="align-middle fw-semibold">{{ $permission->name }}</td>
                                        @foreach ($roles as $role)
                                            <td class="text-center">
                                                <input type="checkbox"
                                                    class="form-check-input"
                                                    name="permissions[{{ $role->id }}][{{ $permission->id }}]"
                                                    value="1"
                                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer border-top">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        ['success', 'error', 'warning'].forEach(type => {
            const alertBox = document.getElementById(type + 'Alert');
            if (alertBox) {
                setTimeout(() => {
                    alertBox.style.transition = 'opacity 0.5s ease';
                    alertBox.style.opacity = '0';
                    setTimeout(() => {
                        alertBox.remove();
                    }, 500); // Wait for fade-out animation
                }, 2000); // Show for 2 seconds before starting fade
            }
        });
    });
</script>
@endpush
