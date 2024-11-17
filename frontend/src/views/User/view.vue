<template>
    <main>
        <!-- Verificação de Gêneros -->
        <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded-xl w-96">
                <h3 class="text-lg font-bold text-[#002D74] mb-4">Selecione seus Gêneros Preferidos</h3>

                <div class="flex flex-wrap gap-3 mb-4">
                    <button v-for="genre in genres" :key="genre.id" :class="{
                        'px-3 py-1 bg-gray-200 text-gray-600 rounded-full text-sm': !selectedGenres.includes(genre.id),
                        'px-3 py-1 bg-blue-600 text-white rounded-full text-sm': selectedGenres.includes(genre.id)
                    }" @click="toggleGenre(genre.id)" type="button">
                        {{ genre.name }}
                    </button>
                </div>

                <div class="flex justify-end mt-4">
                    <button @click="closeModal"
                        class="text-[#002D74] py-2 px-4 hover:bg-gray-200 rounded-xl">Fechar</button>
                    <button @click="saveGenres"
                        class="ml-4 bg-[#002D74] text-white py-2 px-4 rounded-xl">Salvar</button>
                </div>
            </div>
        </div>

        <section class="min-h-[85vh] flex justify-center py-10 lg:py-0 bg-[#fdffe5] ">
            <article class="m-0 p-0 flex-grow container grid grid-cols-1 lg:grid-cols-3 gap-6">
                <img class="my-auto order-1 lg:order-none col-span-2 px-5"
                    src="../../assets/Design_sem_nome-removebg.png">

                <div class="flex flex-col text-center md:text-left justify-center items-center lg:items-start px-5">
                    <h1 class="text-3xl md:text-5xl text-[#86AB89] font-serif">BEST-SELLERS</h1>
                    <hr class="w-24 md:w-32 border-t-2 border-[#86AB89] mt-2 md:mt-3">
                    <p class="text-[#466149] mt-4 text-sm md:text-base">
                        Os livros mais vendidos e comentados! Explore as histórias que estão conquistando leitores no
                        mundo inteiro e encontre sua próxima leitura imperdível.
                    </p>
                    <div class="mt-6">
                        <RouterLink to="/shop"
                            class="border border-[#EA907A] text-[#EA907A] py-2 px-4 hover:bg-[#EA907A] hover:text-white transition duration-300">
                            COMPRAR AGORA
                        </RouterLink>
                    </div>
                </div>
            </article>
        </section>

        <section class="py-3">
            <ContainerHome :title="'Novos Lançamentos'"
                :texto="'Aqui estão alguns dos novos lançamentos incríveis que você não pode perder!'"
                :books="newBooks" />
        </section>

        <div class="relative h-64 bg-[url('../assets/pexels-juanvidas-23018668.jpg')] bg-cover bg-center"
            style=" background-attachment: fixed;">
            <div class="absolute inset-0 bg-black opacity-65"></div>
            <div class="absolute inset-0 flex justify-center items-center text-white p-8">
                <p class="text-center max-w-2xl text-lg font-serif italic">
                    "A leitura é para a mente o que o exercício é para o corpo." - Joseph Addison
                </p>
            </div>
        </div>

        <section class="p-6 bg-[#BFD8AF]">
            <h1 class="text-3xl font-serif text-center text-gray-800 mt-2">AUTORES</h1>

            <hr class="w-16 border-t-2 border-gray-800 mb-10 mx-auto mt-3">

            <SwiperAuthors></SwiperAuthors>
        </section>

        <section class="py-3">
            <ContainerHome v-if="filteredBooks" :title="'Recomendados Para Você'"
                :texto="'Aqui estão alguns livros que você pode gostar!'" :books="filteredBooks" />
        </section>

        <section class="grid grid-cols-1 md:grid-cols-5 min-h-[70vh]">
            <article class="col-span-1 md:col-span-2 bg-[#ffc18a] p-6 flex flex-col justify-center items-start">
                <h1 class="text-3xl md:text-5xl text-[#a61b1b] font-serif">
                    OS MELHORES PREÇOS
                </h1>
                <hr class="w-24 md:w-32 border-t-2 border-[#a61b1b] mb-4 md:mb-6 mt-2 md:mt-3">
                <p class="text-sm md:text-md text-start mb-4 md:mb-6">
                    Descubra uma seleção especial de livros com descontos imperdíveis. Não perca a chance de adquirir os
                    seus favoritos por preços incríveis.
                </p>
                <RouterLink to="/shop"
                    class="py-2 px-4 md:py-2 md:px-6 border border-[#a61b1b] text-[#a61b1b] font-medium hover:bg-[#a61b1b] hover:text-white transition duration-300">
                    COMPRAR AGORA
                </RouterLink>
            </article>
            <div class="col-span-1 md:col-span-3 bg-[url('../assets/case.jpg')] bg-cover bg-center min-h-64 md:h-auto">
            </div>
        </section>

        <section v-if="genreBooks.length">
            <ContainerHome :title="`Explore o Gênero Literário ${genre}!`"
                :texto="`Talvez seja hora de fugir do óbvio e explorar um novo gênero. Os livros que você procura podem estar em ${genre}!`"
                :books="genreBooks" />
        </section>

        <Footer></Footer>
    </main>
</template>

<script>
import ContainerHome from '@/components/home/ContainerHome.vue';
import SwiperAuthors from '@/components/home/SwiperAuthors.vue';
import Footer from '@/components/Footer.vue';
import axios from 'axios';

export default {
    name: 'home',
    data() {
        return {
            newBooks: [],
            genreBooks: [],
            genre: '',
            genres: [],
            selectedGenres: [],
            showModal: false,
            filteredBooks: []
        };
    },
    components: {
        ContainerHome,
        SwiperAuthors,
        Footer
    },
    mounted() {
        this.getNewReleases();
        this.getGenres();
        this.getGenre();
        this.checkUserGenres();


    },
    methods: {
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
        , async filterByGenre(genre) {
            const url = `http://127.0.0.1:8000/api/books_by_genre/${genre}`;
            try {
                const response = await axios.get(url);
                this.genreBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }
        },

        async getNewReleases() {
            const url = 'http://127.0.0.1:8000/api/new_releases';
            try {
                const response = await axios.get(url);
                this.newBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }
        },
        async getGenre() {
            const url = 'http://127.0.0.1:8000/api/genres';
            try {
                const response = await axios.get(url);
                this.genres = response.data.genres;
                if (this.genres.length > 0) {
                    this.genre = this.genres[Math.floor(Math.random() * this.genres.length)].name;
                    this.filterByGenre(this.genre);
                }
            } catch (error) {
                console.error('Erro ao buscar gêneros:', error);
            }
        
        },
        async getGenres() {
                    const url = 'http://127.0.0.1:8000/api/genres';
                    try {
                        const response = await axios.get(url);
                        this.genres = response.data.genres;
                    } catch (error) {
                        console.error('Erro ao buscar gêneros:', error);
                    }
                },
                toggleGenre(genreId) {
                    const index = this.selectedGenres.indexOf(genreId);
                    if (index === -1) {
                        this.selectedGenres.push(genreId);
                    } else {
                        this.selectedGenres.splice(index, 1);
                    }
                },
                closeModal() {
                    this.showModal = false;
                },
        async saveGenres() {
                    const user = localStorage.getItem('user');

                    const parsedUser = JSON.parse(user);
                    if (parsedUser && this.selectedGenres.length > 0) {
                        try {
                            await axios.post('http://127.0.0.1:8000/api/save_user_genres', {
                                user_id: parsedUser.id,
                                genres: this.selectedGenres
                            });
                            this.showModal = false;
                            this.checkUserGenres();
                        } catch (error) {
                            console.error('Erro ao salvar gêneros:', error);
                        }
                    }
                }
            }
};
</script>
