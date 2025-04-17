<x-app-layout>
    <form method="GET">
        <input name="search" placeholder="Search name/email">
        <select name="verified">
            <option value="">All</option>
            <option value="1">Verified Only</option>
        </select>
        <button type="submit">Filter</button>
    </form>
    <table>
        <tr><th>Name</th><th>Email</th><th>Verified</th></tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
        </tr>
        @endforeach
    </table>
</x-app-layout>
