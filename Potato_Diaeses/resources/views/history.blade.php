@extends('layouts.app')

@section('title', 'ইতিহাস')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-10">
        <h3 class="text-center mb-4">পূর্বের শনাক্তকরণের ইতিহাস</h3>

        @if($predictions->isEmpty())
        <div class="alert alert-info text-center">
            এখনো কোনো শনাক্তকরণ করা হয়নি।
        </div>
        @else
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ছবি</th>
                        <th>রোগ</th>
                        <th>তারিখ ও সময়</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($predictions as $p)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/'.$p->image) }}"
                                class="rounded"
                                width="90"
                                alt="পূর্বের ছবি">
                        </td>
                        <td class="fw-bold disease-name">{{ $p->prediction }}</td>
                        <td>{{ $p->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-4">
            {{ $predictions->links('pagination::bootstrap-5') }}
        </div>
        @endif

        <div class="text-center mt-4">
            <a href="/" class="btn btn-success btn-lg px-5">
                নতুন ছবি আপলোড করুন
            </a>
        </div>
    </div>
</div>

@endsection