<template>
    <main>
        <section class="min-h-[85vh] flex justify-center  bg-gray-100 ">
            <article class=" m-0 p-0 flex-grow container grid grid-cols-3">
                <img class="my-auto col-span-2 px-5" src="../../../public/images/Design_sem_nome-removebg.png">


                <div class="flex flex-col text-justify   max-w-sm justify-center	items-start ">


                    <h1 class="text-5xl text-gray-800 font-serif">BEST-SELLERS</h1>
                    <hr class="w-32 border-t-2 border-gray-800  mt-3">
                    <p class="text-gray-600 mt-4">Os livros mais vendidos e comentados! Explore as histórias que estão
                        conquistando leitores no mundo inteiro e encontre sua próxima leitura imperdível.</p>
                    <div class="mt-6">
                        <button
                            class=" border border-gray-800 text-gray-800 py-2 px-4  hover:bg-gray-800 hover:text-white transition duration-300">
                            COMPRAR AGORA
                        </button>
                    </div>

                </div>
            </article>

        </section>
        <section>
            <ContainerHome :title="'Novos Lançamentos'"
                :texto="'Aqui estão alguns dos novos lançamentos incríveis que você não pode perder!'" />
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
            <ContainerHome :title="'Recomendados Para Você'"
                :texto="'Aqui estão alguns livros que você pode gostar!'" />
        </section>


    </main>
</template>

<script>
import ContainerHome from '@/components/home/ContainerHome.vue';

export default {
    name: 'home',
    components: {
        ContainerHome
    }
}
</script>