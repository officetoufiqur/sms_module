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
        title: 'Blog Create',
        href: '/admin/blog/create',
    },
];

const from = useForm({
    title: '',
    sub_title: '',
    description: '',
    image: null,
});

function submit() {
    from.post('/admin/blog/store');
}

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Blog Create" />
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Create Blog Page</h1>
                <Link href="/admin/blog" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back</Link>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg">
                <form @submit.prevent="submit" class="mt-8 space-y-4">
                    <div class="grid gap-2">
                        <Label for="title">Title</Label>
                        <Input
                            id="title"
                            name="title"
                            type="text"
                            v-model="from.title"
                            class="mt-1 block w-full"
                            placeholder="Enter title"
                        />
                        <div class="text-red-500 text-sm" v-if="from.errors.title">{{ from.errors.title }}</div>
                    </div>
                    <div class="grid gap-2">
                        <Label for="sub_title">Sub Title</Label>
                        <Input
                            id="sub_title"
                            name="sub_title"
                            type="text"
                            v-model="from.sub_title"
                            class="mt-1 block w-full"
                            placeholder="Enter sub_title"
                        />
                        <div class="text-red-500 text-sm" v-if="from.errors.sub_title">{{ from.errors.sub_title }}</div>
                    </div>
                    <div class="grid gap-2">
                        <Label for="description">Description</Label>
                        <TextArea
                            id="description"
                            name="description"
                            type="text"
                            v-model="from.description"
                            class="mt-1 block w-full"
                            placeholder="Enter description"
                        />
                        <div class="text-red-500 text-sm" v-if="from.errors.description">{{ from.errors.description }}</div>
                    </div>
                    <div class="grid gap-2">
                        <Label for="image">Image</Label>
                        <Input
                            id="image"
                            name="image"
                            type="file"
                            @input="from.image = $event.target.files[0]"
                            class="mt-1 block w-full cursor-pointer"
                        />
                        <div class="text-red-500 text-sm" v-if="from.errors.image">{{ from.errors.image }}</div>
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
