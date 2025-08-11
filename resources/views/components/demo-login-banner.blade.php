<div x-data="{ show: true, style: 'success', message: 'Demo email:cashier.test@gmail.com password:password' }"
    :class="{ 'bg-indigo-500': style == 'success', 'bg-red-700': style == 'danger', 'bg-yellow-500': style == 'warning', 'bg-gray-500': style == 'info'}"
            style="display: none;"
            x-show="show && message"
            x-on:banner-message.window="
                style = event.detail.style;
                message = event.detail.message;
                show = true;
            "
            x-transition:enter="transition ease-out duration-500"
            x-transition:enter-start="opacity-0 transform"
            x-transition:enter-end="opacity-100 transform"
            x-transition:leave="transition ease-in duration-500"
            x-transition:leave-start="opacity-100 transform"
            x-transition:leave-end="opacity-0 transform"
            {{-- x-init="setTimeout(() => { show = false }, 5000)" --}}

            class="fixed top-0 left-0 w-full z-50 transition-opacity duration-500 ease-in-out transform">

    <div class="max-w-screen-xl mx-auto py-2 px-3 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between flex-wrap">
            <div class="w-0 flex-1 flex items-center min-w-0">
                <span class="flex p-2 rounded-lg bg-indigo-600">
                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>

                <p class="ms-3 font-medium text-sm text-white truncate" x-text="message"></p>
            </div>

            <div class="shrink-0 sm:ms-3">
                <button
                    type="button"
                    class="-me-1 flex p-2 rounded-md focus:outline-none sm:-me-2 transition hover:bg-indigo-600 focus:bg-indigo-600"
                    aria-label="Dismiss"
                    x-on:click="show = false">
                    <svg class="h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>