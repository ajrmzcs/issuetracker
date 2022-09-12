<div>
    <div class="border-gray-200">
        <div class="mt-10">
            <a href="{{ route('issues.create') }}"
               type="button"
               class="bg-green-500 text-white font-bold uppercase px-6 py-2 rounded font-medium
                                hover:bg-green-600 transition duration-200 each-in-out">
                Add
            </a>
        </div>
        <div class="flex flex-col mt-10">
            <div class="my-4 row">
                <div class="flex items-center text-sm font-medium text-gray-900">
                    <select wire:model="perPage" class="block w-2/12 mt-1 rounded-md border-gray-300 shadow-sm
                        focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                    </select>
                </div>

                <div class="mt-2 text-sm font-medium text-gray-900">
                    <input wire:model.debounce.1000ms="search" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm
                       focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           type="text" placeholder="Search">
                </div>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200">
                        <table class="w-full table-auto divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <a wire:click.prevent="sortBy('title')" class="flex items-center" href="">
                                        Title @include('partials._sort-icon', ['field' => 'title'])
                                    </a>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <a wire:click.prevent="sortBy('description')" class="flex items-center" href="">
                                        Description @include('partials._sort-icon', ['field' => 'description'])
                                    </a>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <a wire:click.prevent="sortBy('user_name')" class="flex items-center" href="">
                                        Reported By @include('partials._sort-icon', ['field' => 'user_name'])
                                    </a>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <a wire:click.prevent="sortBy('created_at')" class="flex items-center" href="">
                                        Created @include('partials._sort-icon', ['field' => 'created_at'])
                                    </a>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($issues as $issue)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $issue->title }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $issue->description }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $issue->user_name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="text-{{ $issue->status_color }}-800 text-sm font-bold mr-2 px-2.5 py-0.5
                                            rounded">
                                                    {{ ucfirst($issue->status_name) }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $issue->created_at }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium">
                                        <div class="flex">
                                            <a href="{{ route('issues.edit', $issue->id) }}" class="text-blue-800 hover:text-blue-900"
                                               title="edit"><x-edit-icon /></a>
                                            @if($deleteId === $issue->id)
                                                <div class="ml-2 text-red-800">
                                                    Sure?
                                                </div>
                                                <a wire:click.prevent="destroy({{ $issue->id }})" href="#" class="ml-2 text-red-800 hover:text-red-900">
                                                    Yes
                                                </a>
                                                <a wire:click.prevent="resetDelete" href="#" class="ml-2 text-red-800 hover:text-red-900">
                                                    No
                                                </a>
                                            @else
                                                <a wire:click.prevent="confirmDelete({{ $issue->id }})" href="#" class="ml-2 text-red-800 hover:text-red-900"
                                                   title="delete"><x-delete-icon />
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <span class="text-sm font-medium text-gray-900">There are no issues yet</span>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 text-sm font-medium text-gray-900">
                        {{ $issues->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
