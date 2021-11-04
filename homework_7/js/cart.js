const cartItem = {
    props: ['product'],
    template: `<div class="shoping-cart-item">
                <div class="cart-product-bio">
                    <img :src="product.img" class="cart-img" alt="Some image">
                    <div class="cart-product-desc">
                        <p class="cart-product-title">{{product.product_name}}</p>
                        <p class="cart-product-quantity">Quantity: {{product.quantity}}</p>
                        <p class="cart-product-single-price">$ {{product.price}} each</p>
                    </div>
                </div>
                <div class="cart-right-block">
                    <p class="cart-product-price">{{product.quantity*product.price}} $</p>
                    <button class="del-btn" :key="product.id_product" @click="removeProduct(product)">
                        &times;</button>
                </div>
            </div>`,
    methods: {
        removeProduct(item) {
            //console.log(item);
            this.$parent.removeProduct(item);
            //this.$parent.$emit('remove-product', item);
        }
    }

}
const cart = {
    data(){
        return {
            imgCart: 'https://placehold.it/50x100',
            addToBasketUrl: '/api/checkcart',
            cartUrl: '/homework_7/7-1.php',
            cartItems: [],
            isVisibleCart: false,
            
        }
      },
      components: {'cart-item': cartItem},
      methods: {
        loadCart() {
            this.$parent.getJson(`${API + this.cartUrl}?data=2`)
                .then(data => {
                    if (data) {
                        this.cartItems = this.cartItems.concat(data.contents);
                    }
                })
                .catch(error => {
                    this.$parent.showError(`${error} Cant load ${API + this.cartUrl}`);
                });
        },
        addProduct(product) {
            //console.log(product);
            //console.log(API);
            //console.log(this.addToBasketUrl);
            this.$parent.getJson(`${API + this.addToBasketUrl}`)
                .then(data => {                    
                    if(data.result == 1){
                        let find = this.cartItems.find(item => item.id_product == product.id_product);
                        if(find){
                            this.putProduct(product.id_product, 1);
                            find.quantity +=1;
                        }else{
                            this.postProduct(product);
                           this.cartItems.push(Object.assign({quantity: 1}, product)); //создание нового объекта на основе двух, указанных в параметрах
                        }                        
                    }

                })
                .catch(error => {
                    this.$parent.showError(`${error} Cant load ${API + this.addToBasketUrl}`);
                })
        },
        removeProduct(product) {
            //console.log(product);
            let find = this.cartItems.find(item => item.id_product == product.id_product);
            if (find.quantity > 1) {
                this.putProduct(product.id_product, -1);
                product.quantity -= 1;
            } else {
                this.deleteProduct(product.id_product);
                let findIndex = this.cartItems.indexOf(find);
                this.cartItems.splice(findIndex, 1);
            }
        },
        postProduct(product){
            fetch(this.cartUrl, {
                method: 'POST', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(Object.assign({quantity: 1}, product)),
            })
                .then(response => response.json())
                .then(data => {
                    //console.log('Success:', data);
                })
                .catch((error) => {
                    this.showError(`Error: ${error}`);
                });

        },
        putProduct(id, quantity){
            fetch(`${this.cartUrl}/${id}`, {
                method: 'PUT', // or 'PUT'
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({quantity: quantity}),
            })
                .then(response => response.json())
                .then(data => {
                    //console.log('Success:', data);
                })
                .catch((error) => {
                    this.showError(`Error: ${error}`);
                });
        },
        deleteProduct(id){
            fetch(`${this.cartUrl}/${id}`, {
                method: 'DELETE', // or 'PUT'
                                
            })
                .then(response => response.json())
                .then(data => {
                    //console.log('Success:', data);
                })
                .catch((error) => {
                    this.$parent.showError(`Error: ${error}`);
                });
        },
      },
      mounted() {
        this.loadCart();
      },
      computed: {
          totalPrice() {
              let cartPrice = 0;
              
              this.cartItems.forEach(product => {
                  cartPrice += product.quantity*product.price;
                  
              });
              return cartPrice;
          }

      },
    template: `<div class="cart">
                <button class="shoping-cart"  @click="isVisibleCart = !isVisibleCart"><svg class="shoping-cart-ico" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 32 29" width="32" height="29">
                            <path
                                d="M1.18 2.36L4.58 2.36L9.41 19.82C9.55 20.33 10.02 20.69 10.55 20.69L25.41 20.69C25.88 20.69 26.3 20.41 26.49 19.98L31.9 7.56C32.06 7.19 32.02 6.78 31.8 6.44C31.58 6.11 31.21 5.91 30.81 5.91L14.4 5.91C13.75 5.91 13.22 6.44 13.22 7.09C13.22 7.74 13.75 8.27 14.4 8.27L29 8.27L24.62 18.32L11.44 18.32L6.61 0.87C6.47 0.35 6 0 5.46 0L1.18 0C0.53 0 0 0.53 0 1.18C0 1.83 0.53 2.36 1.18 2.36ZM9.43 29C10.91 29 12.11 27.8 12.11 26.32C12.11 24.84 10.91 23.64 9.43 23.64C7.95 23.64 6.75 24.84 6.75 26.32C6.75 27.8 7.95 29 9.43 29ZM26.2 29C26.26 29 26.34 29 26.39 29C27.11 28.94 27.76 28.63 28.23 28.07C28.7 27.54 28.92 26.85 28.88 26.12C28.78 24.67 27.5 23.54 26.02 23.64C24.54 23.74 23.44 25.04 23.53 26.5C23.63 27.9 24.8 29 26.2 29Z" />
                        </svg></button>
                <div class="cart-block" v-show="isVisibleCart">
                    <p class="emptyCart" v-if="cartItems.length == 0">Корзина Пуста</p>
                    <cart-item v-for="product of cartItems" :key="product.id_product" :product="product"></cart-item>
                    <div class="total-price-wrapper" v-if="cartItems.length != 0"><span>Total Price:</span><span class="total-price">{{totalPrice}} $ </span></div>

                </div>
            </div>`
            
}
