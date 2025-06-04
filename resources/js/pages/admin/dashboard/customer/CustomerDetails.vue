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

interface Props {
    mustVerifyEmail: boolean;
    status?: string;
}

defineProps<Props>();

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Customer Details',
        href: '/settings/profile',
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

        <Head title="Customer Details" />

        <SettingsLayout>
            <div class="flex flex-col space-y-6">
                <HeadingSmall title="User information" />

                <div class="relative overflow-x-auto sm:rounded-lg bg-white border border-gray-200">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
                        <tbody>
                            <tr class="border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Name
                                </th>
                                <td class="px-6 py-4">
                                    Toufiqur
                                </td>
                            </tr>

                            <tr class="border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Mobile
                                </th>
                                <td class="px-6 py-4">
                                    01712345678
                                </td>
                            </tr>
                            <tr class="border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Email
                                </th>
                                <td class="px-6 py-4">
                                    user@user.com
                                </td>
                            </tr>
                            <tr class="border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Company
                                </th>
                                <td class="px-6 py-4">
                                    Sanmo
                                </td>
                            </tr>
                            <tr class="border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    NID
                                </th>
                                <td class="px-6 py-4">
                                    12345678901234567
                                </td>
                            </tr>

                            <tr class="border-b dark:border-gray-700 border-gray-200">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Date of Birth
                                </th>
                                <td class="px-6 py-4">
                                    2000-01-01
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>


                <div class="flex items-center justify-between space-x-3">
                    <div class="bg-white dark:bg-gray-800 shadow space-y-3 p-4 rounded-lg border border-gray-200">
                        <HeadingSmall title="Front Side Of NID" />
                        <img src="https://www.researchgate.net/profile/Sabbir-Saleh-2/publication/340400343/figure/fig1/AS:876947160707073@1586091904827/The-format-of-NID-card-in-Bangladesh-26.jpg"
                            alt="">
                    </div>
                    <div class="bg-white dark:bg-gray-800 shadow space-y-3 p-4 rounded-lg border border-gray-200">
                        <HeadingSmall title="Front Side Of NID" />
                        <img src="https://www.researchgate.net/profile/Sabbir-Saleh-2/publication/340400343/figure/fig1/AS:876947160707073@1586091904827/The-format-of-NID-card-in-Bangladesh-26.jpg"
                            alt="">
                    </div>
                    <div class="bg-white dark:bg-gray-800 shadow space-y-3 p-4 rounded-lg border border-gray-200">
                        <HeadingSmall title="Front Side Of NID" />
                        <img src="https://www.researchgate.net/profile/Sabbir-Saleh-2/publication/340400343/figure/fig1/AS:876947160707073@1586091904827/The-format-of-NID-card-in-Bangladesh-26.jpg"
                            alt="">
                    </div>
                </div>

            </div>

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
