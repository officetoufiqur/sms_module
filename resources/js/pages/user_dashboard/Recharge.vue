<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

import HeadingSmall from '@/components/HeadingSmall.vue';
import InputError from '@/components/InputError.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';

interface Props {
    mustVerifyEmail: boolean;
    status?: string;
}

defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Balance Recharge',
        href: '/recharge',
    },
];


const form = useForm({
    amount: "",
});

const submit = () => {
    form.patch(route(''), {
        preserveScroll: true,
    });
};
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Head title="Balance Recharge" />

         <div class="flex flex-col space-y-6 mt-[5rem] ml-[5rem]">
                <HeadingSmall title="Balance Recharge" />

                <form @submit.prevent="submit" class="space-y-6">
                    <div class="grid gap-2">
                        <Label for="amount">Amount</Label>
                        <Input id="amount" class="mt-1 block w-[50rem]" v-model="form.amount" required autocomplete="amount" placeholder="Full amount" />
                        <InputError class="mt-2" :message="form.errors.amount" />
                    </div>

                    <div class="flex items-center gap-4">
                        <Button :disabled="form.processing" class="cursor-pointer">Save</Button>

                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                            <p v-show="form.recentlySuccessful" class="text-sm text-neutral-600">Saved.</p>
                        </Transition>
                    </div>
                </form>
            </div>
    </AppLayout>
</template>
