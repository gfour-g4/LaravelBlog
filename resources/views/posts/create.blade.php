<x-layouts.blog title="Create Post">
    <div class="card">
        <h1>Create Post</h1>

        <form action="{{ route('posts.store') }}" method="POST" style="margin-top: 24px;">
            @csrf

            <div>
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div style="margin-top: 20px;">
                <label for="content">Content</label>
                <textarea id="content" name="content" rows="8" required>{{ old('content') }}</textarea>
            </div>

            <div class="actions">
                <button type="submit" class="button">Save</button>
                <a href="{{ route('posts.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.blog>
