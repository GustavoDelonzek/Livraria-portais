<template>
  <div class="flex flex-col justify-between items-center rounded-lg bg-white  mb-6 mt-2 p-4">
    <img :src="image" alt="Capa do Livro" class="w-48 h-64 object-cover rounded-md mb-4">
    <h2 class="text-xl font-bold text-center text-[#466149] mb-2">{{ title }}</h2>


    <p v-if="!isHovered" class="text-lg text-bold py-2 px-3   transition-opacity duration-300 ease-in-out text-[#466149]" @mouseover="isHovered = true" @mouseleave="isHovered = false">
      R$ {{ price }}
    </p>

    <RouterLink :to="{name: 'shopBook', params: {id: id}}" v-if="isHovered"  @mouseover="isHovered = true" 
    @mouseleave="isHovered = false"  class="hover:rounded-lg   py-2 px-3 hover:bg-[#466149] hover:text-white transition duration-300">
      Comprar
    </RouterLink>
  </div>
</template>

<script>

export default {
  name: "BookCard",
  data() {
    return {
      isHovered: false  
    };
  },
  props: {
    image: {
      type: String,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    price: {
      type: String,
      required: true
    },
    id:{
      required: true
    }
  }
};
</script>

<style scoped></style>