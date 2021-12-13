<template>
    <div>
        <h1 class="h3 mb-3">Products DataTables</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Products</h5>
                    </div>
                    <div class="card-body">
                        <div id="datatables-reponsive_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="products-table" class="table table-striped dataTable no-footer dtr-inline" style="width: 100%;" aria-describedby="datatables-reponsive_info">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(product, index) in this.$store.getters.getProducts">
                                            <td> {{ product.id }} </td>
                                            <td> {{ product.name }} </td>
                                            <td> ${{ product.price }} </td>
                                            <td>
                                              <img @click="showSingle(product.image, index)" style="max-width: 25%" :src="product.image">

                                            </td>
                                            <td> {{ product.created_at }} </td>
                                            <td>
                                                <button href="" class="btn" style="display: inline" >
                                                    <i class="fa fa-edit text-info"></i>
                                                </button>
                                                <button class="btn text-danger" @click="deleteProduct(product.id, index)" >
                                                    <i class="fa fa-trash"></i>
                                                </button>

                                            </td>

                                        </tr>
<!--                                        @foreach($products as $product)-->
<!--                                        <tr>-->
<!--                                            <td>{{$product->id}}</td>-->
<!--                                            <td>{{$product->name}}</td>-->
<!--                                            <td>${{$product->price}}</td>-->
<!--                                            <td>-->
<!--                                                <img style="max-width: 15%" src="{{ asset('/assets/images/uploads') . "/" . $product->image }}" >-->

<!--                                            </td>-->
<!--                                            <td>{{$product->created_at->diffForHumans()}}</td>-->
<!--                                            <td class="table-action">-->
<!--                                                <a href="{{ route('product.edit', $product->id)  }}" class="btn" style="display: inline">-->
<!--                                                    <i class="fa fa-edit text-info"></i>-->
<!--                                                </a>-->
<!--                                                <form method="post" action="{{ route('product.destroy', $product->id) }}" onsubmit="return confirmSubmission(this, 'Are you sure you want to delete this message ')" style="display: inline">-->
<!--                                                    @csrf-->
<!--                                                    @method('DELETE')-->
<!--                                                    <button class="btn text-danger" href="{{ route('product.destroy', $product->id) }}">-->
<!--                                                        <i class="fa fa-trash"></i>-->
<!--                                                    </button>-->
<!--                                                </form>-->
<!--                                            </td>-->

<!--                                        </tr>-->
<!--                                        @endforeach-->


                                        </tbody>
                                    </table>
<!--                                    {{ $products->links() }}-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <vue-easy-lightbox
            :visible="visible"
            :imgs="img"
            :index="index"
            @hide="handleHide"
        ></vue-easy-lightbox>
    </div>
</template>

<script>

export default {

    data: function () {
        return {
            visible: false,
            img: [],
            index: 0,

        }
    },

    mounted() {
        this.getProducts();
    },


    methods: {
        deleteProduct: function(id, index){

            axios.post('/product/'+id,{_method: 'delete'})

                .then((response) => {
                    console.log(response.data);
                    window.notyf.open({
                        'type': 'success',
                        'message': "Deleted Successfully",
                        'duration': 10000,
                        'ripple': true,
                        'dismissible': true
                    });

                    this.$store.getters.getProducts.splice(index, 1);

                })
                .catch(error => {
                    console.log(error);
                    //this.errored = true
                });

        },
        showSingle(img, index) {
            // alert(img);
            this.img = img;
            this.index = index;
            this.show()
        },
        show() {
            this.visible = true
        },
        handleHide() {
            this.visible = false
        },
        getProducts() {

            axios.get("/product/getProducts")
                .then((response) => {
                    this.$store.commit("setProducts", response.data);

                   // this.products = this.$store.getters.getProducts;
                });
        }
    },

}


</script>
