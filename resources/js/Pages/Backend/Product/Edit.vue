<template>
    <app-layout title="Edit Product">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Product
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onIndex()">
                    All Product
                </jet-button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="onUpdate()" full>
                    <template #form>
                        <!-- input form for name -->
                        <div class="col-span-3">
                            <jet-label value="Name" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.display_name" />
                            <jet-input-error :message="form.errors.display_name" class="mt-2" />
                        </div>

                         <!-- input form for generic id -->
                        <div class="col-span-3">
                            <jet-label value="Select Generic" class="text-lg" />
                            <jet-select v-model="form.generic_id" :options="this.generics" class="mt-1 block w-full">
                            </jet-select>
                            <jet-input-error :message="form.errors.generic_id" class="mt-2" />
                        </div>

                         <!-- input form for brand id -->
                        <div class="col-span-3">
                            <jet-label value="Select brand" class="text-lg" />
                            <jet-select v-model="form.brand_id" :options="this.brands" class="mt-1 block w-full">
                            </jet-select>
                            <jet-input-error :message="form.errors.brand_id" class="mt-2" />
                        </div>

                        <!-- input form for dosage form id -->
                        <div class="col-span-3">
                            <jet-label value="Select Dosage Form" class="text-lg" />
                            <jet-select v-model="form.dosage_form_id" :options="this.dosageForms"
                                class="mt-1 block w-full"></jet-select>
                            <jet-input-error :message="form.errors.dosage_form_id" class="mt-2" />
                        </div>

                         <!-- input form for category id -->
                        <div class="col-span-3">
                            <jet-label value="Select Category" class="text-lg" />
                            <jet-select v-model="form.product_category_id" :options="this.productCategories"
                                class="mt-1 block w-full"></jet-select>
                            <jet-input-error :message="form.errors.product_category_id" class="mt-2" />
                        </div>

                        <!-- input form for strength -->
                        <div class="col-span-3">
                            <jet-label value="Strength" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.strength" />
                        </div>

                        <!-- input form for pack size -->
                        <div class="col-span-3">
                            <jet-label value="Pack Size" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.pack_size" />
                        </div>

                        <!-- input form for type -->
                        <!-- <div class="col-span-2">
                            <jet-label value="Type" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.type" />
                            <jet-input-error :message="form.errors.type" class="mt-2" />
                        </div> -->

                        <!-- input form for mrp -->
                        <div class="col-span-3">
                            <jet-label value="MRP" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.mrp" />
                            <jet-input-error :message="form.errors.mrp" class="mt-2" />
                        </div>

                        <!-- input form for image -->
                        <div class="col-span-6">
                            <jet-label value="Upload Image" class="text-lg" />
                            <input type="file" @change="previewImage" ref="photo" class="
                                w-full
                                px-4
                                py-2
                                mt-2
                                border
                                rounded-md
                                focus:outline-none
                                focus:ring-1
                                focus:ring-blue-600
                            "/>
                            <div class="text-sm font-medium text-gray-900 mt-4">
                                <img :src="showImage() + product.image" class="object-cover h-20 w-40" />
                            </div>
                        </div>

                         <!-- input form for descripton -->
                        <div class="col-span-6">
                            <jet-label value="Description" class="text-lg" /> <ckeditor :editor="editor" class="mt-1 block w-full" v-model="form.description"/>
                        </div>

                    </template>
                    <template #actions>
                        <jet-button class="bg-primary hover:bg-primary-darker">
                            Update
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetSelect from '@/Jetstream/Select.vue'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import CKEditor from '@ckeditor/ckeditor5-vue';

export default {

    components: {
        AppLayout,
        JetButton,
        JetInput,
        JetFormSection,
        JetLabel,
        JetInputError,
        JetSelect,
        ClassicEditor,
        ckeditor: CKEditor.component
    },

    props: ['product','brands', 'generics', 'productCategories', 'dosageForms'],

    data() {
        return {
            editor: ClassicEditor,

            form: this.$inertia.form({
                _method            : 'PUT',
                display_name       : this.product.display_name,
                description        : this.product.description,
                strength           : this.product.strength,
                mrp                : this.product.mrp,
                pack_size          : this.product.pack_size,
                image              : this.product.image,
                generic_id         : this.product.generic_id,
                brand_id           : this.product.brand_id,
                product_category_id: this.product.product_category_id,
                dosage_form_id     : this.product.dosage_form_id,
            })
        }
    },

     methods: {
        onUpdate() {
            if (this.$refs.photo) {
                this.form.image = this.$refs.photo.files[0];
            }
            const routeURL = route('products.update', this.product.id);
            this.form.post(routeURL, {
                preserveScroll: true,
            });
        },

        onIndex() {
            const routeURL = route('products.index');
            this.form.get(routeURL);
        },

        previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },

        showImage() {
            return "/storage/";
        },
    }

}
</script>
