@extends('layouts.landingpage')

@section('content')
    <section class="pt-5 pt-md-14 pb-4 pb-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-11">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ $article->image_url }}"
                             class="card-img-top img-fluid object-fit-cover" style="aspect-ratio: 16 / 9;"
                             alt="{{ $article->title }}">

                        <div class="card-body px-4 py-4">
                            <h1 class="card-title mb-3">{{ $article->title }}</h1>
                            <p class="text-muted mb-4">Published on {{ $article->created_at->format('F j, Y') }}</p>
                            <div class="card-text fs-5 lh-lg">
                                {!! nl2br(e($article->summary)) !!}
                            </div>
                            <a href="{{ route('landingpage.index') }}" class="btn btn-outline-dark mt-4">
                                ← Back to Articles
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
