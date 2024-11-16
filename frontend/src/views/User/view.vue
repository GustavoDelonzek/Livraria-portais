<template>
    <main>
        <section class="min-h-[85vh] flex justify-center py-10 lg:py-0  bg-gray-100 ">
            <article class=" m-0 p-0 flex-grow container grid grid-cols-1 lg:grid-cols-3 gap-6">
                <img class="my-auto order-1 lg:order-none col-span-2 px-5"
                    src="../../assets/Design_sem_nome-removebg.png">


                <div class="flex flex-col text-center md:text-left justify-center items-center lg:items-start px-5">
                    <h1 class="text-3xl md:text-5xl text-gray-800 font-serif">BEST-SELLERS</h1>
                    <hr class="w-24 md:w-32 border-t-2 border-gray-800 mt-2 md:mt-3">
                    <p class="text-gray-600 mt-4 text-sm md:text-base">
                        Os livros mais vendidos e comentados! Explore as histórias que estão conquistando leitores no
                        mundo inteiro e encontre sua próxima leitura imperdível.
                    </p>
                    <div class="mt-6">
                        <RouterLink to="/shop"
                            class="border border-gray-800 text-gray-800 py-2 px-4 hover:bg-gray-800 hover:text-white transition duration-300">
                            COMPRAR AGORA
                        </RouterLink>
                    </div>
                </div>
            </article>

        </section>
        <section>
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


        <section>
            <!--   <ContainerHome :title="'Recomendados Para Você'"
                :texto="'Aqui estão alguns livros que você pode gostar!'" />-->
        </section>

        <section class="p-6 bg-gray-100">
            <h1 class="text-3xl font-bold text-center text-gray-800 mt-2">Autores</h1>
            <hr class="w-16 border-t-2 border-gray-800 mb-10 mx-auto  mt-3">
            <SwiperAuthors></SwiperAuthors>
        </section>

        <section class="grid grid-cols-1 md:grid-cols-5 min-h-[70vh]">
            <article class="col-span-1 md:col-span-2 bg-gray-800 p-6 flex flex-col justify-center items-start">
                <h1 class="text-3xl md:text-5xl text-white font-serif">
                    OS MELHORES PREÇOS
                </h1>
                <hr class="w-24 md:w-32 border-t-2 border-white mb-4 md:mb-6 mt-2 md:mt-3">
                <p class="text-sm md:text-md text-white text-start mb-4 md:mb-6">
                    Descubra uma seleção especial de livros com descontos imperdíveis. Não perca a chance de adquirir os
                    seus favoritos por preços incríveis.
                </p>
                <RouterLink to="/shop"
                    class="py-2 px-4 md:py-2 md:px-6 border border-white text-white font-medium hover:bg-gray-600 hover:text-white transition duration-300">
                    COMPRAR AGORA
                </RouterLink>
            </article>
            <div
                class="col-span-1 md:col-span-3 bg-[url('../assets/Teste-fundo.jpg')] bg-cover bg-center min-h-64 md:h-auto">
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
            genre: ''
        }
    },
    components: {
        ContainerHome,
        SwiperAuthors,
        Footer
    },
    mounted() {
        this.getNewReleases();
        this.getGenres();
    },
    methods: {
        async getNewReleases() {
            const url = 'http://127.0.0.1:8000/api/new_releases';
            try {
                const response = await axios.get(url);
                this.newBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }
        },
        async filterByGenre(genre) {
            const url = `http://127.0.0.1:8000/api/books_by_genre/${genre}`;
            try {
                const response = await axios.get(url);
                this.genreBooks = response.data.books;
            } catch (error) {
                console.log(error);
            }
        },
        async getGenres() {
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

    }
}
</script>