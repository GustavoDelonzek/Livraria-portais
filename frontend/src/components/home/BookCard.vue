<template>
  <div class="flex flex-col items-center bg-white p-4">
    <img :src="image" alt="Capa do Livro" class="w-48 h-64 object-cover rounded-md mb-4">
    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ title }}</h2>


    <p v-if="!isHovered" class="text-lg  transition-opacity duration-300 ease-in-out text-gray-600" @mouseover="isHovered = true" @mouseleave="isHovered = false">
      R$ {{ price }}
    </p>

    <RouterLink :to="{name: 'shopBook', params: {id: id}}" v-if="isHovered"  @mouseover="isHovered = true" 
    @mouseleave="isHovered = false"  class="text-lg  transition-opacity duration-300 ease-in-out text-bold text-gray-800">
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