<!-- resources/views/dashboard/admin.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
            <div>
                <a href="{{ route('dashboard') }}" class="text-gray-800 hover:underline">
                    Dashboard
                </a>
                <a href="{{ url('/adminpannel') }}" class="ml-4 text-gray-800 hover:underline">
                    Admin Pannel
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1>Admin Dashboard</h1>
                <p>Welcome, Admin!</p>
                <!-- محتوای مربوط به نقش admin -->
            </div>
        </div>
    </div>
</x-app-layout>
