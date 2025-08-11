<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" 
        x-data="cart"
        x-init="$watch('cartItems', () => calculateSubTotal())">

        <div class="w-full">
            <x-cashier-filter :categories="$categories" :selectedCategories="$selectedCategories"/>
            <x-cashier-product :products="$products" :hasMorePages="$hasMorePages"/>
        </div>
        
        <x-cashier-cart/>
        <x-cashier-summary/>

    </div>
</div>

<script>
    document.addEventListener('scroll', function() {
        if ((window.innerHeight + window.scrollY ) >= (document.body.offsetHeight)) {
            @this.call('loadMore');
        }
    });
</script>
