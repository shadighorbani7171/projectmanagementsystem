<!-- resources/views/dashboard.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if($role == 'admin')
                    <h1>Admin Dashboard</h1>
                    <p>Welcome, Admin!</p>
                    <!-- محتوای مربوط به نقش admin -->
                @elseif($role == 'team_leader')
                    <h1>Team Leader Dashboard</h1>
                    <p>Welcome, Team Leader!</p>
                    <!-- محتوای مربوط به نقش team_leader -->
                @elseif($role == 'user')
                    <h1>User Dashboard</h1>
                    <p>Welcome, User!</p>
                    <!-- محتوای مربوط به نقش user -->
                @else
                    <h1>Dashboard</h1>
                    <p>Welcome, {{ auth()->user()->name }}!</p>
                    <!-- محتوای پیش‌فرض -->
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
