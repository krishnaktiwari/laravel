@extends('blog::layouts.frontend')

@section('content')

    <div class="container py-5">

        <h1 class="mb-4">{{ $seo['title'] }}</h1>
        <p class="text-muted mb-5">{{ $seo['description'] }}</p>

        <div class="row">
            @forelse($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">

                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $blog->title }}
                            </h5>

                            <p class="card-text">
                                {{ Str::limit($blog->description, 120) }}
                            </p>

                            <a href="{{ route('blog.show', $blog->slug) }}" class="btn btn-primary">
                                Read More
                            </a>
                        </div>

                        <div class="card-footer text-muted small">
                            {{ $blog->created_at->format('d M Y') }}
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">
                        No blogs found.
                    </div>
                </div>
            @endforelse
        </div>

    </div>
@endsection