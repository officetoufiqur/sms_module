<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';
import { ref } from 'vue';
import { Trash2Icon } from 'lucide-vue-next';
import Swal from 'sweetalert2';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Block User',
        href: '/block_user',
    },
];

const props = defineProps<{
    blockUser: {
        id: number;
        name: string;
        number: string;
    }[];
    flash: {
        message?: string;
    };
}>();

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'number', label: 'Number' },
    { key: 'status', label: 'Status' },
];

const data = ref(props.blockUser);

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
            router.delete(`/block/user/update/${id}`,{
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.blockUser;
                }
            });
        }
    })
}

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Block User" />

        <div class="mt-20 mx-14">
            <FlashMessage :message="props.flash.message" />
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Block User</h1>
                <Link href="/block/user/create" class=" bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Add Block User</Link>
            </div>
            <FilterTable :plans="data" :columns="columns">
                <template #status="{ item }">
                    <button  @click="deleteCustomer(item.id)" class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer"><Trash2Icon class="w-5 h-5" /></button>
                </template>
            </FilterTable>
        </div>

    </AppLayout>
</template>
