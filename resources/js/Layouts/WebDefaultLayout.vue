<template>
  <section class="header z-50">
        <div class="hidden sm:hidden md:hidden lg:block xl:block 2xl:block">
            <div class="grid grid-cols-12">
                <div class="navbar">
                    <div class="logo-wrapper drop-shadow-md">
                    <a class="cursor-pointer" @click="onClickItem('home')" style="background: white;padding: 20px;border-radius: 0px 0px 8px 8px;">
                        <img style="height:40px" class="bg-white" src="/images/Techno_logo.png">
                    </a>
                    </div>
                    <ul class="main-nav drop-shadow-md">
                    <li class="nav-item">
                        <a class="nav-item-link" @click="onClickItem('home')">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="relative nav-item-link">
                            <span>About Us</span>
                            <img class="w-5 -mt-1 ml-1 mr-0 lg:mr-0 xl:mr-2 2xl:mr-2" src="/images/downarrow.svg">
                            <ul class="dropdown-nav absolute bg-primary text-left pt-8 pb-4 rounded-b-md px-4 text-base space-y-3 w-48">
                                <li><a @click="onClickItem('missionVision')" class="text-sm text-white hover:text-gray-200">Mission & Vision</a></li>
                                <li><a @click="onClickItem('about')" class="text-sm text-white hover:text-gray-200">Who we are</a></li>
                                <li><a @click="onClickItem('history')" class="text-sm text-white hover:text-gray-200">History</a></li>
                                <li><a @click="onClickItem('message.from-md')" class="text-sm text-white hover:text-gray-200">Message From Md</a></li>
                            </ul>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="relative nav-item-link">
                            <span @click="onClickItem('products')">Products</span>
                            <img class="w-5 -mt-1 ml-1 mr-0 lg:mr-0 xl:mr-2 2xl:mr-2" src="/images/downarrow.svg">
                            <ul class="dropdown-nav absolute bg-primary text-left pt-8 pb-4 rounded-b-md px-4 text-base space-y-5 w-48">
                                <li><a class="text-sm text-white hover:text-gray-200" @click="onClickSubItemBox('human')">Human Health</a></li>
                                <li><a @click="onClickSubItemBox('vat')" class="text-sm text-white hover:text-gray-200">Animal Health</a></li>
                            </ul>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item-link" @click="onClickItem('contact')">Contact</a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="block sm:block md:block lg:hidden xl:hidden 2xl:hidden fixed top-0 left-0 right-0">
            <div class="flex flex-row justify-between bg-white shadow w-full">
                <div class="w-1/2">
                    <a class="block cursor-pointer p-4" @click="onClickItem('home')">
                        <img style="height:40px" class="" src="/images/Techno_logo.png">
                    </a>
                </div>
                <div class="relative w-1/2">
                    <div @click="onClickMobileMenuIcon()" class="border flex items-center justify-center float-right rounded h-10 w-10 mr-8 mt-4 text-center cursor-pointer">
                         <img class="p-2 w-8" src="/images/menu-sm.svg">
                    </div>
                    <ul v-if="mobileMenuV" class="absolute bg-white flex flex-col w-64 z-30 right-0 left-0 top-full shadow-md rounded-b-md">
                        <li>
                            <a @click="onClickItem('home')" class="block text-base uppercase hover:bg-primary hover:text-white px-4 py-2 w-full">Home</a>
                        </li>
                        <li>
                            <a @click="onClickItem('products')" class="block text-base uppercase hover:bg-primary hover:text-white px-4 py-2 w-full">All Product</a>
                        </li>
                        <li>
                            <a @click="onClickSubItemBox('human')" class="block text-base uppercase hover:bg-primary hover:text-white px-4 py-2 w-full">Human Health</a>
                        </li>
                        <li>
                            <a @click="onClickSubItemBox('vat')" class="block text-base uppercase hover:bg-primary hover:text-white px-4 py-2 w-full">Animal Health</a>
                        </li>
                        <li>
                            <a @click="onClickItem('missionVision')" class="block text-base uppercase hover:bg-primary hover:text-white px-4 py-2 w-full">Mission & Vision</a>
                        </li>
                        <li>
                            <a @click="onClickItem('about')" class="block text-base uppercase hover:bg-primary hover:text-white px-4 py-2 w-full">Who we are</a>
                        </li>
                        <li>
                            <a @click="onClickItem('history')" class="block text-base uppercase hover:bg-primary hover:text-white px-4 py-2 w-full">History</a>
                        </li>
                        <li>
                            <a @click="onClickItem('message.from-md')" class="block text-base uppercase hover:bg-primary hover:text-white px-4 py-2 w-full">Message From Md</a>
                        </li>
                        <li>
                            <a @click="onClickItem('contact')" class="block text-base uppercase hover:bg-primary hover:text-white px-4 py-2 w-full">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
  </section>

	<main>
		<slot></slot>
	</main>

	<!-- ===========footer Section==================== -->
  <section class="footer-section">
    <section class="main-footer py-14" style="background-color: #262626;">
      <div class="grid grid-cols-12 gap-4 container mx-auto">
        <div class="address col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-3 xl:col-span-3 2xl:col-span-3">
          <h1 class="text-2xl font-bold uppercase mb-8 text-white">OUR ADDRESS</h1>
          <ul class="">
            <li>
              <p class="text-gray-300 text-lg">31 Segunbagicha, Dhaka 1000, Bangladesh.</p>
            </li>
            <li>
              <p class="text-gray-300 text-lg"><strong>Hotline :</strong> +88 01322 800 600</p>
            </li>
            <li>
              <p class="text-gray-300 text-lg"><strong>Email :</strong> info@technodrugsltd.com</p>
            </li>
          </ul>
        </div>
        <div class="link col-span-6 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3 2xl:col-span-3">
          <h1 class="text-2xl font-bold uppercase mb-8 text-white">Links</h1>
            <div class="">
                <a @click="onClickItem('home')">
                <p class="cursor-pointer text-sm hover:text-gray-400 text-gray-300 mb-2 uppercase">Home</p>
                </a>
                <a @click="onClickItem('missionVision')">
                <p class="cursor-pointer text-sm hover:text-gray-400 text-gray-300 mb-2 uppercase">Mission & Vision</p>
                </a>
                <a @click="onClickItem('about')">
                <p class="cursor-pointer text-sm hover:text-gray-400 text-gray-300 mb-2 uppercase">Who we are</p>
                </a>
                <a @click="onClickItem('history')">
                <p class="cursor-pointer text-sm hover:text-gray-400 text-gray-300 mb-2 uppercase">History</p>
                </a>
                <a @click="onClickItem('message.from-md')">
                <p class="cursor-pointer text-sm hover:text-gray-400 text-gray-300 mb-2 uppercase">Message from md</p>
                </a>
                <a @click="onClickSubItemBox('human')">
                <p class="cursor-pointer text-sm hover:text-gray-400 text-gray-300 mb-2 uppercase">Human Health</p>
                </a>
                <a @click="onClickSubItemBox('vat')">
                <p class="cursor-pointer text-sm hover:text-gray-400 text-gray-300 mb-2 uppercase">Animal Health</p>
                </a>
                <a @click="onClickItem('contact')">
                <p class="cursor-pointer text-sm hover:text-gray-400 text-gray-300 mb-2 uppercase">Contact</p>
                </a>
            </div>
        </div>
        <div class="certification col-span-6 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3 2xl:col-span-3">
          <h1 class="text-2xl font-bold uppercase mb-8 text-white">Certification</h1>
          <div class="flex space-x-4 mx-auto">
            <div class="w-1/3">
              <img src="/images/iso-certificate.png">
            </div>
            <div class="w-1/3">
              <img src="/images/Troffi.png">
            </div>
          </div>
          <div class="social-icon mt-8">
            <div class="flex space-x-4">
              <h1 class="text-xl text-white mb-4 font-semibold">Follow Us</h1>
            </div>
            <div class="flex space-x-2">
              <a href="https://www.facebook.com/Techno-Drugs-Ltd-175885019249711/" target="_blank" class=""> <img class="" src="/images/facebook.svg"></a>
              <a href="#" class=""> <img class="" src="/images/instagram.svg"></a>
              <a href="#" class=""> <img class="" src="/images/twitter.svg"></a>
              <a href="#" class=""> <img class="" src="/images/youtube.svg"></a>
            </div>
          </div>
        </div>
        <div class="newsletter col-span-6 sm:col-span-6 md:col-span-6 lg:col-span-3 xl:col-span-3 2xl:col-span-3">
          <h1 class="text-2xl font-bold uppercase mb-8 text-white">Newsletter</h1>
          <input class="w-full rounded" type="email" placeholder="example@gmail.com">
          <div class="">
            <button type="button" class="px-6 py-2 rounded text-white bg-black hover:bg-primary mt-4">Send</button>
          </div>
        </div>
      </div>
    </section>
    <!--=====post footer=====-->
    <section class="post-footer">
      <div class="flex items-center justify-center py-4" style="background-color:#1b1b1b;">
        <span class="text-white">© 2022 Techno Drugs Ltd All Rights Reserved. </span>
      </div>
    </section>
  </section>
</template>

<script>
import { defineComponent } from 'vue'

export default defineComponent({
    data() {
        return {
            mobileMenuV: false
        }
    },
	setup() {
	},
    methods: {
        onClickItem(routeName) {
            this.$inertia.visit(route(routeName), {method: 'get'});
        },
        onClickSubItemBox(type) {
            this.$inertia.visit(route('products'), {method: 'get', data: { type: type }});
        },
        onClickMobileMenuIcon() {
            this.mobileMenuV = !this.mobileMenuV;
        }
    }
})
</script>
