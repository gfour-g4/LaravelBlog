<x-layouts.blog title="Login">
    <div class="card" style="max-width: 460px; margin: 0 auto;">
        <h1>Login</h1>

        @if (session('status'))
            <p class="muted">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            </div>

            <div style="margin-top: 12px;">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <div class="actions">
                <button type="submit" class="button">Log in</button>
                <a href="{{ route('register') }}">Don't have an account?</a>

            </div>
        </form>
    </div>
</x-layouts.blog>
