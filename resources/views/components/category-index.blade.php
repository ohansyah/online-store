<div class="p-6 lg:py-4  bg-white border-b border-gray-200">
    <div class="md:flex md:justify-between">
        <div class="w-full mb-4 md:mb-0 md:w-2/4 md:flex space-y-4 md:space-y-0 md:space-x-2">
            <h1 class="text-2xl font-medium text-gray-900">
                {{ $title }}
            </h1>
        </div>

        <div class="md:flex md:items-center space-y-4 md:space-y-0 md:space-x-2">
            <a href="{{ route('category.create') }}" wire:navigate
                class="w-full h-10 flex items-center justify-center text-sm text-indigo-500 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded transition-all duration-250 border border-indigo-500">
                <div class="px-1">
                    @include('icon.add')
                </div>
                <span class="max-[320px]:hidden">{{__('category_add')}}</span>
            </a>
        </div>
    </div>
</div>

<div class="bg-gray-200 bg-opacity-25 gap-6 p-6">
    <livewire:category-table />
</div>