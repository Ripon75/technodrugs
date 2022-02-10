<template>
  <WebDefaultLayout>
    <PageHeader pageTitle="Mission vision" bgImageSRC="/images/banners/banner-mission.jpg"></PageHeader>
    <section class="container mx-auto page-section">
            <div class="grid grid-cols-1">
                <div data-aos="fade-up-right" data-aos-delay="300" class="col-span-1 text-center">
                    <img class="w-24 mx-auto mb-4" src="/images/mission.png"/>
                    <h1 class="text-3xl font-semibold mb-2">Mission</h1>
                    <p class="text-lg w-3/4 mx-auto"> As a pioneer of Veterinary and Oncology medicine manufacturing company in Bangladesh, We want to uphold our company goodwill to the apex and introduce new innovative Human and Veterinary medicines for the local and global market as we progress towards our growth.
                    </p>
                </div>
                <div data-aos="fade-up-left" data-aos-delay="300" class="col-span-1 text-center mt-14">
                    <img class="w-24 mx-auto mb-4" src="/images/vision.png"/>
                    <h1 class="text-3xl font-semibold mb-2">Vision</h1>
                    <p class="text-lg w-3/4 mx-auto">Our vision is to become the global market leader in pharmaceutical formulation by developing and manufacturing quality medicines at affordable prices</p>
                </div>
            </div>
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
    methods: {
        onClickItem(routeName) {
            this.$inertia.visit(route(routeName), {method: 'get'});
        }
    }
  }
</script>

<style>

</style>
