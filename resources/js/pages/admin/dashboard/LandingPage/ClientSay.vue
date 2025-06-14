<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { Trash2Icon } from 'lucide-vue-next';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'ClientSay',
        href: '/admin/client-say',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'date', label: 'Date' },
    { key: 'star', label: 'Star' },
    { key: 'message', label: 'Message' },
    { key: 'action', label: 'Action' },
];

const data = [
    {
        id: 1,
        name: 'John Doe',
        date: '2023-10-01',
        star: '5',
        message: 'I have a question about your services.',
    }
]

function viewCustomer(id: number) {
    router.visit(`/admin/client-say/destroy/${id}`);
}


</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="ClientSay" />
        <!-- ClientSay Table -->
        <div class="mt-20 mx-14">
            <FilterTable :plans="data" :columns="columns" :title="'ClientSay'">
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
