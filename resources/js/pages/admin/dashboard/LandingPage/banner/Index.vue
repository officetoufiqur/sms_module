<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon } from 'lucide-vue-next';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Banner',
        href: '/admin/banner',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'title', label: 'Title' },
    { key: 'sub_title', label: 'Sub Title' },
    { key: 'image', label: 'Image' },
    { key: 'action', label: 'Action' },
];

const data = [
    {
        id: 1,
        title: 'John Doe',
        sub_title: '01712345678',
        image: 'https://images.unsplash.com/photo-1575936123452-b67c3203c357?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8aW1hZ2V8ZW58MHx8MHx8fDA%3D'
    }
]

function viewCustomer(id: number) {
    router.visit(`/admin/banner/edit/${id}`);
}
</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">
        <Head title="Banner" />
        <!-- Banner Table -->
        <div class="mt-20 mx-14">
            <FilterTable :plans="data" :columns="columns" :title="'Banner'">
                <template #image="{ item }">
                    <img
                        :src="item.image"
                        alt="Banner Image"
                        class="h-12 w-32 object-cover rounded"
                    />
                </template>
                <template #action="{ item }">
                    <div class="space-x-2.5">
                        <button @click="viewCustomer(item.id)"
                            class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <EyeIcon class="w-5 h-5" />
                        </button>
                    </div>
                </template>
            </FilterTable>
        </div>
    </AdminAppLayout>
</template>
