<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';
import { Link } from '@inertiajs/vue3';
import TextArea from '@/components/my-components/textarea/TextArea.vue';
import { ref } from 'vue'

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
                <form class="mt-8 space-y-4">
                    <div class="grid gap-2">
                        <Label for="plan_name">Plan Name</Label>
                        <Input
                            id="plan_name"
                            name="plan_name"
                            type="text"
                            class="mt-1 block w-full"
                            placeholder="Enter plan_name"
                        />
                        <!-- <InputError :message="form.errors.plan_name" /> -->
                    </div>
                    <div class="grid gap-2">
                        <Label for="amount">Amount</Label>
                        <Input
                            id="amount"
                            name="amount"
                            type="text"
                            class="mt-1 block w-full"
                            placeholder="Enter amount"
                        />
                        <!-- <InputError :message="form.errors.amount" /> -->
                    </div>
                    <div class="grid gap-2">
                        <Label for="duration">Duration</Label>
                        <TextArea
                            id="duration"
                            name="duration"
                            type="text"
                            class="mt-1 block w-full"
                            placeholder="Enter duration"
                        />
                        <!-- <InputError :message="form.errors.duration" /> -->
                    </div>

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
                    <div class="grid gap-2">
                        <Input
                            id="plan_feature"
                            name="plan_feature"
                            type="text"
                            class="mt-1 block w-full"
                            placeholder="Enter plan feature"
                        />
                        <!-- <InputError :message="form.errors.plan_feature" /> -->
                    </div>

                    <!-- Dynamic Inputs -->
                    <div v-for="(field, index) in fields" :key="index" class="grid gap-2">
                        <Input
                            :id="'feature_' + index"
                            v-model="fields[index]"
                            type="text"
                            class="mt-1 block w-full"
                            :placeholder="`Enter feature`"
                        />
                    </div>

                    
                    

                    <div class="flex items-center gap-4">
                        <Button class="bg-[#0f79bc] hover:bg-[#4a4745] cursor-pointer">Update</Button>

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
