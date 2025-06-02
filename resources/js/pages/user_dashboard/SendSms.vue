<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import TextArea from '@/components/my-components/textarea/TextArea.vue';
import Option from '@/components/my-components/Select.vue';
import { ref } from 'vue'

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Send Sms',
        href: '/send-sms',
    },
];

const form = useForm({
    amount: "",
});

const selectedCountry = ref('')
const countryOptions = [
  { value: 'us', label: 'United States' },
  { value: 'ca', label: 'Canada' },
  { value: 'uk', label: 'United Kingdom' },
  { value: 'fr', label: 'France' },
]

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Send Sms" />

        <div class="mt-[5rem] lg:mx-[5rem] mx-[3rem]">
            <h1 class="text-2xl font-semibold text-gray-700">Send Sms</h1>

            <div class="lg:flex justify-between gap-5 mt-5 space-y-10 lg:space-y-0">
                <div class="lg:w-2/3">
                    <form class="space-y-6 bg-gray-50 p-10 rounded-lg border border-gray-200">
                        <div class="grid gap-2">
                            <Label for="amount">Recipient</Label>
                            <Input id="amount" class="mt-1 block w-full" v-model="form.amount" required
                                autocomplete="amount" placeholder="Full amount" />
                            <InputError class="mt-2" :message="form.errors.amount" />
                        </div>


                        <div class="">
                            <Label for="sender_id">Sender Id</Label>
                            <Option v-model:value="selectedCountry" :options="countryOptions"
                                placeholder="Choose a country" />
                        </div>

                        <Label for="message">Body</Label>
                        <TextArea placeholder="Write your thoughts here..." />

                        <div class="flex items-center gap-4">
                            <Button :disabled="form.processing" class="cursor-pointer">Save</Button>

                            <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                                leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                                <p v-show="form.recentlySuccessful" class="text-sm text-neutral-600">Saved.</p>
                            </Transition>
                        </div>
                    </form>
                </div>
                <div class="lg:w-1/3 space-y-5">
                    <h1 class="bg-gray-50 p-10 rounded-lg border border-gray-200 text-center text-xl font-semibold text-gray-700">Blance: $200</h1>

                    <div class="bg-gray-50 rounded-lg border border-gray-200">
                        <h1 class="py-5 text-center text-xl bg-gray-100 font-semibold text-gray-700 border-b border-gray-200">SMS Count</h1>
                        <p class="px-10 py-5 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, saepe? Nam est fugit maxime quis. Reiciendis voluptatibus vel consequatur, libero id et nulla nisi at temporibus sequi soluta, nihil molestiae placeat pariatur saepe dolorum. Mollitia quis voluptates hic laboriosam temporibus.</p>
                    </div>
                </div>
            </div>

        </div>
    </AppLayout>
</template>
