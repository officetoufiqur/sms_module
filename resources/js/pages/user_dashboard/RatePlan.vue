<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'My Plan Rate',
        href: '/rate-plan',
    },
];

const props = defineProps<{
    flash: {
        message?: string;
    };
    ratePlan: {
        id: number;
        musking: string;
        non_musking: string;
    };
}>();

const columns = [
    { key: 'id', label: '#' },
    { key: 'masking', label: 'Masking' },
    { key: 'nonMasking', label: 'Non Masking' },
];

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="My Plan Rate" />

        <div class="mt-20 mx-14">
            <h1 class="text-xl font-semibold text-slate-900">Rate Plan</h1>
            <div class="overflow-x-auto mt-5">
                <table class="min-w-full bg-white border relative ">
                    <thead class="bg-gray-100 text-sm text-gray-700">
                        <tr>
                            <th v-for="col in columns" :key="col.key" class="px-4 py-4 text-left">
                                {{ col.label }}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-if="!props.ratePlan">
                            <td :colspan="columns.length" class="text-center py-6 text-gray-500">
                                No data found
                            </td>
                        </tr>

                        <tr v-else>
                            <td class="border border-gray-200 px-4 py-4">
                                1
                            </td>
                            <td class="border border-gray-200 px-4 py-4">
                                {{ props.ratePlan.musking }}
                            </td>
                            <td class="border border-gray-200 px-4 py-4">
                                {{ props.ratePlan.non_musking }}
                            </td>
                        </tr>
                    </tbody>


                </table>
            </div>
        </div>


    </AppLayout>
</template>
