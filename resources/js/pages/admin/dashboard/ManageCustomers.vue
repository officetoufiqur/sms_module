<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon } from 'lucide-vue-next';

import { router } from '@inertiajs/vue3';

function viewCustomer(id: number) {
    router.visit(`/admin/manage/customer/${id}`);
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Manage Customer',
        href: '/admin/manage/customer',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'mobile', label: 'Mobile' },
    { key: 'action', label: 'Action' },
];

const data = [
    {
        id: 1,
        name: 'Toufiqur',
        mobile: '01712345678'
    }
]

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Manage Customers" />

        <FilterTable :plans="data" :columns="columns" :title="'Manage Customers'">
            <template #action="{ }">
                <button @click="viewCustomer(1)"
                    class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                    <EyeIcon class="w-5 h-5" />
                </button>
            </template>
        </FilterTable>

    </AdminAppLayout>
</template>
