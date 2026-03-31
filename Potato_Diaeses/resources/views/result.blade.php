@extends('layouts.app')

@section('title', 'ফলাফল')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7 col-md-9">

            {{-- Image Card --}}
            <div class="card shadow-sm border-0 rounded-4 mb-3">
                <div class="card-body text-center p-3">
                    <img src="{{ asset('storage/'.$prediction->image) }}"
                        class="img-fluid rounded-3"
                        style="max-height: 300px; object-fit: contain;"
                        alt="আপলোডকৃত ছবি">
                </div>
            </div>

            {{-- Diagnosis Card --}}
            <div class="card border-0 rounded-4 mb-3 bg-success-subtle">
                <div class="card-body p-3">
                    <small class="text-success fw-semibold text-uppercase">সম্ভাব্য রোগ</small>
                    <h4 class="fw-bold text-success-emphasis mt-1 mb-0">{{ $prediction->prediction }}</h4>
                </div>
            </div>

            {{-- Cure Card --}}
            @if($cures->count())
            <div class="card border-0 rounded-4 mb-3 bg-warning-subtle">
                <div class="card-body p-3">
                    <h6 class="fw-semibold mb-3">💊 প্রস্তাবিত চিকিৎসা</h6>
                    @foreach($cures as $cure)
                    <div class="d-flex justify-content-between align-items-start mb-2">

                        <p class="mb-0 small me-2">{{ $cure->description }}</p>

                        <button type="button"
                            class="btn btn-sm btn-outline-success speak-btn"
                            onclick="toggleSpeak(this, `{{ addslashes($cure->description) }}`)">
                            🔊
                        </button>

                    </div>

                    @if(!$loop->last)
                    <hr class="my-2">
                    @endif
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Actions --}}
            <div class="d-grid gap-2 d-sm-flex">
                <a href="/" class="btn btn-success flex-fill">নতুন ছবি আপলোড করুন</a>
                <a href="{{ route('history') }}" class="btn btn-outline-success flex-fill">পূর্ববর্তী ইতিহাস</a>
            </div>

            <p class="text-muted small text-center mt-3">
                <strong>দ্রষ্টব্য:</strong> চূড়ান্ত রোগ নির্ণয়ের জন্য বিশেষজ্ঞের পরামর্শ নিন।
            </p>

        </div>
    </div>
</div>
<script>
    let currentUtterance = null;
    let currentButton = null;

    function toggleSpeak(button, text) {

        // If same button clicked again → stop
        if (currentUtterance && currentButton === button) {
            window.speechSynthesis.cancel();
            button.innerHTML = "🔊";
            currentUtterance = null;
            currentButton = null;
            return;
        }

        // Stop any previous speech
        window.speechSynthesis.cancel();

        // Reset all buttons
        document.querySelectorAll('.speak-btn').forEach(btn => {
            btn.innerHTML = "🔊";
        });

        let speech = new SpeechSynthesisUtterance(text);

        // ✅ Force Bangla language
        speech.lang = "bn-BD";

        // Optional tuning
        speech.rate = 0.9; // speed
        speech.pitch = 1; // tone

        speech.onstart = () => {
            button.innerHTML = "⏸️";
            currentUtterance = speech;
            currentButton = button;
        };

        speech.onend = () => {
            button.innerHTML = "🔊";
            currentUtterance = null;
            currentButton = null;
        };

        window.speechSynthesis.speak(speech);
    }
</script>
@endsection