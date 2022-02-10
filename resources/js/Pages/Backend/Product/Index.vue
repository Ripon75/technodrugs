<template>
    <app-layout title="product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All product
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onCreate()">
                    Create product
                </jet-button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-full mx-auto sm:px-6 lg:px-8">
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
                                                    Image
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Name
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Category
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Generic
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Brand
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Dosage Form
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Strength
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Pack Size
                                                </th>

                                                <th scope="col"
                                                    class="px-6 font-bold py-3 text-left text-xs font-medium uppercase tracking-wider">
                                                    Action
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">

                                            <tr v-for="product in products.data" :key="product.id">

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{product.id}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        <img :src="showImage() + product.image"
                                                            class="object-cover h-10 w-10" />
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{product.display_name}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div v-if="product.product_category" class="text-sm font-medium text-gray-900">
                                                        {{product.product_category.display_name}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div v-if="product.generic" class="text-sm font-medium text-gray-900">
                                                        {{product.generic.display_name}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div v-if="product.brand" class="text-sm font-medium text-gray-900">
                                                        {{product.brand.display_name}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div v-if="product.dosage_form" class="text-sm font-medium text-gray-900">
                                                        {{product.dosage_form.display_name}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{product.strength}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        {{product.pack_size}}
                                                    </div>
                                                </td>

                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="text-xl">
                                                        <jet-button class="bg-primaryPositive hover:bg-primary-darker"
                                                            @click="onEdit(product.id)">
                                                            Edit
                                                        </jet-button>

                                                        <jet-button
                                                            class="bg-primary hover:bg-primaryWarning-darker ml-1"
                                                            @click="onShow(product.id)">
                                                            Show
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

    props: ["products"],

    methods: {

        onCreate() {
            const routeURL = route('products.create');
            this.$inertia.visit(routeURL);
        },

        onEdit(id) {
            const routeURL = route('products.edit', id);
            this.$inertia.visit(routeURL);
        },

        onShow(id) {
            const routeURL = route('products.show', id);
            this.$inertia.visit(routeURL);
        },

        showImage() {
            return "/storage/";
        },
    },
}
</script>
