<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon } from 'lucide-vue-next';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Transections',
        href: '/transections',
    },
];

const props = defineProps<{
    transection:{
        id: number;
        plan_name: string;
        amount: string;
    }[];
}>();

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'plan_name', label: 'Plan Name' },
    { key: 'amount', label: 'Amount' },
];

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Transections" />

         <div class="mt-20 mx-14">
            <FilterTable :plans="props.transection" :columns="columns" :title="'Transections'">
            <template #action="{  }">
                <button  class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"><EyeIcon class="w-5 h-5" /></button>
            </template>
        </FilterTable>
        </div>

    </AppLayout>
</template>
