<div class="fixed z-20 inset-0 overflow-y-auto " x-show.transition="open" x-cloak style="display: none !important">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-200 dark:bg-black opacity-50"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <h1 class="text-center px-4 text-xl pt-10">Create product</h1>
            {{-- <p class="text-gray-500 px-4 text-center pt-5">Category created for our products</p> --}}
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="">
                    <div class="mb-3">
                        <label for="formName" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model.defer="name">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="flex sm:flex-row flex-col sm:space-x-2 space-x-0">
                        <div class="mb-3">
                            <label for="formName" class="block text-gray-700 text-sm font-bold mb-2">Price:</label>
                            <input type="number" class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model.defer="price">
                            @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="formName" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
                            <input type="number" class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model.defer="quantity">
                            @error('quantity') <span class="text-red-500">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="formStatus" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                        <select wire:model="category" class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none  ">
                            <option value=""></option>
                            @foreach($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                            <option class="text-sm bg-gray-100 text-gray-500" value="creating">Create new one.</option>
                        </select>
                        @error('category') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="formName" class="block text-gray-700 text-sm font-bold mb-2">Discount %</label>
                        <input type="number" class=" appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" wire:model.defer="discount">
                        @error('discount') <span class="text-red-500">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <div class="flex items-center justify-center py-16 border border-dashed border-gray-400 rounded">
                            <label class="cursor-pointer">
                                @if (! $photo )
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-24 w-24 text-gray-400 mx-auto">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                                </svg>
                                @else
                                <img src="{{$photo->temporaryUrl()}}" alt="" class="h-32 w-32 rounded ">
                                @endif
                                <input type='file' class="hidden" wire:model='photo' accept="image/*" />
                                <p wire:loading.remove wire:target="photo" class="text-xs text-center text-gray-400">Clik to upload image</p>
                                <p wire:loading wire:target="photo" class="text-xs text-center text-gray-400">Uploding. . . . . </p>
                            </label>
                        </div>
                    </div>
                    @error('photo') <span class="error text-center px-4 justify-items-center text-red-600">{{ $message }}</span> @enderror

                </div>
            </div>

            <div class=" px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <button wire:loading.remove wire:click="store" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-gray-900 text-base leading-6 font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Create
                    </button>
                    {{-- loading --}}
                    <button wire:loading wire:target='store' type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-6 py-2 bg-gray-900 text-base leading-6 font-medium text-white shadow-sm hover:bg-gray-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        <svg class="animate-spin mx-auto h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </span>
                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">

                    <button wire:loading.remove wire:click='create' type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Cancel
                    </button>
                    <button wire:loading wire:target='create' type="button" class=" px-6 inline-flex justify-center w-full rounded-md border border-gray-300  py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        <svg class="animate-spin mx-auto h-5 w-5 text-black" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>
