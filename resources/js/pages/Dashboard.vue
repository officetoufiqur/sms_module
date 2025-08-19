<script setup lang="ts">

import FlashMessage from '@/components/my-components/FlashMessage.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import ChartDemo from '@/components/home/Chart.vue';
import Card from '@/components/dashboard/Card.vue';
import { BadgeDollarSign } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

const props = defineProps<{
    flash: {
        message?: string;
    };
    payment: {
        id: number;
        amount: string;
    }
}>();

</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <FlashMessage :message="props.flash.message" />
        <div class="flex gap-8 h-screen flex-1 flex-col rounded-xl p-10">
            <div class="grid auto-rows-min gap-8 md:grid-cols-3">
                <Card :title="'Recharge Now'" :value="props.payment.amount">
                    <template #icon>
                        <BadgeDollarSign />
                    </template>
                </Card>
                <Card title="Recharge Now" value="200">
                    <template #icon>
                        <BadgeDollarSign />
                    </template>
                </Card>
                <Card title="Recharge Now" value="200">
                    <template #icon>
                        <BadgeDollarSign />
                    </template>
                </Card>
            </div>

            <div class="relative flex-1 p-10 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                <ChartDemo />
            </div>

        </div>
    </AppLayout>
</template>
