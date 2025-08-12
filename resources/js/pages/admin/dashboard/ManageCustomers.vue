<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon, LockIcon } from 'lucide-vue-next';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Manage Customer',
        href: '/admin/manage/customers',
    },
];

const props = defineProps<{
    users: {
        id: number;
        name: string;
        email: string;
        avatar: string;
        company_name: string;
        company_number: string;
        company_type: string;
        address: string;
        mobile: string;
        file_type: string;
        file: string;
        musking: string;
        non_musking: string;
    }[];
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

        <Head title="Manage Customers" />

        <div class="mt-16 mx-14 relative">

            <!-- Create Button -->
            <!-- <div class="absolute right-0">
                <Link href="/admin/customers/create"
                    class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                Create Customer
                </Link>
            </div> -->

            <div class="mt-5">
                <FilterTable :plans="props.users" :columns="columns" :title="'Manage Customers'">
                    <template #action="{ item }">
                        <div class="space-x-2.5 flex">
                            <button
                                class="text-white bg-cyan-500 hover:cyan-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                                <LockIcon class="w-5 h-5" />
                            </button>
                            <Link :href="route('customer.view', item.id)">
                            <div
                                class="text-white  bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                                <EyeIcon class="w-5 h-5" />
                            </div>
                            </Link>
                        </div>
                    </template>
                </FilterTable>
            </div>
        </div>
    </AdminAppLayout>
</template>
