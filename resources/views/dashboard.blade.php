<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="stats stats-vertical sm:stats-horizontal w-full shadow p-4 bg-gradient-to-r from-blue-600 to-violet-600">
                @foreach ($stats as $stat)
                    <div class="stat">
                        <div class="stat-title text-lg text-white">{{ $stat['title'] }}</div>
                        <div class="stat-value text-white">{{ $stat['count'] }}</div>
                        <div class="stat-desc text-sm text-white">{{ $stat['subtitle'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>