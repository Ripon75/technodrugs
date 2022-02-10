<template>
  <!-- <WebDefaultLayout> -->
      <!-- ==============Product single=========================== -->
    <section class="container mx-auto page-section">
        <section class="single-product border rounded-lg px-8 py-12 bg-gray-50">
          <div class="flex space-x-10">
            <div class="w-1/2">
                <img class="rounded-lg" :src="showImage() + product.image">
            </div>
            <div class="w-1/2">
                <div class=" flex space-x-2 mb-4">
                    <span class="text-primary text-5xl font-bold">{{product.display_name}}</span>
                    <span class="text-primary text-5xl font-bold">{{product.strength}}</span>
                </div>
                <div class="flex flex-col space-y-2">
                    <span class="text-xl font-semibold inline-block">Generic : <strong class="text-gray-600">{{product.generic.display_name}}</strong></span>
                    <span class="text-xl font-semibold inline-block">Type : <strong class="text-gray-600">{{product.type}}</strong></span>
                    <span class="text-xl font-semibold inline-block">MRP : <strong class="text-gray-600">{{product.mrp}}tk</strong></span>
                </div>
            </div>
          </div>
        </section>
        <!--====== Description =====-->
        <section class="content border border-t-0 rounded-lg rounded-t-none px-8 py-12 bg-gray-50">
            <h1 class="text-3xl font-semibold mb-10">PRODUCT DESCRIPTION</h1>
            <div class="">
                <p><span v-html="product.description"></span></p>
            </div>
        </section>

    </section>
  <!-- </WebDefaultLayout> -->
</template>

<script>
  import WebDefaultLayout from '@/Layouts/WebDefaultLayout.vue'
  export default {
    components: {
      WebDefaultLayout
    },

    props: ["product"],

    methods: {
        showImage() {
            return "/storage/";
        }
    }
  }
</script>

<style>

</style>

