<x-layouts.blog :title="$post->title">
    <div class="card">
        <h1>{{ $post->title }}</h1>
        <p class="muted">By {{ $post->user->name }} · {{ $post->created_at ? $post->created_at->format('F j, Y \a\t g:i A') : '' }}</p>
        <div style="margin-top: 24px;">{!! $post->content !!}</div>
        <div class="muted" style="margin-top: 20px;">
            {{ $post->likes }} likes · {{ $post->dislikes }} dislikes
        </div>

        @auth
            <div class="actions">
                <form action="{{ route('posts.like', $post) }}" method="POST">
                    @csrf
                    <button type="submit" class="button">Like</button>
                </form>
                <form action="{{ route('posts.dislike', $post) }}" method="POST">
                    @csrf
                    <button type="submit" class="button button-danger">Dislike</button>
                </form>
            </div>
        @endauth

        <div class="actions">
            <a href="{{ route('posts.index') }}">← Back</a>

            @auth
                @if(auth()->user()->isAdmin() || auth()->id() === $post->user_id)
                    <a class="button" href="{{ route('posts.edit', $post) }}">Edit</a>

                    <form action="{{ route('posts.destroy', $post) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button button-danger">Delete</button>
                    </form>
                @endif
            @endauth
        </div>
    </div>

    <div class="card">
        <h2>Comments</h2>

        @auth
            <form action="{{ route('comments.store', $post) }}" method="POST" style="margin-top: 20px;">
                @csrf
                <div>
                    <label for="content">Add a comment</label>
                    <textarea id="content" name="content" rows="3" required>{{ old('content') }}</textarea>
                </div>
                <div class="actions">
                    <button type="submit" class="button">Post</button>
                </div>
            </form>
        @else
            <p class="muted" style="margin-top: 20px;">Login to write a comment.</p>
        @endauth

        <div style="margin-top: 32px;">
            @forelse($post->comments->sortByDesc('id') as $comment)
                <div style="padding: 20px; background: #fafafa; border-radius: 4px; margin-bottom: 16px;">
                    <p><strong>{{ $comment->user->name }}</strong></p>
                    <p style="margin: 8px 0;">{{ $comment->content }}</p>
                    <div class="muted">
                        {{ $comment->likes }} likes · {{ $comment->dislikes }} dislikes
                    </div>

                    @auth
                        <div class="actions">
                            <form action="{{ route('comments.like', $comment) }}" method="POST">
                                @csrf
                                <button type="submit" class="button">Like</button>
                            </form>
                            <form action="{{ route('comments.dislike', $comment) }}" method="POST">
                                @csrf
                                <button type="submit" class="button button-danger">Dislike</button>
                            </form>
                        </div>
                    @endauth

                    @auth
                        @if(auth()->user()->isAdmin() || auth()->id() === $comment->user_id)
                            <div class="actions" style="margin-top: 8px;">
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button button-danger">Delete</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            @empty
                <p class="muted" style="margin-top: 20px;">No comments yet.</p>
            @endforelse
        </div>
    </div>
</x-layouts.blog>
