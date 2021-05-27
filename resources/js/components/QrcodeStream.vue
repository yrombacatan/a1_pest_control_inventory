<template>
  <div>
    <!-- modal -->
    <!-- will show if product found -->
    <quantity-modal ref="modal" v-if="product" v-bind:product="product"></quantity-modal>

    <div class="alert alert-danger" v-if="message">
      {{ message }}
    </div>

    <!-- qrcode scanner -->
    <qrcode-stream :camera="camera" @decode="onDecode" ></qrcode-stream>
  
  </div>
</template>

<script>

import { QrcodeStream }  from 'vue-qrcode-reader'
import QuantityModal from './QuantityModal'

export default {

  components: {  QrcodeStream, QuantityModal },

  data () {
    return {
      product: null,
      message: null,
      modal: null,
      camera: 'auto',
    }
  },

  methods: {
     async onDecode(sku_id) {
        await this.axios.post(`/api/orders/check/${sku_id}`).then(response=>{
            const { message, product } = response.data
            this.message = message;
            this.product = product;
        }).catch(error=>{
            console.log(error)
        });

        // pass product id to modal
        this.$refs.modal.productID(this.product.id)

        // show quantity modal
        if(this.product !== null) this.$refs.modal.showModal();

        // enable continuous decoding
        this.pause();
        await this.timeout(100);
        this.unpause();
    },

    unpause () {
      this.camera = 'auto'
    },

    pause () {
      this.camera = 'off'
    },

    timeout (ms) {
      return new Promise(resolve => {
        window.setTimeout(resolve, ms)
      })
    },
  }
}
</script>