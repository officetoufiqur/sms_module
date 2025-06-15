<script setup lang="ts">
defineProps<{
  about: {
    title: string;
    description: string;
    image: string;
  }
}>();
</script>
<template>
    <section id="about" class="max-w-7xl mx-auto mt-24">
            <!-- about us -->
            <div class="text-center mx-10 lg:mx-0">
                <h1 class="text-4xl leading-12 font-semibold text-[#0f79bc]">About Us</h1>
                <p class="mt-3 text-xl max-w-[41rem] mx-auto">
                    {{ about.title }}
                </p>
            </div>
            <div class="mt-12 lg:flex justify-between gap-20 mx-10 lg:mx-16 xl:mx-0 space-y-10 lg:space-y-0">
                <div class="lg:w-1/2 flex justify-center items-center">
                    <img :src="about.image" class="bg-white rounded-lg border border-gray-200" alt="">
                </div>
                <div class="lg:w-1/2 text-justify">
                    <p>{{ about.description }}</p>
                </div>
            </div>

        </section>
</template>