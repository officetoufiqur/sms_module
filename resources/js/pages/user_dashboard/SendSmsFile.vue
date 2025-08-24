<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import TextArea from '@/components/my-components/textarea/TextArea.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';
import { computed } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [{ title: 'Send Sms', href: '/send-sms' }];

const props = defineProps<{
    flash: {
        message?: string;
    };
    senderId: {
        id: number;
        sender_id: string;
    }[];
    balence: number;
}>();

const form = useForm({
    sender_id: '',
    file: '',
    message: '',
});

const amount = Number(parseFloat(props.balence.toString()).toFixed(2));

const smsLength = 160;
const smsCount = computed(() => {
    if (!form.message) return 0;
    return Math.ceil(form.message.length / smsLength);
});

const submit = () => {
    form.post('/send-sms-file', {
        forceFormData: true,
        preserveScroll: true,
        onSuccess: () => {
            form.reset();
        }
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Send Sms File" />
        <div class="mt-[5rem] lg:mx-[5rem] mx-[3rem]">
            <FlashMessage :message="props.flash.message" />
            <h1 class="text-2xl font-semibold text-gray-700">Send Sms File</h1>
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
                        <!-- <div>
                            <Label for="age">age</Label>
                            <Input id="age" type="text" name="age" class="block mt-2 w-full cursor-pointer" />
                            <div class="text-red-500 text-sm" v-if="form.errors.age">{{ form.errors.age }}</div>
                        </div> -->
                        <div>
                            <Label for="file">File</Label>
                            <Input id="file" type="file" name="file" @input="form.file = $event.target.files[0]"
                                class="block mt-2 w-full cursor-pointer" />
                            <div class="text-red-500 text-sm" v-if="form.errors.file">{{ form.errors.file }}</div>
                        </div>
                        <!-- <div>
                            <Label for="gender">Gender</Label>
                            <select name="gender" v-model="form.gender" id="gender"
                                class="bg-white mt-2 border cursor-pointer w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                                <option value="">Select an Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <div class="text-red-500 text-sm" v-if="form.errors.gender">{{ form.errors.gender }}</div>
                        </div> -->
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
