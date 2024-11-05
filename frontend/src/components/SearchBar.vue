<template>

    <div class="my-4 ">
        
        <input v-model="query" @input="onSearch" type="text" placeholder="Search..."
            class="w-full p-2 border border-gray-300 rounded-md" />
    </div>
</template>

<script>
export default {
    name: 'SearchBar',
    data() {
        return {
            query: ''
        };
    },
    methods: {
        onSearch() {
            this.$emit('search', this.query);
        }
    }
};
</script>