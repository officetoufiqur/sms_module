<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon, TrashIcon } from 'lucide-vue-next';
import { router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Blog',
        href: '/admin/blog',
    },
];

const props = defineProps<{
    blogs: {
        id: number;
        name: string;
        title: string;
        sub_title: string;
        description: string;
        image: string;
    }[];
    flash: {
        message?: string;
    };
}>();

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'title', label: 'Title' },
    { key: 'image', label: 'Image' },
    { key: 'sub_title', label: 'Sub Title' },
    { key: 'action', label: 'Action' },
];

const data = ref(props.blogs);

function viewCustomer(id: number) {
    router.visit(`/admin/blog/edit/${id}`);
}

function deleteCustomer(id: number) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(`/admin/blog/delete/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    Swal.fire('Deleted!', 'Plan has been deleted.', 'success');
                    data.value = props.blogs;
                },
                onError: () => {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    })
}

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Blog" />
        <!-- Blog Table -->
        <div class="mt-20 mx-14">
            <FlashMessage :message="props.flash.message" />
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Blog</h1>
                <Link href="/admin/blog/create" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Create</Link>
            </div>
            <FilterTable :plans="data" :columns="columns">
                <template #name="{ item }">
                    {{ item.name }}
                </template>
                <template #image="{ item }">
                    <img :src="item.image" alt="Banner Image" class="h-12 w-32 object-cover rounded" />
                </template>
                <template #action="{ item }">
                    <div class="space-x-2.5">
                        <button @click="viewCustomer(item.id)"
                            class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <EyeIcon class="w-5 h-5" />
                        </button>
                        <button @click="deleteCustomer(item.id)"
                            class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <TrashIcon class="w-5 h-5" />
                        </button>
                    </div>
                </template>
            </FilterTable>
        </div>

    </AdminAppLayout>
</template>
