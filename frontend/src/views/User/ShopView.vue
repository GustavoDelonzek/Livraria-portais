<template>
    <main class="flex">
        <aside class="flex-shrink-0 w-64 m-6 bg-gray-100 rounded-lg p-3">
            <form class="max-w-md mx-auto my-4">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 end-0 flex items-center pe-3">
                        <button type="submit" class="focus:outline-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </button>
                    </div>
                    <input type="search" id="default-search"
                        class="block w-full p-4 pe-10 text-sm text-gray-900 border-b-2 border-0 bg-transparent focus:ring-0 focus:border-blue-500 dark:text-white dark:border-gray-600 dark:focus:border-blue-500"
                        placeholder="Title..." required />
                </div>
            </form>

            <ul>
                <li v-for="(genres, category) in genresByCategory" :key="category">
                    <h3 class="font-serif font-medium">{{ category }}</h3>
                    <ul class="text-gray-600">
                        <li v-for="genre in genres" :key="genre.id">
                            {{ genre.name }}
                        </li>
                    </ul>
                </li>
            </ul>
        </aside>

        <section class="flex-1 m-6">
            <ul class="flex flex-wrap items-center justify-around text-gray-900 dark:text-white my-6">
                <li>
                    <a href="#" @click.prevent="getForYou" class="me-4 hover:underline text-gray-400 font-serif text-2xl">For You</a>
                </li>
                <li>
                    <a href="#" @click.prevent="getNewReleases" class="me-4 hover:underline text-gray-400 font-serif text-2xl">Novos Lançamentos</a>
                </li>
              
            </ul>

            <BookGrid :books="filteredBooks" />
        </section>
    </main>
</template>

<script>
import BookGrid from '@/components/BookGrid.vue';
import axios from 'axios';
export default {
    name: 'ShopView',
    components: {
        BookGrid
    },  
    data() {
        return {
            genresByCategory: {},
            filteredBooks: [],
        }
    },
    created() {
        this.getGenres();
        this.getNewReleases();
    },
    methods: {
        async getGenres() {
            const url = 'http://127.0.0.1:8000/api/genres-by-category';
            try {
                const response = await axios.get(url);
                this.genresByCategory = response.data;
            } catch (error) {
                console.log(error);
            }
        },
        async getForYou() {
            const url = 'http://127.0.0.1:8000/api/for-you';
            try {
                const response = await axios.get(url);
                this.filteredBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }
        },
        async getNewReleases() {
            const url = 'http://127.0.0.1:8000/api/new-releases';
            try {
                const response = await axios.get(url);
                this.filteredBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }
        },
        async filterByGenre(genre) {
            const url = `http://127.0.0.1:8000/api/books-by-genre/${genre}`;
            try {
                const response = await axios.get(url);
                this.filteredBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }
        }
    }
}
</script>
