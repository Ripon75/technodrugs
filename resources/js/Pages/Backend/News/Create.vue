<template>
    <app-layout title="News Create">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create News
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onIndex()">
                    All News
                </jet-button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="onStore()" full>
                    <template #form>
                        <div class="col-span-6">
                            <jet-label value="Title" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.title" />
                            <jet-input-error :message="form.errors.title" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <jet-label value="Sub Title" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.sub_title" />
                            <jet-input-error :message="form.errors.sub_title" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <jet-label value="Slug" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.slug" />
                            <jet-input-error :message="form.errors.slug" class="mt-2" />
                            <p class="text-red-500">{{error}}</p>
                        </div>

                        <div class="col-span-6">
                            <jet-label value="Content" class="text-lg" />
                            <jet-text-area type="text" class="mt-1 block w-full" v-model="form.content" />
                            <jet-input-error :message="form.errors.content" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <jet-label value="Short Content" class="text-lg" />
                            <jet-text-area type="text" class="mt-1 block w-full" v-model="form.short_content" />
                            <jet-input-error :message="form.errors.short_content" class="mt-2" />
                        </div>

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
                        " />
                        </div>
                    </template>
                    <template #actions>
                        <jet-button class="bg-primary hover:bg-primary-darker">
                            Create
                        </jet-button>
                    </template>
                </jet-form-section>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout      from '@/Layouts/AppLayout.vue'
import JetButton      from '@/Jetstream/Button.vue'
import JetInput       from '@/Jetstream/Input.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetLabel       from '@/Jetstream/Label.vue'
import JetInputError  from '@/Jetstream/InputError.vue'
import JetSelect      from '@/Jetstream/Select.vue'
import JetTextArea    from '@/Jetstream/TextArea.vue'

export default {

    components: {
        AppLayout,
        JetButton,
        JetInput,
        JetFormSection,
        JetLabel,
        JetInputError,
        JetSelect,
        JetTextArea
    },

    props: ['error'],

    data() {
        return {
            form: this.$inertia.form({
                title:            '',
                sub_title:        '',
                slug:             '',
                content:          '',
                short_content:    '',
                thumb_image_path: '',
            })
        }
    },

     methods: {
        onStore() {
            if (this.$refs.photo) {
                this.form.thumb_image_path = this.$refs.photo.files[0];
            }
            const routeURL = route('news.store');
            this.form.post(routeURL, {
                preserveScroll: true,
            });
        },

        onIndex() {
            const routeURL = route('news.index');
            this.form.get(routeURL);
        },

         previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
    }

}
</script>
