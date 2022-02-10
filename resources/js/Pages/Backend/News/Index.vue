<template>
    <app-layout title="news">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All news
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onCreate()">
                    Create news
                </jet-button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- start -->
                    <!-- This example requires Tailwind CSS v2.0+ -->
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    ID
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Thumb
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Title
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Sub Title
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Slug
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            <tr v-for="news in news.data" :key="news.id">

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{news.id}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <img :src="showImage() + news.thumb_image_path"
                                                            class="object-cover h-10 w-10" />
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{news.title}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{news.sub_title}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{news.slug}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-xl">
                                                        <jet-button class="bg-primaryPositive hover:bg-primary-darker"
                                                            @click="onEdit(news.id)">
                                                            Edit
                                                        </jet-button>
                                                    </div>
                                                </td>

                                            </tr>
                                            <!--More people... -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import JetButton from '@/Jetstream/Button.vue'

export default {

    components: {
        AppLayout,
        JetButton
    },

    props: ["news"],

    methods: {

        onCreate() {
            const routeURL = route('news.create');
            this.$inertia.visit(routeURL);
        },

        onEdit(id) {
            const routeURL = route('news.edit', id);
            this.$inertia.visit(routeURL);
        },

        showImage() {
            return "/storage/";
        },
    },
}
</script>
