<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import HeadingSmall from '@/components/HeadingSmall.vue';
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import SettingsLayout from '@/layouts/settings/AdminLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Customer About',
        href: '/customers/about',
    },
];


</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Customer About" />

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

        </SettingsLayout>
    </AdminAppLayout>
</template>
