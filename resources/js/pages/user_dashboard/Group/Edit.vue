<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import Select from '@/components/my-components/Select.vue';
import { Input } from '@/components/ui/input';
import { ref } from 'vue';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Group Contact',
        href: '/group/contact',
    },
];

const selectedOption = ref('')
const selectOptions = [
    { value: 'apple', label: 'Apple' },
    { value: 'banana', label: 'Banana' },
    { value: 'cherry', label: 'Cherry' }
]

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Blog Edit" />
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Edit Blog Page</h1>
                <Link href="/group/contact/1" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back
                </Link>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg">
                <form class="mt-8 space-y-4">
                    <div class="grid gap-2">
                        <Label for="title">Name (optional)</Label>
                        <Input id="title" name="title" type="text" class="mt-1 block w-full" placeholder="Enter name" />
                    </div>
                    <div class="grid gap-2 mt-2">
                        <Label for="title">Mobile <span class="text-red-600">*</span></Label>
                        <Input id="title" name="title" type="text" class="mt-1 block w-full"
                            placeholder="Enter mobile number" />
                    </div>
                    <div class="grid gap-2 mt-2">
                        <Label for="title">Emial (optional)</Label>
                        <Input id="title" name="title" type="text" class="mt-1 block w-full"
                            placeholder="Enter email" />
                    </div>
                    <div class="grid gap-2 mt-2">
                        <Label for="title">Select Group <span class="text-red-600">*</span></Label>
                        <Select v-model:value="selectedOption" :options="selectOptions" placeholder="Select an group" />
                    </div>

                    <div class="flex items-center gap-4 mt-5">
                        <Button class="bg-[#0f79bc] hover:bg-[#4a4745] cursor-pointer text-white px-5 py-2 rounded-lg text-sm">Update</Button>

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

    </AppLayout>
</template>
