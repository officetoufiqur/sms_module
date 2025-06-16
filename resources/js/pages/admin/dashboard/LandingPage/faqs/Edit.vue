<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';
import { Link } from '@inertiajs/vue3';
import TextArea from '@/components/my-components/textarea/TextArea.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Faqs Edit',
        href: '/admin/faqs/edit',
    },
];

const props = defineProps<{
    faq: {
        id: number;
        question: string;
        answer: string;
    };
}>();

const form = useForm({
    question: props.faq.question,
    answer: props.faq.answer,
});

function submit() {
    form.post(`/admin/faqs/update/${props.faq.id}`);
}

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Faqs Edit" />
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Edit Faqs Page</h1>
                <Link href="/admin/faqs" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back</Link>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg">
                <form @submit.prevent="submit" class="mt-8 space-y-4">
                    <div class="grid gap-2">
                        <Label for="question">Question</Label>
                        <Input
                            id="question"
                            name="question"
                            type="text"
                            v-model="form.question"
                            class="mt-1 block w-full"
                            placeholder="Enter question"
                        />
                        <div class="text-red-500 text-sm" v-if="form.errors.question">{{ form.errors.question }}</div>
                    </div>
                    <div class="grid gap-2">
                        <Label for="answer">Answer</Label>
                        <TextArea
                            id="answer"
                            name="answer"
                            type="text"
                            v-model="form.answer"
                            class="mt-1 block w-full"
                            placeholder="Enter answer"
                        />
                        <div class="text-red-500 text-sm" v-if="form.errors.answer">{{ form.errors.answer }}</div>
                    </div>

                    <div class="flex items-center gap-4">
                        <Button class="bg-[#0f79bc] hover:bg-[#4a4745] cursor-pointer">Update</Button>

                        <Transition
                            enter-active-class="transition ease-in-out"
                            enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out"
                            leave-to-class="opacity-0"
                        >
                        </Transition>
                    </div>
                </form>
            </div>
        </div>
    </AdminAppLayout>
</template>
