<div class="sm:col-span-10 col-span-12 space-y-1">
 <h1 class="text-gray-900 font-bold text-2xl mb-2 dark:text-gray-100">Product list</h1>

    {{-- Toast component --}}
    <livewire:toastr/>

    <div class="sm:text-left text-center">
        <button wire:loading.remove wire:target='create' wire:click='create' class="  focus:outline-none border border-gray-300 hover:border-gray-600 text-gray-500  hover:text-gray-900  text-center rounded md:w-20 w-full  dark:text-gray-400 dark:border-gray-400">
            Add
        </button>
        <button wire:loading wire:target='create'class="  focus:outline-none border border-gray-300 hover:border-gray-600 text-gray-500  hover:text-gray-900  text-center rounded md:w-20 w-full  dark:text-gray-400 dark:border-gray-400">
            Add. . .
        </button>
    </div>

        <div x-data="{ open: @entangle('deleter') }">
            @include('livewire.etcList.deleteProducts')
        </div>

        <div x-data="{ open: @entangle('isUpdate') }">
            @include('livewire.etcList.updateProducts')
        </div>
        <div x-data="{ open: @entangle('isCreating') }">
            @include('livewire.etcList.createProducts')
        </div>


        <div class="text-right">
            <label class="text-gray-600 dark:text-gray-300 mr-2 text-sm" placeholder="...">Search </label>
            <input type="text" class="mb-6 dark:bg-black dark:border-opacity-60 dark:border-gray-700 dark:text-gray-300 appearance-none border rounded lg:w-1/4 w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" wire:model.debounce.300ms="search">
        </div>

        <div class="flex flex-col py-5">
            <div class="-my-2  sm:-mx-6 lg:-mx-8 ">
                <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8 ">
                    <div class="shadow  border-b border-gray-200 dark:border-gray-800 sm:rounded-lg dark:bg-opacity-10  dark:text-white " >
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-800 rounded-lg  ">
                        <thead >
                            <tr >
                                <th wire:click='sortingField("name")' class="px-4 py-3 bg-gray-50 dark:bg-opacity-10  dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sm:w-6/12 w-10/12">
                                   <div class="flex space-x-1">
                                       <a>Name</a>
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                    </div>
                                </th>
                                <th wire:click='sortingField("price")' class="px-4 py-3 bg-gray-50 dark:bg-opacity-10  dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sm:w-1/12 w-0 ">
                                    <div class="flex space-x-1">
                                        <a class="hidden sm:block">Price</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 my-auto hidden sm:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                     </div>
                                </th>
                                <th wire:click='sortingField("quantity")' class="px-4 py-3 bg-gray-50 dark:bg-opacity-10  dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer w-1/12">
                                    <div class="flex space-x-1">
                                        <a>Quantity</a>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                        </svg>
                                     </div>
                                </th>
                                <th class="px-4 py-3 bg-gray-50 dark:bg-opacity-10  dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-1/12 w-0">
                                    <a class="hidden sm:block">Discount</a>
                                </th>
                                <th class="px-4 py-3 bg-gray-50 dark:bg-opacity-10  dark:text-white text-center text-xs font-medium text-gray-500 uppercase tracking-wider  sm:w-2/12 w-0">
                                    <a class="hidden sm:block">Image</a>
                                </th>
                                <th class=" bg-gray-50 dark:bg-opacity-10  dark:text-white text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-opacity-20 dark:text-white divide-y divide-gray-200 dark:divide-gray-900" wire:init='loadPosts'>
                            @if ($readyToLoad)
                                @includeWhen($readyToLoad, 'livewire.etcList.skeletonTable')
                            @else
                            @forelse ($products as $item)
                            <tr>
                                <td class="px-4 py-3 break-words text-sm font-bold text-gray-500 dark:text-gray-100">
                                    {{ $item->name }}
                                </td>
                                <td class="px-4 py-3 break-words text-sm  text-gray-500 dark:text-gray-300">
                                    <a class="hidden sm:block">{{ $item->price }}</a>
                                </td>
                                <td class="px-4 py-3 break-words text-sm  text-gray-500 dark:text-gray-300 sm:text-left text-center ">
                                    <a >{{ $item->quantity }}</a>
                                </td>
                                <td class="px-4 py-3 break-words text-sm  text-gray-500 dark:text-gray-300  ">
                                    <a class="hidden sm:block">{{ $item->discount }} %</a>
                                </td>
                                <td class="px-4 py-3 break-words text-sm  text-gray-500 dark:text-gray-300 hidden sm:block">
                                    <img src="{{ asset('storage/'.$item->photo) }}  " alt="" class="h-12 mx-auto ">
                                </td>
                                <td colspan="2" class=" break-words text-sm text-gray-500 dark:text-gray-300 ">
                                    <div class="relative " x-data="{ open: false }">

                                        <button class="block focus:outline-none text-center" @click="open = true">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                              </svg>
                                        </button>

                                        <ul
                                            class="absolute mt-2 right-0 bg-white rounded-lg shadow-lg block w-24 z-10"
                                            x-show.transition="open"
                                            @click.away="open = false"
                                            x-cloak style="display: none !important">
                                            <li class="block hover:bg-gray-200 cursor-pointer py-1 mt-2 px-4 dark:text-gray-500" wire:click="edit({{ $item->id }})" @click.away="open = false">Edit</li>
                                            <li class="block hover:bg-gray-200 cursor-pointer  py-1 mb-2 px-4 dark:text-gray-500" wire:click="delete({{ $item->id }})" @click.away="open = false">Delete</li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="whitespace-nowrap text-sm text-gray-500 px-6 py-3">
                                    No data found
                                </td>
                            </tr>
                            @endforelse
                            @endif
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


