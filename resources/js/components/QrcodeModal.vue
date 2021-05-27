<template>
    <b-modal ref="my_modal" hide-header hide-backdrop centered class="shadow">
        <div v-if="error" class="alert alert-danger mb-1">{{ error }}</div>
        <qrcode-stream @decode="onDecode"></qrcode-stream>
        <div slot="modal-footer">
            <button @click="hide" class="pull-right btn btn-secondary">Close</button>
        </div>
    </b-modal>
</template>

<script>

import { QrcodeStream }  from 'vue-qrcode-reader'
export default {
    components: { QrcodeStream },
    data() {
        return {
            product: '',
            error: '',
        }
    },
    methods: {
        async onDecode(sku_id) {
            await this.axios.post(`/api/orders/check/${sku_id}`).then(response=>{
                const { product, error } = response.data
                this.product = product;
                this.error = error;
            }).catch(error=>{
                console.log(error)
            });

            if(this.product !== '') {
                this.hide();
                this.$emit("getProduct", this.product);
            }

        },
        show() {
            this.$refs['my_modal'].show()
        },

        hide() {
            this.$refs['my_modal'].hide()
        },

        

    }
}
</script>