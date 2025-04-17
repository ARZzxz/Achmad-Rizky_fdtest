<x-app-layout>
    <h2>Welcome {{ $user->name }}</h2>
    <p>Email: {{ $user->email }} - Verified: {{ $user->email_verified_at ? 'Yes' : 'No' }}</p>
</x-app-layout>
