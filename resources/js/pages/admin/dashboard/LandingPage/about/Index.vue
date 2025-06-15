<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import FlashMessage from '@/components/my-components/FlashMessage.vue';
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

const props = defineProps<{
    about: {
        id: number;
        title: string;
        description: string;
        image: string;
    };
    flash: {
        message?: string;
    };
}>();

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'title', label: 'Title' },
    { key: 'description', label: 'Description' },
    { key: 'image', label: 'Image' },
    { key: 'action', label: 'Action' },
];

const data = [props.about];

function viewCustomer() {
    router.visit(`/admin/about/edit`);
}

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="About" />
        <!-- About Table -->
        <div class="mt-20 mx-14">
            
            <FlashMessage :message="props.flash.message" />

            <FilterTable :plans="data" :columns="columns" :title="'About'">
                <template #description="{ item }">
                    {{ item.description.length > 50 ? item.description.slice(0, 100) + '...' : item.description }}
                </template>
                <template #image="{ item }">
                    <img :src="item.image" alt="Banner Image" class="h-12 w-32 object-cover rounded" />
                </template>
                <template #action="{ }">
                    <div class="space-x-2.5">
                        <button @click="viewCustomer()"
                            class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <EyeIcon class="w-5 h-5" />
                        </button>
                    </div>
                </template>
            </FilterTable>
        </div>
    </AdminAppLayout>
</template>
