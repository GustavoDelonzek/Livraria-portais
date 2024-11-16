<template>
    <div class="min-h-screen bg-gray-50  ">
        <div class="relative h-96 bg-gradient-to-b from-gray-900 to-gray-800">
            <button class="absolute top-6 left-6 text-white" @click="$router.go(-1)">
                <ArrowLeft class="h-6 w-6" />
            </button>


        </div>

        <div v-if="book.id" class="relative px-4 container mx-auto  -mt-64 z-10">
            <div class="flex flex-col md:flex-row gap-6">
                <img :src="book.img_url" :alt="book.title"
                class="w-[15rem] sm:w-[18rem] md:w-[18rem] lg:w-[19rem] 
           min-h-[18rem] sm:min-h-[20rem] md:min-h-[21rem] lg:min-h-[24rem]
           max-h-[35rem] object-cover rounded-lg shadow-xl mx-auto md:mx-0" />

                <div class="flex-1 md:text-white justify-between flex flex-col  pt-4">
                    <div>
                        <h1 class="text-4xl font-serif mb-4">{{ book.title }}</h1>
                        <div class="flex items-center gap-2 mb-4">

                            <img src="https://xsgames.co/randomusers/avatar.php?g=male" alt="Author"
                                class="w-12 h-12 rounded-full" />

                            <p class="font-serif">{{ book.author.name }}</p>

                        </div>

                        <div class="flex items-center gap-1 mt-10">
                            <StarIcon v-for="i in 5" :key="i" class="h-4 w-4 fill-current text-yellow-400" />
                        </div>
                    </div>

                    <div class="flex md:max-w-[40vw] gap-4 mb-6">
                        <button
                            class="flex-1 bg-blue-500 text-white py-3 rounded-full font-medium hover:bg-blue-600 transition-colors">
                            Compre R${{ book.price || '0.00' }}
                        </button>
                        <button @click="addToCart(book)"
                            class="flex-1 bg-white text-gray-900 py-3 rounded-full font-medium border border-gray-200 hover:bg-gray-50 transition-colors">
                            Adicionar ao Carrinho
                        </button>
                        <button
                            class="bg-white text-gray-900 p-3 rounded-full border border-gray-200 hover:bg-gray-50 transition-colors">
                            <Bookmark class="h-6 w-6" />
                        </button>
                    </div>

                </div>
            </div>


            <div class=" grid grid-cols-3 mt-8 gap-6 mb-4">


                <div class="mr-12">
                    <h2 class="text-xl font-bold mb-4 ">Sobre</h2>
                    <p class="text-gray-600 text-sm text-justify leading-relaxed">
                        {{ book.description || 'No description available.' }}
                    </p>
                    <div class="flex gap-2 mt-4">
                        <span v-for="genre in book.genres" :key="genre"
                            class="px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">
                            {{ genre.name }}
                        </span>
                    </div>
                </div>
                <div class="col-span-2">

                    <h2 class="text-xl font-bold text-gray-900 mb-4">Você também pode gostar</h2>
                    <div class="flex gap-3 overflow-x-auto pb-4 -mx-4 px-4">
                        <div v-for="i in 7" :key="i" class="flex-shrink-0">
                            <img src="https://m.media-amazon.com/images/I/41RBd2DvmgL._SY445_SX342_.jpg"
                                class="w-[180px] h-[250px] rounded-lg shadow-md" alt="Related book cover" />
                            <p class="mt-2 text-sm font-medium text-gray-900 truncate max-w-[180px]">Senhor dos aneis
                            </p>
                            <p class="text-sm text-blue-500">$ 9.45</p>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>
    <Footer></Footer>


</template>
<script>
import axios from 'axios';
import Footer from '@/components/Footer.vue';
import { HeartIcon, StarIcon, ArrowLeft, Search, Bookmark } from 'lucide-vue-next';
export default {
    name: "ShopView",
    components: {
        Footer,
        StarIcon,
        HeartIcon,
        ArrowLeft,
        Search,
        Bookmark
    },
    data() {
        return {
            book: {}
        }
    },
    created() {
        this.getBookById()
    },
    methods: {
        async getBookById() {
            const url = `http://127.0.0.1:8000/api/get_all_of_book/${this.$route.params.id}`
            try {
                const response = await axios.get(url)
                this.book = response.data
               
            } catch (error) {
                console.log(error)
            }
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
            alert(`${book.title} foi adicionado ao carrinho!`);
        }
    }
}
</script>