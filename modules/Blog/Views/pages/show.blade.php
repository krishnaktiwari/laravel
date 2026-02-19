@extends('blog::layouts.frontend')

@section('content')
    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                {{-- Blog Title --}}
                <h1 class="mb-3">{{ $blog->title }}</h1>

                {{-- Date --}}
                <p class="text-muted">
                    Published on {{ $blog->created_at->format('d M Y') }}
                </p>

                {{-- Featured Image --}}
                @if($blog->image)
                    <div class="mb-4">
                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid rounded">
                    </div>
                @endif

                {{-- Blog Content --}}
                <div class="blog-content">
                    {!! $blog->content !!}
                </div>

            </div>
        </div>

</div>@endsection