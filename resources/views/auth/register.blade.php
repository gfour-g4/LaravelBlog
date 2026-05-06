<x-layouts.blog title="Register">
    <div class="card" style="max-width: 460px; margin: 0 auto;">
        <h1>Register</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            </div>

            <div style="margin-top: 12px;">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            </div>

            <div style="margin-top: 12px;">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>

            <div style="margin-top: 12px;">
                <label for="password_confirmation">Confirm password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="actions">
                <button type="submit" class="button">Register</button>
                <a href="{{ route('login') }}">Already registered?</a>
            </div>
        </form>
    </div>
</x-layouts.blog>
