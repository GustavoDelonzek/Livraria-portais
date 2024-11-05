<template>
    <main class="m-5">
        <ErrorDisplay :errors="errors" />

        <form class="max-w-md mx-auto" @submit.prevent="submitForm" novalidate>
            <FormInput v-model="publisher.name" name="name" label="Name" />
            <FormInput v-model="publisher.address" name="address" label="Address" />
            <FormInput v-model="publisher.website" name="website" label="Website" />
            <FormInput v-model="publisher.contact" name="contact" label="Contact" />

            <button type="submit"
                class="text-dark bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ submitButtonText }}
            </button>
        </form>
    </main>
</template>

<script>
import FormInput from './FormInput.vue'
import ErrorDisplay from './ErrorDisplay.vue'

export default {
    name: 'PublisherForm',
    components: {
        FormInput,
        ErrorDisplay
    },
    props: {
        initialPublisher: { type: Object, required: true },
        submitButtonText: { type: String, default: 'Submit' }
    },
    data() {
        return {
            publisher: { ...this.initialPublisher },
            errors: []
        }
    },
    methods: {
        validateForm() {
            this.errors = []
            if (!this.publisher.name) this.errors.push("Name is required!")
            if (!this.publisher.address) this.errors.push("Address is required!")
            if (!this.publisher.contact) this.errors.push("Contact is required!")
            return this.errors.length === 0
        },
        submitForm() {
            if (this.validateForm()) {
                this.$emit('submit', this.publisher)
            }
        }
    }
}
</script>
