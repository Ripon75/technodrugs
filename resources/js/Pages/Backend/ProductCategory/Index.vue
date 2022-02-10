<template>
    <app-layout title="Product Category">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All Product Category
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onCreate()">
                    Create Category
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
                                                    Name
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Description
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Status
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            <tr v-for="pCat in productCategories.data" :key="pCat.id">

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{pCat.id}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{pCat.display_name}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{pCat.description}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{pCat.status}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-xl">
                                                        <jet-button class="bg-primaryPositive hover:bg-primary-darker"
                                                            @click="onEdit(pCat.id)">
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

    props: ["productCategories"],

    methods: {

        onCreate() {
            const routeURL = route('categories.create');
            this.$inertia.visit(routeURL);
        },

        onEdit(id) {
            const routeURL = route('categories.edit', id);
            this.$inertia.visit(routeURL);
        }
    },
}
</script>
