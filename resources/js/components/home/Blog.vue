<script setup lang="ts">
const props = defineProps<{
    blogs: {
        id: number;
        title: string;
        sub_title: string;
        description: string;
        name: string;
        created_at: string;
        image: string;
    }[];
}>();

function formatDate(dateString: string): string {
    const options: Intl.DateTimeFormatOptions = {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
    };
    return new Date(dateString).toLocaleDateString('en-US', options);
}
</script>

<template>
  <section id="blog" class="max-w-7xl mx-auto mt-14">
    <h1 class="text-4xl font-bold mb-4 text-center text-[#0f79bc]">News & Blogs</h1>
    <div class="grid lg:grid-cols-3 md:grid-cols-2 lg:gap-5 gap-10 mt-16 mx-10 lg:mx-16 xl:mx-0">
      <div
        v-for="blog in props.blogs"
        :key="blog.id"
        class="bg-white border border-gray-200 rounded-lg"
      >
        <div class="img">
          <img class="w-full object-cover" :src="blog.image" :alt="blog.title" />
        </div>
        <p class="mx-8 mt-4 text-[#0f79bc]">
          <i class="fa-solid fa-calendar-days pr-1"></i>
          {{ formatDate(blog.created_at) }} | {{ blog.name }}
        </p>
        <div class="px-8 pt-4">
          <div class="text-2xl font-semibold">
            <h1>{{ blog.title }}</h1>
          </div>
          <p class="mt-2 text-gray-500">
            {{ blog.description }}
          </p>
          <div class="my-8 mb-10">
            <a
              href="#"
              class="py-2.5 px-6 border-2 border-[#0f79bc] rounded-md hover:bg-[#0f79bc] hover:text-white duration-300 font-medium"
            >
              Read More <i class="fa-solid fa-arrow-right pl-1.5"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
