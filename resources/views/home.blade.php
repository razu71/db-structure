@extends('layouts.master')

@section('content')
            <!-- Banner-->
            <header class="bg-light py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder mb-2">{{ $banner->title }}</h1>
                                <p class="lead fw-normal text-dark-50 mb-4">{{ $banner->description }}</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="javascript:void(0);">Get Started</a>
                                    <a class="btn btn-outline-dark btn-lg px-4" target="_blank" href="{{ $banner->link }}">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="{{ $banner->photo?->image }}" alt="..." /></div>
                    </div>
                </div>
            </header>

        <!-- Blog preview section-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <div class="text-center">
                            <h2 class="fw-bolder">From our blog</h2>
                            <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    @foreach ($posts as $post)
                        <div class="col-lg-4 mb-5">
                        <div class="card h-100 shadow border-0">
                            @if ($post->photos->count() > 1)
                                <img class="card-img-top" src="{{ $post->photos?->first()?->image }}" alt="..." />
                            @else
                                <img class="card-img-top" src="https://via.placeholder.com/640x480.png/009933?text=commodi" alt="..." />
                            @endif
                            <div class="card-body p-4">
                                @if ($post->tags->count() > 1)
                                    @foreach ($post->tags as $tag)
                                        <div class="badge bg-primary bg-gradient rounded-pill mb-2">{{ $tag->name }}</div>
                                    @endforeach
                                @endif
                                <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">{{ $post->title }}</h5></a>
                                <p class="card-text mb-0">{{ substr($post->body, 0, 100) }}</p>
                            </div>
                            <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                <div class="d-flex align-items-end justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <img class="rounded-circle me-3" style="height: 50px" src="{{ $post->user?->avatar }}" alt="..." />
                                        <div class="small">
                                            <div class="fw-bold">{{ $post->user?->name }}</div>
                                            <div class="text-muted">{{ humanDateFormat($post->created_at) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection