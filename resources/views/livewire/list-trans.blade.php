<div>
    <h1 class="text-4xl font-medium sm:pt-8 pt-4 dark:text-white mb-4">Last transaction</h1>

    <div class="flex flex-col py-5">
        <div class="-my-2  sm:-mx-6 lg:-mx-8 ">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8 ">
                <div class="shadow  border-b border-gray-200 dark:border-gray-800 sm:rounded-lg  dark:text-white" >
                    <table class="w-full divide-y dark:divide-gray-800 divide-gray-200 ">
                        <thead>
                            <tr class="text-xs">
                                <th scope="col" class="px-4 py-1 bg-gray-50 text-center dark:bg-opacity-10   dark:text-white   text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col" class="px-4 py-1 bg-gray-50 dark:bg-opacity-10 dark:text-white  text-center  text-gray-500 uppercase tracking-wider">
                                    User
                                </th>
                                <th scope="col" class="px-4 py-1 bg-gray-50 dark:bg-opacity-10 dark:text-white  text-center  text-gray-500 uppercase tracking-wider">
                                    total
                                </th>
                                <th scope="col" class="px-4 py-1 bg-gray-50 dark:bg-opacity-10 dark:text-white  text-center  text-gray-500 uppercase tracking-wider">
                                    time
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-opacity-20 dark:text-white divide-y dark:divide-gray-800 divide-gray-200" wire:init='loadPosts'>
                            @forelse ($lists as $item)
                            <tr>
                                <td class="px-4 py-3 text-gray-500 dark:text-gray-300 text-center ">
                                {{ $no++ }}
                                </td>
                                <td class="px-4 py-3  text-sm font-bold text-gray-500 dark:text-gray-100  text-center">
                                    {{ $item->user_name }}
                                </td>
                                <td class="px-4 py-3  text-sm text-gray-500 dark:text-gray-300 text-center">
                                Rp {{number_format($item->total,0, ',' , '.')}}
                                </td>
                                <td class="px-4 py-3  text-sm text-gray-500 dark:text-gray-300 text-center">
                                    {{ $item->created_at }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class=" text-sm text-gray-500 px-6 py-3 text-center">
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
