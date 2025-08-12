<script setup lang="ts">
import { Head, Link, usePage } from '@inertiajs/vue3';

import HeadingSmall from '@/components/HeadingSmall.vue';
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Customer About',
        href: '/customers/about',
    },
];

const props = defineProps<{
    flash: {
        message?: string;
    };
    user: {
        id: number;
        name: string;
        email: string;
        avatar: string;
        company_name: string;
        company_number: string;
        company_type: string;
        address: string;
        mobile: string;
        file_type: string;
        file: string;
        musking: string;
        non_musking: string;
    };
}>();

const page = usePage();

const currentPath = page.props.ziggy?.location ? new URL(page.props.ziggy.location).pathname : window.location.pathname;

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Customer About" />

        <div class="p-20">
            <div class="flex gap-10">
                <aside class="w-1/6 space-y-3">
                    <Link :href="route('customer.view', props.user.id)" :class="[
                        'block hover:bg-gray-100 duration-300 py-2 pl-4 w-[90%] rounded cursor-pointer font-medium text-sm',
                        currentPath === `/view/customer/${props.user.id}` ? 'bg-gray-100' : ''
                    ]">
                    About
                    </Link>
                    <Link :href="route('customer.rate.plan', props.user.id)" :class="[
                        'block hover:bg-gray-100 duration-300 py-2 pl-4 w-[90%] rounded cursor-pointer font-medium text-sm',
                        currentPath === `/customers/rate/plan/${props.user.id}` ? 'bg-gray-100' : ''
                    ]">
                    Rate Plan
                    </Link>
                </aside>

                <div class="flex flex-col space-y-6 w-5/6">
                    <HeadingSmall title="User information" />

                    <div class="gap-10 border border-gray-300 rounded-lg p-10">

                        <div class="w-full lg:grid lg:grid-cols-2">
                            <div class="flex items-center gap-4 border-b pb-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">Name:</h2>
                                <h3>{{ props.user.name }}</h3>
                            </div>
                            <div class="flex items-center gap-4 border-b py-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">Email:</h2>
                                <h3>{{ props.user.email }}</h3>
                            </div>
                            <div class="flex items-center gap-4 border-b py-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">Company Name:</h2>
                                <h3>{{ props.user.company_name }}</h3>
                            </div>
                            <div class="flex items-center gap-4 border-b py-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">Company Number:</h2>
                                <h3>{{ props.user.company_number }}</h3>
                            </div>
                            <div class="flex items-center gap-4 border-b py-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">Company Type:</h2>
                                <h3>{{ props.user.company_type }}</h3>
                            </div>
                            <div class="flex items-center gap-4 border-b py-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">Address:</h2>
                                <h3>{{ props.user.address }}</h3>
                            </div>
                            <div class="flex items-center gap-4 border-b py-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">Mobile:</h2>
                                <h3>{{ props.user.mobile }}</h3>
                            </div>
                            <div class="flex items-center gap-4 border-b py-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">File Type:</h2>
                                <h3>{{ props.user.file_type }}</h3>
                            </div>
                            <div class="flex items-center gap-4 border-b py-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">Musking Rate:</h2>
                                <h3>{{ props.user.musking }}</h3>
                            </div>
                            <div class="flex items-center gap-4 border-b py-4 border-gray-200">
                                <h2 class="font-medium text-gray-500">Non Musking Rate:</h2>
                                <h3>{{ props.user.non_musking }}</h3>
                            </div>
                        </div>
                        <div class="w-full mt-5">
                            <div>
                                <h3 class="text-lg font-semibold mb-2">Document Image</h3>
                                <img :src="props.user.file" alt="User File"
                                    class="w-[50%] rounded-lg border border-gray-200" />
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </AdminAppLayout>
</template>
