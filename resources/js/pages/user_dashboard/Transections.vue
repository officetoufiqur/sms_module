<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon } from 'lucide-vue-next';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Transections',
        href: '/transections',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'date', label: 'Date' },
    { key: 'user', label: 'User' },
    { key: 'amount', label: 'Amount' },
    { key: 'status', label: 'Status' },
    { key: 'action', label: 'Action' },
];

const data = [
    {
        id: 1,
        date: '02 Jan, 2024',
        user: 'Bestomall',
        amount: '2000',
        status: 'Pending'
    }
]

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Transections" />

        <FilterTable :plans="data" :columns="columns" :title="'Transections'">
            <template #action="{  }">
                <button  class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"><EyeIcon class="w-5 h-5" /></button>
            </template>
        </FilterTable>

    </AppLayout>
</template>
