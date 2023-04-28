<aside class="blog__sidebar">

    <div class="widget">
        <form action="#" class="search-form">
            <input type="text" placeholder="Search">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>

    <div class="widget">
        <h4 class="widget-title">Recent Blog</h4>
        <ul class="rc__post">
            @foreach ($recentBlogs as $recentBlog)
                <li class="rc__post__item">
                    <div class="rc__post__thumb">
                        <a href="blog-details.html"><img src="{{ asset($recentBlog->image) }}" alt=""></a>
                    </div>
                    <div class="rc__post__content">
                        <h5 class="title"><a href="blog-details.html">{{ $recentBlog->title }}</a></h5>
                        <span class="post-date"><i
                                class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($recentBlog->created_at)->diffForHumans() }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="widget">
        <h4 class="widget-title">Categories</h4>
        <ul class="sidebar__cat">
            @foreach ($categories as $category)
                <li class="sidebar__cat__item"><a href="{{ route('blog.category', $category->id) }}">{{ $category->name }} (6)</a></li>
            @endforeach
        </ul>
    </div>
    
    <div class="widget">
        <h4 class="widget-title">Recent Comment</h4>
        <ul class="sidebar__comment">
            <li class="sidebar__comment__item">
                <a href="blog-details.html">Rasalina Sponde</a>
                <p>There are many variations of passages of lorem ipsum available, but the majority
                    have</p>
            </li>
            <li class="sidebar__comment__item">
                <a href="blog-details.html">Rasalina Sponde</a>
                <p>There are many variations of passages of lorem ipsum available, but the majority
                    have</p>
            </li>
            <li class="sidebar__comment__item">
                <a href="blog-details.html">Rasalina Sponde</a>
                <p>There are many variations of passages of lorem ipsum available, but the majority
                    have</p>
            </li>
            <li class="sidebar__comment__item">
                <a href="blog-details.html">Rasalina Sponde</a>
                <p>There are many variations of passages of lorem ipsum available, but the majority
                    have</p>
            </li>
        </ul>
    </div>
    <div class="widget">
        <h4 class="widget-title">Popular Tags</h4>
        <ul class="sidebar__tags">
            <li><a href="blog.html">Business</a></li>
            <li><a href="blog.html">Design</a></li>
            <li><a href="blog.html">apps</a></li>
            <li><a href="blog.html">landing page</a></li>
            <li><a href="blog.html">data</a></li>
            <li><a href="blog.html">website</a></li>
            <li><a href="blog.html">book</a></li>
            <li><a href="blog.html">Design</a></li>
            <li><a href="blog.html">product design</a></li>
            <li><a href="blog.html">landing page</a></li>
            <li><a href="blog.html">data</a></li>
        </ul>
    </div>
</aside>
