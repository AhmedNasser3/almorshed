<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @yield('Content')
            </div>
        </div>
    </div>
</x-app-layout>
