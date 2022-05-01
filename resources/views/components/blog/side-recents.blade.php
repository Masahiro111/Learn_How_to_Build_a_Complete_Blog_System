@props(['recents'])

<div class="side">
    <h3 class="sidebar-heading">Recent Blog</h3>

    @foreach ($recents as $recent)
    <div class="f-blog">
        <a
           href="{{ route('post.show', $recent) }}"
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