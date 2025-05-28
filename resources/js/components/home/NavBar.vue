<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const mobileMenuOpen = ref(false);
const page = usePage();
const user = page.props.auth?.user;

const isScrolled = ref(false);
const activeSection = ref('home');

const sections = ['home', 'about', 'pricing', 'faqs', 'blog', 'contact'];

const onScroll = () => {
  isScrolled.value = window.scrollY > 50;

  for (const id of sections) {
    const el = document.getElementById(id);
    if (el) {
      const rect = el.getBoundingClientRect();
      if (rect.top <= 100 && rect.bottom >= 100) {
        activeSection.value = id;
        break;
      }
    }
  }
};

onMounted(() => {
  window.addEventListener('scroll', onScroll);
  onScroll();
});

onUnmounted(() => {
  window.removeEventListener('scroll', onScroll);
});

const scrollToSection = (id: string) => {
  mobileMenuOpen.value = false;
  const section = document.getElementById(id);
  if (section) {
    section.scrollIntoView({ behavior: 'smooth' });
  }
};
</script>

<template>
  <header :class="['fixed w-full z-50 transition-all duration-300', isScrolled ? 'bg-white shadow-md' : 'bg-transparent']">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <nav class="flex justify-between items-center py-5 px-5 lg:px-0">
        <!-- Logo -->
        <div class="text-xl font-semibold text-[#4a4745]">
          <Link :href="route('home')" class="flex items-center">
            <img src="/assets/img/400_143.png" alt="Logo" class="h-12 w-30 mr-2" />
          </Link>
        </div>

        <!-- Desktop Links -->
        <div class="hidden lg:flex space-x-6">
          <a
            v-for="id in sections"
            :key="id"
            :href="'#' + id"
            @click.prevent="scrollToSection(id)"
            :class="[
              activeSection === id ? 'text-[#0f79bc] font-semibold' : isScrolled ? 'text-[#4a4745]' : 'text-white',
              'hover:text-[#0f79bc] transition'
            ]"
          >
            {{ id.charAt(0).toUpperCase() + id.slice(1).replace('-', ' ') }}
          </a>
        </div>

        <!-- Auth Buttons -->
        <div class="hidden lg:flex items-center space-x-4">
          <Link
            v-if="user"
            :href="route('dashboard')"
            class="border px-4 py-1.5 rounded hover:border-gray-500"
          >
            Dashboard
          </Link>
          <template v-else>
            <Link :href="route('login')" :class="[isScrolled ? 'text-[#4a4745]' : 'text-white', 'hover:text-[#0f79bc] transition']">Login</Link>
            <Link :href="route('register')" class="border px-4 py-1.5 rounded hover:border-gray-500" :class="[isScrolled ? 'text-[#4a4745]' : 'text-white']">
              Register
            </Link>
          </template>
        </div>

        <!-- Mobile Toggle -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden focus:outline-none text-xl">
          <i :class="mobileMenuOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars-staggered'"></i>
        </button>
      </nav>
    </div>

    <!-- Mobile Menu -->
    <div v-if="mobileMenuOpen" class="lg:hidden space-y-3 px-10 mt-5 lg:px-0 bg-white py-10">
      <a
        v-for="id in sections"
        :key="id"
        href="#"
        @click.prevent="scrollToSection(id)"
        class="block text-[#4a4745] hover:text-[#0f79bc] transition"
      >
        {{ id.charAt(0).toUpperCase() + id.slice(1).replace('-', ' ') }}
      </a>
      <hr />
      <Link
        v-if="user"
        :href="route('dashboard')"
        class="block border px-4 py-2 rounded hover:border-gray-500"
      >
        Dashboard
      </Link>
      <template v-else>
        <Link :href="route('login')" class="block text-[#4a4745] hover:text-[#0f79bc] transition">Login</Link>
        <Link :href="route('register')" class="block text-[#4a4745] hover:text-[#0f79bc] transition mb-5">Register</Link>
      </template>
    </div>
  </header>
</template>

<style>

</style>
