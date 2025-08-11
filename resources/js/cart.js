document.addEventListener('alpine:init', () => {
    Alpine.data('cart', () => ({
        isShowSummary: false,
        isShowError: false,
        isShowSuccess: false,
        cartItems: [],
        subTotal: 0,

        addToCart(id, name, price, priceFormated, imageUrl, qty) {
            const exist_index = this.cartItems.findIndex(item => item.id === id);;
            if (exist_index < 0) {
                this.cartItems.push({
                    "id": id,
                    "name": name,
                    "price": price,
                    "priceFormated": priceFormated,
                    "imageUrl": imageUrl,
                    "qty": 1,
                    "total": price,
                });
            } else {
                this.cartItems.splice(exist_index, 1);
            }
        },
        increaseQuantity(id) {
            const exist_index = this.cartItems.findIndex(item => item.id === id);
            this.cartItems[exist_index].qty++;
            this.cartItems[exist_index].total = this.cartItems[exist_index].qty * this.cartItems[exist_index].price;
        },
        decreaseQuantity(id) {
            const exist_index = this.cartItems.findIndex(item => item.id === id);
            if (this.cartItems[exist_index].qty > 1) {
                this.cartItems[exist_index].qty--;
                this.cartItems[exist_index].total = this.cartItems[exist_index].qty * this.cartItems[exist_index].price;
            }
        },
        deleteItem(id) {
            const exist_index = this.cartItems.findIndex(item => item.id === id);
            this.cartItems.splice(exist_index, 1);
        },
        formatCurrency(value) {
            return Intl.NumberFormat("id-ID", { style: "currency", currency: "IDR" })
                .format(value)
                .replace(/\s/g, "")
                .split(",")[0];
        },
        calculateSubTotal() {
            this.subTotal = this.cartItems.reduce((acc, item) => acc + (item.price * item.qty), 0);
        },
        clearCart() {
            this.isShowSummary = false;
            this.cartItems = [];
            this.subTotal = 0;
        },
        catchHandler() {
            console.log('An error occurred during checkout');
        }
    }));
});