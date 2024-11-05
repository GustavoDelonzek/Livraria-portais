<template>
    <main class="m-5">
        <ErrorDisplay :errors="errors" />

        <form class="max-w-md mx-auto" @submit.prevent="submitForm" novalidate>
            <FormInput v-model="book.title" name="title" label="Title" />
            <FormInput v-model="book.author_id" name="author_id" label="Author ID" type="number" />
            <FormInput v-model="book.publisher_id" name="publisher_id" label="Publisher ID" type="number" />
            <FormInput v-model="book.published_year" name="published_year" label="Published Year" />
            <FormInput v-model="book.genre" name="genre" label="Genre" />
            <FormInput v-model="book.price" name="price" label="Price" type="number" />
            <FormInput v-model="book.stock" name="stock" label="Stock" type="number" />
            <FormInput v-model="book.description" name="description" label="Description" />

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
    name: 'BookForm',
    components: {
        FormInput,
        ErrorDisplay
    },
    props: {
        initialBook: { type: Object, Required: true },
        submitButtonText: { type: String, default: 'Submit' }
    },
    data() {
        return {
            book: { ...this.initialBook },
            errors: []
        }
    },
    methods: {
        validateForm() {
            this.errors = []
            if (!this.book.title) this.errors.push("Title is required!")
            if (!this.book.author_id) this.errors.push("Author is required!")
            if (!this.book.publisher_id) this.errors.push("Publisher is required!")
            if (!this.book.published_year) this.errors.push("Published year is required!")
            if (!this.book.genre) this.errors.push("Genre is required!")
            if (!this.book.price) this.errors.push("Price is required!")
            if (!this.book.stock) this.errors.push("Stock is required!")
            if (!this.book.description) this.errors.push("Description is required!")
            return this.errors.length === 0
        },
        submitForm() {
            if (this.validateForm()) {
                this.$emit('submit', this.book)
            }
        }
    }
}
</script>