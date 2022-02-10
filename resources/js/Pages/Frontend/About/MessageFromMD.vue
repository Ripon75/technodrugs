<template>
  <WebDefaultLayout>
  <PageHeader pageTitle="Message from the Managing Director" bgImageSRC="/images/banners/banner-MessageFromMd.jpg"></PageHeader>
    <section class="container mx-auto page-section">
        <div class="grid grid-cols-12 gap-6">
            <div data-aos="zoom-in" class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
                <img class="w-full" src="images/message-MD.jpg">
            </div>
            <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-8 xl:col-span-8 2xl:col-span-8">
                <p class="text-lg text-justify">Our journey started in 1996 with Veterinary medicines at a period when the market was dominated by expensive imported products. Techno Drugs Ltd. maintained a steady & fast growth in the market with its consistent high quality of products and unparalleled customer service and soon became the pioneer of the Veterinary medicine market of the country.</p>
                <p class="text-lg text-justify">Ensuring strong foothold in the veterinary medicine market, Techno Drugs Ltd entered into the Human medicine formulation in 2003. Beginning with the human drugs, Techno Drugs Ltd introduced significant number of molecules in the local market, which has never been introduced before. Anesthetic drugs, Clarithromycin injection, Meropenem injection, Anti-Cancer medicines are the most prominent drugs among them.  In 2015 the company established its 4th factory which eventually became the largest Contraceptive injectable manufacturing plant in the South East Asia at the company’s state of the art industrial park, at BK Bari, Gazipur to meet in the industry’s growing demand. </p>
                <p class="text-lg text-justify">At present our company is the largest Contraceptive injectable manufacturer and supplier to the Government of Bangladesh. We are pleased to share that Techno Drugs Ltd is one of the fifth Contraceptive Implant manufacturers in the world and first of its kind in Bangladesh.</p>
                <p class="text-lg text-justify">Meeting the local demand now we are regularly exporting our medicines overseas. Our products are now available in more than 10 countries including Philippines, Sri Lanka, Saudi Arabia, Vietnam, West Africa, and Mali. It will be strengthened further in the coming years with our overseas distribution partners.</p>
            </div>
            <div class="col-span-12">
                <p class="text-lg text-justify">Meeting the local demand now we are regularly exporting our medicines overseas. Our products are now available in more than 10 countries including Philippines, Sri Lanka, Saudi Arabia, Vietnam, West Africa, and Mali. It will be strengthened further in the coming years with our overseas distribution partners.</p>
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
  }
</script>

<style>

</style>
