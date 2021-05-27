<template>
    <div class="form-group row">
        <!-- <ul>
            <li v-for="product of products" v-bind:key="product.id"> {{product.name}} </li>
        </ul> -->
        <!-- modal -->
        <qrcode-modal @getProduct="productByID" ref="qrcodeModals"></qrcode-modal>

        <!-- button -->
        <div class="col-sm-5 d-flex justify-content-center align-items-end">
            <div>
                <button @click.prevent="showModal" class="btn btn-info"><i class="fas fa-qrcode"></i> Scan Product</button>
            </div>
        </div>

        <!-- prorduct -->
        <div class="col-sm-3">
        Item:
        <select name="product_id" id="product_id" class="form-control selectItems">
            <option value="" selected>Select Item</option>
            <option v-for="product of products"
            v-bind:key="product.id"
            v-bind:value="product.id"
            v-bind:data-id="product.id"
            v-bind:data-sku="product.sku_barcode_id"
            v-bind:data-name="product.name"
            v-bind:data-price="product.price"
            v-bind:data-unit_type="product.unit_type"
            :selected="product.sku_barcode_id === productBySkuID.sku_barcode_id"> {{ product.name }} </option>
            <!-- @foreach($productOptions as $item)
                <option value="{{ $item->id }}" data-id="{{ $item->id }}" data-sku="{{ $item->sku_barcode_id }}" data-name="{{ $item->name }}" data-price="{{ $item->price }}" data-unit_type="{{ $item->unit_type }}">{{ $item->name }}</option>
            @endforeach -->
        </select>
        <input v-if="productBySkuID" type="text" name="prod_id" v-bind:value="productBySkuID.id" id="itemid" hidden class="form-control">
        <input v-else type="text" name="prod_id" value="" id="itemid" hidden class="form-control">
        <!-- {!! Form::hidden('prod_id', null, ['id'=> 'itemid', 'class' => 'hidden form-control']) !!} -->
        <span id="err_ItemNo" class="error invalid-feedback">Please select an item </span>
    </div>

    <div class="col-sm-2">
        Unit:
        <!-- {!! Form::text('unit_type', null, ['id'=> 'itemunit', 'class' => 'form-control']) !!} -->
        <input v-if="productBySkuID" type="text" name="unit_type" v-bind:value="productBySkuID.unit_type" id="itemunit" class="form-control">
        <input v-else type="text" name="unit_type" value="" id="itemunit" class="form-control">
        <!-- {!! Form::hidden('price', null, ['id'=> 'itemprice', 'class' => 'hidden form-control']) !!} -->
        <input v-if="productBySkuID" type="text" name="price" v-bind:value="productBySkuID.price" id="itemprice" hidden class="form-control">
        <input v-else type="text" name="price" value="" id="itemprice" hidden class="form-control">
        <span id="err_ItemUnit" class="error invalid-feedback">Please enter unit</span>
    </div>

    <div class="col-sm-1">
        Quantity:
        <!-- {!! Form::number('quantity', null, ['id'=> 'itemqty', 'min' => 1, 'class' => 'form-control']) !!} -->
        <input type="number" name="quantity" value="" id="itemqty" min="1" class="form-control">
        <span id="err_ItemQty" class="error invalid-feedback">Please enter quantity</span>
    </div>

    <div class="col-sm-1">
        <!-- {!! Form::label('', ' ', ['class' => 'col-form-label']) !!} -->
        <label for="" class="col-form-label"></label>
        <input type="button" id="btnAddItem" class="btn btn-block btn-info btn-md add-row" value="Add" />
    </div>
    </div>

</template>
<script>
import QrcodeModal from './QrcodeModal.vue'
export default {
    components: { QrcodeModal },
    data() {
        return {
            products: '',
            productBySkuID: '',
        }
    },
    methods: {
        async fetchProduct() {
            await this.axios.post(`/api/orders`).then(response=>{
                const { product } = response.data
                this.products = product;
            }).catch(error=>{
                console.log(error)
            });

        },

        productByID(products) {
            this.productBySkuID = products
        },

        showModal() {
            this.$refs.qrcodeModals.show()
        },
    },
    mounted: function() {
        this.fetchProduct();
        console.log(this.products)
    }

}
</script>
