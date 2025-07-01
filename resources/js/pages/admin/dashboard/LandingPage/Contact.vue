<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';
import { Trash2Icon } from 'lucide-vue-next';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Contact',
        href: '/admin/contact',
    },
];

const props = defineProps<{
    contacts: {
        id: number;
        name: string;
        email: string;
        subject: string;
        message: string;
    }[];
    flash: {
        message?: string;
    };
}>();

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'email', label: 'Email' },
    { key: 'subject', label: 'Subject' },
    { key: 'message', label: 'Message' },
    { key: 'action', label: 'Action' },
];

const data = ref(props.contacts);

function deleteContact(id: number) {
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
            router.delete(`/admin/blog/contact/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.contacts;
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

        <Head title="Contact" />
        <!-- Contact Table -->
        <div class="mt-20 mx-14">
            <FlashMessage :message="props.flash.message" />
            <FilterTable :plans="data" :columns="columns" :title="'Contact'">
                <template #message="{ item }">
                    {{ item.message.length > 50 ? item.message.slice(0, 100) + '...' : item.message }}
                </template>
                <template #action="{ item }">
                    <div class="space-x-2.5">
                        <button @click="deleteContact(item.id)"
                            class="text-white bg-red-500 hover:bg-red-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <Trash2Icon class="w-5 h-5" />
                        </button>
                    </div>
                </template>
            </FilterTable>
        </div>
    </AdminAppLayout>
</template>
