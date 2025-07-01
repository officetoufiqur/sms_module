<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon, LockIcon } from 'lucide-vue-next';

import { router } from '@inertiajs/vue3';

function viewCustomer() {
    router.visit(`/customers/about`);
}

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Manage Customer',
        href: '/admin/manage/customers',
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
    },
    {
        id: 2,
        name: 'Sarah Smith',
        mobile: '01712345678'
    },
    {
        id: 3,
        name: 'Michael Johnson',
        mobile: '01712345678'
    }
]

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Manage Customers" />

        <div class="mt-16 mx-14 relative">

            <!-- Create Button -->
            <div class="absolute right-0">
                <Link href="/admin/customers/create"
                    class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                    Create Customer
                </Link>
            </div>

            <div class="mt-5">
                <FilterTable :plans="data" :columns="columns" :title="'Manage Customers'">
                <template #action="{ }">
                    <div class="space-x-2.5">
                        <button
                            class="text-white bg-cyan-500 hover:cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <LockIcon class="w-5 h-5" />
                        </button>
                        <button @click="viewCustomer()"
                            class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <EyeIcon class="w-5 h-5" />
                        </button>
                    </div>
                </template>
            </FilterTable>
            </div>
        </div>
    </AdminAppLayout>
</template>
