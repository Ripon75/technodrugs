<template>
  <WebDefaultLayout>
    <section class="hero-section relative overflow-hidden">
      <div class="">
        <a-carousel :autoplay="true">
            <div>
                <div class="w-full h-100 sm:h-100 md:h-128 lg:h-screen xl:h-screen 2xl:h-screen bg-no-repeat bg-cover"
                    style="background-image:url('/images/banners/1.jpg')">
                </div>
            </div>
            <div>
                <div class="w-full h-100 sm:h-100 md:h-128 lg:h-screen xl:h-screen 2xl:h-screen bg-no-repeat bg-cover"
                    style="background-image:url('/images/banners/2.jpg')">
                </div>
            </div>
            <div>
                <div class="w-full h-100 sm:h-100 md:h-128 lg:h-screen xl:h-screen 2xl:h-screen bg-no-repeat bg-cover"
                    style="background-image:url('/images/banners/3.jpg')">
                </div>
            </div>
            <div>
                <div class="w-full h-100 sm:h-100 md:h-128 lg:h-screen xl:h-screen 2xl:h-screen bg-no-repeat bg-cover"
                    style="background-image:url('/images/banners/4.jpg')">
                </div>
            </div>
        </a-carousel>
      </div>
      <ul class="project-list  block sm:block md:block lg:absolute xl:absolute 2xl:absolute top-3/3 sm:top-3/3 md:top-1/3 lg:top-1/3 xl:top-1/3 2xl:top-1/3 flex-col space-y-8 z-10 " style="right: -16px;">
          <li class="bg-image uppercase bg-no-repeat drop-shadow-xl" >
            <a @click="onClickSubItemBox('human')"
                style="background-image: url(/images/banners/human-division.jpg); width:620px; height:207px;"
                class="flex items-center hvr-backward justify-end pr-4 rounded-l-xl text-white text-3xl font-bold"
                href="#">&nbsp;</a>
          </li>
          <li class="bg-image uppercase bg-no-repeat drop-shadow-xl">
            <a @click="onClickSubItemBox('vat')"
                style="background-image: url(/images/banners/animal-division.jpg); width:620px; height:207px;"
                class="flex items-center justify-end hvr-backward pr-4 rounded-l-xl text-white text-3xl font-bold"
                href="#">&nbsp;</a>
          </li>
      </ul>
    </section>

  <!--===========Welcome Section ============-->
    <section class="welcome-section bg-secondary page-section mt-0 md:mt-0 lg:mt-0 xl:mt-0 2xl:mt-0">
      <div class="container mx-auto grid grid-cols-12 gap-4 lg:gap-6 xl:gap-8 2xl:gap-10 ">
        <div data-aos="fade-right" class="content col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-7 xl:col-span-7 2xl:col-span-7">
          <h1 class="title text-3xl font-bold mb-4 mt-10">WELCOME TO  TECHNO DRUGS LTD!</h1>
          <p class="subtitle text-base font-bold text-primary mb-2">TECHNO DRUGS LTD., AN INNOVATIVE PHARMACEUTICALS, PROVIDING CHEMOTHERAPEUTIC AGENTS MOSTLY FIRST EVER PRODUCED IN BANGLADESH FOR THE MANAGEMENT OF CANCER.</p>
          <p class="body mb-2 text-justify text-lg">This company is backed by a group of well experienced pharmacists involved in formulation, R&D, QA ,QC & overall management.This information booklet is aimed at health professionals involved in anticancer management in Bangladesh. It will provide an access of essential information to the prescribers for selecting effective drugs necessary for chemotherapy. It will also provide proper dosing along with the adverse effects for single & multiple drug therapy.</p>
          <p class="footer text-justify text-lg">Techno Drugs Ltd. is developing leading positions in major therapeutic areas like oncology, cardiovascular, diabetes, immune suppressor, anesthetics, life saving antibiotics & contrast media in Bangladesh.</p>
        </div>
        <div data-aos="fade-left" class="media col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-5 xl:col-span-5 2xl:col-span-5 flex flex-wrap content-center">
          <iframe class="w-full aspect-video rounded" src="https://www.youtube.com/embed/NPEasRf50To" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
      </div>
    </section>

  <!-- ===========Category Section==================== -->
    <section hidden class="category-section page-section container mx-auto">
      <div class="grid grid-cols-12 gap-10">
        <template v-for="item in categoryList" :key="item">
          <div class="col-span-4">
            <h1 class="title text-2xl font-semibold">{{ item.title }}</h1>
            <ul class="subtitle-wrapper list-disc list-inside mt-4 mb-8 space-y-1 text-gray-500 text-base">
              <li><a>{{ item.subtitle_1 }}</a></li>
              <li><a>{{ item.subtitle_2 }}</a></li>
              <li><a>{{ item.subtitle_3 }}</a></li>
            </ul>
            <img class="img-wrapper w-96 h-56 rounded-md shadow" :src="item.imgsrc">
          </div>
        </template>
      </div>
    </section>

  <!-- ===========Service Section==================== -->
    <section class="service-section page-section container mx-auto">
      <div class="">
        <div class="grid grid-cols-12
            gap-x-4 sm:gap-x-4 md:gap-x-4 lg:gap-x-4 xl:gap-x-8 2xl:gap-x-8 gap-y-6 sm:gap-y-8 md:gap-y-6 lg-gap-y-8 xl:gap-y-16 2xl:gap-y-16">
            <template v-for="item in serviceList" :key="item">
            <div data-aos="fade-up" class="card-service col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4 2xl:col-span-4 flex space-x-4">
                <div class="flex-none w-10">
                <img class="img-wrapper w-10" :src="item.imgsrc">
                </div>
                <div class="content">
                <h1 class="title mb-4 text-2xl font-semibold" >{{ item.title }}</h1>
                <span class="subtitle text-base text-gray-500">{{ item.subtitle }}</span>
                </div>
            </div>
            </template>
        </div>
      </div>
    </section>

  <!-- ===========Quality-Control Section==================== -->
    <section class="quality-control-section page-section container mx-auto">
      <div class="grid grid-cols-12">
        <div data-aos="flip-left" data-aos-delay="300" class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4 2xl:col-span-4 bg-secondary px-4 flex items-center justify-center">
          <div class="text-center py-20 sm:py-20 md:py-6">
            <h4 class="text-7xl mb-4">GMP</h4>
            <h4 class="text-base">GOOD MANUFACTURING PRACTICE</h4>
          </div>
        </div>
        <div data-aos="fade-left" data-aos-offset="300" data-aos-easing="ease-in-sine" class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
          <img class="w-full" src="images/lab.jpg">
        </div>

        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4 2xl:col-span-4 px-8 flex items-center justify-center">
          <div class="py-20 sm:py-20 md:py-6">
            <h1 class="text-4xl mb-4 font-semibold">Quality Control</h1>
            <p class="px-4">We maintain QA, QC and Process Validation along with cGMP in manufacturing all of our medicines. The quality of each batch is monitor and inspected by IPQC before the batch is completed.</p>
          </div>
        </div>

        <div data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine" class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
        <img class="w-full" src="images/working.jpg">
        </div>
        <div data-aos="flip-right" data-aos-delay="300" class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4 2xl:col-span-4 bg-secondary px-4 flex items-center justify-center">
          <div class="text-center py-20 sm:py-20 md:py-6">
            <h4 class="text-7xl mb-4">ISO</h4>
            <h4 class="text-base">9001:2015</h4>
          </div>
        </div>
        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4 2xl:col-span-4 px-4 flex items-center justify-center">
          <div class="py-20 sm:py-20 md:py-6">
            <h2 class="text-5xl font-semibold mb-1">40</h2>
            <span class="text-base">Acre Space of Production Area</span>
            <ul class="list-disc list-inside mt-4">
              <li>Accredited laboratory</li>
              <li>More than 40 000 tests in 2021</li>
              <li>More than 200 medicines</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

  <!-- ===========Product Section==================== -->
    <section class="product-section bg-secondary page-section">
      <h1 class="text-center text-4xl font-bold mb-10 uppercase">Feature Products</h1>
      <section class="container mx-auto">
        <div class="grid grid-cols-12 gap-4 sm:gap-4 md:gap-4 lg:gap-6 xl:gap-10 2xl:gap-10">
            <div v-for="product in products.data" :key="product" class="col-span-6 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3 2xl:col-span-3">
            <a data-aos="fade-up" data-aos-duration="1000" @click="onClickproductItem('product.single', product.name)" class="product-thumb">
                <div>
                <img class="img-wrapper" :src="showImage() + product.image">
                <div class="body">
                    <h1 class="title"> {{product.display_name}} </h1>
                    <span v-if="product.generic" class="subtitle">Generic: {{product.generic.display_name}} </span>
                </div>
                </div>
            </a>
            </div>
      </div>
      </section>
      <div class="text-center">
        <a @click="onClickItem('products')" type="button" class="cursor-pointer px-6 py-2 rounded text-white hover:text-white bg-black hover:bg-primary mt-10">View More</a>
      </div>
    </section>

  <!-- ===========News Section==================== -->
    <section class="hidden news-section page-section container mx-auto">
      <h1 class="text-center text-4xl font-bold mb-10 uppercase">News</h1>
      <div class="grid grid-cols-12 gap-4 sm:gap-4 md:gap-4 lg:gap-6 xl:gap-10 2xl:gap-10">
        <div v-for="item in 3" :key="item" class=" col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-4 2xl:col-span-4">
          <div class="">
            <div class="hover:bg-primary-darker">
              <img class="w-full h-auto" src="images/news1.jpg">
            </div>
            <a class="title block text-lg hover:text-primary mt-6">Top 10 New Pharmaceutical Products</a>
            <span class="subtitle text-sm text-gray-600 mt-6">- May 10, 2019</span>
          </div>
        </div>
      </div>
    </section>

  <!-- ===========Map Section==================== -->
    <section class="map-section bg-secondary">
      <div class="grid grid-cols-12">
        <div class="col-span-12">
          <div class="g-map w-full h-96">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.368098215265!2d90.40477953543605!3d23.73424956850221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8f3edff3faf%3A0x66efe1e47ad1a710!2s31%20Segun%20Bagicha%20Rd%2C%20Dhaka%201000!5e0!3m2!1sen!2sbd!4v1642482619040!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </section>
  </WebDefaultLayout>
</template>

<style scoped lang="scss">

.ant-carousel :deep(.slick-slide) {
  text-align: center;
  height: auto;
  line-height: auto;
  overflow: hidden;
}

.ant-carousel :deep(.slick-slide h3) {
  color:#fff;
}
</style>

<script>
  import WebDefaultLayout from '@/Layouts/WebDefaultLayout.vue'
  import AOS from 'aos'
  import 'aos/dist/aos.css'

  export default ({
    components: {
        WebDefaultLayout
    },

    created () {
        AOS.init()
    },

    props: ['products'],

    methods: {
        onClickItem(routeName) {
            this.$inertia.visit(route(routeName), {method: 'get'});
        },
        onClickSubItemBox(type) {
            this.$inertia.visit(route('products'), {method: 'get', data: { type: type }});
        },
        onClickproductItem(routeName, name) {
            this.$inertia.visit(route(routeName, name), {method: 'get'});
        },

        showImage() {
            return "/storage/";
        }
    },
    data () {
      return {
        categoryList: [
          {
            title: 'Human',
            subtitle_1: 'Coated tablets',
            subtitle_2: 'Uncoated tablets',
            subtitle_3: 'Chewing tablets',
            imgsrc: 'images/tablet.jpg',
          },
          {
            title: 'Veterinary',
            subtitle_1: 'Coated tablets',
            subtitle_2: 'Uncoated tablets',
            subtitle_3: 'Chewing tablets',
            imgsrc: 'images/syrup.jpg',
          },
          {
            title: 'Anti cancer',
            subtitle_1: 'Coated tablets',
            subtitle_2: 'Uncoated tablets',
            subtitle_3: 'Chewing tablets',
            imgsrc: 'images/powder.jpg',
          }
        ],

        serviceList: [
          {
            title: 'Modern Packaging',
            subtitle: 'All our medicine is provided with modern and durable packaging.',
            imgsrc: 'images/cube.svg',
          },
          {
            title: 'New Technologies',
            subtitle: 'We use new and innovative technologies in our work.',
            imgsrc: 'images/bandage.svg',
          },
          {
            title: 'Unique Approach',
            subtitle: 'Our approach combines dedication and professionalism.',
            imgsrc: 'images/beaker.svg',
          },
          {
            title: 'Research & Development',
            subtitle: 'Techno Drugs Ltd carries on intensive research with the aim of introducing new innovative products.',
            imgsrc: 'images/cube.svg',
          },
          {
            title: 'Manufacturing Facilities',
            subtitle: 'Techno Drugs Ltd. is a leading medicine manufacturer company in Bangladesh. We believe in technological advancement and transformational agilities in our production process.',
            imgsrc: 'images/bandage.svg',
          },
          {
            title: 'Quality Policy',
            subtitle: 'We maintain QA, QC and Process Validation along with cGMP in manufacturing all of our medicines.',
            imgsrc: 'images/beaker.svg',
          }

        ]
      }
    }
  })
</script>
