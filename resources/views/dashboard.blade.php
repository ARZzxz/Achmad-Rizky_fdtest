<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-2">Hi, {{ $user->name }} 👋</h3>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Verified:</strong> 
                    {{ $user->email_verified_at ? '✅ Verified' : '❌ Not Verified' }}
                </p>

                <div class="mt-4">
                    <a href="{{ route('books.index') }}" class="text-blue-600 underline">Go to Book Management</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
