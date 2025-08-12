<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FlashMessage from '@/components/my-components/FlashMessage.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'KYC Verification',
        href: '/kyx',
    },
];

const props = defineProps<{
    flash: {
        message?: string;
    };
}>();

const form = useForm({
    company_name: '',
    company_number: '',
    company_type: '',
    address: '',
    mobile: '',
    file_type: '',
    file: '',
});

const submit = () => {
    form.post(route('kyc.store'), {
        onSuccess: () => {
            form.reset();
        },
    });
};

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="KYC Verification" />
        <div class="mx-10 my-10 bg-white p-10 border border-gray-200 shadow rounded-lg">
            <FlashMessage :message="props.flash.message" />
            <form @submit.prevent="submit" class="flex flex-col gap-6">
                <div class="grid grid-cols-2 gap-6">
                    <div class="grid gap-2">
                        <Label for="company_name" class="text-md">Company Name</Label>
                        <Input id="company_name" type="text" required autofocus :tabindex="1"
                            autocomplete="company_name" v-model="form.company_name" placeholder="Enter company name" />
                        <InputError :message="form.errors.company_name" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="company_number" class="text-md">Company Number</Label>
                        <Input id="company_number" type="text" required autofocus :tabindex="1"
                            autocomplete="company_number" v-model="form.company_number"
                            placeholder="Enter company number" />
                        <InputError :message="form.errors.company_number" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="company_type" class="text-md">Company Type</Label>
                        <select v-model="form.company_type" id=""
                            class="bg-white border cursor-pointer w-full border-gray-300 text-gray-900 rounded-lg block py-2 px-3">
                            <option value="">Select an option</option>
                            <option value="non_profit">Non-profit organization</option>
                            <option value="limited_company">Limited company</option>
                            <option value="private_entrepreneur">Private entrepreneur</option>
                            <option value="government_institution">Government institution</option>
                        </select>
                        <InputError :message="form.errors.company_type" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="address" class="text-md">Address</Label>
                        <Input id="address" type="text" required autofocus :tabindex="1" autocomplete="address"
                            v-model="form.address" placeholder="Enter full address, street, city, state, zipcode" />
                        <InputError :message="form.errors.address" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="mobile" class="text-md">Mobile Number</Label>
                        <Input id="mobile" type="text" required autofocus :tabindex="1" autocomplete="mobile"
                            v-model="form.mobile" placeholder="Enter your mobile number" />
                        <InputError :message="form.errors.mobile" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="file_type" class="text-md">File Type</Label>
                        <select v-model="form.file_type" id="file_type"
                            class="bg-white border cursor-pointer w-full border-gray-300 text-gray-900 rounded-lg block py-2 px-3">
                            <option value="">Select an option</option>
                            <option value="passport">Passport</option>
                            <option value="nid">NID</option>
                            <option value="driving_license">Driving license</option>
                        </select>
                        <InputError :message="form.errors.file_type" />
                    </div>

                </div>
                <div class="grid gap-2 w-[49%]">
                    <Label for="file" class="text-md">File Upload</Label>
                    <Input id="file" type="file" name="file" @input="form.file = $event.target.files[0]" required
                        autofocus :tabindex="1" autocomplete="file" class="cursor-pointer" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                    <InputError :message="form.errors.file" />
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
