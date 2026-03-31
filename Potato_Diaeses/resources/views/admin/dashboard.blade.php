@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid p-4" style="background:#f4f6f9; min-height:100vh;">

    {{-- Header --}}
    <div class="d-flex align-items-center mb-4">
        <i class="bi bi-speedometer2 fs-3 text-primary me-2"></i>
        <h4 class="fw-bold mb-0">Admin Dashboard</h4>
    </div>

    {{-- Stat Cards --}}
    <div class="row g-3">

        <div class="col-6 col-md-3">
            <div class="card border-0 rounded-3 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-primary bg-opacity-10 rounded-2 p-2">
                        <i class="bi bi-people-fill text-primary fs-4"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Users</div>
                        <div class="fw-bold fs-5">{{ $users }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 rounded-3 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-success bg-opacity-10 rounded-2 p-2">
                        <i class="bi bi-graph-up-arrow text-success fs-4"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Predictions</div>
                        <div class="fw-bold fs-5">{{ $predictions }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <div class="card border-0 rounded-3 shadow-sm p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="bg-info bg-opacity-10 rounded-2 p-2">
                        <i class="bi bi-capsule-pill text-info fs-4"></i>
                    </div>
                    <div>
                        <div class="text-muted small">Total Cures</div>
                        <div class="fw-bold fs-5">{{ $cures }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3">
            <a href="{{ route('admin.cures.index') }}" class="text-decoration-none">
                <div class="card border-warning rounded-3 shadow-sm p-3 h-100">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-warning bg-opacity-10 rounded-2 p-2">
                            <i class="bi bi-plus-circle-fill text-warning fs-4"></i>
                        </div>
                        <div>
                            <div class="text-muted small">Quick Action</div>
                            <div class="fw-bold text-warning">Add Cure</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>
@endsection