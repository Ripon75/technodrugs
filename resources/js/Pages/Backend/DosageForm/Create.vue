<template>
    <app-layout title="Generic Create">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Dosage Form
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onIndex()">
                    All Dosage Form
                </jet-button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="onStore()" full>
                    <template #form>
                        <div class="col-span-6">
                            <jet-label value="Name" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.display_name" />
                            <jet-input-error :message="form.errors.display_name" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <jet-label value="Description" class="text-lg" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.description" />
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
import AppLayout from '@/Layouts/AppLayout.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetFormSection from '@/Jetstream/FormSection.vue'
import JetLabel from '@/Jetstream/Label.vue'
import JetInputError from '@/Jetstream/InputError.vue'

export default {

    components: {
        AppLayout,
        JetButton,
        JetInput,
        JetFormSection,
        JetLabel,
        JetInputError
    },

    data() {
        return {
            form: this.$inertia.form({
                display_name: '',
                description: '',
                status: ''
            })
        }
    },

     methods: {
        onStore() {
            const routeURL = route('dosage-forms.store');
            this.form.post(routeURL, {
                preserveScroll: true,
            });
        },

        onIndex() {
            const routeURL = route('dosage-forms.index');
            this.form.get(routeURL);
        }
    }

}
</script>
