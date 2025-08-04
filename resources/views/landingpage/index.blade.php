@extends('layouts.landingpage')

@section('content')
    <section class="pt-5 pt-md-14 pb-4 pb-md-5">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h3 class="mb-3 mb-sm-0 fw-semibold d-flex align-items-center">News and Articles <span class="badge text-bg-secondary fs-2 rounded-4 py-1 px-2 ms-2">{{ $articles_count }}</span>
                </h3>
                <form class="position-relative" action="{{ route('landingpage.index') }}" method="GET">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="search"
                           placeholder="Search Articles..." name="search" value="{{ request('search') }}" />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y text-dark ms-3"></i>
                </form>
            </div>
            <div class="row">
                @forelse ($articles as $article)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card overflow-hidden">
                                <div class="ratio ratio-16x9">
                                    <img src="{{ $article->image_url }}"
                                         class="w-100 h-100 object-fit-cover rounded-top"
                                         alt="{{ $article->title }}">
                                </div>
                               <a href="{{ route('landingpage.article.show', $article->id) }}" class="text-decoration-none text-dark">
                                    <div class="p-4">
                                        <h6 class="mb-1 fs-4 fw-semibold text-truncate">{{ $article->title }}</h6>
                                        <span class="text-dark fs-2">{{ $article->created_at->format('d M Y') }}</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">No articles found.</div>
                    </div>
                @endforelse
            </div>

            <div class="mt-4">
                {{ $articles->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
