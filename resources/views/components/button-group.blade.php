<div class="flex space-x-2">
    @isset($routeShow)
    <a href="{{ $routeShow }}"
        class="text-sky-500 hover:text-white hover:bg-sky-500 py-2 px-2 rounded transition-all duration-250 border border-sky-500">
        @svg('heroicon-s-eye', 'w-5 h-5')
    </a>
    @endisset

    @isset($routeEdit)
    <a href="{{ $routeEdit }}"
        class="text-indigo-500 hover:text-white hover:bg-indigo-500 py-2 px-2 rounded transition-all duration-250 border border-indigo-500">
        @svg('heroicon-s-pencil', 'w-5 h-5')
    </a>
    @endisset

    @isset($routeDelete)
    <form action="{{ $routeDelete }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="text-red-500 hover:text-white hover:bg-red-500 py-2 px-2 rounded transition-all duration-250 border border-red-500">
            @svg('heroicon-s-trash', 'w-5 h-5')
        </button>
    </form>
    @endisset
</div>