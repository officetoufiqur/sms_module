<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

import { type BreadcrumbItem } from '@/types';
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Edit Sender Id',
        href: '/create/sender-id',
    },
];

const props = defineProps<{
    sender: {
        id: number;
        sender_id: string;
        type: string;
        status: string;
    };
}>();

const form = useForm({
    sender_id: props.sender.sender_id,
    type: props.sender.type,
    status: props.sender.status,
});

const submit = () => {
    form.post('/admin/sender/update/' + props.sender.id);
};

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Edit Sender Id" />
        <div class="mx-10 my-10 bg-white p-10 border border-gray-200 shadow rounded-lg">
            <div class="lg:flex justify-between items-center">
                <h1 class="text-xl font-semibold mb-4 text-gray-700">Edit Sender Id</h1>
                <Link href="/admin/sender" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back</Link>
            </div>
            <form @submit.prevent="submit" class="flex flex-col gap-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="grid gap-2">
                        <Label for="sender_id" class="text-md">Sender Id</Label>
                        <Input id="sender_id" type="text" required autofocus :tabindex="1"
                            autocomplete="sender_id" v-model="form.sender_id" placeholder="Enter Sender Id" />
                        <InputError :message="form.errors.sender_id" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="type" class="text-md">Type</Label>
                        <select v-model="form.type" id="type"
                            class="bg-white border cursor-pointer w-full border-gray-300 text-gray-900 rounded-lg block py-2 px-3">
                            <option value="">Select an option</option>
                            <option value="masking">Musking</option>
                            <option value="non_masking">Non Musking </option>
                        </select>
                        <InputError :message="form.errors.type" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="status" class="text-md">Status</Label>
                        <select v-model="form.status" id="status"
                            class="bg-white border cursor-pointer w-full border-gray-300 text-gray-900 rounded-lg block py-2 px-3">
                            <option value="">Select an option</option>
                            <option value="pending">Pending</option>
                            <option value="active">Approved</option>
                            <option value="blocked">Blocked</option>
                        </select>
                        <InputError :message="form.errors.status" />
                    </div>

                </div>

                <Button type="submit" class="mt-2 w-30 cursor-pointer py-6 bg-[#0f79bc] hover:bg-[#4A4745] duration-300"
                    tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Submit
                </Button>

            </form>
        </div>

    </AdminAppLayout>
</template>
