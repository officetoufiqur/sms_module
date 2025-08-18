<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';
import { SquarePenIcon } from 'lucide-vue-next';
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Sender ID',
        href: '/sender_id',
    },
];

const props = defineProps<{
    flash: {
        message?: string;
    };
    senders: {
        id: number;
        sender_id: string;
        type: string;
        status: string;
    }[];
}>();


const columns = [
    { key: 'id', label: 'ID' },
    { key: 'sender_id', label: 'Sender ID' },
    { key: 'type', label: 'Type' },
    { key: 'status', label: 'Status' },
    { key: 'action', label: 'Action' },
];



</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Sender ID" />

        <div class="mt-20 mx-14">
            <FlashMessage :message="props.flash.message" />

            <FilterTable :plans="props.senders" :columns="columns" :title="'Sender ID'">
                <template #status="{ item }">
                    <span v-if="item.status === 'active'" class="text-green-500 font-semibold bg-green-100 px-6 pt-2 pb-2.5 rounded-full">{{ item.status }}</span>
                    <span v-if="item.status === 'pending'" class="text-blue-500 font-semibold bg-blue-100 px-6 pt-2 pb-2.5 rounded-full">{{ item.status }}</span>
                    <span v-if="item.status === 'blocked'" class="text-red-500 font-semibold bg-red-100 px-6 pt-2 pb-2.5 rounded-full">{{ item.status }}</span>
                </template>
                <template #action="{ item }">
                    <div class="space-x-2 flex">
                        <Link :href="`/admin/sender/edit/${item.id}`"
                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <SquarePenIcon class="w-5 h-5" />
                        </Link>
                    </div>
                </template>
            </FilterTable>
        </div>

        <!-- <FilterTable :plans="data" :columns="columns"  /> -->

    </AdminAppLayout>
</template>
