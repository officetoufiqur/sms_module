<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon, TrashIcon } from 'lucide-vue-next';
import { router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Blog',
        href: '/admin/blog',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'date', label: 'Date' },
    { key: 'author', label: 'Author' },
    { key: 'title', label: 'Title' },
    { key: 'image', label: 'Image' },
    { key: 'sub_title', label: 'Sub Title' },
    { key: 'action', label: 'Action' },
];

const data = [
    {
        id: 1,
        date: '2023-10-01',
        author: 'John Doe',
        title: 'Masking SMS',
        sub_title: 'A comprehensive guide to SMS masking',
        image: 'https://picsum.photos/200/300',
    }
]

function viewCustomer(id: number) {
    router.visit(`/admin/blog/edit/${id}`);
}

function deleteCustomer() {
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
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            );
        }
    })
}

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Blog" />
        <!-- Blog Table -->
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Blog</h1>
                <Link href="/admin/blog/create" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Create</Link>
            </div>
            <FilterTable :plans="data" :columns="columns">
                <template #image="{ item }">
                    <img :src="item.image" alt="Banner Image" class="h-12 w-32 object-cover rounded" />
                </template>
                <template #action="{ }">
                    <div class="space-x-2.5">
                        <button @click="viewCustomer(1)"
                            class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <EyeIcon class="w-5 h-5" />
                        </button>
                        <button @click="deleteCustomer()"
                            class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <TrashIcon class="w-5 h-5" />
                        </button>
                    </div>
                </template>
            </FilterTable>
        </div>

    </AdminAppLayout>
</template>
