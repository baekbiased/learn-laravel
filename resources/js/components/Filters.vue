<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form>
                        <input type="hidden" class="d-none" name="filter" value="true" hidden>
                        <div class="row">

                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="form-label" > Start Price </label>
                                    <select @change="onChangeMin($event)" class="form-control form-select custom-select" >
                                        <option value="0">Select</option>
                                        <option v-for="price in this.prices" v-bind:value="price">{{price}}</option>
                                    </select>
                                </div>

                            </div>

                            <div class="col-sm">
                                <div class="form-group">
                                    <label class="form-label" > End Price </label>
                                    <select @change="onChangeMax($event)" class="form-control form-select custom-select ">
                                        <option value="0">Select</option>
                                        <option v-for="price in this.prices" :value="price">{{price}}</option>
                                    </select>
                                </div>
                            </div>



                        </div>
                        <div class="row">
                            <div class="col-sm mt-4">
                                <button type="button"
                                        class="btn btn-sm btn-primary apply-dt-filters mt-2"
                                        @click="getProducts"> Apply </button>

                                <button type="button"
                                        class="btn btn-sm btn-secondary clear-dt-filters mt-2"> Clear </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    props:["prices"],

    data: function () {
        return {
        }
    },

    mounted() {
        this.prices = JSON.parse(this.prices)
    },


    methods: {
        onChangeMin:function(event){
            let min = event.target.value;
            this.$store.commit("changeMinValue", min);
        },
        onChangeMax:function(event){
            let max = event.target.value;
            this.$store.commit("changeMaxValue", max);

        },
        getProducts:function() {
            // console.log(this.$store.state.prices.min);
            // console.log(this.$store.state.prices.max);

            let params = "";
            if(this.$store.state.prices.min > 0){
                params = "?start_price=" + this.$store.state.prices.min;
            }
            if(this.$store.state.prices.max > 0){
                params = params + "&end_price=" + this.$store.state.prices.max;
            }

            //http://127.0.0.1:8000/product?start_price=10&end_price=100
            let url = "/product/getProducts" + params;
            console.log(url)
            axios.get(url)
                .then((response) => {
                    console.log(response.data);
                    this.$store.commit("setProducts", response.data);
                    //this.products = response.data; //this.$store.getters.getProducts;
                });
        }

    },


}


</script>
