<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">User List</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <form method="GET" class="mb-4 flex gap-4 items-center">
                <input type="text" name="search" placeholder="Search name/email" class="border p-2 rounded" value="{{ request('search') }}">

                <select name="verified" class="border p-2 rounded">
                    <option value="">All</option>
                    <option value="1" {{ request('verified') === '1' ? 'selected' : '' }}>Verified</option>
                    <option value="0" {{ request('verified') === '0' ? 'selected' : '' }}>Unverified</option>
                </select>

                <button class="px-4 py-2 bg-blue-600 text-white rounded">Apply</button>
            </form>

            <div class="bg-white shadow p-4 rounded">
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Email Verified</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->email_verified_at ? '✅ Verified' : '❌ Not Verified' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
