<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon } from 'lucide-vue-next';
import { type BreadcrumbItem } from '@/types';
import FlashMessage from '@/components/my-components/FlashMessage.vue';

// Receive props from Inertia
const props = defineProps<{
    banner: {
        id: number;
        title: string;
        sub_title: string;
        image: string;
    }
    flash: {
        message?: string;
    };
}>();

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

const data = [props.banner];

function viewCustomer(id: number) {
    router.visit(`/admin/banner/edit/${id}`);
}

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Banner" />
        <div class="mt-20 mx-14">
             <FlashMessage :message="props.flash.message" />
            <FilterTable :plans="data" :columns="columns" :title="'Banner'">
                <template #sub_title="{ item }">
                    {{ item.sub_title.length > 20 ? item.sub_title.slice(0, 50) + '...' : item.sub_title }}
                </template>
                <template #image="{ item }">
                    <img :src="item.image" alt="Banner Image" class="h-12 w-32 object-cover rounded" />
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
