<script setup lang="ts">
import { ref } from 'vue';
import { Link, usePage } from '@inertiajs/vue3';

const mobileMenuOpen = ref(false);
const page = usePage();
const user = page.props.auth?.user;
</script>

<template>
    <header class="bg-gray-100 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="flex justify-between items-center py-5 px-5 lg:px-0">
                <!-- Logo -->
                <div class="text-xl font-semibold text-[#4a4745]">
                    <Link :href="route('home')" class="flex items-center">
                    <img src="/assets/img/logo.png" alt="Logo" class="h-12 w-30 mr-2">
                    </Link>
                </div>

                <!-- Desktop Links -->
                <div class="hidden lg:flex space-x-6">
                    <Link class="text-[#4a4745] hover:text-[#0f79bc] transition">Home</Link>
                    <Link class="text-[#4a4745] hover:text-[#0f79bc] transition">About</Link>
                    <Link class="text-[#4a4745] hover:text-[#0f79bc] transition">Pricing</Link>
                    <Link class="text-[#4a4745] hover:text-[#0f79bc] transition">FAQs</Link>
                    <Link class="text-[#4a4745] hover:text-[#0f79bc] transition">Blog</Link>
                    <Link class="text-[#4a4745] hover:text-[#0f79bc] transition">Contact Us</Link>
                </div>

                <!-- Auth Buttons -->
                <div class="hidden lg:flex items-center space-x-4">
                    <Link v-if="user" :href="route('dashboard')"
                        class="border px-4 py-1.5 rounded hover:border-gray-500">
                    Dashboard
                    </Link>
                    <template v-else>
                        <Link :href="route('login')" class="text-[#4a4745] hover:text-[#0f79bc] transition">Login</Link>
                        <Link :href="route('register')" class="border px-4 text-[#4a4745] py-1.5 rounded hover:text-[#0f79bc] hover:border-gray-500">
                        Register</Link>
                    </template>
                </div>

                <!-- Mobile Menu Toggle -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden focus:outline-none">
                    <i :class="mobileMenuOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars-staggered'" class="text-xl"></i>
                </button>
            </nav>
        </div>

        <!-- Mobile Menu -->
        <div v-if="mobileMenuOpen" class="lg:hidden pb-4 space-y-3 px-10 mt-5 lg:px-0">
            <Link class="block text-[#4a4745] hover:text-[#0f79bc] transition">Home</Link>
            <Link class="block text-[#4a4745] hover:text-[#0f79bc] transition">About</Link>
            <Link class="block text-[#4a4745] hover:text-[#0f79bc] transition">Pricing</Link>
            <Link class="block text-[#4a4745] hover:text-[#0f79bc] transition">FAQs</Link>
            <Link class="block text-[#4a4745] hover:text-[#0f79bc] transition">Blog</Link>
            <Link class="block text-[#4a4745] hover:text-[#0f79bc] transition">Contact Us</Link>
            <hr />
            <Link v-if="user" :href="route('dashboard')" class="block border px-4 py-2 rounded hover:border-gray-500">
            Dashboard
            </Link>
            <template v-else>
                <Link :href="route('login')" class="block text-[#4a4745] hover:text-[#0f79bc] transition">Login</Link>
                <Link :href="route('register')" class="block text-[#4a4745] hover:text-[#0f79bc] transition mb-5">
                Register</Link>
            </template>
        </div>
    </header>
</template>
