<script setup lang="ts">
import { ref } from 'vue';

const props = defineProps<{
  items: {
    question: string;
    answer: string;
  }[];
}>();

const openIndex = ref(-1);

const toggle = (index: number) => {
  openIndex.value = openIndex.value === index ? -1 : index;
};
</script>

<template>
  <section id="faqs" class="relative max-w-7xl mx-auto mt-20">
    <div class="py-10 px-5 lg:px-16 xl:px-0 md:px-10">
      <div class="flex flex-col">
        <h1 class="text-4xl items-center justify-center flex font-semibold text-[#0f79bc]">
          Frequently Asked Questions
        </h1>

        <div class="grid lg:grid-cols-2 gap-10 justify-center items-center mt-20">
          <div class="img">
            <img class="border border-gray-200 rounded-md" src="/assets/img/FAQ.jpg" alt="">
          </div>
          <div class="space-y-4">
            <div v-for="(item, index) in props.items" :key="index" class="bg-white border border-gray-200 px-4 rounded-lg">
              <button @click="toggle(index)"
                class="w-full flex justify-between items-center py-5 text-slate-800 cursor-pointer">
                <span>{{ item.question }}</span>
                <span class="text-slate-800 transition-transform duration-300"
                  :class="{ 'rotate-45': openIndex === index }">
                  <i class="fa-solid fa-plus"></i>
                </span>
              </button>
              <div class="overflow-hidden transition-all duration-300 ease-in-out"
                :style="openIndex === index ? 'max-height: 200px;' : 'max-height: 0;'">
                <div class="pb-5 text-sm text-slate-500">
                  {{ item.answer }}
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</template>
