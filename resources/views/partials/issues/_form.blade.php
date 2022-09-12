<div class="p-8 space-y-4">
    @csrf
    <label class="block">
        <span class="text-gray-700">Title</span>
        <input type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                                focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                                @error('title') border-red-700 @enderror"
               name="title"
               placeholder="" value="{{ old('title', $issue->title) }}">
    </label>

    <label class="block">
        <span class="text-gray-700">Description</span>
        <textarea class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    border-gray-300
                    shadow-sm
                    focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                    @error('description') border-red-700 @enderror"
                  rows="5"
                  name="description">{{ old('description', $issue->description) }}</textarea>
    </label>
</div>
