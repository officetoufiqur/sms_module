<script setup lang="ts">

import FlashMessage from '@/components/my-components/FlashMessage.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import ChartDemo from '@/components/home/Chart.vue';
import Card from '@/components/dashboard/Card.vue';
import { BadgeDollarSign, MailIcon, MailXIcon } from 'lucide-vue-next';
import LineChart from '@/components/my-components/LineChart.vue';

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
    };
    totalMessage: {
        id: number;
        message: string;
    };
    pendingMessage: {
        id: number;
        pendingMessage: string;
    };
    data: {
        id: number;
        month: string;
        total: string;
    }[];
    successDataArray: Array<number>;
    pendingDataArray: Array<number>;
    failedDataArray: Array<number>;
}>();

const labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];   

const success = props.successDataArray;
const pendingData = props.pendingDataArray;
const failedData = props.failedDataArray;

const amount = parseFloat(props.payment.amount).toFixed(1);

</script>

<template>

    <Head title="Dashboard" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <FlashMessage :message="props.flash.message" />
        <div class="flex gap-8 h-screen flex-1 flex-col rounded-xl p-10">
            <div class="grid auto-rows-min gap-8 md:grid-cols-3">
                <Card :title="'Total Amount'" :value="amount">
                    <template #icon>
                        <BadgeDollarSign />
                    </template>
                </Card>
                <Card title="Total Message" :value="props.totalMessage.message">
                    <template #icon>
                        <MailIcon />
                    </template>
                </Card>
                <Card title="Total Pending Message" :value="props.pendingMessage.pendingMessage">
                    <template #icon>
                        <MailXIcon />
                    </template>
                </Card>
            </div>

            <div class="relative lg:flex gap-5">
                <div class="w-full p-10 rounded-xl border border-sidebar-border/70">
                    <ChartDemo :lables="labels"
                        :values="props.data.map(item => Number(item.total))" />
                </div>
                <div class="w-full p-10 rounded-xl border border-sidebar-border/70">
                    <LineChart :success="success" :pending="pendingData" :failed="failedData"/>
                </div>
            </div>

        </div>
    </AppLayout>
</template>
