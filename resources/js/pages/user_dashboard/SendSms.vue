<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Label } from '@/components/ui/label';
import TextArea from '@/components/my-components/textarea/TextArea.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Send Sms',
        href: '/send-sms',
    },
];

const props = defineProps<{
    flash: {
        message?: string;
    };
}>();

const form = useForm({
    sender_id: '',
    message: '',
    gender: '',
    name: '',
    number: '',
});

const submit = () => {
    form.post('/send-sms-store', {
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        }
    });
};

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Send Sms" />

        <FlashMessage :message="props.flash.message" />
        <div class="mt-[5rem] lg:mx-[5rem] mx-[3rem]">
            <h1 class="text-2xl font-semibold text-gray-700">Send Sms</h1>

            <div class="lg:flex justify-between gap-5 mt-5 space-y-10 lg:space-y-0">
                <div class="lg:w-2/3">
                    <form @submit.prevent="submit" class="space-y-6 bg-gray-50 p-10 rounded-lg border border-gray-200">
                        <div>
                            <Label for="sender_id">Sender Id</Label>
                            <select name="sender_id" v-model="form.sender_id" id="sender_id"
                                class="bg-white mt-2 border cursor-pointer w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                                <option value="">Select an group</option>
                                <option value="1234567890">1234567890</option>
                            </select>
                            <div class="text-red-500 text-sm" v-if="form.errors.sender_id">{{ form.errors.sender_id }}
                            </div>
                        </div>
                        <div>
                            <Label for="name">Name</Label>
                            <input type="text" name="name" v-model="form.name" id="name" class="bg-white mt-2 border w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                            <div class="text-red-500 text-sm" v-if="form.errors.name">{{ form.errors.name }}
                            </div>
                        </div>
                        <div>
                            <Label for="number">Mobile Number <span><span class="text-red-600">*</span></span></Label>
                             <input type="text" name="number" v-model="form.number" id="number" class="bg-white mt-2 border w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                            <div class="text-red-500 text-sm" v-if="form.errors.number">{{ form.errors.number }}
                            </div>
                        </div>
                        <div>
                            <Label for="gender">Gender</Label>
                            <select name="gender" v-model="form.gender" id="gender"
                                class="bg-white mt-2 border cursor-pointer w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                                <option value="">Select an Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="text-red-500 text-sm" v-if="form.errors.gender">{{ form.errors.gender }}</div>
                        </div>
                        <div>
                            <Label for="message" class="mb-2">Body</Label>
                            <TextArea v-model="form.message" placeholder="Write your SMS body..." />
                            <div class="text-red-500 text-sm" v-if="form.errors.message">{{ form.errors.message }}</div>
                        </div>

                        <h5 class="text-sm text-gray-600">0 SMS</h5>
                        <button type="submit"
                            class="bg-[#0f79bc] text-white cursor-pointer px-4 py-2 rounded hover:bg-[#4a4745]">Submit</button>
                    </form>
                </div>
                <div class="lg:w-1/3 space-y-5">
                    <h1
                        class="bg-gray-50 p-10 rounded-lg border border-gray-200 text-center text-xl font-semibold text-gray-700">
                        Blance: $200</h1>

                    <div class="bg-gray-50 rounded-lg border border-gray-200">
                        <h1
                            class="py-5 text-center text-xl bg-gray-100 font-semibold text-gray-700 border-b border-gray-200">
                            SMS Count</h1>
                        <p class="px-10 py-5 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed,
                            saepe? Nam est fugit maxime quis. Reiciendis voluptatibus vel consequatur, libero id et
                            nulla nisi at temporibus sequi soluta, nihil molestiae placeat pariatur saepe dolorum.
                            Mollitia quis voluptates hic laboriosam temporibus.</p>
                    </div>
                </div>
            </div>

        </div>
    </AppLayout>
</template>
