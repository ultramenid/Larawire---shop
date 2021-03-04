<div>
    <h1 class="text-3xl font-bold sm:pt-8 pt-4 dark:text-white">Last transaction</h1>
    <div class="flex flex-col py-5">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 ">
                <thead>
                    <tr>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            #
                        </th>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User
                        </th>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            total
                        </th>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            time
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" wire:init='loadPosts'>
                    @forelse ($lists as $item)
                    <tr>
                        <td class="px-4 py-4 text-gray-500 text-center ">
                           {{ $no++ }}
                        </td>
                        <td class="px-4 py-4  text-sm text-gray-900 font-bold text-center">
                            {{ $item->user_name }}
                        </td>
                        <td class="px-4 py-4  text-sm text-gray-500 text-center">
                           Rp {{number_format($item->total,0, ',' , '.')}}
                        </td>
                        <td class="px-4 py-4  text-sm text-gray-500 text-center">
                            {{ $item->created_at }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class=" text-sm text-gray-500 px-6 py-4 text-center">
                            No data found
                        </td>
                    </tr>

                @endforelse
                </tbody>
            </table>
            </div>
        </div>

        </div>

    </div>
    @if ($lists)
    <div class="py-3">
        {{ $lists->links('livewire.pagination') }}
    </div>
    @endif
</div>
