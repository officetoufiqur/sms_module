<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import HeadingSmall from '@/components/HeadingSmall.vue';
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import SettingsLayout from '@/layouts/settings/AdminLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon, TrashIcon } from 'lucide-vue-next';
import { router } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Rate Plans',
        href: '/customers/rate/plan',
    },
];

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'mobile', label: 'Mobile' },
    { key: 'action', label: 'Action' },
];

const data = [
    {
        id: 1,
        name: 'Toufiqur',
        mobile: '01712345678'
    }
]

function viewCustomer(id: number) {
    router.visit(`/admin/manage/customer/${id}`);
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

        <Head title="Rate Plans" />

        <SettingsLayout>
            <HeadingSmall title="Rate Plans" />
            <!-- Rate Plans Table -->
            <div>
                <FilterTable :plans="data" :columns="columns" :title="'Rate Plans'">
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

        </SettingsLayout>
    </AdminAppLayout>
</template>
