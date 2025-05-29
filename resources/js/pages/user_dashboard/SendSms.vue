<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Send Sms',
        href: '/send-sms',
    },
];

const form = useForm({
    amount: "",
});

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Send Sms" />

        <div class="flex flex-col space-y-6 mt-[5rem] mx-[5rem]">
            <h1 class="text-2xl font-semibold text-gray-700">Send Sms</h1>

            <form class="space-y-6 bg-gray-50 p-10">
                <div class="grid gap-2">
                    <Label for="amount">Amount</Label>
                    <Input id="amount" class="mt-1 block w-[50rem]" v-model="form.amount" required autocomplete="amount"
                        placeholder="Full amount" />
                    <InputError class="mt-2" :message="form.errors.amount" />
                </div>


                <div class="">
                    <Label for="sender_id">Sender Id</Label>
                    <select id="countries"
                        class="bg-gray-50 border w-[50rem] mt-3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div>

                <div>
                    <Label for="sender_id">Body</Label>
                    <textarea id="message" rows="4"
                        class="block p-2.5 mt-3 w-[53.5%] text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here...">
                    </textarea>
                </div>

                <div class="flex items-center gap-4">
                    <Button :disabled="form.processing" class="cursor-pointer">Save</Button>

                    <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                        leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                        <p v-show="form.recentlySuccessful" class="text-sm text-neutral-600">Saved.</p>
                    </Transition>
                </div>
            </form>

        </div>
    </AppLayout>
</template>
