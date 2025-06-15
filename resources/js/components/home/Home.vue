<script setup lang="ts">
const props = defineProps<{
    banner: {
        id: number;
        title: string;
        sub_title: string;
        image: string;
    };
}>();
</script>

<template>
     <section id="home">
            <div class="home lg:mx-auto px-4 py-8 xl:h-[85vh] lg:h-[100vh] h-[50vh] bg-[#0f79bc] flex flex-col justify-center items-center">
                <div class="lg:mt-[-13rem]">
                    <h1 class="lg:text-6xl text-5xl text-white font-bold text-center mb-4 lg:leading-18 leading-12"></h1>
                    <p class="text-center text-white mt-3 leading-6 px-5 lg:px-0">Reliable, fast, and affordable bulk SMS solutions
                        for
                        businesses, organizations, and individuals.<br> Reach your audience instantly with our masking
                        and
                        non-masking SMS services.</p>
                </div>
            </div>
            <div class="flex justify-center items-center lg:mt-[-20rem] mt-[-10rem]">
                <img src="/assets/img/bashboard.jpg" alt="Logo" class="lg:w-[45rem] w-[25rem] mr-2 shadow-xl rounded-3xl">
            </div>
        </section>
</template>