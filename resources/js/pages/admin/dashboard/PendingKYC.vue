<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

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

const props = defineProps<{
    flash: {
        message?: string;
    };
    users: Array<any>;
}>();


const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'email', label: 'Email.' },
    { key: 'company_name', label: 'Company Name' },
    { key: 'file_type', label: 'File Type' },
    { key: 'mobile', label: 'Mobile' },
    { key: 'action', label: 'Action' },
];


</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Pending KYC" />

        <div class="mt-20 mx-14">
            <FilterTable :plans="props.users" :columns="columns" :title="'Pending KYC'">
                <template #action="{ item }">
                    <Link :href="route('view.kyc', item.id)">
                    <div
                        class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 w-15 text-center cursor-pointer">
                        <EyeIcon class="w-5 h-5" />
                    </div>
                    </Link>
                </template>
            </FilterTable>
        </div>

    </AdminAppLayout>
</template>
