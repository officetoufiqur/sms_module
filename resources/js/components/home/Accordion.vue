<script setup lang="ts">
import { ref } from 'vue';

const items = ref([
  {
    title: 'What is Material Tailwind?',
    content:
      'Material Tailwind is a framework that enhances Tailwind CSS with additional styles and components.',
  },
  {
    title: 'How to use Material Tailwind?',
    content:
      'You can use Material Tailwind by importing its components into your Tailwind CSS project.',
  },
  {
    title: 'What can I do with Material Tailwind?',
    content:
      'Material Tailwind allows you to quickly build modern, responsive websites with a focus on design.',
  },
]);

const openIndex = ref(-1);

const toggle = (index: number) => {
  openIndex.value = openIndex.value === index ? -1 : index;
};
</script>

<template>
  <section class="relative max-w-4xl mx-auto mt-20">
    <div class="py-10 px-5 lg:px-0 md:px-0">
      <div class="flex flex-col">
        <h1 class="text-4xl items-center justify-center flex font-semibold text-[#0f79bc]">
          Frequently Asked Questions
        </h1>

        <div class="space-y-4 mt-16">
          <div
            v-for="(item, index) in items"
            :key="index"
            class="bg-white border border-gray-200 px-4 rounded-lg"
          >
            <button
              @click="toggle(index)"
              class="w-full flex justify-between items-center py-5 text-slate-800 cursor-pointer"
            >
              <span>{{ item.title }}</span>
              <span
                class="text-slate-800 transition-transform duration-300"
                :class="{ 'rotate-45': openIndex === index }"
              >
                <i class="fa-solid fa-plus"></i>
              </span>
            </button>
            <div
              class="overflow-hidden transition-all duration-300 ease-in-out"
              :style="openIndex === index ? 'max-height: 200px;' : 'max-height: 0;'"
            >
              <div class="pb-5 text-sm text-slate-500">
                {{ item.content }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>


