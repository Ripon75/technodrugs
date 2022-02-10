<template>
    <app-layout title="brand Update">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Brand
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onIndex()">
                    All Brand
                </jet-button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="onUpdate()" full>
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

                        <div class="col-span-6">
                            <jet-label value="Status" class="text-lg" />
                            <jet-select v-model="form.status" :options="this.options" class="mt-1 block w-full">
                            </jet-select>
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
    import JetFormSection from '@/Jetstream/FormSection.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetInputError from '@/Jetstream/InputError.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import JetActionMessage from '@/Jetstream/ActionMessage.vue'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'
    import JetSelect from '@/Jetstream/Select.vue'

export default({
    components: {
        AppLayout,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetActionMessage,
        JetSecondaryButton,
        JetSelect
    },

    props: ['brand'],

    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                display_name: this.brand.display_name,
                status: this.brand.status,
                description: this.brand.description
            }),

             options: [
                {label: 'Draft', value: 'draft'},
                {label: 'Activated', value: 'activated'},
                {label: 'Inactivated', value: 'inactivated'},
            ]
        }
    },

    methods: {
        onUpdate() {
            const routeURL = route('brands.update', this.brand.id);
            this.form.post(routeURL);

        },

        onIndex() {
            const routeURL = route('brands.index');
            this.form.get(routeURL);
        }
    }
})
</script>
