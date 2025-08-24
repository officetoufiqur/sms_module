<script setup lang="ts">
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import Card from '@/components/dashboard/Card.vue';
import { BadgeDollarSignIcon, UsersRoundIcon } from 'lucide-vue-next';
import RevenueChart from '@/components/home/RevenueChart.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Admin Dashboard',
        href: '/dashboard',
    }
];

const props = defineProps<{
    flash: {
        message?: string;
    };
    totalRevenue: number;
    totalUser: number;
    pendingKyc: number;
    monthlyData:{
        year: number;
        month: number;
        total: number;
    }[];
}>();

const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

const data = props.monthlyData.map((item) => item.total);

</script>

<template>

    <Head title="Admin Dashboard" />

    
    <AdminAppLayout :breadcrumbs="breadcrumbs">
        <FlashMessage :message="props.flash.message" />
        <div class="flex gap-8 h-screen flex-1 flex-col rounded-xl p-10">
            <div class="grid auto-rows-min gap-8 md:grid-cols-3">
                <Card title="Total Revenue" :value="props.totalRevenue">
                    <template #icon>
                        <BadgeDollarSignIcon class="w-8 h-8" />
                    </template>
                </Card>
                <Card title="Total User" :value="props.totalUser">
                    <template #icon>
                        <UsersRoundIcon class="w-8 h-8"/>
                    </template>
                </Card>
                <Card title="Panding KYC" :value="props.pendingKyc">
                    <template #icon>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shield-user-icon lucide-shield-user"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="M6.376 18.91a6 6 0 0 1 11.249.003"/><circle cx="12" cy="11" r="4"/></svg>
                    </template>
                </Card>
            </div>

            <div class="relative lg:flex-1 gap-5">
                <div class="w-full p-10 rounded-xl border border-sidebar-border/70">
                    <RevenueChart :lables="labels" :values="data" />
                </div>
            </div>

        </div>
    </AdminAppLayout>
</template>
