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
    { key: 'operator', label: 'Operator' },
    { key: 'country', label: 'Country' },
    { key: 'nonMasking', label: 'Non Masking' },
    { key: 'masking', label: 'Masking' },
];

const data = [
    {
        id: 1,
        operator: 'Grameenphone',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
    {
        id: 2,
        operator: 'Banglalink',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
    {
        id: 3,
        operator: 'Robi',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
    {
        id: 4,
        operator: 'Airtel',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
    {
        id: 5,
        operator: 'Teletalk',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
]

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="My Plan Rate" />

        <div class="mt-20 mx-14">
            <FilterTable :plans="data" :columns="columns" :title="'My Plan Rate'">
                <template #operator="{ item }">
                    <div class="flex items-center space-x-2">
                        <img :src="item.logo" alt="`${item.operator} logo`" class="h-6" />
                        <span>{{ item.operator }}</span>
                    </div>
                </template>
            </FilterTable>
        </div>
        <!-- <FilterTable :plans="data" :columns="columns"  /> -->

    </AppLayout>
</template>
