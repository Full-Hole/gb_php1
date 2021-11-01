const search ={
    data(){
        return{
            searchLine: '',
        }
    },
    methods: {
        FilterGoods() {
            let regexp = new RegExp(this.searchLine, 'i');
            this.$parent.$refs.products.searchResult = this.$parent.$refs.products.products.filter(line => regexp.test(line.product_name));
            

        },
    },
    template: `<form action="#" class="search-form" @submit.prevent="FilterGoods">
                <button class="select-btn"><span class="select-btn-text">Browse</span><i class="fas fa-caret-down select-btn-caret"></i></button>
                <input type="text" class="search-field" v-model="searchLine" placeholder="Search for Item...">
                <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
            </form>`
}