<div class="sm:col-span-10 col-span-12 space-y-1">
<h1 class="text-gray-900 font-bold text-2xl mb-2 dark:text-gray-100">Product list</h1>

    <div class=" sm:text-left text-center">
        <button wire:loading.remove wire:target='create' wire:click='create' class="focus:outline-none border border-gray-300 hover:border-gray-600 text-gray-500  hover:text-gray-900 w-20  text-center rounded">
            Add
        </button>
        <button wire:loading wire:target='create' class="focus:outline-none border border-gray-300 hover:border-gray-600 text-gray-500  hover:text-gray-900 w-20  text-center rounded">
            Add. . .
        </button>
    </div>

        @if ($isCreating)
            @include('livewire.etcList.createProducts')
        @endif
        @if($isUpdate)
            @include('livewire.etcList.updateProducts')
        @endif
        @if($deleter)
            @include('livewire.etcList.deleteProducts')
        @endif

        <div class="text-right">
            <label class="text-gray-600 dark:text-gray-300 mr-2 text-sm">Search </label>
            <input type="text" class=" appearance-none border rounded sm:w-1/4 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" wire:model.debounce.300ms="search">
        </div>
    <div class="flex flex-col py-5 ">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-auto border-b border-gray-200 sm:rounded-lg">
                    <table class="w-full divide-y divide-gray-200 ">
                        <thead>
                            <tr>
                                <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-6/12">
                                    Name
                                </th>
                                <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                                    Price
                                </th>
                                <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                                    Quantity
                                </th>
                                <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                                    Discount
                                </th>
                                <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-2/12">
                                    Image
                                </th>
                                <th class="px-4 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                                    #
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200" wire:init='loadPosts'>
                            @forelse ($products as $item)
                            <tr>
                                <td class="px-4 py-4 break-words text-sm font-bold text-gray-500">
                                    {{ $item->name }}
                                </td>
                                <td class="px-4 py-4 break-words text-sm font-bold text-gray-500">
                                    {{ $item->price }}
                                </td>
                                <td class="px-4 py-4 break-words text-sm font-bold text-gray-500">
                                    {{ $item->quantity }}
                                </td>
                                <td class="px-4 py-4 break-words text-sm font-bold text-gray-500">
                                    {{ $item->discount }} %
                                </td>
                                <td class="px-4 py-4 break-words text-sm font-bold text-gray-500 ">
                                    <img src="{{ url('/storage/'.$item->photo) }}  " alt="" class="h-12 w-12">
                                </td>
                                <td class=" text-sm text-gray-500 text-center">
                                    <button wire:click="delete({{ $item->id }})" wire:loading.remove wire:target='delete({{ $item->id }})' class="focus:outline-none px-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-600" href="#">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                    <button wire:loading wire:target='delete({{ $item->id }})' class=" focus:outline-none px-3">
                                        <svg class="animate-spin mx-auto h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </button>

                                    <button wire:loading wire:target='edit({{ $item->id }})' class=" focus:outline-none px-3">
                                        <svg class="animate-spin mx-auto h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                    </button>
                                    <button wire:loading.remove wire:target='edit({{ $item->id }})' class="px-3 focus:outline-none" wire:click="edit({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-blue-500" href="#">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="whitespace-nowrap text-sm text-gray-500 px-6 py-4">
                                    No data found
                                </td>
                            </tr>
                            @endforelse
                            <!-- More rows... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if ($products)
    {{ $products->links('livewire.pagination') }}
    @endif
</div>
