<template>
    <app-layout title="Generic Update">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Generic
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onIndex()">
                    All Generic
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

export default ({
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

    props: ['generic'],

    data() {
        return {
            form: this.$inertia.form({
                _method: 'PUT',
                display_name: this.generic.display_name,
                status: this.generic.status,
                description: this.generic.description
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
            const routeURL = route('generics.update', this.generic.id);
            this.form.post(routeURL);
        },

        onIndex() {
            const routeURL = route('generics.index');
            this.form.get(routeURL);
        }
    }
})
</script>
