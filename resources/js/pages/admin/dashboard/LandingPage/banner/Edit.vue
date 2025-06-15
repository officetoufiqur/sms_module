<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Input } from '@/components/ui/input';
import { Button } from '@/components/ui/button';
import { Label } from '@/components/ui/label';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Banner Edit',
        href: '/admin/banner/edit',
    },
];

const props = defineProps<{
    banner: {
        id: number;
        title: string;
        sub_title: string;
        image: string;
    };
}>();

const form = useForm({
    title: props.banner.title,
    sub_title: props.banner.sub_title,
    image: null,
});

function submit() {
    form.post(`/admin/banner/update/${props.banner.id}`);
}
</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">
        <Head title="Banner Edit" />
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Edit Banner</h1>
                <Link href="/admin/banner" class="bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back</Link>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg">
                <form @submit.prevent="submit" class="mt-8 space-y-4">
                    <div class="grid gap-2">
                        <Label for="title">Title</Label>
                        <Input id="title" name="title" type="text" v-model="form.title" placeholder="Enter title" />
                        <div v-if="form.errors.title" v-text="form.errors.title" class="text-red-500 text-xs mt-1"></div>
                    </div>

                    <div class="grid gap-2">
                        <Label for="sub_title">Sub Title</Label>
                        <Input id="sub_title" name="sub_title" type="text" v-model="form.sub_title" placeholder="Enter sub title" />
                        <div v-if="form.errors.sub_title" v-text="form.errors.sub_title" class="text-red-500 text-xs mt-1"></div>
                    </div>

                    <div class="grid gap-2">
                        <Label for="image">Image</Label>
                        <Input
                            id="image"
                            name="image"
                            type="file"
                            @input="form.image = $event.target.files[0]"
                            class="cursor-pointer"
                        />
                        <img :src="props.banner.image" alt="banner image" class="mt-2 h-32 w-32 object-cover rounded" />
                    </div>

                    <div class="flex items-center gap-4">
                        <Button class="bg-[#0f79bc] hover:bg-[#4a4745] cursor-pointer">Update</Button>
                    </div>
                </form>
            </div>
        </div>
    </AdminAppLayout>
</template>
