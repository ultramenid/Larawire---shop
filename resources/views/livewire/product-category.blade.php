<div class="sm:col-span-10 col-span-12 space-y-3">
    <h1 class="text-gray-900 font-bold text-2xl">Product Category</h1>

    {{-- <button wire:click="create()" class="border border-gray-300 hover:border-gray-600 text-gray-500 hover:text-white hover:bg-black w-20 px-1 text-center rounded focus:outline-none">
        Create
    </button>

    @if ($isCreating)
        @include('livewire.etcCategory.createCategory')
    @elseif($isUpdate)
        @include('livewire.etcCategory.UpdateCategory')

    @endif --}}

    <div x-data="{ open: @entangle('isCreating')}">
        {{-- <button @click="open = true">Show More...</button> --}}
        <button @click="open = true" class="border border-gray-300 hover:border-gray-600 text-gray-500 hover:text-gray-900 w-20 px-1 text-center rounded">
            Create
        </button>
        <div x-show="open" @click.away="open = false">
            @include('livewire.etcCategory.createCategory')
        </div>
    </div>


    @if($isUpdate)
        @include('livewire.etcCategory.UpdateCategory')
    @endif


    <div class="flex flex-col py-5">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
            <table class="w-full divide-y divide-gray-200 ">
                <thead>
                <tr>
                    <th scope="col" class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        #
                    </th>
                    <th scope="col" class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th  class=" bg-gray-50">

                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" wire:init='loadPosts'>
                @forelse ($category as $item)
                    <tr>
                        <td class="px-4 py-4 whitespace-nowrap">
                            <a class="text-gray-500 ">
                                {{ $no++ }}
                            </a>
                        </td>
                        <td class="px-4 py-4 whitespace-nowrap text-sm font-bold text-gray-900">
                            {{ $item->name }}
                        </td>
                        <td class=" text-sm text-gray-500 text-center">
                            <button wire:loading.remove wire:target='edit'  onclick="confirm('Confirm delete?') || event.stopImmediatePropagation()" wire:click="deleting({{ $item->id }})" class="focus:outline-none mr-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-red-600" href="#">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                  </svg>
                            </button>
                            <button wire:loading.remove class="mr-3 focus:outline-none" wire:click="edit({{ $item->id }})" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-4 w-4 text-blue-500" href="#">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                  </svg>
                            </button>
                            <button wire:loading wire:target='edit({{ $item->id }})' class="px-3 focus:outline-none" >
                                <svg class="animate-spin mx-auto h-4 w-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </button>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td class="whitespace-nowrap text-sm text-gray-500 px-6 py-4">
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
