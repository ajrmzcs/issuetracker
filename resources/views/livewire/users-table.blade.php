<div>
    <div class="border-gray-200">
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
                                    Avatar
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <a wire:click.prevent="sortBy('name')" class="flex items-center" href="">
                                        Name @include('partials._sort-icon', ['field' => 'name'])
                                    </a>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <a wire:click.prevent="sortBy('email')" class="flex items-center" href="">
                                        Email @include('partials._sort-icon', ['field' => 'email'])
                                    </a>
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Is Admin
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <a wire:click.prevent="sortBy('created_at')" class="flex items-center" href="">
                                        Created @include('partials._sort-icon', ['field' => 'created_at'])
                                    </a>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($users as $user)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <img class="h-12 w-12 rounded-full"  src="{{ $user->avatar }}" alt="User Avatar">
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->email }}</div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">
                                                @include('partials._is-admin', ['isAdmin' => $user->is_admin])
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->created_at }}</div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <span class="text-sm font-medium text-gray-900">There are no users yet</span>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 text-sm font-medium text-gray-900">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

