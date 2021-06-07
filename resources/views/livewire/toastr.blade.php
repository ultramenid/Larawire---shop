<div class="fixed z-20 inset-x-0 bottom-0 flex flex-col items-end justify-center px-4 py-6 pointer-events-none sm:p-6 sm:justify-start space-y-2"  >
    @forelse ($notification as $key => $value)
    <div class="max-w-sm w-full bg-white shadow-lg rounded-lg pointer-events-auto" ">
        <div class="rounded-lg shadow-xs overflow-hidden "  >
            <div class="p-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        @include('livewire.etcToast.typeToast')
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
