<template>
        <swiper :slidesPerView="1" :spaceBetween="5" :navigation="false" :pagination="{
                dynamicBullets: true,

        }" :breakpoints="{
                '640': {
                        slidesPerView: 2,
                        spaceBetween: 5,
                },
                '768': {
                        slidesPerView: 4,
                        spaceBetween: 15,
                },
                '1024': {
                        slidesPerView: 5,
                        spaceBetween: 20,
                },
        }" :modules="modules" class="mySwiper">
                <swiper-slide v-for="(author, index) in authors.slice(0, 8)" :key="index">
                        <img class="rounded-full h-48 w-48 object-cover mb-4" :src="author.img_url" alt="Imagem do Autor">
                        <p>{{ author.name }}</p>
                </swiper-slide>

        </swiper>
</template>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';

import 'swiper/css';

import 'swiper/css/pagination';

import 'swiper/css/navigation';
import axios from 'axios';

import { Pagination, Navigation } from 'swiper/modules';

export default {
        name: 'SwiperAuthors',
        data() {
                return {
                        authors: []
                }
        },
        components: {
                Swiper,
                SwiperSlide,
        },
        mounted() {
                this.getAuthors();
        },
        setup() {
                return {
                        modules: [Pagination, Navigation]
                };
        },
        methods: {
                async getAuthors() {
                        const url = 'http://127.0.0.1:8000/api/authors';
                        try {
                                const response = await axios.get(url);
                                this.authors = response.data.authors;
                        } catch (error) {
                                console.error('Erro ao buscar autores:', error);
                        }
                }
        }
};
</script>

<style scoped>
.swiper {
        width: 100%;
        min-height: 40vh;
}

.swiper-slide {

        text-align: center;

        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
}
</style>