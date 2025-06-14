<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon } from 'lucide-vue-next';
import { router } from '@inertiajs/vue3';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'About',
        href: '/admin/about',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'title', label: 'Title' },
    { key: 'bio', label: 'Bio' },
    { key: 'image', label: 'Image' },
    { key: 'action', label: 'Action' },
];

const data = [
    {
        id: 1,
        title: 'About Us',
        bio: '01712345678',
        image: 'https://picsum.photos/200/300',
    }
]

function viewCustomer(id: number) {
    router.visit(`/admin/about/edit/${id}`);
}


</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="About" />
        <!-- About Table -->
        <div class="mt-20 mx-14">
            <FilterTable :plans="data" :columns="columns" :title="'About'">
                <template #image="{ item }">
                    <img
                        :src="item.image"
                        alt="Banner Image"
                        class="h-12 w-32 object-cover rounded"
                    />
                </template>
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
    </AdminAppLayout>
</template>
