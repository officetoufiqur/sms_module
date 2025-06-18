<script setup lang="ts">
import { Head, useForm, Link } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Label } from '@/components/ui/label';
import { Input } from '@/components/ui/input';
import FlashMessage from '@/components/my-components/FlashMessage.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Block User Create',
        href: '/block/user/create',
    },
];

const props = defineProps<{
    flash: {
        message?: string;
    };
}>();

const form = useForm({
    age: '',
    gender: '',
    name: '',
    number: '',
});

const submit = () => {
    form.post('/block/user/create/store', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        }
    });
};

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Block User Create" />

        <FlashMessage :message="props.flash.message" />
        <div class="mt-[5rem] lg:mx-[5rem] mx-[3rem]">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Block User Create</h1>
                <Link href="/block_user" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back</Link>
            </div>

            <div
                class="bg-gray-50 pt-8 pb-4 px-5 mt-3 border">
                <form @submit.prevent="submit">
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="grid gap-2">
                            <Label for="title">Name</Label>
                            <Input id="title" name="title" type="text" v-model="form.name" class="mt-1 block w-full"
                                placeholder="Enter name" />
                            <div class="text-red-500 text-sm" v-if="form.errors.name">{{ form.errors.name }}</div>
                        </div>
                        <div class="grid gap-2 mt-5">
                            <Label for="number">Number <span class="text-red-600">*</span></Label>
                            <Input id="number" name="number" type="text" v-model="form.number" class="mt-1 block w-full"
                                placeholder="Enter number number" />
                            <div class="text-red-500 text-sm" v-if="form.errors.number">{{ form.errors.number }}</div>
                        </div>
                        <div class="grid gap-2 mt-5">
                            <Label for="age">Age</Label>
                            <Input id="age" name="age" v-model="form.age" type="number" class="mt-1 block w-full"
                                placeholder="Enter age" />
                            <div class="text-red-500 text-sm" v-if="form.errors.age">{{ form.errors.age }}</div>
                        </div>
                        <div class="grid gap-2 mt-5">
                            <Label for="gender">Select Gender</Label>
                            <select name="gender" v-model="form.gender" id="gender"
                                class="bg-white border cursor-pointer w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                                <option value="">Select an gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female"</option>
                                <option value="other">"Other"</option>
                            </select>
                        </div>
                    </div>
                    <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="submit"
                            class="inline-flex cursor-pointer w-full justify-center rounded-md bg-[#0f79bc] px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-[#4a4745] sm:ml-3 sm:w-auto">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </AppLayout>
</template>
