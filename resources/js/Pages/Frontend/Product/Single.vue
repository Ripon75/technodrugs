<template>
  <WebDefaultLayout>
      <!-- ==============Product single=========================== -->
    <PageHeader pageTitle="Product Details" bgImageSRC="/images/banners/banner-all-products.jpg"></PageHeader>
    <section class="px-10 sm:px-10 md:px-10 lg:px-70 xl:px-80 2xl:px-96 page-section bg-gray-50">
        <section class="single-product border rounded-lg px-8 py-12 bg-white">
          <div class="flex flex-col sm:flex-col md:flex-row lg:flex-row xl:flex-row 2xl:flex-row
                  space-x-4 sm:space-x-4 md:space-x-4 lg:space-x-10 xl:space-x-10 2xl:space-x-10 space-y-4">
            <div data-aos="fade-right" class="md:w-2/3 lg:w-1/3 xl:w-1/3 2xl:w-1/3">
                <img v-if="product.image" class="rounded-lg p-2" :src="showImage() + product.image">
                <img v-else class="img-wrapper" src="/images/banners/blank-medicine.jpg">
            </div>
            <div data-aos="fade-left" class="2xl:w-2/3">
                <div class="flex space-x-2 mb-4">
                    <span class="text-primary text-4xl font-bold">{{product.display_name}}</span><br/>
                </div>
                <div class="flex flex-col space-y-2">
                    <span class="text-xl font-semibold inline-block">Strength : <strong class="text-gray-600">{{product.strength}}</strong></span>
                    <span v-if="product.generic" class="text-xl font-semibold inline-block">Generic : <strong class="text-gray-600">{{product.generic.display_name}}</strong></span>
                    <span v-if="product.product_category" class="text-xl font-semibold inline-block">
                        Type : <strong class="text-gray-600">{{ product.product_category.display_name }}</strong>
                    </span>
                </div>
            </div>
          </div>
        </section>
        <!--====== Description =====-->
        <section data-aos="fade-up" v-if="product.description" class="content border rounded-lg rounded-t-none px-8 py-12 mt-8 bg-white">
            <h1 class="text-3xl font-semibold mb-10">PRODUCT DESCRIPTION</h1>
            <div class="">
                <!-- <p >{{product.description}}</p> -->
                <span class="text-lg" v-html="product.description"></span>
            </div>
        </section>

    </section>
  </WebDefaultLayout>
</template>

<script>
  import WebDefaultLayout from '@/Layouts/WebDefaultLayout.vue'
  import PageHeader from '@/Layouts/Components/PageHeader.vue'
  import AOS from 'aos'
  import 'aos/dist/aos.css'

  export default {
    components: {
      WebDefaultLayout,
      PageHeader
    },

    created () {
        AOS.init()
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

