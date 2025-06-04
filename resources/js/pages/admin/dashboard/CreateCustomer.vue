<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon } from 'lucide-vue-next';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create Customer',
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
        name: 'Toufiqur',
        mobile: '01712345678'
    }
]

function onCreate() {
    // You can navigate to a create form or open a modal here
    alert('Create Customer clicked!');
}

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Create Customer" />

        
        <div class="relative">
            <!-- Create Button -->
        <div class="absolute right-14 top-14">
            <button
                class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"
                @click="onCreate"
            >
                Create Customer
            </button>
        </div>

        <FilterTable :plans="data" :columns="columns" :title="'Create Customer'">
            <template #action="{  }">
                <button class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                    <EyeIcon class="w-5 h-5" />
                </button>
            </template>
        </FilterTable>
        </div>

    </AdminAppLayout>
</template>
