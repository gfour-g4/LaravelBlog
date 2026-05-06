<x-layouts.blog title="All Posts">
    <h1>All Posts</h1>

    <form action="{{ route('posts.index') }}" method="GET" style="margin-bottom: 24px;">
        <input 
            type="text" 
            name="search" 
            placeholder="Search posts by title or content..." 
            value="{{ $search ?? '' }}"
            style="padding: 8px 12px; width: 100%; max-width: 400px; margin-right: 8px;"
        >
        <select name="sort" style="padding: 8px 12px; margin-right: 8px;">
            <option value="newest" {{ ($sort ?? 'newest') === 'newest' ? 'selected' : '' }}>Newest first</option>
            <option value="oldest" {{ ($sort ?? 'newest') === 'oldest' ? 'selected' : '' }}>Oldest first</option>
            <option value="title-asc" {{ ($sort ?? 'newest') === 'title-asc' ? 'selected' : '' }}>Title (A-Z)</option>
            <option value="title-desc" {{ ($sort ?? 'newest') === 'title-desc' ? 'selected' : '' }}>Title (Z-A)</option>
            <option value="likes" {{ ($sort ?? 'newest') === 'likes' ? 'selected' : '' }}>Most likes</option>
            <option value="dislikes" {{ ($sort ?? 'newest') === 'dislikes' ? 'selected' : '' }}>Most dislikes</option>
        </select>
        <button type="submit" style="padding: 8px 16px;">Search</button>
        @if($search ?? '')
            <a href="{{ route('posts.index', ['sort' => $sort ?? 'newest']) }}" style="padding: 8px 16px; margin-left: 8px; text-decoration: none; color: inherit;">Clear</a>
        @endif
    </form>

    @if($search ?? '')
        <p style="margin-bottom: 16px;">Showing results for: <strong>{{ $search }}</strong></p>
    @endif

    @forelse($posts as $post)
        <div class="card" style="display: flex; gap: 20px; align-items: flex-start;">
            <div style="flex-shrink: 0;">
                @php
                    preg_match('/<img[^>]+src="([^"]+)"/', $post->content, $matches);
                    $imageUrl = $matches[1] ?? null;
                @endphp
                @if($imageUrl)
                    <img src="{{ $imageUrl }}" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                @else
                    <div style="width: 100px; height: 100px; background: #f0f0f0; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #999;">
                        📝
                    </div>
                @endif
            </div>
            <div style="flex: 1;">
                <h2>
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                </h2>
                <p class="muted">By {{ $post->user->name }} · {{ $post->created_at ? $post->created_at->format('F j, Y \a\t g:i A') : '' }}</p>
                @php
                    $contentWithoutImage = preg_replace('/<img[^>]+>/', '', $post->content);
                @endphp
                <div>{!! \Illuminate\Support\Str::limit(strip_tags($contentWithoutImage), 200) !!}</div>
                <div class="muted" style="margin-top: 8px;">
                    {{ $post->likes }} likes · {{ $post->dislikes }} dislikes
                </div>
            </div>
        </div>
    @empty
        <p class="muted">No posts yet.</p>
    @endforelse
</x-layouts.blog>
