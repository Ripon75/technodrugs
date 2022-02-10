<template>
  <WebDefaultLayout>
    <PageHeader pageTitle="Who we are" bgImageSRC="/images/banners/banner-about.jpg"></PageHeader>
    <section class="container mx-auto page-section">
        <section class="">
            <div class="mb-4">
                <p class="text-lg">
                    Techno Drugs Ltd is one of the fastest growing, an ISO certified and WHO affiliated pharmaceutical formulation industry of Bangladesh. Techno Drugs Ltd has started its journey in the year 1996 with manufacturing of essential Veterinary medicine which was not available locally at that time.
                </p>
            </div>
            <div class="flex flex-col mb-4">
                    <div class="flex flex-col sm:flex-col md:flex-col lg:flex-row xl:flex-row 2xl:flex-row mb-4 space-x-0 sm:space-x-0 md:space-x-0 lg:space-x-10 xl:space-x-10 2xl:space-x-10">
                        <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 2xl:w-1/2">
                            <p class="text-lg text-justify">
                                The Managing Director of Techno Drugs Ltd Mr. Shah Jalal Uddin Ahmed is a renowned pharmacist of the country and beyond.
                                He started his career back in the late 70’s in a leading pharmaceutical industry of Bangladesh, where he earned enormous fame for his excellence in manufacturing innovative products. His 19 years of experience in pharmaceutical formulation inspired him to establish a new pharmaceutical industry on his own. And that is how Techno Drugs Ltd emerged. Since its inception, Techno Drugs Ltd has always been giving priority to the availability of locally manufactured medicines and a high quality of product that ultimately leads to maintaining a steady growth in the market.
                            </p>
                        </div>
                        <div class="w-full sm:w-full md:w-full lg:w-1/2 xl:w-1/2 2xl:w-1/2">
                            <img class="rounded-md" src="/images/about1.jpg">
                        </div>
                    </div>
                    <div>
                        <p class="text-lg">
                            With the increasing number of Cancer patients in Bangladesh and dependency on imported Oncology medicines, Techno Drugs Ltd started production of Anti-Cancer medicines for the first time in the country in 2010. Within a very short period, Techno Drugs Ltd won the healthcare market through quality products, strong distribution channel and doctor-patient acceptance.
                        </p>
                    </div>
            </div>
                <p class="text-lg">
                    Beginning with the Anti-Cancer drugs, Techno Drugs Ltd introduced significant number of molecules in the Bangladeshi market. In 2015, to meet the increased demand, Techno Drugs Ltd. established its state of the art factory in BK Bari, Gazipur.<br>
                    Techno Drugs Ltd is also a major manufacturer of the Hormonal medicines. The company is the biggest injectable hormonal medicines supplier to the government of Bangladesh. Techno Drugs Ltd is also the fifth Contraceptive Implant manufacturer in the world and first of its kind in Bangladesh.
                </p>
        </section>

        <!-- ============Board of Director=============== -->
        <section class="pt-20">
                <h1 class="uppercase mb-4 text-3xl font-bold">Board of Director</h1>
                <hr>
                <section class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-2 2xl:grid-cols-4 gap-8 mt-10">
                    <template v-for="item in committeeList" :key="item">
                        <div data-aos="flip-left" data-aos-delay="100" class="col-span-1">
                            <div class="profile-card">
                                <img class="img-wrapper" :src="item.imgSrc" />
                                <!--Card Header-->
                                <h1 class="title">{{ item.title }}</h1>
                                <div>
                                    <h4 class="subtitle">{{ item.subtitle }}</h4>
                                </div>
                            </div>
                        </div>
                    </template>
                </section>
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
    methods: {
        onClickItem(routeName) {
            this.$inertia.visit(route(routeName), {method: 'get'});
        }
    },
    data () {
        return {
            committeeList: [
                {
                    imgSrc: '/images/chairman.jpg',
                    title : 'Khaleda Akhter Khan',
                    subtitle: 'Chairman'
                },
                {
                    imgSrc: '/images/Md_Sir.png',
                    title : 'Shah Jalal Uddin Ahmed',
                    subtitle: 'Managing Director'
                },
                {
                    imgSrc: '/images/executive director.png',
                    title : 'Arefeen Raafi Ahmed',
                    subtitle: 'Executive Director'
                },
                {
                    imgSrc: '/images/Director.jpg',
                    title : 'Mehreen Ahmed',
                    subtitle: 'Director'
                }
            ]
        }
    }
  }
</script>

<style>

</style>
