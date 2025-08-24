<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Label } from '@/components/ui/label';
import TextArea from '@/components/my-components/textarea/TextArea.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';
import FlashErrorMessage from '@/components/my-components/FlashErrorMessage.vue';
import { computed } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Send Sms',
        href: '/send-sms',
    },
];

const props = defineProps<{
    flash: {
        message?: string;
        error?: string;
    };
    senderId: {
        id: number;
        sender_id: string;
    }[];
    balence: number;
}>();

const form = useForm({
    sender_id: '',
    message: '',
    number: '',
});

const amount = Number(parseFloat(props.balence.toString()).toFixed(2));


const smsLength = 160;
const smsCount = computed(() => {
    if (!form.message) return 0;
    return Math.ceil(form.message.length / smsLength);
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
        <FlashErrorMessage :error="props.flash.error" />

        <div class="mt-[5rem] lg:mx-[5rem] mx-[3rem]">
            <h1 class="text-2xl font-semibold text-gray-700">Send Sms</h1>

            <div class="lg:flex justify-between gap-5 mt-5 space-y-10 lg:space-y-0">
                <div class="lg:w-2/3">
                    <form @submit.prevent="submit" class="space-y-6 bg-gray-50 p-10 rounded-lg border border-gray-200">
                        <div>
                            <Label for="sender_id">Sender Id</Label>
                            <select name="sender_id" v-model="form.sender_id" id="sender_id"
                                class="bg-white mt-2 border cursor-pointer w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                                <option value="">Select a group</option>
                                <option v-for="item in senderId" :key="item.id" :value="item.sender_id">
                                    {{ item.sender_id }}
                                </option>
                            </select>

                            <div class="text-red-500 text-sm" v-if="form.errors.sender_id">{{ form.errors.sender_id }}
                            </div>
                        </div>
                        <div>
                            <Label for="number">Mobile Number <span><span class="text-red-600">*</span></span></Label>
                            <textarea name="number" v-model="form.number" id="number"
                                class="bg-white mt-2 border w-full border-gray-200 text-gray-900 text-sm rounded-lg block px-3 pt-2 h-20"
                                placeholder="Enter mobile number"></textarea>
                            <div class="text-red-500 text-sm" v-if="form.errors.number">{{ form.errors.number }}
                            </div>
                            <p class="text-gray-400 mt-2">Use comma (,) to separate multiple numbers</p>
                        </div>
                        <div>
                            <Label for="message" class="mb-2">Body</Label>
                            <TextArea v-model="form.message" placeholder="Write your SMS body..." />
                            <div class="text-red-500 text-sm" v-if="form.errors.message">{{ form.errors.message }}</div>
                        </div>

                        <h5 class="text-sm text-gray-600">{{ smsCount }} SMS</h5>

                        <button type="submit"
                            class="bg-[#0f79bc] text-white cursor-pointer px-4 py-2 rounded hover:bg-[#4a4745]">Submit</button>
                    </form>
                </div>
                <div class="lg:w-1/3 space-y-5">
                    <h1
                        class="bg-gray-50 p-10 rounded-lg border border-gray-200 text-center text-xl font-semibold text-gray-700">
                        Blance: <strong class="text-[#0f79bc] pl-2">{{ amount }}</strong></h1>

                    <div class="bg-gray-50 rounded-lg border border-gray-200">
                        <h1
                            class="py-5 text-center text-xl bg-gray-100 font-semibold text-gray-700 border-b border-gray-200">
                            SMS Count Rules</h1>
                        <div class="px-10 py-5 text-justify space-y-3">
                            <p>SMS segments are counted based on the type of characters in your
                                message:</p>
                            <ul class="space-y-2">
                                <li class="flex items-start gap-2">
                                    <span class="text-3xl rounded-full">•</span>
                                    160 Characters are counted as 1 SMS in case of English language & 70 in other
                                    language.
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-3xl rounded-full">•</span>
                                    One simple text message containing extended GSM character set (~^{}[]|) is 70
                                    characters long.
                                </li>
                                <li class="flex items-start gap-2">
                                    <span class="text-3xl rounded-full">•</span>
                                    Tip: Always check your SMS count before sending to avoid unexpected segment charges.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </AppLayout>
</template>
