<template>
    <app-layout title="User Create">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create User
                <jet-button class="float-right bg-primary hover:bg-primary-darker" @click="onIndex()">
                    All User
                </jet-button>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <jet-form-section @submitted="onStore()" full>
                    <template #form>
                        <div class="col-span-6">
                            <jet-label value="Name" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.name" />
                            <jet-input-error :message="form.errors.name" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <jet-label value="Email" />
                            <jet-input type="text" class="mt-1 block w-full" v-model="form.email" />
                            <jet-input-error :message="form.errors.email" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <jet-label value="Password" />
                            <jet-input type="password" class="mt-1 block w-full" v-model="form.password" />
                            <jet-input-error :message="form.errors.password" class="mt-2" />
                        </div>

                        <div class="col-span-6">
                            <jet-label value="Confirm Password" />
                            <jet-input type="password" class="mt-1 block w-full" v-model="form.confirm_password" />
                            <jet-input-error :message="form.errors.confirm_password" class="mt-2" />
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
                name: '',
                email: '',
                password: '',
                confirm_password: '',
            })
        }
    },

     methods: {
        onStore() {
            const routeURL = route('users.store');
            this.form.post(routeURL, {
                preserveScroll: true,
            });
        },

        onIndex() {
            const routeURL = route('users.index');
            this.form.get(routeURL);
        }
    }

}
</script>
