<template>
    <app-layout title="News Update">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit News
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onIndex()">
                    All News
                </jet-button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="onUpdate()" full>
                    <template #form>
                        <!-- input form for name -->
                        <div class="col-span-6">
                            <jet-label value="Title" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.title" />
                            <jet-input-error :message="form.errors.title" class="mt-2" />
                        </div>

                        <!-- input form for sub title -->
                        <div class="col-span-6">
                            <jet-label value="Sub Title" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.sub_title" />
                            <jet-input-error :message="form.errors.sub_title" class="mt-2" />
                        </div>

                        <!-- input form for slug -->
                        <div class="col-span-6">
                            <jet-label value="Slug" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.slug" />
                            <jet-input-error :message="form.errors.slug" class="mt-2" />
                        </div>

                        <!-- input form for type -->
                        <div class="col-span-6">
                            <jet-label value="Content" class="text-lg" />
                            <jet-text-area type="text" class="mt-1 block w-full" v-model="form.content" />
                            <jet-input-error :message="form.errors.content" class="mt-2" />
                        </div>

                        <!-- input form for short content -->
                        <div class="col-span-6">
                            <jet-label value="Short Content" class="text-lg" />
                            <jet-text-area type="text" class="mt-1 block w-full" v-model="form.short_content" />
                            <jet-input-error :message="form.errors.short_content" class="mt-2" />
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
                            " />
                            <div class="text-sm font-medium text-gray-900 mt-4">
                                <img :src="showImage() + news.thumb_image_path" class="object-cover h-20 w-40" />
                            </div>
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
import JetTextArea    from '@/Jetstream/TextArea.vue'

export default {
    components: {
        AppLayout,
        JetButton,
        JetInput,
        JetFormSection,
        JetLabel,
        JetInputError,
        JetTextArea
    },

    props: ['news'],

    data() {
        return {
            form: this.$inertia.form({
                _method              : 'PUT',
                title                : this.news.title,
                sub_title            : this.news.sub_title,
                slug                 : this.news.slug,
                content              : this.news.content,
                short_content        : this.news.short_content,
                thumb_image_path     : this.news.thumb_image_path,
            })
        }
    },

     methods: {
        onUpdate() {
            if (this.$refs.photo) {
                this.form.thumb_image_path = this.$refs.photo.files[0];
            }
            const routeURL = route('news.update', this.news.id);
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

        showImage() {
            return "/storage/";
        },
    }

}
</script>
