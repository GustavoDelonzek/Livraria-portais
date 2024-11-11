<template>
    <swiper :slidesPerView="1" :spaceBetween="5" :navigation="false" :pagination="{
      dynamicBullets: true,

    }"  :breakpoints="{
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
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        <swiper-slide><img class="rounded-full h-48 w-48 object-cover mb-4 "
                src="https://static.todamateria.com.br/upload/ma/ch/machado-de-assis-og.jpg?class=ogImageWide"
                alt=""><p>Machado de Assis</p></swiper-slide>
        
    </swiper>
</template>
<script>
import { Swiper, SwiperSlide } from 'swiper/vue';

import 'swiper/css';

import 'swiper/css/pagination';

import 'swiper/css/navigation';


import { Pagination, Navigation } from 'swiper/modules';

export default {
    name: 'SwiperAuthors',
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Pagination, Navigation]
        };
    },
};
</script>

<style scoped>
.swiper {
    width: 100%;
    min-height: 45vh;
}

.swiper-slide {

    text-align: center;

    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}


</style>