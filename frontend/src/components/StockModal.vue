<template>
    <button @click="openModal" :data-modal-target="`stock-modal-${bookId}`" :data-modal-toggle="`stock-modal-${bookId}`"  class="block text-white bg-blue-700
    hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5
    text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
        Atualizar estoque
    </button>

    <div :id="`stock-modal-${bookId}`"  tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Atualizar Estoque
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        :data-modal-toggle="`stock-modal-${bookId}`" >
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Fechar modal</span>
                    </button>
                </div>
                <form @submit.prevent="submitForm" class="p-4 md:p-5">



                    <div class="grid gap-4 mb-4">
                        <div class="col-span-2">
                            <label for="operation"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operação</label>
                            <select v-model="formData.operation" id="operation"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="entrada">Entrada</option>
                                <option value="saida">Saída</option>
                            </select>
                        </div>

                        <div class="col-span-2">
                            <label 
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ formData.book_id }}</label>
                            
                        </div>


                        <div class="col-span-2">
                            <label for="quantity"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantidade</label>
                            <input type="number" v-model="formData.quantity" id="quantity" min="1"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Digite a quantidade" required>
                        </div>
                    </div>

                    <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Atualizar Estoque
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { initModals } from 'flowbite';
import { onMounted } from 'vue';
import axios from 'axios';

export default {
    name: 'StockModal',
    props: {
        bookId: {
            type: Number,
            required: true,
        },
    },
    data() {
        return {
            formData: {
                operation: 'entrada',
                quantity: 1,
            },
        };
    },
    setup() {
        onMounted(() => {
            initModals();
        });
    },
    methods: {
        openModal() {
            this.formData.book_id = this.bookId;
        },
        async submitForm() {
            try {
                const response = await axios.post(
                    `http://127.0.0.1:8000/api/book/${this.formData.book_id}/stock`,
                    {
                        operation: this.formData.operation,
                        quantity: this.formData.quantity,
                    }
                );

                alert(response.data.message);
            } catch (error) {
                if (error.response) {
                    alert(error.response.data.error || 'Erro ao atualizar o estoque.');
                } else {
                    console.error('Erro:', error);
                }
            }
        },

       
    },
};
</script>
