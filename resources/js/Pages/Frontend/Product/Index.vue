<template>
  <WebDefaultLayout>
    <PageHeader pageTitle="Products" :pageSubTitle="subtitle" bgImageSRC="/images/banners/banner-all-products.jpg"></PageHeader>
  <!-- ===========Product List==================== -->
    <section class="container mx-auto page-section">
        <section class="product-section">
        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-5 gap-4 sm:gap-4 md:gap-4 lg:gap-4 xl:gap-6 2xl:gap-6">
            <div v-for="product in products.data" :key="product" class="col-span-1">
            <a data-aos="fade-up" @click="onClickItem('product.single', product.name)" class="product-thumb">
                <div>
                <img v-if="product.image" class="img-wrapper" :src="showImage() + product.image">
                <img v-else class="demo-img-wrapper" src="/images/banners/blank-medicine.jpg">
                <div class="body">
                    <h1 class="title">{{ product.display_name }}</h1>
                    <span v-if="product.generic" class="subtitle">{{ product.generic.display_name }}</span>
                </div>
                </div>
            </a>
            </div>
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
        props: ['products', 'subtitle'],

        methods: {
            onClickItem(routeName, name) {
                this.$inertia.visit(route(routeName, name), {method: 'get'});
            },

            showImage() {
                return "/storage/";
            }
        }
    }
</script>

<style>

</style>
