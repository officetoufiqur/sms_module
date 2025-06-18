<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'My Plan Rate',
        href: '/rate-plan',
    },
];

const columns = [
    { key: 'id', label: '#' },
    { key: 'nonMasking', label: 'Non Masking' },
    { key: 'masking', label: 'Masking' },
];

const data = [
    {
        id: 1,
        nonMasking: '0.35',
        masking: '0.65',
    },
    {
        id: 2,
        nonMasking: '0.35',
        masking: '0.65',
    }
]

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="My Plan Rate" />

        <div class="mt-20 mx-14">
            <FilterTable :plans="data" :columns="columns" :title="'My Plan Rate'">
            </FilterTable>
        </div>
        <!-- <FilterTable :plans="data" :columns="columns"  /> -->

    </AppLayout>
</template>
