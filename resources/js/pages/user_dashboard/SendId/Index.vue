<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';
import { ref } from 'vue';

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
];

const data = ref(props.senders);



</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Sender ID" />

        <div class="mt-20 mx-14">
            <FlashMessage :message="props.flash.message" />

            <FilterTable :plans="data" :columns="columns" :title="'Sender ID'" :create-btn="true" :create-url="'/create/sender-id'" :create-text="'Request Sender ID'">
                <template #status="{ item }">
                    <span v-if="item.status === 'active'" class="text-green-500 font-semibold bg-green-100 px-6 pt-2 pb-2.5 rounded-full">{{ item.status }}</span>
                    <span v-if="item.status === 'pending'" class="text-blue-500 font-semibold bg-blue-100 px-6 pt-2 pb-2.5 rounded-full">{{ item.status }}</span>
                    <span v-if="item.status === 'blocked'" class="text-red-500 font-semibold bg-red-100 px-6 pt-2 pb-2.5 rounded-full">{{ item.status }}</span>
                </template>
                <template #type="{ item }">
                    <span>{{ item.type }}</span>
                </template>
            </FilterTable>
        </div>

        <!-- <FilterTable :plans="data" :columns="columns"  /> -->

    </AppLayout>
</template>
