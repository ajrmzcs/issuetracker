<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg overflow-hidden lg:pg-0">
                <div class="py-3 px-5 bg-gray-50">
                    <span class="text-2xl">Create Issue</span>
                </div>
                <div class="overflow-hidden shadow-sm">
                    @include('partials._session-error')
                    <div class="py-3 px-5 border-b border-gray-200">
                        <form action="{{ route('issues.store') }}" method="POST">
                            @include('partials.issues._form')

                            <div class="flex space-x-4">
                                <button
                                    type="submit"
                                    class="bg-green-500 text-white font-bold uppercase px-6 py-2 rounded font-medium
                                    hover:bg-green-600 transition duration-200 each-in-out">
                                    Submit
                                </button>
                                <button
                                    type="reset"
                                    class="bg-gray-500 text-white font-bold uppercase px-6 py-2 rounded font-medium
                                    hover:bg-gray-600 transition duration-200 each-in-out">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
