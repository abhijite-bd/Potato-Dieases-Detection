@extends('layouts.app')

@section('title', 'Cures Management')

@section('content')

<div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Cures Management</h4>
            <small class="text-muted">Manage all disease cures</small>
        </div>
        <a href="{{ route('admin.cures.create') }}" class="btn btn-primary btn-sm px-3">
            <i class="bi bi-plus-lg me-1"></i> Add Cure
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-3" role="alert">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('success') }}</span>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
    </div>
    @endif

    {{-- Cures Table --}}
    <div class="card border-0 rounded-3 shadow-sm">
        <div class="card-header bg-white d-flex align-items-center gap-2 py-3">
            <i class="bi bi-capsule-pill text-primary"></i>
            <h6 class="mb-0 fw-semibold">All Cures</h6>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-3" width="60">ID</th>
                            <th>Disease Type</th>
                            <th>Description</th>
                            <th width="120">Percentage</th>
                            <th width="160">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($cures as $cure)
                        <tr>
                            <td class="ps-3 text-muted">{{ $cure->id }}</td>
                            <td>
                                <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2">
                                    {{ $cure->type }}
                                </span>
                            </td>
                            <td class="text-muted small">{{ $cure->description }}</td>
                            <td>
                                <span class="badge bg-info-subtle text-info border border-info-subtle rounded-pill px-2">
                                    {{ $cure->percentage }}%
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.cures.edit', $cure->id) }}"
                                    class="btn btn-sm btn-outline-warning py-0 px-2 me-1">
                                    <i class="bi bi-pencil-fill"></i> Edit
                                </a>
                                <form action="{{ route('admin.cures.destroy', $cure->id) }}"
                                    method="POST"
                                    style="display:inline-block"
                                    onsubmit="return confirm('Delete this cure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger py-0 px-2">
                                        <i class="bi bi-trash-fill"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">
                                <i class="bi bi-inbox fs-4 d-block mb-1"></i>
                                No cures found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection