<template>
    <select class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)">
        <option value=''>-Select One-</option>
        <option v-for="option in options" v-bind:key="option.value" :value="option.value">{{ option.label }}</option>
    </select>
</template>

<script>
    import { defineComponent } from 'vue'

    export default defineComponent({
        props: ['modelValue', 'options'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    })
</script>
