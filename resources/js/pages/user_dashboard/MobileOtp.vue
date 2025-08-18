<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const props = defineProps<{
    email: string;
    flash: {
        message?: string;
    };
}>();
const form = useForm({
    mobile_otp: '',
    email: props.email,
});

const submit = () => {
    form.post(route('mobile.otp.store'));
};
</script>

<template>
    <AuthBase title="Mobile Number Varification Code" description="Otp verification code is sent to your Phone Number">

        <Head title="Otp" />
        <FlashMessage :message="props.flash.message" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <Input  id="email" type="hidden" required :tabindex="2" autocomplete="email" v-model="form.email"
                placeholder="email@example.com" />
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="mobile_otp">Mobile Otp</Label>
                    <Input id="mobile_otp" type="text" required autofocus :tabindex="1" autocomplete="mobile_otp" v-model="form.mobile_otp"
                        placeholder="Enter otp" />
                    <InputError :message="form.errors.mobile_otp" />
                </div>


                <Button type="submit"
                    class="mt-2 w-full cursor-pointer py-6 bg-[#0f79bc] hover:bg-[#4A4745] duration-300" tabindex="5"
                    :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Submit
                </Button>
            </div>
        </form>
    </AuthBase>
</template>
