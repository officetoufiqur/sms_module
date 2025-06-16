<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon, TrashIcon } from 'lucide-vue-next';
import { ref } from 'vue';
import { Input } from '@/components/ui/input';
import Swal from 'sweetalert2';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Group',
        href: '/group',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'action', label: 'Action' },
];

const data = [
    {
        id: 1,
        name: 'test group',
    }
]

function groupContact(id: number) {
    router.visit(`/group/contact/${id}`);
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
                },
                onError: () => {
                    Swal.fire('Error!', 'Something went wrong.', 'error');
                }
            });
        }
    })
}

const openModal = ref(false);

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Group" />

        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Group</h1>
                <button @click="openModal = true"
                    class=" bg-[#0f79bc] cursor-pointer hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Create
                    Group</button>
            </div>

            <div v-if="openModal" class="relative z-10" aria-labelledby="dialog-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl py-8 px-5">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="grid gap-2">
                                    <Label for="title">Create Group</Label>
                                    <Input id="title" name="title" type="text" class="mt-1 block w-full"
                                        placeholder="Enter your group name" />
                                </div>
                            </div>
                            <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="button"
                                    class="inline-flex cursor-pointer w-full justify-center rounded-md bg-[#0f79bc] px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-[#4a4745] sm:ml-3 sm:w-auto">Submit</button>
                                <button @click="openModal = false" type="button"
                                    class="inline-flex cursor-pointer w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Cancle</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <FilterTable :plans="data" :columns="columns">
                <template #action="{ }">
                    <div class="space-x-2">
                        <button @click="groupContact(1)"
                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <EyeIcon class="w-5 h-5" />
                        </button>
                        <button
                            @click="deleteCustomer(1)"
                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <TrashIcon class="w-5 h-5" />
                        </button>
                    </div>
                </template>

            </FilterTable>
        </div>

    </AppLayout>
</template>
