@extends('layouts.app')

@section('title', 'ফলাফল')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7 col-md-9">
        <div class="card">
            <div class="card-body p-4 p-md-5">
                <h3 class="text-center mb-4">শনাক্তকরণের ফলাফল</h3>

                <div class="text-center mb-4">
                    <img src="{{ asset('storage/'.$prediction->image) }}"
                        class="img-fluid rounded shadow"
                        style="max-height: 380px; object-fit: contain;"
                        alt="আপলোডকৃত ছবি">
                </div>

                <h4 class="text-center mb-4">
                    সম্ভাব্য রোগ:
                    <span class="disease-name">{{ $prediction->prediction }}</span>
                </h4>

                <h5 class="mt-5 mb-3">সমস্ত সম্ভাবনা:</h5>

                @foreach($prediction->probabilities as $class => $prob)
                <div class="mb-4">
                    <div class="d-flex justify-content-between mb-1">
                        <strong>{{ $class }}</strong>
                        <span>{{ number_format($prob * 100, 2) }}%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success"
                            role="progressbar"
                            style="width: {{ $prob * 100 }}%"
                            aria-valuenow="{{ $prob * 100 }}"
                            aria-valuemin="0"
                            aria-valuemax="100">
                            {{ number_format($prob * 100, 1) }}%
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="d-grid gap-3 mt-5">
                    <a href="/" class="btn btn-primary btn-lg">
                        আরেকটি ছবি আপলোড করুন
                    </a>
                    <a href="{{ route('history') }}" class="btn btn-outline-primary">
                        সমস্ত ইতিহাস দেখুন
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection