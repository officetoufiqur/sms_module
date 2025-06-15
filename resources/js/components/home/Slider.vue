<script setup lang="ts">
import { ref, computed, onMounted, onBeforeUnmount, watch } from 'vue';

interface Testimonial {
  title: string;
  name: string;
  image: string | null;
  star: string;
  date: string;
}

const props = defineProps<{
  testimonials: Testimonial[];
}>();

const currentIndex = ref(0);
const perGroup = ref(3);

const updatePerGroup = () => {
  const width = window.innerWidth;
  if (width < 640) perGroup.value = 1;
  else if (width < 1024) perGroup.value = 2;
  else perGroup.value = 3;
};

const groupedTestimonials = computed(() => {
  const groups: Testimonial[][] = [];
  for (let i = 0; i < props.testimonials.length; i += perGroup.value) {
    groups.push(props.testimonials.slice(i, i + perGroup.value));
  }
  return groups;
});

watch(groupedTestimonials, (newGroups) => {
  if (currentIndex.value >= newGroups.length) {
    currentIndex.value = 0;
  }
});

const nextSlide = () => {
  currentIndex.value =
    currentIndex.value === groupedTestimonials.value.length - 1 ? 0 : currentIndex.value + 1;
};

const prevSlide = () => {
  currentIndex.value =
    currentIndex.value === 0 ? groupedTestimonials.value.length - 1 : currentIndex.value - 1;
};

onMounted(() => {
  updatePerGroup();
  window.addEventListener('resize', updatePerGroup);
});

onBeforeUnmount(() => {
  window.removeEventListener('resize', updatePerGroup);
});
</script>

<template>
  <div class="relative overflow-hidden rounded-xl">
    <div
      class="flex transition-transform duration-700 ease-in-out"
      :style="{ transform: `translateX(-${currentIndex * 100}%)` }"
    >
      <div
        v-for="(group, index) in groupedTestimonials"
        :key="index"
        class="flex-shrink-0 w-full flex px-4 py-6"
      >
        <div
          v-for="(testimonial, idx) in group"
          :key="idx"
          class="w-full sm:w-1/2 lg:w-1/3 p-4"
        >
          <div class="p-6 rounded-2xl shadow-md bg-white h-full">
            <!-- Star Rating -->
            <div class="flex items-center mb-2 space-x-1">
              <template v-for="i in parseInt(testimonial.star)" :key="i">
                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                  <path
                    d="M10 15l-5.878 3.09 1.122-6.545L.488 6.91l6.562-.954L10 0l2.95 5.956 6.562.954-4.756 4.635 1.122 6.545z"
                  />
                </svg>
              </template>
            </div>

            <!-- Testimonial Text -->
            <p class="text-sm text-gray-700 mb-4">{{ testimonial.title }}</p>
            <hr class="mb-4" />

            <!-- Name and Date -->
            <div class="flex items-center space-x-3">
              <img
                :src="testimonial.image || 'https://via.placeholder.com/50'"
                alt="profile"
                class="w-10 h-10 rounded-full object-cover"
              />
              <div>
                <div class="font-semibold text-sm">{{ testimonial.name }}</div>
                <div class="text-xs text-gray-500">{{ testimonial.date }}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- navigation buttons -->
    <button
      @click="prevSlide"
      class="absolute left-0 text-6xl cursor-pointer top-1/2 -translate-y-1/2 text-[#0f79bc]"
    >
      ‹
    </button>
    <button
      @click="nextSlide"
      class="absolute right-0 text-6xl cursor-pointer top-1/2 -translate-y-1/2 text-[#0f79bc]"
    >
      ›
    </button>
  </div>
</template>
