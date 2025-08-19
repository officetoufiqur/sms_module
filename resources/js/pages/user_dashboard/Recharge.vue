<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

import HeadingSmall from '@/components/HeadingSmall.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FlashMessage from '@/components/my-components/FlashMessage.vue';

const props = defineProps<{
    flash: {
        message?: string;
    };
    plans: {
        id: number;
        plan_name: string;
        amount: string;
        sms_limit: string;
        plan_feature: string[];
    }[];
}>();


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Balance Recharge',
        href: '/recharge',
    },
];

const form = useForm({});

function buyNow(id: number) {
    form.post(`/buy-now/${id}`);
}

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Balance Recharge" />

        <div class="flex flex-col space-y-6 mt-[5rem] ml-[5rem]">
            <FlashMessage :message="props.flash.message" />
            <HeadingSmall title="Balance Recharge" />

            <div class=" grid lg:grid-cols-3 gap-10 lg:gap-5 mx-10 lg:mx-16 xl:mx-0 space-y-5 lg:space-y-0">
                <div v-for="plan in props.plans" :key="plan.id"
                    class="bg-white px-10 pt-20 pb-14 rounded-lg border border-gray-200 relative overflow-hidden">
                    <h2
                        class="bg-[#0f79bc] w-[80%] py-3 px-10 text-white absolute top-0 left-0 text-xl font-semibold rounded-br-lg">
                        {{ plan.plan_name }}
                    </h2>

                    <div class="text-center mt-3">
                        <h3 class="text-3xl font-bold text-[#0f79bc]">
                            ${{ plan.amount }}
                        </h3>

                        <div class="mt-6 space-y-4 text-start">
                            <p v-for="(feature, i) in plan.plan_feature" :key="i">
                                <i class="fa-solid fa-circle-check text-green-600 pr-2"></i>{{ feature }}
                            </p>
                        </div>
                    </div>
                     <button @click="buyNow(plan.id)" 
                            class="bg-[#0f79bc] text-white px-5 py-2 rounded-lg mt-10 cursor-pointer">
                        Buy Now
                    </button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
