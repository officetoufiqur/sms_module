<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { Trash2Icon } from 'lucide-vue-next';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Contact',
        href: '/admin/contact',
    },
];

const props = defineProps<{
    contacts: {
        id: number;
        name: string;
        email: string;
        subject: string;
        message: string;
    }[];
}>();

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'email', label: 'Email' },
    { key: 'subject', label: 'Subject' },
    { key: 'message', label: 'Message' },
    { key: 'action', label: 'Action' },
];

const data = props.contacts;

function viewCustomer(id: number) {
    router.visit(`/admin/contact/destroy/${id}`);
}


</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Contact" />
        <!-- Contact Table -->
        <div class="mt-20 mx-14">
            <FilterTable :plans="data" :columns="columns" :title="'Contact'">
                <template #message="{ item }">
                    {{ item.message.length > 50 ? item.message.slice(0, 100) + '...' : item.message }}
                </template>
                <template #action="{ }">
                    <div class="space-x-2.5">
                        <button @click="viewCustomer(1)"
                            class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <Trash2Icon class="w-5 h-5" />
                        </button>
                    </div>
                </template>
            </FilterTable>
        </div>
    </AdminAppLayout>
</template>
