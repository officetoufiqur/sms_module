<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Group Contact',
        href: '/group/contact',
    },
];

const props = defineProps<{
    userGroup: {
        id: number;
        group_name: string;
    }[];
    contact: {
        id: number;
        name: string;
        mobile: string;
        email: string;
        group_id: string;
    }
}>();

const form = useForm({
    name: props.contact.name,
    mobile: props.contact.mobile,
    email: props.contact.email,
    group_id: props.contact.group_id
});

function submit() {
    form.post(`/group/contact/update/${props.contact.id}`);
}

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Blog Edit" />
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Edit Blog Page</h1>
                <Link href="/group/contact/1" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">
                Back
                </Link>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg">
                <form @submit.prevent="submit" class="mt-8 space-y-4">
                    <div class="grid gap-2">
                        <Label for="name">Name (optional)</Label>
                        <Input id="name" name="name" v-model="form.name" type="text" class="mt-1 block w-full"
                            placeholder="Enter name" />
                        <div class="text-red-500 text-sm" v-if="form.errors.name">{{ form.errors.name }}</div>
                    </div>
                    <div class="grid gap-2 mt-2">
                        <Label for="mobile">Mobile <span class="text-red-600">*</span></Label>
                        <Input id="mobile" name="mobile" v-model="form.mobile" type="text" class="mt-1 block w-full"
                            placeholder="Enter mobile number" />
                        <div class="text-red-500 text-sm" v-if="form.errors.mobile">{{ form.errors.mobile }}</div>
                    </div>
                    <div class="grid gap-2 mt-2">
                        <Label for="email">Emial (optional)</Label>
                        <Input id="email" name="email" v-model="form.email" type="text" class="mt-1 block w-full"
                            placeholder="Enter email" />
                        <div class="text-red-500 text-sm" v-if="form.errors.email">{{ form.errors.email }}</div>
                    </div>
                    <div class="grid gap-2 mt-2">
                        <Label for="title">Select Group <span class="text-red-600">*</span></Label>
                        <select name="group_id" v-model="form.group_id" id="group_id"
                            class="bg-white border cursor-pointer w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                            <option value="">Select a group</option>
                            <option v-for="group in props.userGroup" :key="group.id" :value="group.id">
                                {{ group.group_name }}
                            </option>
                        </select>
                    </div>

                    <div class="flex items-center gap-4 mt-5">
                        <Button
                            class="bg-[#0f79bc] hover:bg-[#4a4745] cursor-pointer text-white px-5 py-2 rounded-lg text-sm">Update</Button>

                        <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                        </Transition>
                    </div>
                </form>
            </div>
        </div>

    </AppLayout>
</template>
