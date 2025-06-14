<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon } from 'lucide-vue-next';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Pending KYC',
        href: '/admin/pending/kyc',
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
        name: 'John Doe',
        mobile: '01712345678'
    }
]

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Pending KYC" />

        <div class="mt-20 mx-14">
            <FilterTable :plans="data" :columns="columns" :title="'Pending KYC'">
                <template #action="{ }">
                    <button
                        class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        <EyeIcon class="w-5 h-5" />
                    </button>
                </template>
            </FilterTable>
        </div>

    </AdminAppLayout>
</template>
