@extends('layouts.app')

@section('title', 'ছবি আপলোড করুন')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
        <div class="card">
            <div class="card-body p-4 p-md-5">
                <h3 class="card-title text-center mb-4">আলুর পাতার ছবি আপলোড করুন</h3>

                <form action="{{ route('predict') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label for="image" class="form-label fw-bold">ছবি নির্বাচন করুন</label>
                        <input type="file" name="image" id="image" class="form-control form-control-lg" accept="image/*" required>
                        <small class="form-text text-muted">শুধু jpg, jpeg, png ফরম্যাট গ্রহণযোগ্য • সর্বোচ্চ ৫ MB</small>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            রোগ শনাক্ত করুন
                        </button>
                    </div>
                </form>

                <div class="text-center mt-4">
                    <a href="{{ route('history') }}" class="btn btn-outline-secondary">
                        পূর্বের ফলাফল দেখুন →
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection