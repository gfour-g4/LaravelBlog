<x-layouts.blog title="Users">
    <h1>All Users</h1>

    <div class="card">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
            <tr>
                <th style="text-align: left; border-bottom: 1px solid #eee; padding: 12px 8px;">Name</th>
                <th style="text-align: left; border-bottom: 1px solid #eee; padding: 12px 8px;">Email</th>
                <th style="text-align: left; border-bottom: 1px solid #eee; padding: 12px 8px;">Role</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td style="padding: 12px 8px; border-bottom: 1px solid #f5f5f5;">{{ $user->name }}</td>
                    <td style="padding: 12px 8px; border-bottom: 1px solid #f5f5f5;">{{ $user->email }}</td>
                    <td style="padding: 12px 8px; border-bottom: 1px solid #f5f5f5;">
                        <form action="{{ route('users.update-role', $user) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <select name="role" onchange="this.form.submit()" style="padding: 6px 10px; border: 1px solid #ddd; border-radius: 2px; font-size: 14px;">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="author" {{ $user->role === 'author' ? 'selected' : '' }}>Author</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.blog>
