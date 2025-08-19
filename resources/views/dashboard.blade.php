<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-2 sm:gap-4">
                @foreach ($stats as $stat)
                    <div
                        class="flex flex-row bg-gradient-to-r from-indigo-400 via-indigo-450 to-indigo-500 p-6 rounded-lg border-2 border-indigo-200">
                        <div class="my-auto">
                            <div class="text-lg text-indigo-200">{{ $stat['title'] }}</div>
                            <div class="text-4xl text-indigo-100">{{ $stat['count'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>