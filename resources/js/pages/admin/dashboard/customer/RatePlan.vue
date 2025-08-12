<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import HeadingSmall from '@/components/HeadingSmall.vue';
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import SettingsLayout from '@/layouts/settings/AdminLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Rate Plans',
        href: '/customers/rate/plan',
    },
];


</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Rate Plans" />

        <SettingsLayout>
            <HeadingSmall title="Rate Plans" />
            <!-- Rate Plans Table -->
            <div>
            </div>

        </SettingsLayout>
    </AdminAppLayout>
</template>
