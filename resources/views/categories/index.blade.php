<x-app-layout>
    <div class  ="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('partials._session-success')
                    @include('partials._session-error')
                    <div class="mt-4">
                        @livewire('categories-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
