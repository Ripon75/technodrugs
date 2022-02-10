<template>
    <app-layout title="User Update">

        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update User
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onIndex()">
                    All User
                </jet-button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="onUpdate()" full>
                    <template #form>
                        <!-- Name -->
                        <div class="col-span-6">
                            <jet-label for="name" value="Name" />
                            <jet-input id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                                autocomplete="name" />
                            <jet-input-error :message="form.errors.name" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="col-span-6">
                            <jet-label for="email" value="Email" />
                            <jet-input id="email" type="email" class="mt-1 block w-full" v-model="form.email" />
                            <jet-input-error :message="form.errors.email" class="mt-2" />
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

    export default ({
        components: {
            AppLayout,
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
        },

        props: ['user'],

        data() {
            return {
                form: this.$inertia.form({
                    _method: 'PUT',
                    name: this.user.name,
                    email: this.user.email
                }),
            }
        },

        methods: {
            onUpdate() {
                const routeURL = route('users.update', this.user.id);
                this.form.post(routeURL);
            },

            onIndex() {
                const routeURL = route('users.index');
                this.form.get(routeURL);
            }
        },
    })
</script>
