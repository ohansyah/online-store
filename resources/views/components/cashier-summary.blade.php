<div x-data="{
    lastOrderId: null,
}">
<div x-cloak x-show="isShowSummary" x-transition
    class="fixed inset-0 z-10 flex items-center justify-center bg-gray-200 bg-opacity-75 transition-opacity" 
    role="dialog" aria-modal="true" aria-labelledby="modal-title">
    
    <div @click.away="isShowSummary = false" 
         class="relative w-full max-w-2xl p-4 bg-white rounded-lg shadow-xl transition-all">
        
        <div class="px-4">
            <div class="w-full justify-center">
                <div class="mt-3 text-center sm:mt-0">
                    <h3 id="modal-title" class="text-base font-semibold leading-6 text-gray-900">Cart List</h3>
                    <div class="max-h-[75vh] overflow-y-auto scroll-smooth">
                        <template x-for="item in cartItems" :key="item.id">
                            <div class="flex flex-col sm:space-x-4 sm:flex-row justify-between py-3 border-b" x-transition>
                                
                                <div class="flex-none">
                                    <img :src="item.imageUrl" alt="Product Image" class="object-cover rounded-lg w-16 h-16">
                                </div>
                                
                                <div class="flex-auto">
                                    <div class="flex flex-col text-left space-y-2">
                                        <div class="">
                                            <p x-text="item.name" class="text-gray-700 text-sm"></p>
                                            <p x-text="item.priceFormated" class="text-indigo-500 font-semibold text-sm"></p>
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <!-- Quantity Controls: Stack on smaller screens, inline on larger screens -->
                                            <div class="flex items-center space-x-2  sm:mt-0">
                                                <button @click="decreaseQuantity(item.id)" class="px-2 py-1 text-sm font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                                    -
                                                </button>
                                                <p x-text="item.qty" class="text-gray-700 text-sm"></p>
                                                <button @click="increaseQuantity(item.id)" class="px-2 py-1 text-sm font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300">
                                                    +
                                                </button>
                                                <button @click="deleteItem(item.id)" class="px-2 py-1 text-sm font-medium text-red-500 bg-red-100 rounded hover:bg-red-200">
                                                    @svg('heroicon-s-trash', 'w-5 h-5')
                                                </button>
                                            </div>
                                
                                            <!-- Total Price: Centered on mobile, right-aligned on larger screens -->
                                            <div class="mb-2">
                                                <p x-text="formatCurrency(item.total)" class="font-semibold text-gray-700"></p>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- Subtotal Section: Responsive -->
                    <div class="flex justify-between items-center py-2">
                        <p class="text-gray-700 text-sm">Sub Total</p>
                        <p x-text="formatCurrency(subTotal)" class="text-xl font-semibold text-gray-900"></p>
                    </div>
                </div>
            </div>

            <div class="sm:flex sm:flex-row-reverse sm:pt-4">
                <button type="button"
                    wire:loading.attr="disabled"
                    wire:target="checkout"
                    @click="$wire.checkout(cartItems).then((res) => {
                        if (res) {
                            lastOrderId = res;
                            isShowSuccess = true;
                            clearCart();
                        } else {
                            isShowError = true;
                        }
                    })"

                    class="inline-flex w-full justify-center rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-800 sm:ml-3 sm:w-auto">
                    
                    <!-- Loading Animation -->
                    <div wire:loading wire:target="checkout">
                        @svg('css-spinner', 'w-5 h-5 object-cover rounded-full mr-2 animate-spin text-white')
                    </div>
                    <div wire:loading.remove wire:target="checkout">
                        @svg('css-shopping-cart', 'w-5 h-5 object-cover rounded-full mr-2 text-white')
                    </div>
                    <span>Checkout</span>
                </button>

                <button @click="isShowSummary = false" type="button"
                    class="mt-3 inline-flex w-full justify-center rounded-md border border-red-500 px-3 py-2 text-sm font-semibold text-red-500 shadow-sm hover:bg-red-500 hover:text-white sm:mt-0 sm:w-auto">Cancel</button>
            </div>

        </div>
    </div>
</div>


<!-- Success Modal -->
<div x-cloak x-show="isShowSuccess" x-transition
    class="fixed inset-0 z-10 flex items-center justify-center bg-gray-200 bg-opacity-75 transition-opacity" 
    role="dialog" aria-modal="true" aria-labelledby="modal-title">
    
    <div @click.away="isShowSuccess = false" class="relative w-full max-w-2xl p-4 bg-white rounded-lg shadow-xl transition-all">
        <div class="flex flex-col items-center">
            <x-heroicon-o-check-circle class="w-24 h-24 text-green-500 animate-pulse" />
            <h2 class="mt-4 text-xl font-semibold text-green-600">{{__('success')}}!</h2>
            <p class="mt-2 text-center text-gray-600">{{__('success_checkout')}}</p>
        </div>

        <div class="md:flex md:items-center space-y-4 md:space-y-0 md:space-x-2 mt-6">
            <a 
                :href="`{{ url('/order') }}/${lastOrderId}/receipt/print`" 
                target="_blank"
                class="w-full h-10 flex items-center justify-center text-sm text-indigo-500 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded transition-all duration-250 border border-indigo-500">
                <div class="px-1">
                    <x-heroicon-o-printer class="w-5 h-5" />
                </div>
                <span class="max-[320px]:hidden">Print</span>
            </a>
            <a 
                :href="`{{ url('/order') }}/${lastOrderId}/receipt/pdf`" 
                class="w-full h-10 flex items-center justify-center text-sm text-indigo-500 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded transition-all duration-250 border border-indigo-500">
                <div class="px-1">
                    <x-heroicon-o-arrow-down-tray class="w-5 h-5" />
                </div>
                <span class="max-[320px]:hidden">Save PDF</span>
            </a>
            <a 
                :href="`{{ url('/order') }}/${lastOrderId}/receipt/image`" 
                class="w-full h-10 flex items-center justify-center text-sm text-indigo-500 hover:bg-indigo-500 hover:text-white py-2 px-4 rounded transition-all duration-250 border border-indigo-500">
                <div class="px-1">
                    <x-heroicon-o-photo class="w-5 h-5" />
                </div>
                <span class="max-[320px]:hidden">Save Image</span>
            </a>
        </div>
    </div>
</div>

<!-- Error Modal -->
<div x-cloak x-show="isShowError" x-transition
    class="fixed inset-0 z-10 flex items-center justify-center bg-gray-200 bg-opacity-75 transition-opacity" 
    role="dialog" aria-modal="true" aria-labelledby="modal-title">
    
    <div @click.away="isShowError = false" class="relative w-full max-w-2xl p-4 bg-white rounded-lg shadow-xl transition-all">
        <div class="flex flex-col items-center">
            <x-heroicon-o-exclamation-circle class="w-24 h-24 text-red-500 animate-pulse" />
            <h2 class="mt-4 text-xl font-semibold text-red-600">{{__('failed')}}!</h2>
            <p class="mt-2 text-center text-gray-600">{{__('failed_checkout')}}</p>
        </div>
    </div>
</div>
</div>