@extends('frontend.layouts.app')
@section('title', 'Newsletters')

@section('content')
@include('frontend.layouts.partial.banner')

<!-- Newsletter Start -->
<div class="container py-5">
    <div class="row g-4">
        @foreach ($data as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 border-danger shadow-sm">
                    <div class="card-body d-flex flex-column justify-content-between text-center">
                        <div>
                            <h5 class="card-title text-danger">{{ $item->title }}</h5>
                            <p class="card-text text-muted mb-3">{{ $item->publish_date ?? 'Not Published' }}</p>
                        </div>
                        <a href="{{ route('newsletter.download', $item->id) }}" class="btn btn-danger mt-auto">
                            <i class="bi bi-download me-1"></i> Download
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        {{ $data->render('vendor.pagination.custom') }}
    </div>
</div>
<!-- Newsletter End -->

@endsection
