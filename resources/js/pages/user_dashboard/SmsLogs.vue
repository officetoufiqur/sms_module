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

const props = defineProps<{
    smsLogs: {
        id: number;
        name: string;
        number: string;
        message: string;
        sender_id: string;
        status: string;
    }[];
    flash: {
        message?: string;
    };
}>();

const columns = [
    { key: 'id', label: '#' },
    { key: 'name', label: 'Name' },
    { key: 'number', label: 'Number' },
    { key: 'sender_id', label: 'Sender ID' },
    { key: 'message', label: 'Message' },
    { key: 'status', label: 'Status' },
];

const data = props.smsLogs;

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="SMS Logs" />

        <div class="mt-20 mx-14">
            <FilterTable :plans="data" :columns="columns" :title="'SMS Logs'">
                <template #message="{ item }">
                {{ item.message.length > 20 ? item.message.slice(0, 100) + '...' : item.message }}
                </template>
                <template #status="{ item }">
                    <button v-if="item.status === 'pending'"  class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Pending</button>
                    <button v-if="item.status === 'delivered'"  class="text-white bg-green-500 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Delivered</button>
                    <button v-if="item.status === 'failed'"  class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Failed</button>
                </template>
            </FilterTable>
        </div>


    </AppLayout>
</template>
