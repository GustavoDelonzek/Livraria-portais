<template>
    <section class="p-6 my-6 ">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-3">{{ title }}</h2>
        <hr class="w-24 border-t-2 border-gray-500 mx-auto mb-3">
        <p class="text-md text-gray-500 text-center mb-8">{{ texto }}</p>

        <div class="  grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <BookCard image="https://m.media-amazon.com/images/I/41RBd2DvmgL._SY445_SX342_.jpg" title="O Senhor dos Anéis"
                price="R$ 59,90" />
            <BookCard image="https://m.media-amazon.com/images/I/41RBd2DvmgL._SY445_SX342_.jpg" title="O Senhor dos Anéis"
                price="R$ 59,90" />
            <BookCard image="https://m.media-amazon.com/images/I/41RBd2DvmgL._SY445_SX342_.jpg" title="O Senhor dos Anéis"
                price="R$ 59,90" />
            <BookCard image="https://m.media-amazon.com/images/I/41RBd2DvmgL._SY445_SX342_.jpg" title="O Senhor dos Anéis"
                price="R$ 59,90" />
        </div>
    </section>
</template>

<script>
import BookCard from './BookCard.vue';

export default {
    name: 'ContainerHome',
    components: {
        BookCard
    },  
    props: {
        title: {
            type: String,
            required: true
        },
        texto: {
            type: String,
            required: true
        }
    }
}
</script>

<style scoped></style>