<template>
    <section class="p-6 bg-white">
        <h2 class="text-3xl font-bold text-center text-[#466149] mb-3">{{ title }}</h2>
        <hr class="w-32 border-t-2 border-[#466149] mx-auto mb-3">
        <p class="text-md text-[#466149] text-center mb-8">{{ texto }}</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <BookCard
                v-for="(book, index) in books.slice(0, 4)" 
                :key="index"
                :image="book.img_url"
                :title="book.title"
                :price="book.price"
                :id="book.id"
            />
        </div>
    </section>
</template>

<script>
import BookCard from '@/components/home/BookCard.vue';

export default {
    name: 'ContainerHome',
    components: {
        BookCard,
    },
    props: {
        title: {
            type: String,
            required: true,
        },
        texto: {
            type: String,
            required: true,
        },
        books: {
            type: Array,
            required: true,
        },
    },
};
</script>

<style scoped></style>
