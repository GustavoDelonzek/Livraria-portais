<template>
    <main class="flex justify-center">
        <div class="container flex flex-col sm:flex-row">

            <aside class="flex-shrink-0  sm:w-64 md:w-96 my-6 mr-6 bg-[#fdffe5] shadow-[#fdffe5] shadow-lg rounded-lg p-4">
                <form class="max-w-md mx-auto my-4">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-400 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 end-0 flex items-center pe-3">
                            <button type="submit" class="focus:outline-none" disabled>
                                <svg class="w-4 h-4 text-[#466149] dark:text-[#466149]" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </button>
                        </div>
                        <input type="search" id="default-search"
                            class="block w-full p-4 pe-10 text-sm text-[#466149] border-[#466149] border-b-2 border-0 bg-transparent focus:ring-0 focus:border-[#86AB89] dark:text-white dark:border-gray-500 dark:focus:border-[#86AB89]"
                            placeholder="Title..." required v-model="searchQuery" @input="searchBooks(searchQuery)" />
                    </div>
                </form>

                <ul>
                    <li v-for="(genres, category) in genresByCategory" :key="category" class="mb-4">
                        <h3 class="font-bold text-[#EA907A] font-medium text-lg mt-10">
                            <button class="w-full text-left cursor-pointer hover:text-[#a61b1b]"
                                @click="filterByCategory(category)">
                                {{ category }}
                            </button>
                        </h3>
                        <ul class="mt-3 mb-10 space-y-2 font-serif text-[#466149]">
                            <li v-for="genre in genres" :key="genre.id">
                                <button
                                    class="w-full text-left cursor-pointer hover:text-[#86AB89]  py-1 rounded transition-all"
                                    @click="filterByGenre(genre.name)">
                                    {{ genre.name }}
                                </button>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>

            <section class="flex-1 m-6">
                <ul class="flex flex-wrap items-center justify-center sm:justify-end text-[#64b0b0] p-6 space-x-6 sm:space-x-10">
    <li>
        <a href="#" @click.prevent="getForYou" class="hover:underline font-serif text-xl">Para você</a>
    </li>
    <li>
        <a href="#" @click.prevent="getNewReleases" class="hover:underline font-serif text-xl">Lançamentos</a>
    </li>
</ul>
                <BookGrid :books="paginatedBooks" />

                <div v-if="paginatedBooks.length > 0" class="flex justify-center mt-6">
                    <button @click="prevPage" :disabled="currentPage === 1"
                        class="px-4 py-2 mx-1 bg-gray-200 rounded hover:bg-gray-300">
                        Anterior
                    </button>
                    <button v-for="page in totalPages" :key="page" @click="goToPage(page)"
                        :class="['px-4 py-2 mx-1 rounded', currentPage === page ? 'bg-[#86AB89]' : 'bg-gray-200']"
                        class="hover:bg-gray-300">
                        {{ page }}
                    </button>
                    <button @click="nextPage" :disabled="currentPage === totalPages"
                        class="px-4 py-2 mx-1 bg-gray-200 rounded hover:bg-gray-300">
                        Próximo
                    </button>
                </div>

            </section>

        </div>
    </main>
    <Footer></Footer>
</template>

<script>
import BookGrid from '@/components/BookGrid.vue';
import Footer from '@/components/Footer.vue';
import axios from 'axios';
export default {
    name: 'ShopView',
    components: {
        BookGrid,
        Footer
    },
    data() {
        return {
            genresByCategory: {},
            filteredBooks: [],
            selectedGenres: [],
            currentPage: 1,
            itemsPerPage: 15,
            searchQuery: ''
        }
    },
    created() {
        this.getGenres();
        this.getNewReleases();
    },
    computed: {
        paginatedBooks() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.filteredBooks.slice(start, end);
        },
        totalPages() {
            return Math.ceil(this.filteredBooks.length / this.itemsPerPage);
        }
    },
    methods: {
        async searchBooks(query) {
            const url = 'http://127.0.0.1:8000/api/search/books';
            try {
                const response = await axios.get(url, { params: { query } });
                this.filteredBooks = response.data.books;
            } catch (error) {
                console.error(error);
            }
        },
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
                this.resetPage()
            } catch (error) {
                console.log(error);
            }
        },
        async filterByGenre(genre) {
            const url = `http://127.0.0.1:8000/api/books_by_genre/${genre}`;
            try {
                const response = await axios.get(url);
                this.filteredBooks = response.data.books;
                this.resetPage();
            } catch (error) {
                console.log(error);
            }
        },
        async filterByCategory(category) {
            const url = `http://127.0.0.1:8000/api/books_by_category/${category}`;
            try {
                const response = await axios.get(url);
                this.filteredBooks = response.data.books;
                this.resetPage();
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
                this.resetPage();
            } catch (error) {
                console.error('Erro ao buscar livros por gêneros:', error);
            } finally {
                this.isLoadingFilter = false;
            }
        },
        goToPage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.currentPage = page;
                window.scrollTo(0, 0);
            }
        },
        nextPage() {
            if (this.currentPage < this.totalPages) {
                this.currentPage++;
                window.scrollTo(0, 0);
            }
        },
        prevPage() {
            if (this.currentPage > 1) {
                this.currentPage--;
                window.scrollTo(0, 0);
            }
        },
        resetPage() {
            this.currentPage = 1;
            window.scrollTo(0, 0);
        }
    }
}
</script>
