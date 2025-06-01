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



</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="My Plan Rate" />

        
        <FilterTable />
        
    </AppLayout>
</template>
