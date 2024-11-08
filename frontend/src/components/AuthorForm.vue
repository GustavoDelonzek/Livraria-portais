<template>
    <main class="m-5">
        <ErrorDisplay :errors="errors" />

        <form class="max-w-md mx-auto" @submit.prevent="submitForm" novalidate>
            <FormInput v-model="author.name" name="name" label="Name" />
            <FormInput v-model="formattedDateOfBirth" name="date_of_birth" label="Date of Birth" type="text"
                @input="applyDateMask" />
            <FormInput v-model="author.nationality" name="nationality" label="Nationality" />
            <FormInput v-model="author.bio" name="bio" label="Biography" />

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
    name: 'AuthorForm',
    components: {
        FormInput,
        ErrorDisplay
    },
    props: {
        initialAuthor: { type: Object, required: true },
        submitButtonText: { type: String, default: 'Submit' }
    },
    data() {
        return {
            author: { ...this.initialAuthor },
            errors: []
        }
    },
    methods: {
        applyDateMask(event) {
            let value = event.target.value.replace(/\D/g, '');

            if (value.length > 8) {
                value = value.slice(0, 8);
            }

            if (value.length > 2) value = value.replace(/(\d{2})(\d)/, '$1/$2');
            if (value.length > 5) value = value.replace(/(\d{2}\/\d{2})(\d)/, '$1/$2');

            event.target.value = value;
            this.formattedDateOfBirth = value;
        },




        validateForm() {
            this.errors = []
            if (!this.author.name) this.errors.push("Name is required!")
            if (!this.author.date_of_birth) this.errors.push("Date of Birth is required!");
            else if (!/^\d{4}-\d{2}-\d{2}$/.test(this.author.date_of_birth)) {
                this.errors.push("Date of Birth must be in the format YYYY-MM-DD!");
            }
            if (!this.author.nationality) this.errors.push("Nationality is required!")
            if (!this.author.bio) this.errors.push("Biography is required!")
            return this.errors.length === 0
        },
        submitForm() {
            if (this.validateForm()) {
                this.$emit('submit', this.author)
            }
        },

    },
    computed: {
        formattedDateOfBirth: {
            get() {
                if (!this.author.date_of_birth) return '';
                const [year, month, day] = this.author.date_of_birth.split('-');
                return `${day}/${month}/${year}`;
            },
            set(value) {
                const [day, month, year] = value.split('/');
                if (day && month && year) {
                    this.author.date_of_birth = `${year}-${month}-${day}`;
                } else {
                    this.author.date_of_birth = '';
                }
            }
        }
    }
}
</script>
