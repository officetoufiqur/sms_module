<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import HeadingSmall from '@/components/HeadingSmall.vue';
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import SettingsLayout from '@/layouts/settings/AdminLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon } from 'lucide-vue-next';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Customer Transaction',
        href: '/customers/tnx',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'date', label: 'Date' },
    { key: 'amount', label: 'Amount' },
    { key: 'status', label: 'Status' },
    { key: 'action', label: 'Action' },
];

const data = [
    {
        id: 1,
        date: "2023-10-01",
        amount: 100,
        status: "Completed",
    }
]

function viewCustomer(id: number) {
    router.visit(`/admin/manage/customer/${id}`);
}


</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Customer Transaction" />

        <SettingsLayout>
            <HeadingSmall title="User information" />
            <!-- Rate Plans Table -->
            <div>
                <FilterTable :plans="data" :columns="columns" :title="'Customer Transaction'">
                    <template #action="{ }">
                        <div class="space-x-2.5">
                            <button @click="viewCustomer(1)"
                                class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                                <EyeIcon class="w-5 h-5" />
                            </button>
                        </div>
                    </template>
                </FilterTable>
            </div>

        </SettingsLayout>
    </AdminAppLayout>
</template>
