<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <div class="flex min-h-svh flex-col items-center justify-center gap-6 bg-gray-50">
        <div class="w-full max-w-lg">
            <Link :href="route('home')" class="flex flex-col items-center">
            <div class="flex h-[15rem] w-[15rem] items-center justify-center rounded-md pt-10">
                <img src="/assets/img/400_143.png" alt="Brand Logo">
            </div>
            </Link>
            <div class="flex flex-col gap-8 bg-white py-20 px-10 border border-gray-200 rounded-lg">
                <div class="flex flex-col items-center gap-4">
                    <div class="space-y-2 text-center">
                        <h1 class="text-xl font-medium">{{ title }}</h1>
                        <p class="text-center text-muted-foreground">{{ description }}</p>
                    </div>
                </div>
                <slot />
            </div>
        </div>
    </div>
</template>
