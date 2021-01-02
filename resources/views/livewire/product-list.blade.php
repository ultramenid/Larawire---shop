<div class="sm:col-span-10 col-span-12 space-y-1">
    <h1 class="text-gray-900 font-bold text-2xl mb-2">Product list</h1>


    <button wire:click="create()" class="border border-gray-300 hover:border-gray-600 text-gray-500 hover:text-white hover:bg-black w-20 px-1 text-center rounded focus:outline-none">
        Create
    </button>

    @if ($isCreating)
    @include('livewire.etcList.createProducts')
    @elseif($isUpdate)
        @include('livewire.etcList.updateProducts')
    @endif

    <div class="text-right">
        <label class="text-gray-900 mr-2 ">Search </label>
        <input  type="text" class=" appearance-none border rounded sm:w-1/4 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" wire:model.debounce.300ms="search">

    </div>


    <div class="flex flex-col py-5">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
            <div class="shadow overflow border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 ">
                <thead>
                    <tr>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Discount
                        </th>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th scope="col" class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">

                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 w-11/12" wire:init='loadPosts'>
                    @forelse ($products as $item)
                    <tr>
                        <td class="px-4 py-4 text-gray-900 font-bold">
                            {{-- <a class="text-gray-900 font-bold"> --}}
                                {{ $item->name }}
                            {{-- </a> --}}
                        </td>
                        <td class="px-4 py-4  text-sm text-gray-500">
                            {{ $item->price }}
                        </td>
                        <td class="px-4 py-4  text-sm text-gray-500">
                            {{ $item->quantity }}
                        </td>
                        <td class="px-4 py-4  text-sm text-gray-500">
                            {{ $item->discount }} %
                        </td>
                        <td class="px-4 py-4  text-sm text-gray-500">
                            <img src="{{ Storage::url($item->photo) }}" alt="" class="h-12 w-12">
                        </td>
                        <td class="flex px-4 py-8  text-sm text-gray-500 text-center">
                            <button  onclick="confirm('Confirm delete?') || event.stopImmediatePropagation()" wire:click="deleting({{ $item->id }})" class="focus:outline-none mr-3 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-600" href="#">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                            <button class="mr-3 focus:outline-none" wire:click="edit({{ $item->id }})" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-blue-500" href="#">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </button>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class=" text-sm text-gray-500 px-6 py-4">
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
        @if ($products)
        {{ $products->links('livewire.pagination') }}
        @endunless
</div>
