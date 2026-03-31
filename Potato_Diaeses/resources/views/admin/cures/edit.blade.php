@extends('layouts.app')

@section('title', 'Edit Cure')

@section('content')

<div class="container" style="max-width:620px">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-2 mb-4">
        <i class="bi bi-pencil-square fs-4 text-success"></i>
        <div>
            <h5 class="fw-bold mb-0">Edit Cure</h5>
            <small class="text-muted">Update the cure details below</small>
        </div>
    </div>

    <div class="card border-0 rounded-3 shadow-sm p-4">
        <form action="{{ route('admin.cures.update', $cure->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Disease Type --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Disease Type</label>
                <input type="text"
                    name="type"
                    class="form-control @error('type') is-invalid @enderror"
                    value="{{ old('type', $cure->type) }}"
                    placeholder="Enter disease type"
                    required>
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Cure Description</label>
                <textarea
                    name="description"
                    rows="4"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Describe the cure or treatment..."
                    required>{{ old('description', $cure->description) }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Percentage --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Minimum Percentage</label>
                <div class="input-group">
                    <input type="number"
                        name="percentage"
                        min="0" max="100"
                        class="form-control @error('percentage') is-invalid @enderror"
                        value="{{ old('percentage', $cure->percentage) }}"
                        required>
                    <span class="input-group-text">%</span>
                    @error('percentage')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Buttons --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success px-4">
                    <i class="bi bi-check-lg me-1"></i> Update Cure
                </button>
                <a href="{{ route('admin.cures.index') }}" class="btn btn-outline-secondary px-4">
                    Cancel
                </a>
            </div>

        </form>
    </div>

</div>

@endsection