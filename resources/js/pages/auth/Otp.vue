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
    otp: '',
    email: props.email,
});

const submit = () => {
    form.post(route('otp.store'));
};
</script>

<template>
    <AuthBase title="Varification Code" description="Otp verification code is sent to your email">

        <Head title="Otp" />
        <FlashMessage :message="props.flash.message" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <Input  id="email" type="hidden" required :tabindex="2" autocomplete="email" v-model="form.email"
                placeholder="email@example.com" />
            <div class="grid gap-6">
                <div class="grid gap-2">
                    <Label for="otp">Otp</Label>
                    <Input id="otp" type="text" required autofocus :tabindex="1" autocomplete="otp" v-model="form.otp"
                        placeholder="Enter otp" />
                    <InputError :message="form.errors.otp" />
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
