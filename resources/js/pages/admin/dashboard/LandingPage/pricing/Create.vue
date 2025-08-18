<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue'
import { Trash2Icon } from 'lucide-vue-next';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Pricing Create',
        href: '/admin/pricing/create',
    },
];


const fields = ref<string[]>([])

function addField() {
    fields.value.push('');
}

function removeField(index: number) {
    fields.value.splice(index, 1);
}

const from = useForm({
    plan_name: '',
    amount: '',
    sms_limit: '',
    plan_feature: [],
});

function submit() {
    from.post('/admin/pricing/store');
}
</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Pricing Create" />
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Create Pricing Page</h1>
                <Link href="/admin/pricing" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back</Link>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg">
                <form @submit.prevent="submit" class="mt-8 space-y-4">
                    <div class="grid gap-2">
                        <Label for="plan_name">Plan Name</Label>
                        <Input
                            id="plan_name"
                            name="plan_name"
                            type="text"
                            v-model="from.plan_name"
                            class="mt-1 block w-full"
                            placeholder="Enter plan_name"
                        />
                        <div class="text-red-500 text-sm" v-if="from.errors.plan_name">{{ from.errors.plan_name }}</div>
                    </div>
                    <div class="grid gap-2">
                        <Label for="amount">Amount</Label>
                        <Input
                            id="amount"
                            name="amount"
                            type="number"
                            v-model="from.amount"
                            class="mt-1 block w-full"
                            placeholder="Enter amount"
                        />
                        <div class="text-red-500 text-sm" v-if="from.errors.amount">{{ from.errors.amount }}</div>
                    </div>
                    <!-- <div class="grid gap-2">
                        <Label for="sms_limit">SMS Limit</Label>
                        <Input
                            id="sms_limit"
                            name="sms_limit"
                            type="number"
                            v-model="from.sms_limit"
                            class="mt-1 block w-full"
                            placeholder="Enter sms limit"
                        />
                        <div class="text-red-500 text-sm" v-if="from.errors.sms_limit">{{ from.errors.sms_limit }}</div>
                    </div> -->

                    <hr class="my-4 border-t border-gray-300" />
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="font-semibold text-slate-600">Plan Features</h2>
                        <!-- Add Field Button -->
                        <Button
                            type="button"
                            class="bg-green-600 cursor-pointer hover:bg-green-700 text-white px-4 py-2 rounded-md"
                            @click="addField">
                            Add Feature
                        </Button>
                    </div>

                    <div v-for="(field, index) in fields" :key="index" class="grid gap-2 relative">
                        <Input
                            :id="'feature_' + index"
                            v-model="from.plan_feature[index]"
                            type="text"
                            class="mt-1 block w-full pr-10"
                            :placeholder="`Enter feature`"
                            required
                        />
                        <Trash2Icon
                            class="w-6 h-6 text-red-500 cursor-pointer absolute right-2 top-3.5"
                            @click="removeField(index)"
                        />
                        <div class="text-red-500 text-sm" v-if="from.errors.plan_feature">{{ from.errors.plan_feature }}</div>
                    </div>

                    <div class="flex items-center gap-4">
                        <Button class="bg-[#0f79bc] hover:bg-[#4a4745] cursor-pointer">Create</Button>

                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                        </Transition>
                    </div>
                </form>
            </div>
        </div>
    </AdminAppLayout>
</template>
