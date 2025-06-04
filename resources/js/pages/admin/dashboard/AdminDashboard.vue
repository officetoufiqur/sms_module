<script setup lang="ts">
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import ChartDemo from '@/components/home/Chart.vue';
import Card from '@/components/dashboard/Card.vue';
import { CircleDotDashed } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Admin Dashboard',
        href: '/dashboard',
    }
];
</script>

<template>

    <Head title="Admin Dashboard" />

    <AdminAppLayout :breadcrumbs="breadcrumbs">
        <div class="flex gap-8 h-screen flex-1 flex-col rounded-xl p-10">
            <div class="grid auto-rows-min gap-8 md:grid-cols-3">
                <Card title="Panding KYC" value="200">
                    <template #icon>
                        <CircleDotDashed />
                    </template>
                </Card>
                <Card title="Panding KYC" value="200">
                    <template #icon>
                        <CircleDotDashed />
                    </template>
                </Card>
                <Card title="Panding KYC" value="200">
                    <template #icon>
                        <CircleDotDashed />
                    </template>
                </Card>
            </div>

            <div class="relative flex-1 p-10 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <ChartDemo />
            </div>

        </div>
    </AdminAppLayout>
</template>
