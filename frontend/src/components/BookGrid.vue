<template>
  <div class="grid  md:grid-cols-1 lg:grid-cols-2 xl:grid-cols-3  gap-6 p-6">
    <div v-for="book in books" :key="book.id" class="bg-[#f5faf8] rounded-lg shadow-md overflow-hidden">
      <div class="relative p-3">
        <img :src="book.img_url" :alt="book.title" class="w-full h-64 object-contain" />

      </div>
      <div class="p-4">
        <h3 class="font-bold text-lg mb-1 line-clamp-1">{{ book.title }}</h3>
        <p class="text-sm text-gray-600 mb-2">{{ book.author.name }}</p>
        <div class="flex items-center mb-2">

          <div class="flex items-center">
            <StarIcon v-for="i in 5" :key="i" :class="{
              'text-yellow-400': i <= calculateAverageRating(book.reviews),
              'text-gray-300': i > calculateAverageRating(book.reviews)
            }" class="h-4 w-4 fill-current" />
          </div>
          <span class="text-sm text-gray-600 ml-1">
            {{ calculateAverageRating(book.reviews).toFixed(1) }} 
          </span>
        </div>
        <div class="flex justify-between items-center">
          <span class="font-bold text-lg text-green-700">R${{ book.price }}</span>

          <RouterLink :to="{ name: 'shopBook', params: { id: book.id } }"
            class="px-3 py-1 bg-[#86AB89] text-white rounded-full text-sm hover:bg-primary-dark">
            COMPRAR
          </RouterLink>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { StarIcon } from 'lucide-vue-next';

export default {
  name: 'BookGrid',
  props: {
    books: {
      type: Array,
      required: true
    }
  },
  components: {
    StarIcon
  },
  methods: {
    calculateAverageRating(reviews) {
      if (!reviews || reviews.length === 0) return 0;
      const totalRating = reviews.reduce((sum, review) => sum + review.rating, 0);
      return totalRating / reviews.length;
    }
  }
}

</script>
