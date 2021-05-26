<div class="sm:col-span-10 col-span-12 space-y-1">
<h1 class="text-gray-900 font-bold text-2xl mb-2 dark:text-gray-100">Product Category</h1>

    <div class="fixed z-20 inset-x-0 bottom-0 flex flex-col items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:justify-start space-y-2" x-show.transition="open">
        @forelse ($notification as $key => $value)
        <div
            class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto"
        >

            <div class="rounded-lg shadow-xs overflow-hidden ">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            @include('livewire.etcCategory.typeToast')
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm leading-5 font-medium text-gray-900">{{$value['message']}}</p>

                        </div>
                        <div class="ml-4 flex-shrink-0 flex">
                            <button class="inline-flex text-gray-400 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150" wire:click='closeToast({{$key}})'>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <a></a>
    @endforelse
    </div>

    <div class="sm:text-left text-center">
        <button wire:loading.remove wire:target='create' wire:click='create' class=" py-1 focus:outline-none border border-gray-300 hover:border-gray-600 text-gray-500  hover:text-gray-900  text-center rounded md:w-20 w-full  dark:text-gray-400 dark:border-gray-400">
            Add
        </button>
        <button wire:loading wire:target='create' class=" py-1 focus:outline-none border border-gray-300 hover:border-gray-600 text-gray-500  hover:text-gray-900 w-20  text-center rounded">
            Add. . .
        </button>
    </div>

    <div x-data="{ open: @entangle('deleter') }">
        @include('livewire.etcCategory.deleteCategory')
    </div>

    <div x-data="{ open: @entangle('isUpdate') }">
        @include('livewire.etcCategory.UpdateCategory')
    </div>
    <div x-data="{ open: @entangle('isCreating') }">
        @include('livewire.etcCategory.createCategory')
    </div>

    <div class="flex flex-col py-5">
        <div class="-my-2  sm:-mx-6 lg:-mx-8 ">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8 ">
                <div class="shadow  border-b border-gray-200 dark:border-gray-800 sm:rounded-lg dark:bg-gray-800 dark:text-white" >
                    <table class="w-full divide-y dark:divide-gray-800 divide-gray-200 ">
                        <thead>
                            <tr>
                                <th scope="col" class="px-4 py-3 bg-gray-50 dark:bg-gray-700 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">
                                    #
                                </th>
                                <th scope="col" class="px-4 py-3 bg-gray-50 dark:bg-gray-700 dark:text-white text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-10/12">
                                    Name
                                </th>
                                <th class=" bg-gray-50 dark:bg-gray-700 dark:text-white">

                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:text-white dark:divide-gray-900" wire:init='loadPosts'>
                            @forelse ($category as $item)
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <a class="text-gray-500 dark:text-gray-300">
                                        {{ $no++ }}
                                    </a>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap text-sm font-bold text-gray-900 dark:text-gray-300">
                                    {{ $item->name }}
                                </td>
                                {{-- <td class=" text-sm text-gray-500 text-center">
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

                                </td> --}}
                                <td class="px-2 py-4 break-words text-sm text-gray-500 dark:text-gray-300">
                                    <div class="relative ml-6 " x-data="{ open: false }">
                                        <button class="block focus:outline-none" @click="open = true">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                              </svg>
                                        </button>

                                        <ul
                                            class="absolute mt-2 right-0 bg-white rounded-lg shadow-lg block w-24 z-10"
                                            x-show="open"
                                            @click.away="open = false"
                                        >
                                          <li class="block hover:bg-gray-200 cursor-pointer py-1 mt-2 px-4 dark:text-gray-500" wire:click="edit({{ $item->id }})" @click.away="open = false">Edit</li>
                                          <li class="block hover:bg-gray-200 cursor-pointer  py-1 mb-2 px-4 dark:text-gray-500" wire:click="delete({{ $item->id }})" @click.away="open = false">Delete</li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="whitespace-nowrap text-sm text-gray-500 dark:text-gray-300  px-6 py-4">
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
    @if ($category)
    <div class="py-3">
        {{ $category->links('livewire.pagination') }}
    </div>
    @endif



</div>

