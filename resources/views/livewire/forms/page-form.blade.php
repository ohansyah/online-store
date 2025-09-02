<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:px-8 lg:py-4  bg-white border-b border-gray-200">
                <h1 class="text-2xl font-medium text-gray-900">
                    {{ __('page_edit') }}
                </h1>
            </div>

            <div class="bg-gray-200 bg-opacity-25">
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <div class="grid grid-cols-1 gap-2 p-6 lg:p-8">
                            
                        <input type="text" wire:model="title" class="w-full p-2 border border-gray-300 rounded-lg" disabled
                            placeholder="Page Title">
                        @error('title')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <textarea wire:model="content" rows="20" class="w-full p-2 border border-gray-300 rounded-lg"
                            placeholder="Page Content"></textarea>
                        @error('content')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror

                        <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-lg mt-2"
                            wire:loading.class="opacity-50">
                            Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
