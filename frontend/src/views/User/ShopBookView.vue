<template>
    <div class="min-h-screen bg-[#fdffe5]  ">
        <div class="relative h-96">
            <div class="absolute inset-0 bg-cover bg-center"
                :style="{ backgroundImage: `url(${book.img_url})`, backgroundSize: '300%', filter: 'blur(4px)' }"></div>

            <div class="absolute inset-0 bg-black opacity-50"></div>

            <button class="absolute top-6 left-6 text-white z-10" @click="$router.go(-1)">
                <ArrowLeft class="h-6 w-6" />
            </button>
        </div>
        <div v-if="book.id" class="relative px-4 container mx-auto  -mt-64 z-10">
            <div class="flex flex-col md:flex-row gap-6">
                <img :src="book.img_url" :alt="book.title" class="w-[15rem] sm:w-[15rem] md:w-[16rem] lg:w-[17rem] 
           min-h-[18rem] sm:min-h-[19rem] md:min-h-[20rem] lg:min-h-[22rem]
           max-h-[26rem] object-cover rounded-lg shadow-2xl mx-auto md:mx-0" />

                <div class="flex-1 md:text-white justify-between flex flex-col  pt-4">
                    <div>
                        <h1 class="text-4xl font-serif mb-4">{{ book.title }}</h1>
                        <div class="flex items-center gap-2 mb-4">

                            <img :src="book.author.img_url" alt="Author" class="w-12 h-12 object-cover rounded-full" />

                            <RouterLink :to="`/author/${book.author.id}`" class="font-serif hover:underline ">{{
                                book.author.name }}</RouterLink>

                        </div>

                        <div class="flex flex-col  gap-1 mt-10">
                            <button @click="openFirstModal"
                                class="flex items-center gap-2 hover:underline hover:text-gray-300">
                                <div class="flex items-center">
                                    <StarIcon v-for="i in 5" :key="i" :class="{
                                        'text-yellow-400': i <= averageRating,
                                        'text-gray-300': i > averageRating
                                    }" class="h-4 w-4 fill-current" />
                                </div>
                                <span class="ml-2 text-sm text-white">
                                    ({{ reviews.length }} avaliações)
                                </span>
                            </button>



                            <div v-if="isFirstModalOpen" tabindex="-1" aria-hidden="true"
                                class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-900/50">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <div
                                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Todas as {{
                                                reviews.length }}
                                                avaliações</h3>
                                            <button @click="closeFirstModal"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                <svg class="w-3 h-3" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <div class="p-4 md:p-5">
                                            <div v-if="reviews.length > 0">
                                                <div v-if="reviews[currentReviewIndex]">
                                                    <p class="font-medium text-gray-800 text-lg">{{
                                                        reviews[currentReviewIndex].user.name
                                                        }}</p>
                                                    <div class="flex items-center mt-2">
                                                        <StarIcon v-for="n in 5" :key="n" :class="{
                                                            'text-yellow-400 fill-current': n <= reviews[currentReviewIndex].rating,
                                                            'text-gray-300': n > reviews[currentReviewIndex].rating
                                                        }" class="w-5 h-5" />
                                                    </div>
                                                    <p class="text-sm text-gray-600 mt-5">{{
                                                        reviews[currentReviewIndex].comment }}</p>
                                                </div>

                                                <div class="flex items-center justify-between mt-4">
                                                    <button @click="previousReview" :disabled="currentReviewIndex === 0"
                                                        class="px-4 py-2 bg-blue-500 text-white rounded-full disabled:opacity-50">
                                                        Anterior
                                                    </button>
                                                    <p class="text-gray-800">
                                                        {{ currentReviewIndex + 1 }}/{{ reviews.length }}
                                                    </p>
                                                    <button @click="nextReview"
                                                        :disabled="currentReviewIndex === reviews.length - 1"
                                                        class="px-4 py-2 bg-blue-500 text-white rounded-full disabled:opacity-50">
                                                        Próxima
                                                    </button>
                                                </div>
                                            </div>
                                            <div v-else>
                                                <p class="text-center text-gray-500">Nenhuma avaliação disponível.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex mt-8 md:mt-0 md:max-w-[40vw] gap-4 mb-6">
                        <button
                            class="flex-1 bg-[#466149] text-white py-3 rounded-full font-medium hover:bg-[#BFD8AF] hover:text-[#466149] transition-colors">
                            Compre R${{ book.price || '0.00' }}
                        </button>
                        <button @click="addToCart(book)"
                            class="flex-1 bg-gray-200 text-gray-900 py-3 rounded-full font-medium border border-gray-200 hover:bg-gray-100 transition-colors">
                            Adicionar ao Carrinho
                        </button>


                        <button @click="toggleBookmark(book)"
                            class="bg-[#BFD8AF] text-gray-900 p-3 rounded-full border border-gray-200 hover:bg-[#466149] hover:text-white transition-colors">
                            <Bookmark v-if="!isBookmarked(book)" class="h-6 w-6" />
                            <BookmarkCheck v-else></BookmarkCheck>
                        </button>


                        <button @click="openModal" v-if="hasPurchased"
                            class="bg-white text-gray-900 p-3 rounded-full border border-gray-200 hover:bg-gray-50 transition-colors"
                            type="button">
                            <MessageSquareText class="h-6 w-6" />
                        </button>

                        <div v-if="isModalOpen" tabindex="-1" aria-hidden="true"
                            class="fixed inset-0 z-50 flex items-center justify-center w-full h-full bg-gray-900/50">
                            <div class="relative p-4 w-full max-w-md max-h-full">
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <div
                                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Create New
                                            Product</h3>
                                        <button @click="closeModal"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <form @submit.prevent="submitReview" class="p-4 md:p-5">
                                        <div class="grid gap-4 mb-4 grid-cols-2">

                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="rating"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
                                                <select v-model="rating" id="rating"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="" disabled>Select rating</option>
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Stars</option>
                                                    <option value="3">3 Stars</option>
                                                    <option value="4">4 Stars</option>
                                                    <option value="5">5 Stars</option>
                                                </select>
                                            </div>
                                            <div class="col-span-2">
                                                <label for="review-text"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                                    Review</label>
                                                <textarea v-model="comment" id="review-text" rows="4"
                                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                    placeholder="Write your review here" required></textarea>
                                            </div>
                                        </div>
                                        <button type="submit"
                                            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            Submit Review
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" grid grid-cols-2 md:grid-cols-3 mt-8 gap-6  py-4">
                <div class="md:mr-12 text-center md:text-justify col-span-2 md:col-span-1">
                    <h2 class="text-xl font-bold font-serif mb-4 text-[#86AB89] ">SOBRE </h2>
                    <p class="text-gray-600 text-sm  leading-relaxed">
                        {{ book.description || 'No description available.' }}
                    </p>
                    <div class="flex justify-center md:justify-start gap-2 mt-4">
                        <span v-for="genre in book.genres" :key="genre"
                            class="px-3 py-1 bg-[#ebab9b] text-[#a61b1b] rounded-full text-sm">
                            {{ genre.name }}
                        </span>
                    </div>
                </div>
                <div class="col-span-2 min-h-[250px]">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Você também pode gostar</h2>
                    <div v-if="isLoadingFilter" class="flex justify-center items-center py-20">
                        <svg class="animate-spin h-6 w-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
                            </circle>
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C4.477 0 0 4.477 0 12h4z"></path>
                        </svg>
                    </div>
                    <div v-else>
                        <div v-if="filteredBooks.length > 0" class="flex gap-3 overflow-x-auto pb-4 -mx-4 px-4">
                            <div v-for="book in filteredBooks" :key="book.id" class="flex-shrink-0">
                                <button @click="navigateToBookDetail(book.id)">
                                    <img :src="book.img_url" class="w-[180px] h-[250px] rounded-lg shadow-md"
                                        :alt="book.title" />
                                    <p class="mt-2 text-sm font-medium text-gray-900 truncate max-w-[180px]">{{
                                        book.title }}</p>
                                    <p class="text-sm my-1 text-[#466149]">R$ {{ book.price }}</p>
                                </button>

                            </div>
                        </div>
                        <div v-else class="text-gray-500">Nenhuma recomendação disponível.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <Footer></Footer>


</template>

<script>
import { initModals } from 'flowbite';
import axios from 'axios';
import Footer from '@/components/Footer.vue';
import { HeartIcon, StarIcon, ArrowLeft, Search, Bookmark, MessageSquareText, BookmarkCheck } from 'lucide-vue-next';
import { onMounted } from 'vue';
import { props } from 'bluebird';
import { RouterLink } from 'vue-router';
import { useToast } from "vue-toastification";


export default {
    name: "ShopView",
    components: {
        Footer,
        StarIcon,
        HeartIcon,
        ArrowLeft,
        Search,
        Bookmark,
        MessageSquareText,
        BookmarkCheck
    },
    setup() {
        const toast = useToast();

        return {
            toast
        }
    }
    ,
    data() {
        return {
            book: {},
            isModalOpen: false,
            isFirstModalOpen: false,
            reviews: [],
            rating: '',
            comment: '',
            currentReviewIndex: 0,
            hasPurchased: false,
            filteredBooks: [],
            isLoadingFilter: true,
            bookmarks: JSON.parse(localStorage.getItem('bookmarks')) || []
        }
    },
    async created() {
        await this.getBookById();
        if (this.book && this.book.genres && this.book.genres.length > 0) {
            await this.filterByGenres(this.book.genres);
        }
    },
    watch: {

        '$route.params.id': async function (newId) {
            await this.getBookById(newId);

            this.isLoadingFilter = true;
            await this.checkIfPurchased();
            if (this.book && this.book.genres && this.book.genres.length > 0) {
                await this.filterByGenres(this.book.genres);
            }
        }
    },
    methods: {
        async getBookById() {
            const url = `http://127.0.0.1:8000/api/get_all_of_book/${this.$route.params.id}`
            try {
                const response = await axios.get(url)
                this.book = response.data;
                if (this.book.id) {
                    await this.getReviews();
                }

            } catch (error) {
                console.log(error)
            }
        },
        async filterByGenres(genres) {
            this.isLoadingFilter = true;
            const allBooks = [];

            for (const genre of genres) {
                const url = `http://127.0.0.1:8000/api/books_by_genre/${genre.name}`;
                try {
                    const response = await axios.get(url);
                    const books = response.data.books.filter(book => book.id !== this.book.id);
                    allBooks.push(...books);
                } catch (error) {
                    console.log(`Erro ao buscar livros para o gênero ${genre.name}:`, error);
                }
            }

            const uniqueBooks = Array.from(
                new Map(allBooks.map(book => [book.id, book])).values()
            );

            this.filteredBooks = uniqueBooks.slice(0, 10);
            this.isLoadingFilter = false;
        },

        addToCart(book) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingBook = cart.find(item => item.id === book.id);

            if (existingBook) {
                existingBook.quantity += 1;
            } else {
                cart.push({
                    ...book,
                    quantity: 1,
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            this.toast.success(`Adicionado ao carrinho!`, {
                timeout: 1000,
            });
        },
        openModal() {
            this.isModalOpen = true;
        },
        closeModal() {
            this.isModalOpen = false;
        },

        openFirstModal() {
            this.isFirstModalOpen = true;
        },
        closeFirstModal() {
            this.isFirstModalOpen = false;
        },
        async submitReview() {
            const reviewData = {
                rating: this.rating,
                comment: this.comment,
            };

            try {
                const token = localStorage.getItem('token');

                const response = await axios.post(`http://127.0.0.1:8000/api/reviews/${this.book.id}`, reviewData, {
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                });
                if (response.status === 201) {
                    this.toast.success('Review submitted successfully!', {
                        timeout: 1000,
                    });
                    this.resetForm();
                    this.closeModal();
                }
            } catch (error) {
                if (error.response.status === 403) {
                    this.toast.error('Você já tem um review para este livro!', {
                        timeout: 1000,
                    });
                } else if (error.response.status === 401) {
                    this.toast.error('Usuário não autenticado!', {
                        timeout: 1000,
                    });
                } else {
                    this.toast.error('Ocorreu um erro desconhecido ao enviar o comentário.', {
                        timeout: 1000,
                    });
                }
            }
        },
        resetForm() {
            this.rating = '';
            this.comment = '';
        },
        async getReviews() {
            try {
                const response = await axios.get(`http://127.0.0.1:8000/api/reviews/${this.book.id}`);

                this.reviews = response.data.reviews;
            } catch (error) {
                console.error('Erro ao obter avaliações:', error);
            }
        },
        previousReview() {
            if (this.currentReviewIndex > 0) {
                this.currentReviewIndex--;
            }
        },

        nextReview() {
            if (this.reviews.length > 0 && this.currentReviewIndex < this.reviews.length - 1) {
                this.currentReviewIndex++;
            }
        },
        async checkIfPurchased() {
            const url = `http://127.0.0.1:8000/api/has_purchased/${this.$route.params.id}`;
            const token = localStorage.getItem('token');

            try {
                const response = await axios.get(url, {
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                });
                this.hasPurchased = response.data.hasPurchased;
            } catch (error) {
                console.error('Erro ao verificar se o livro foi comprado:', error);
            }
        },
        navigateToBookDetail(bookId) {
            this.$router.push({ name: 'shopBook', params: { id: bookId } });


        }, toggleBookmark(book) {
            const existingBookmark = this.bookmarks.find(item => item.id === book.id);

            if (existingBookmark) {
                this.bookmarks = this.bookmarks.filter(item => item.id !== book.id);
            } else {
                this.bookmarks.push(book);
            }

            localStorage.setItem('bookmarks', JSON.stringify(this.bookmarks));

            this.toast.info(`${existingBookmark ? 'Removido' : 'Adicionado'} aos favoritos!`, {
                timeout: 1000,
            });
        },

        isBookmarked(book) {
            return this.bookmarks.some(item => item.id === book.id);
        },

    },
    mounted() {
        initModals();
        this.checkIfPurchased();
    },
    computed: {
        averageRating() {
            if (this.reviews.length === 0) return 0;
            const totalRating = this.reviews.reduce((sum, review) => sum + review.rating, 0);
            return (totalRating / this.reviews.length).toFixed(1);
        }
    }
}
</script>