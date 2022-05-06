@extends('main_layouts.master')

@section('title','MyBlog This is single post')

@section('content')

<div class="alert alert-info global-message info" style="display: none;"></div>

<div class="colorlib-classes">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row row-pb-lg">
                    <div class="col-md-12 animate-box">
                        <div class="classes class-single">
                            <div class="classes-img" style="background-image: url({{ asset('storage/' . $post->image->path) }});">
                            </div>
                            <div class="desc desc2">
                                <h3><a href="#">{{ $post->title }}</a></h3>
                                <div class="body-area">
                                    {{ $post->body }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-pb-lg animate-box">
                    <div class="col-md-12">
                        <h2 class="colorlib-heading-2">{{ count($post->comments) }} Comments</h2>
                        @foreach ($post->comments as $comment)
                        <div id="comment_{{ $comment->id }}" class="review">
                            <div
                                 class="user-img"
                                 style="background-image: url({{ $comment->user->image ? asset('storage/' . $comment->user->image->path. '') : 'https://images.assetsdelivery.com/compings_v2/salamatik/salamatik1801/salamatik180100019.jpg'  }});"></div>
                            <div class="desc">
                                <h4>
                                    <span class="text-left">{{ $comment->user->name }}</span>
                                    <span class="text-right">{{ $comment->created_at->diffForHumans() }}</span>
                                </h4>
                                <p>{{ $comment->the_comment }}</p>
                                <p class="star">
                                    <span class="text-left"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="row animate-box">
                    <div class="col-md-12">
                        <x-blog.message :status="'success'" />
                        <h2 class="colorlib-heading-2">Say something</h2>

                        @auth
                        <form action="{{ route('post.add_comment', $post) }}" method="POST">
                            @csrf

                            {{-- <div class="row form-group">
                                <div class="col-md-6">
                                    <!-- <label for="fname">First Name</label> -->
                                    <input type="text" id="fname" class="form-control" placeholder="Your firstname">
                                </div>
                                <div class="col-md-6">
                                    <!-- <label for="lname">Last Name</label> -->
                                    <input type="text" id="lname" class="form-control" placeholder="Your lastname">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <!-- <label for="email">Email</label> -->
                                    <input type="text" id="email" class="form-control" placeholder="Your email address">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <!-- <label for="subject">Subject</label> -->
                                    <input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
                                </div>
                            </div> --}}

                            <div class="row form-group">
                                <div class="col-md-12">
                                    <!-- <label for="message">Message</label> -->
                                    <textarea name="the_comment" id="the_comment" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>
                        </form>
                        @endauth

                    </div>
                </div>
            </div>

            <!-- SIDEBAR: start -->
            <div class="col-md-4 animate-box">
                <div class="sidebar">

                    <x-blog.side-categories :categories="$categories" />

                    <x-blog.side-recents :recents="$recents" />

                    <x-blog.side-tags :tags="$tags" />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection