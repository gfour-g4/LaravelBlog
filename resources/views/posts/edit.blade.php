<x-layouts.blog title="Edit Post">
    <div class="card">
        <h1>Edit Post</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" style="margin-top: 24px;">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div style="margin-top: 20px;">
                <label for="content">Content</label>
                <textarea id="content" name="content" rows="8" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="actions">
                <button type="submit" class="button">Update</button>
                <a href="{{ route('posts.show', $post) }}">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.blog>
