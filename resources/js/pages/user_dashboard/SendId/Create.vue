<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Create Sender Id',
        href: '/create/sender-id',
    },
];

const form = useForm({
    sender_id: '',
    type: '',
});

const submit = () => {
    form.post(route('store.sender.id'), {
        onSuccess: () => {
            form.reset();
        },
    });
};

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Create Sender Id" />
        <div class="mx-10 my-10 bg-white p-10 border border-gray-200 shadow rounded-lg">
            <div class="lg:flex justify-between items-center">
                <h1 class="text-xl font-semibold mb-4 text-gray-700">Create Sender Id</h1>
                <Link href="/sender-id" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back</Link>
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
                            <option value="masking">Masking</option>
                            <option value="non_masking">Non Masking </option>
                        </select>
                        <InputError :message="form.errors.type" />
                    </div>

                </div>

                <Button type="submit" class="mt-2 w-30 cursor-pointer py-6 bg-[#0f79bc] hover:bg-[#4A4745] duration-300"
                    tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Submit
                </Button>

            </form>
        </div>

    </AppLayout>
</template>
