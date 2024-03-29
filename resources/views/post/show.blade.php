@extends('layouts.main')


@section('content')
<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
        <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$date->translatedFormat('d F Y')}} • {{$date->format('H:i')}} • {{$post->getComments->count()}} Комментариев</p>
        <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
            <img src="{{asset('storage/' . $post->preview_image)}}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto" data-aos="fade-up">
                    {!!$post->content!!}
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <section class="pb-5">
                    @csrf
                    <form action="{{route('post.like.store', $post->id)}}" method="POST">
                        @auth()
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
                </section>
                @if($relatedPosts->count() > 0)
                <section class="related-posts">
                    <h2 class="section-title mb-4" data-aos="fade-up">Схожие посты</h2>
                    <div class="row">
                        @foreach($relatedPosts as $relatedPost)
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{asset('storage/'. $relatedPost->preview_image)}}" alt="related post" class="post-thumbnail">
                            <p class="post-category">{{$relatedPost->getCategory->title}}</p>
                            <a href="{{route('post.show', $relatedPost->id)}}">
                                <h5 class="post-title">{{$relatedPost->title}}</h5>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
                <section class="comment-list mb-5">
                    <h2 class="section-title mb-5" data-aos="fade-up">Комментарии ({{$post->getComments->count()}})</h2>
                    @foreach($post->getComments as $comment)
                    <div class="comment-text mb-3" data-aos="fade-up">
                        <span class="username">
                            <div>{{$comment->getUser->name}}</div>
                            <span class="text-muted float-right">{{$comment->DateAsCarbon->diffForHumans()}} </span>
                        </span><!-- /.username -->
                        {{$comment->text_comment}}
                    </div>
                    @endforeach
                </section>
                @auth()
                <section class="comment-section">
                    <h2 class="section-title mb-5" data-aos="fade-up">Оставить комментарий:</h2>
                    <form action="{{route('post.comment.store', $post->id)}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Комментарий</label>
                                <textarea name="text_comment" id="comment" class="form-control" placeholder="Комментарий" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" data-aos="fade-up">
                                <input type="submit" value="Отправить" class="btn btn-warning">
                            </div>
                        </div>
                    </form>
                </section>
                @endauth
            </div>
        </div>
    </div>
</main>
@endsection