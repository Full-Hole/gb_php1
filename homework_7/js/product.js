const products = {
    data(){
        return {
            products: [],
            searchResult: [],
            catalogUrl: '/homework_7/7-1.php?data=1',
        }
      },
      methods: {
        loadProducts(url) {
            this.$parent.getJson(url)
                .then(data => {
                    // for (let item of data){
                    //     this.products.push(Object.assign({img: `https://picsum.photos/id/${item.id_product}/260/280`}, item));
                    //     this.searchResult.push(Object.assign({img: `https://picsum.photos/id/${item.id_product}/260/280`}, item));
                    // }
                    //console.log(typeof data);               
                    if (data) {
                        this.products = this.products.concat(data);
                        //console.log(this.products);
                        this.searchResult = this.searchResult.concat(data);
                    }

                })
                .catch(error => {
                    this.$parent.showError(`${error} Cant load ${url}`);
                });
        },
        addToCart(item){
            //console.log(item);
            this.$parent.$refs.cart.addProduct(item);
            //this.$emit('add-product',item);
        },
        
        
      },
      mounted() {
        this.loadProducts(`${API + this.catalogUrl}`);
        //this.loadProducts(`getProducts.json`);
        

    },
    
    template: `<div class="product-section-catalog">
                <figure class="product-card" v-for="product of searchResult" :key="product.id_product">
                    <div class="product-card-hover">
                    <button class="product-cart-btn" @click="addToCart(product)">Add to&nbsp;Cart</button>
                    </div>
                    <img :src="product.img" alt="feature-item1" class="product-img">
                    <figcaption class="product-card-text">
                        <span class="product-card-text-title">{{product.product_name}}</span>
                        <span class="product-card-subtitle">$ {{product.price}}</span>
                    </figcaption>
                </figure>
            </div> `


}
