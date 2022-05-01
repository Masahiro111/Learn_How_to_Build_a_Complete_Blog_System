@extends('main_layouts.master')

@section('title','MyBlog Home')

@section('content')
<div class="colorlib-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                @forelse ($posts as $post)
                <div class="block-21 d-flex animate-box post">
                    <a
                       href="#"
                       class="blog-img"
                       style="background-image: url(' {{ asset('storage/' . $post->image->path) }}');"></a>
                    <div class="text">
                        <h3 class="heading">
                            <a href="#" class="date">{{ $post->title }}</a>
                        </h3>
                        <p class="excerpt">{{ $post->excerpt }}</p>
                        <div class="meta">
                            <div><a href="#"><span class="icon-calendar"></span>{{ $post->created_at->diffForHumans() }}</a></div>
                            <div><a href="#"><span class="icon-user2"></span>{{ $post->author->name }}</a></div>
                            <div class="comment-count"><a href="#"><span class="icon-chat"></span> {{ $post->comments_count }}</a></div>
                        </div>
                    </div>
                </div>
                @empty
                <p class="lead">There are no posts to show</p>
                @endforelse

                {{ $posts->links() }}

            </div>

            <!-- SIDEBAR: start -->
            <div class="col-md-4 animate-box">
                <div class="sidebar">
                    <div class="side">
                        <h3 class="sidebar-heading">Categories</h3>
                        <div class="block-24">
                            <ul>
                                @foreach ($categories as $category)
                                <li><a href="#">{{ $category->name }} <span>{{ $category->posts_count }}</span></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="side">
                        <h3 class="sidebar-heading">Recent Blog</h3>

                        @foreach ($recents as $recent)
                        <div class="f-blog">
                            <a
                               href="blog.html"
                               class="blog-img"
                               style="background-image: url(' {{ asset('storage/' . $recent->image->path) }}');">
                            </a>
                            <div class="desc">
                                <p class="admin"><span>{{$recent->created_at->diffForHumans() }}</span></p>
                                <h2><a href="blog.html">{{ Str::limit($recent->title,50, '...') }}</a></h2>
                                <p>{{ $recent->excerpt }}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="side">
                        <h3 class="sidbar-heading">Tags</h3>
                        <div class="block-26">
                            <ul>
                                @foreach ($tags as $tag)
                                <li><a href="#">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection