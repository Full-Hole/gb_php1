const API = '';//'https://raw.githubusercontent.com/GeekBrainsTutorial/online-store-api/master/responses';

const app = new Vue({
    el: '#app',
    data: {
        imgCatalog: 'https://picsum.photos/200/150',
        userSearch: '',
        errorMessages: [],
    },
    components: {cart, products, search, error},
    methods: {
        getJson(url) {
            return fetch(url)
                .then(result => result.json())
                .catch(error => {
                    console.log(error + url);
                    this.showError(`${error} Cant load ${url}`);
                })
        },
        showError(error) {
            this.errorMessages.push(error);
            console.log(error);
        },

        closeError(index) {
            this.errorMessages.splice(index, 1);
        }
    },
    
})