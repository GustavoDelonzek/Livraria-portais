<template>
    <main class="flex justify-center">
        <div class="container flex">

            <aside class="flex-shrink-0 w-64 md:w-96 my-6 mr-6 bg-gray-100 rounded-lg p-4">
                <form class="max-w-md mx-auto my-4">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-400 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 flex items-center pe-3">
                            <button type="submit" class="focus:outline-none">
                                <svg class="w-4 h-4 text-gray-400 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </button>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 pe-10 text-sm text-gray-400 border-gray-300 border-b-2 border-0 bg-transparent focus:ring-0 focus:border-blue-500 dark:text-white dark:border-gray-500 dark:focus:border-blue-500"
                            placeholder="Title..." required />
                    </div>
                </form>

                <ul>
                    <li v-for="(genres, category) in genresByCategory" :key="category" class="mb-4">
                        <h3 class="font-bold font-medium text-lg mt-10">
                            <button class="w-full text-left cursor-pointer hover:text-blue-600"
                                @click="filterByCategory(category)">
                                {{ category }}
                            </button>
                        </h3>
                        <ul class="mt-3 mb-10 space-y-2 font-serif text-gray-400">
                            <li v-for="genre in genres" :key="genre.id">
                                <button
                                    class="w-full text-left cursor-pointer hover:text-blue-500 hover:bg-gray-100 py-1 rounded transition-all"
                                    @click="filterByGenre(genre.name)">
                                    {{ genre.name }}
                                </button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>

            <section class="flex-1 m-6">
                <ul class="flex flex-wrap items-center justify-start  dark:text-white p-6   ">
                    <li>
                        <a href="#" @click.prevent="getForYou"
                            class=" hover:underline text-gray-400 font-serif text-xl">For You</a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="getNewReleases"
                            class="mx-10 hover:underline text-gray-400 font-serif text-xl">Novos Lançamentos</a>
                    </li>

                </ul>

                <BookGrid :books="filteredBooks" />
            </section>

        </div>
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
            selectedGenres: [],
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
           this.checkUserGenres()
        },
        async getNewReleases() {
            const url = 'http://127.0.0.1:8000/api/new_releases';
            try {
                const response = await axios.get(url);
                this.filteredBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }
        },
        async filterByGenre(genre) {
            const url = `http://127.0.0.1:8000/api/books_by_genre/${genre}`;
            try {
                const response = await axios.get(url);
                this.filteredBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }
        },
        async filterByCategory(category) {
            const url = `http://127.0.0.1:8000/api/books_by_category/${category}`;
            try {
                const response = await axios.get(url);
                this.filteredBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }


        },
        async checkUserGenres() {
            const user = localStorage.getItem('user');
            const parsedUser = JSON.parse(user);
            if (parsedUser) {
                try {
                    const response = await axios.get(`http://127.0.0.1:8000/api/user_genres/${parsedUser.id}`);

                    if (response.data.genres.length > 0) {
                        this.selectedGenres = response.data.genres;
                        this.filterByGenres(this.selectedGenres);
                    } else {
                        this.showModal = true;
                    }
                } catch (error) {
                    console.error('Erro ao verificar gêneros do usuário:', error);
                }
            }
        },
        async filterByGenres(genres) {
            this.isLoadingFilter = true;
            const allBooks = [];
            console.log(genres);

            try {
                const requests = genres.map(genre => {
                    const url = `http://127.0.0.1:8000/api/books_by_genre/${genre.name}`;
                    return axios.get(url).catch(error => {
                        console.error(`Erro ao fazer requisição para o gênero ${genre.name}:`, error);
                        return null;
                    });
                });

                const responses = await Promise.all(requests);

                responses.forEach(response => {
                    if (response.data.books) {
                        const books = response.data.books.filter(book => {
                            return this.book ? book.id !== this.book.id : true;
                        });
                        allBooks.push(...books);
                    } else {
                        console.error('Resposta inesperada ou sem livros:', response);
                    }
                });

                const uniqueBooks = Array.from(new Map(allBooks.map(book => [book.id, book])).values());

                this.filteredBooks = uniqueBooks.slice(0, 4);
            } catch (error) {
                console.error('Erro ao buscar livros por gêneros:', error);
            } finally {
                this.isLoadingFilter = false;
            }
        }
    }
}
</script>
