<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import TextArea from '@/components/my-components/textarea/TextArea.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';

const breadcrumbs: BreadcrumbItem[] = [{ title: 'Send Sms', href: '/send-sms' }];

const props = defineProps<{
    flash: {
        message?: string;
    };
}>();

const form = useForm({
    sender_id: '',
    file: '',
    message: '',
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
            <form @submit.prevent="submit" class="space-y-6 bg-gray-50 p-10 rounded-lg border border-gray-200">
                <div>
                    <Label for="sender_id">Sender Id</Label>
                    <select name="sender_id" v-model="form.sender_id" id="sender_id"
                        class="bg-white border cursor-pointer w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                        <option value="">Select an group</option>
                        <option value="1234567890">1234567890</option>
                    </select>
                </div>
                <div>
                    <Label for="file">File</Label>
                    <Input id="file" type="file" name="file" @input="form.file = $event.target.files[0]"
                        class="mt-1 block w-full cursor-pointer" />
                </div>
                <Label for="message">Body</Label>
                <TextArea v-model="form.message" placeholder="Write your SMS body..." />
                <button type="submit"
                    class="bg-[#0f79bc] text-white cursor-pointer px-4 py-2 rounded hover:bg-[#4a4745]">Submit</button>
            </form>
        </div>
    </AppLayout>
</template>
