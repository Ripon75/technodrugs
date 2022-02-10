<template>
  <WebDefaultLayout>
    <PageHeader pageTitle="History" bgImageSRC="/images/banners/banner-history.jpg"></PageHeader>
   <section class="container mx-auto page-section">
       <p class="text-lg mb-4 text-justify">
           The Managing Director of Techno Drugs Ltd. is a renowned Pharmacist of the country. Prior to establish the industry he served in a famous pharmaceutical industry of Bangladesh where he contributed his meritorious efforts and successfully manufactured some important medicinal products which got a very well reputation in the country. This has inspired him to manufacture pharmaceutical products on his own. This idea was raised in his mind as because he felt that if he himself can setup an industry in that case he can apply his own expertise in manufacturing the products as per his own thought which will be helpful to build up his own creativity and also the poor people of the country will be helpful by getting the quality medicines in a cheaper coast. Also if this attempt is successful he will be able to establish his own pharmaceutical industry. Accordingly he has started his own factory in the year 1995.
       </p>
       <p class="text-lg text-justify">
           Mr. Shah Jalal Uddin Ahmed is the key promoter of this company and from the beginning he was a meritorious student. He has done B. Pharm (Hon’s) in 1976 and M. Pharm in 1977 from the University of Dhaka. Also he has taken Pharmacist Registration from the Pharmacy Registration Council of Bangladesh. He is also a Executive Member of Bangladesh Association of Pharmaceutical Industries, a Senior Member of Bangladesh Pharmaceutical Society, a member of Narsingdi Chamber of Commerce and Industry. Besides, Mr. Shah Jalal Uddin Ahmed has attended an Industrial Training from AOTS, Japan. Other than this he has extensive visits in United Kingdom, China, India and some other countries for practical visit of pharmaceutical industries.
       </p>
   </section>

   <section class="container mx-auto pb-20">
        <section class="w-full h-full">
            <div class="relative wrap overflow-hidden h-full">
                <div class="absolute border-opacity-20 border-gray-700 h-full border" style="left: 50%"></div>
                <template v-for="item in timeLineList" :key="item">
                    <!-- right timeline -->
                    <div data-aos="fade-right" v-if="item.side === 'right'" class="mb-8 flex justify-between items-center w-full right-timeline">
                        <div class="order-1 w-5/12"></div>
                        <div class="z-20 flex items-center order-1 bg-primary w-28 h-12 rounded">
                            <span class="mx-auto font-semibold text-lg text-white inline-block align-middle">{{ item.year }}</span>
                        </div>
                        <div class="order-1 rounded-lg w-5/12 px-6 py-4" style="background-color: #2ebbbb">
                            <h3 class="mb-2 font-bold text-white text-xl">{{ item.title }}</h3>
                            <span class="text-base leading-snug tracking-wide text-white text-opacity-100 inline-block align-bottom">{{ item.body }}</span>
                        </div>
                    </div>

                    <!-- left timeline -->
                    <div data-aos="fade-left" v-else class="mb-8 flex justify-between flex-row-reverse items-center w-full left-timeline">
                        <div class="order-1 w-5/12"></div>
                        <div class="z-20 flex items-center order-1 bg-primary w-28 h-12 rounded">
                            <span class="mx-auto font-semibold text-white text-lg inline-block align-middle">{{ item.year }}</span>
                        </div>
                        <div class="order-1 rounded-lg w-5/12 px-6 py-4" style="background-color: #2ebbbb">
                            <h3 class="mb-2 font-bold text-white text-xl">{{ item.title }}</h3>
                            <span class="text-base leading-snug tracking-wide text-opacity-100 text-white inline-block align-bottom">{{ item.body }}</span>
                        </div>
                    </div>
                </template>
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
    methods: {
        onClickItem(routeName) {
            this.$inertia.visit(route(routeName), {method: 'get'});
        }
    },

    data() {
        return {
            timeLineList: [
                { side: 'right', year: '1996', title: 'Year of Establishment with Veterinary Medicine Production', body: 'First company to manufacture Veterinary medicine in Bangladesh' },
                { side: 'left', year: '2003', title: 'Entered into the Human Medicine Market', body: 'First time manufacturer of over 77 individual medicines Human & Veterinary that has never been manufactured into the contury.'},
                { side: 'right', year: '2010', title: 'Introduce Anti-cancer Medicine 2010', body: 'First company in Bangladesh to manufacture Oncology medicines in the country. Ranked 4rd in exporting medicine 2014. Established state of theart Industrial park at BK Bari Gazipur 2015 Became 3rd in exporting medicine 2015 and 2016' },
                { side: 'left', year: '2014', title: '', body: 'Ranked in 4th in exporting medicine' },
                { side: 'right', year: '2015', title: '', body: 'Established state of the art industrial Park at BK Bari, Gazipur.' },
                { side: 'left', year: '2016', title: '', body: 'Became 3Rd in exporting medicine for two conductive year’s 2015 and 2016.' },
                { side: 'right', year: '2017', title: '', body: 'Won the award ARCH OF EUROPE-2017'},
                { side: 'left', year: '2018', title: '', body: 'Became the largest contraceptive injectable manufacturing plant in the south East Asia.' },
                { side: 'right', year: '2019', title: 'Started manufacturing contraceptive implant ', body: 'Being 1St and only company in the country and one of the five companies worldwide to manufacture contraceptive.' },
                { side: 'left', year: '2021', title: '', body: '2021 Established Over seas office Regional Head Office for Middle East and Africa in UAE' },

            ]
        };
        }
  }
</script>

<style>

</style>
