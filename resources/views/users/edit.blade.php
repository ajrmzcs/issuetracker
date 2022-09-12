<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="shadow-lg overflow-hidden lg:pg-0">
                <div class="py-3 px-5 bg-gray-50">
                    <span class="text-2xl">Edit Issue</span>
                </div>
                <div class="overflow-hidden shadow-sm">
                    @include('partials._session-error')
                    <div class="py-3 px-5 border-b border-gray-200">
                        <form action="{{ route('issues.update', $issue->id) }}" method="POST">
                            @method('PUT')
                            @include('partials.issues._form')

                            <div class="p-8">
                                <label class="block">
                                    <span class="text-gray-700">Status</span>
                                    <span class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        <select class="block w-full mt-1 rounded-md border-gray-300 shadow-sm
                                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                                        @error('status_id') border-red-700 @enderror" name="status_id">
                                            @foreach($statuses as $status)
                                                <option value="{{ $status->id }}"
                                                    {{ (old('status_id') == $status->id || (empty(old('status_id')) && $issue->status_id == $status->id)) ? 'Selected' : ''}}
                                                >{{ ucfirst($status->name) }}</option>
                                            @endforeach
                                        </select>
                                    </span>
                                </label>
                            </div>

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
