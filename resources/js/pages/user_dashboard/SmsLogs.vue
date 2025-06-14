<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'SMS Logs',
        href: '/sms_logs',
    },
];

const columns = [
    { key: 'id', label: '#' },
    { key: 'pecipient', label: 'Pecipient'},
    { key: 'sms', label: 'SMS' },
    { key: 'date', label: 'Date' },
    { key: 'cost', label: 'Cost' },
    { key: 'status', label: 'Status' },
];

const data = [
    {
        id: 1,
        pecipient: '+8801712345678',
        sms: 'test',
        date: '02 Jan, 2024',
        cost: '0.00',
        status: 'Dlevivered',
    }
]

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="SMS Logs" />

        <div class="mt-20 mx-14">
            <FilterTable :plans="data" :columns="columns" :title="'SMS Logs'">
                <template #status="{  }">
                    <button  class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">{{ data[0].status }}</button>
                </template>
            </FilterTable>
        </div>

        <!-- <FilterTable :plans="data" :columns="columns"  /> -->

    </AppLayout>
</template>
