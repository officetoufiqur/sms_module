<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'My Plan Rate',
        href: '/rate-plan',
    },
];

const form = useForm({
    company_name: '',
    company_number: '',
    company_type: '',
    address: '',
    mobile: '',
});

const submit = () => {
    form.post(route('kyc.store'));
};

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="My Plan Rate" />
        <div class="mx-10 my-10 bg-white p-10 border border-gray-200 shadow rounded-lg">
            <form @submit.prevent="submit" class="flex flex-col gap-6">
                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <Label for="company_name">Company Name</Label>
                        <Input id="company_name" type="text" required autofocus :tabindex="1"
                            autocomplete="company_name" v-model="form.company_name" placeholder="Enter company name" />
                        <InputError :message="form.errors.company_name" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="company_number">Company Number</Label>
                        <Input id="company_number" type="text" required autofocus :tabindex="1"
                            autocomplete="company_number" v-model="form.company_number"
                            placeholder="Enter company number" />
                        <InputError :message="form.errors.company_number" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="company_type">Company Type</Label>
                        <Input id="company_type" type="text" required autofocus :tabindex="1"
                            autocomplete="company_type" v-model="form.company_type"
                            placeholder="Enter company number" />
                        <InputError :message="form.errors.company_type" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="address">Address</Label>
                        <Input id="address" type="text" required autofocus :tabindex="1" autocomplete="address"
                            v-model="form.address" placeholder="Enter full address, street, city, state, zipcode" />
                        <InputError :message="form.errors.address" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="mobile">Mobile Number</Label>
                        <Input id="mobile" type="text" required autofocus :tabindex="1" autocomplete="mobile"
                            v-model="form.mobile" placeholder="Enter your mobile number" />
                        <InputError :message="form.errors.mobile" />
                    </div>


                    <Button type="submit"
                        class="mt-2 w-30 cursor-pointer py-6 bg-[#0f79bc] hover:bg-[#4A4745] duration-300"
                        tabindex="5" :disabled="form.processing">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Submit
                    </Button>
                </div>
            </form>
        </div>

    </AppLayout>
</template>
