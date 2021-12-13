


export default {
    state: {
        prices: {
            min: "",
            max: ""
        },
        products : {}
    },
    getters: {
        getProducts: state => {
            return state.products;
        }
    },
    mutations: {
        changeMinValue (state, payload) {
            state.prices.min = payload
        },
        changeMaxValue (state, payload) {
            state.prices.max = payload
        },
        setProducts (state, payload){
            state.products = payload
        }
    },
    actions: {}
};

