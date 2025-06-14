<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';
import { Link } from '@inertiajs/vue3';
import TextArea from '@/components/my-components/textarea/TextArea.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Faqs Create',
        href: '/admin/faqs/create',
    },
];

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Faqs Create" />
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Create Faqs Page</h1>
                <Link href="/admin/faqs" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back</Link>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg">
                <form class="mt-8 space-y-4">
                    <div class="grid gap-2">
                        <Label for="question">Question</Label>
                        <Input
                            id="question"
                            name="question"
                            type="text"
                            class="mt-1 block w-full"
                            placeholder="Enter question"
                        />
                        <!-- <InputError :message="form.errors.question" /> -->
                    </div>
                    <div class="grid gap-2">
                        <Label for="answer">Answer</Label>
                        <TextArea
                            id="answer"
                            name="answer"
                            type="text"
                            class="mt-1 block w-full"
                            placeholder="Enter answer"
                        />
                        <!-- <InputError :message="form.errors.answer" /> -->
                    </div>
                    <div class="grid gap-2">
                        <Label for="image">Image</Label>
                        <Input
                            id="image"
                            name="image"
                            type="file"
                            class="mt-1 block w-full cursor-pointer"
                        />
                        <!-- <InputError :message="form.errors.current_password" /> -->
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
