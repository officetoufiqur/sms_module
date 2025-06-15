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
        title: 'About Edit',
        href: '/admin/about/edit',
    },
];

const props = defineProps<{
    about: {
        id: number;
        title: string;
        description: string;
        image: string;
    };
}>();

const form = useForm({
    title: props.about.title,
    description: props.about.description,
    image: null,
});

function submit() {
    form.post('/admin/about/update');
}

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="About Edit" />
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Edit About Page</h1>
                <Link href="/admin/about" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Back
                </Link>
            </div>
            <div class="bg-gray-50 border border-gray-200 p-6 rounded-lg">
                <form @submit.prevent="submit" class="mt-8 space-y-4">
                    <div class="grid gap-2">
                        <Label for="title">Title</Label>
                        <Input id="title" name="title" type="text" v-model="form.title" class="mt-1 block w-full"
                            placeholder="Enter title" />
                        <div v-if="form.errors.title">{{ form.errors.title }}</div>
                    </div>
                    <div class="grid gap-2">
                        <Label for="description">Description</Label>
                        <TextArea id="description" name="description" type="text" class="mt-1 block w-full"
                            v-model="form.description" placeholder="Enter description" />
                        <div v-if="form.errors.description">{{ form.errors.description }}</div>
                    </div>
                    <div class="grid gap-2">
                        <Label for="image">Image</Label>
                        <Input id="image" name="image"  @input="form.image = $event.target.files[0]" type="file" class="mt-1 block w-full cursor-pointer" />
                        <div v-if="form.errors.image">{{ form.errors.image }}</div>
                        <img :src="props.about.image" alt="about image" class="h-12 w-32 object-cover rounded mt-2" />
                    </div>

                    <div class="flex items-center gap-4">
                        <Button class="bg-[#0f79bc] hover:bg-[#4a4745] cursor-pointer">Update</Button>

                        <Transition enter-active-class="transition ease-in-out" enter-from-class="opacity-0"
                            leave-active-class="transition ease-in-out" leave-to-class="opacity-0">
                        </Transition>
                    </div>
                </form>
            </div>
        </div>
    </AdminAppLayout>
</template>
