<div class="fixed bottom-0 left-0 right-0 bg-white shadow-lg"
    x-show="cartItems.length > 0"
    x-transition >

    <div class="max-w-7xl mx-auto ">
        <div class="flex flex-row space-x-4 px-4 py-2">

            <button
                @click="cartItems = []"
                class="basis-1/3 flex items-center justify-center text-red-500 hover:text-white hover:bg-red-500 p-2 rounded transition-all ease-in-out duration-250 border border-red-500 w-full">
                <div class="flex items-center space-x-2">
                    @svg('heroicon-s-trash', 'w-5 h-5')
                    <span>Clear</span>
                </div>
            </button>

            <button
                @click="isShowSummary = true"
                class="basis-2/3 flex items-center justify-center text-white bg-indigo-500 hover:bg-indigo-800 p-2 rounded transition-all ease-in-out duration-250 border border-indigo-500 w-full">
                <div class="flex items-center space-x-2">
                    <span><b x-text="cartItems.length"></b> Continue</span>
                </div>
            </button>

        </div>
    </div>
</div>