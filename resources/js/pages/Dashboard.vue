<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import ChartDemo from '@/components/home/Chart.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];
</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex gap-8 h-screen flex-1 flex-col rounded-xl p-10">
            <div class="grid auto-rows-min gap-8 md:grid-cols-3">
                <div class="relative rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <div class="flex h-[10rem] w-full items-center justify-center gap-5">
                        <div class="icon bg-blue-400 px-5 py-5 text-white rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-badge-dollar-sign-icon lucide-badge-dollar-sign">
                                <path
                                    d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                                <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                                <path d="M12 18V6" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-semibold text-gray-800">200</h1>
                            <p>Recharge Now</p>
                        </div>
                    </div>
                </div>
                <div class="relative rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <div class="flex h-[10rem] w-full items-center justify-center gap-5">
                        <div class="icon bg-blue-400 px-5 py-5 text-white rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-badge-dollar-sign-icon lucide-badge-dollar-sign">
                                <path
                                    d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                                <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                                <path d="M12 18V6" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-semibold text-gray-800">200</h1>
                            <p>Recharge Now</p>
                        </div>
                    </div>
                </div>
                <div class="relative rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <div class="flex h-[10rem] w-full items-center justify-center gap-5">
                        <div class="icon bg-blue-400 px-5 py-5 text-white rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="lucide lucide-badge-dollar-sign-icon lucide-badge-dollar-sign">
                                <path
                                    d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z" />
                                <path d="M16 8h-6a2 2 0 1 0 0 4h4a2 2 0 1 1 0 4H8" />
                                <path d="M12 18V6" />
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-semibold text-gray-800">200</h1>
                            <p>Recharge Now</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative flex-1 p-10 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <ChartDemo />
            </div>

        </div>
    </AppLayout>
</template>
