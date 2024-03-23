<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="row justify-content-center d-flex">
        <div class="card mt-2 py-12 col-6">
            <p class="text-center">Your Registration is pending approval from an Admin</p><br>
            <p class="text-center">Please be patient. We will notify you.</p>
        </div>
    </div>
</x-app-layout>
