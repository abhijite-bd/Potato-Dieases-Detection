@extends('layouts.app')

@section('title', 'Add Cure')

@section('content')

<div class="container" style="max-width:620px">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-2 mb-4">
        <i class="bi bi-capsule-pill fs-4 text-primary"></i>
        <div>
            <h5 class="fw-bold mb-0">Add New Cure</h5>
            <small class="text-muted">Fill in the details below</small>
        </div>
    </div>

    <div class="card border-0 rounded-3 shadow-sm p-4">
        <form method="POST" action="{{ route('admin.cures.store') }}">
            @csrf

            {{-- Disease Type --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Disease Type</label>
                <select name="type" class="form-select @error('type') is-invalid @enderror">
                    <option value="">— Select disease —</option>
                    <option value="Potato___Early_blight" {{ old('type') == 'Potato___Early_blight' ? 'selected' : '' }}>Potato — Early Blight</option>
                    <option value="Potato___Late_blight" {{ old('type') == 'Potato___Late_blight'  ? 'selected' : '' }}>Potato — Late Blight</option>
                    <option value="Potato___healthy" {{ old('type') == 'Potato___healthy'      ? 'selected' : '' }}>Potato — Healthy</option>
                </select>
                @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" rows="4"
                    class="form-control @error('description') is-invalid @enderror"
                    placeholder="Describe the cure or treatment...">{{ old('description') }}</textarea>
                @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- Minimum Percentage --}}
            <div class="mb-4">
                <label class="form-label fw-semibold">Minimum Percentage</label>
                <div class="input-group">
                    <input type="number" name="percentage" min="0" max="100"
                        value="{{ old('percentage') }}"
                        placeholder="e.g. 75"
                        class="form-control @error('percentage') is-invalid @enderror">
                    <span class="input-group-text">%</span>
                    @error('percentage')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            {{-- Buttons --}}
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-plus-lg me-1"></i> Add Cure
                </button>
                <a href="{{ route('admin.cures.index') }}" class="btn btn-outline-secondary px-4">
                    Cancel
                </a>
            </div>

        </form>
    </div>

</div>

@endsection