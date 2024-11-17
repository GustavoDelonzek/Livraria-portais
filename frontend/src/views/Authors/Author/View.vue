<template>
    <div class="relative ">
        <button class="absolute top-6 left-6 text-black" @click="$router.go(-1)">
            <ArrowLeft class="h-6 w-6" />
        </button>
    </div>
    <div class="min-h-screen flex justify-center items-center bg-[#FDF8F4] p-8">

        <div class="container mx-auto max-w-6xl">




            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="relative flex justify-center items-center">
                    <div
                        class="w-64 h-64 md:w-96 md:h-96 rounded-full overflow-hidden relative z-10 border-4 border-orange-400 shadow-xl">
                        <img :src="author.img_url || '/placeholder.svg?height=384&width=384'" :alt="author.name"
                            class="w-full h-full object-cover" />
                    </div>
                    <SparklesIcon class="absolute top-0 right-0 w-8 h-8 text-orange-400 animate-twinkle" />
                    <CircleIcon class="absolute bottom-8 left-0 w-4 h-4 text-orange-400 animate-float" />
                    <CircleIcon class="absolute top-1/2 right-8 w-4 h-4 text-orange-400 animate-float delay-200" />
                </div>

                <div class="space-y-8">
                    <div>
                        <h1 class="text-4xl md:text-5xl font-serif mb-4 text-gray-800">{{ author.name }}</h1>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            {{ author.bio }}
                        </p>
                    </div>

                    <div>
                        <h2 class="text-3xl font-serif mb-6 text-gray-800">Published Books</h2>
                        <div v-if="books.length === 0" class="text-lg text-gray-600">
                            <p>Este autor não possui livros publicados no momento.</p>
                        </div>
                        <div v-else class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6">
                            <RouterLink v-for="book in books" :key="book.id"
                                :to="{ name: 'shopBook', params: { id: book.id } }" class="group cursor-pointer">
                                <div
                                    class="relative aspect-[2/3] overflow-hidden rounded-lg shadow-lg transition-all duration-300 group-hover:scale-105 group-hover:shadow-xl">
                                    <img :src="book.img_url || '/placeholder.svg?height=300&width=200'"
                                        :alt="book.title" class="w-full h-full object-cover" />
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-opacity duration-300 flex items-end justify-center">
                                        <div
                                            class="text-white p-4 transform translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                            <h3 class="font-medium text-lg">{{ book.title }}</h3>
                                            <p class="text-sm opacity-80">{{ book.year }}</p>
                                        </div>
                                    </div>
                                </div>
                            </RouterLink>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer></Footer>
</template>

<script>
import { SparklesIcon, CircleIcon, ArrowLeft } from 'lucide-vue-next'
import axios from 'axios'
import Footer from '@/components/Footer.vue';

export default {
    name: 'AuthorView',
    data() {
        return {
            author: {},
            books: []
        }
    },
    components: {
        SparklesIcon,
        CircleIcon,
        Footer,
        ArrowLeft
    },
    methods: {
        async fetchAuthorAndBooks() {
            try {
                const booksResponse = await axios.get(`http://127.0.0.1:8000/api/books/author/${this.$route.params.id}`);
                this.books = booksResponse.data.books;

                if (this.books.length === 0) {
                    const authorResponse = await axios.get(`http://127.0.0.1:8000/api/get_author/${this.$route.params.id}`);
                    this.author = authorResponse.data;
                } else {
                    this.author = this.books[0].author;
                }
            } catch (error) {
                console.error('Erro ao buscar livros do autor:', error);
            }
        }
    },
    mounted() {
        this.fetchAuthorAndBooks();
    }
}
</script>

<style scoped>
@keyframes twinkle {

    0%,
    100% {
        opacity: 1;
        transform: scale(1);
    }

    50% {
        opacity: 0.5;
        transform: scale(0.9);
    }
}

@keyframes float {

    0%,
    100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-10px);
    }
}

.animate-twinkle {
    animation: twinkle 3s infinite ease-in-out;
}

.animate-float {
    animation: float 5s infinite ease-in-out;
}

.animate-float.delay-200 {
    animation-delay: 200ms;
}
</style>