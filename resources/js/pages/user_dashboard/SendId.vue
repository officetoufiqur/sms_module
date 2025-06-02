<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Sender ID',
        href: '/sender_id',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'sender_id', label: 'Sender ID' },
    { key: 'type', label: 'Type' },
    { key: 'allowed_country', label: 'Allowed Country' },
    { key: 'status', label: 'Status' },
];

const data = [
    {
        id: 1,
        sender_id: '886538749834892',
        type: 'Non-Masking',
        allowed_country: 'Bangladesh',
        status: 'Active',
    }
]

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Sender ID" />

        <FilterTable :plans="data" :columns="columns" :title="'Sender ID'">
            <template #status="{  }">
                <button  class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">{{ data[0].status }}</button>
            </template>
        </FilterTable>

        <!-- <FilterTable :plans="data" :columns="columns"  /> -->

    </AppLayout>
</template>
