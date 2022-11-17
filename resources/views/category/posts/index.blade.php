@extends('layouts.main')


@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Посты по категории</h1>
        <section class="featured-posts-section">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                    <div class="blog-post-thumbnail-wrapper">
                        <img src="{{asset('storage/'.$post->preview_image)}}" alt="blog post">
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="blog-post-category">{{$post->getCategory->title}}</p>
                        @auth()
                        <form action="{{route('post.like.store', $post->id)}}" method="POST">
                            @csrf
                            {{$post->users_of_likes_count}}
                            <button type="submit" class="border-0 bg-transparent">
                                @if(auth()->user()->getPostsByLikes->contains($post->id))
                                <i class="fa-solid fa-heart"></i>
                                @else
                                <i class="fa-regular fa-heart"></i>
                                @endif
                            </button>
                        </form>
                        @endauth
                        @guest()
                        <div>
                            <span>{{$post->users_of_likes_count}}</span>
                            <i class="fa-regular fa-heart"></i>
                        </div>
                        @endguest
                    </div>
                    <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                        <h6 class="blog-post-title">{{$post->title}}</h6>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto" style="margin-top: -100px">
                    {{$posts->links()}}
                </div>
            </div>
        </section>
    </div>

</main>
@endsection