<script setup lang="ts">
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'View Pending KYC',
        href: '/admin/pending/kyc',
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

const form = useForm({
    musking: props.user.musking,
    non_musking: props.user.non_musking,
});

const submit = () => {
    router.post(`/admin/approve/kyc/${props.user.id}`, form.data());
};

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="View Pending KYC" />

        <div class="mt-20 mx-14 space-y-6">
            <!-- Header -->
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-semibold text-slate-700">View User Information</h1>
                <Link href="/admin/pending/kyc"
                    class="bg-[#0f79bc] hover:bg-[#4a4745] px-6 py-2 text-white rounded-md ml-5">Back</Link>
            </div>

            <div class="gap-6 border bg-white border-gray-200 rounded-lg p-6">
                <div class="flex gap-10">

                    <div class="w-full">
                        <div class="flex items-center gap-4 border-b pb-4 border-gray-200">
                            <h2 class="font-medium text-gray-500">Name:</h2>
                            <h3>{{ props.user.name }}</h3>
                        </div>
                        <div class="flex items-center gap-4 border-b pb-4 border-gray-200">
                            <h2 class="font-medium text-gray-500">Email:</h2>
                            <h3>{{ props.user.email }}</h3>
                        </div>
                        <div class="flex items-center gap-4 border-b pb-4 border-gray-200">
                            <h2 class="font-medium text-gray-500">Company Name:</h2>
                            <h3>{{ props.user.company_name }}</h3>
                        </div>
                        <div class="flex items-center gap-4 border-b pb-4 border-gray-200">
                            <h2 class="font-medium text-gray-500">Company Number:</h2>
                            <h3>{{ props.user.company_number }}</h3>
                        </div>
                        <div class="flex items-center gap-4 border-b pb-4 border-gray-200">
                            <h2 class="font-medium text-gray-500">Company Type:</h2>
                            <h3>{{ props.user.company_type }}</h3>
                        </div>
                        <div class="flex items-center gap-4 border-b pb-4 border-gray-200">
                            <h2 class="font-medium text-gray-500">Address:</h2>
                            <h3>{{ props.user.address }}</h3>
                        </div>
                        <div class="flex items-center gap-4 border-b pb-4 border-gray-200">
                            <h2 class="font-medium text-gray-500">Mobile:</h2>
                            <h3>{{ props.user.mobile }}</h3>
                        </div>
                    </div>
                    <div class="w-full">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Document Image</h3>
                            <img :src="props.user.file" alt="User File" class="w-[68%] rounded-lg border border-gray-200" />
                        </div>
                    </div>

                </div>
                <div class="mt-10">
                    <form @submit.prevent="submit" class="mt-6">
                        <div class="lg:flex gap-5">
                            <div class="w-full">
                                <label for="musking">Musking Rate</label>
                                <input
                                    id="musking"
                                    type="number"
                                    v-model="form.musking"
                                    name="musking"
                                    class="border w-full border-gray-300 px-5 py-2.5 mt-2 rounded-lg"
                                />
                            </div>
                            <div class="w-full">
                                <label for="non_musking">Non Musking Rate</label>
                                <input
                                    id="non_musking"
                                    type="number"
                                    v-model="form.non_musking"
                                    name="non_musking"
                                    class="border w-full border-gray-300 px-5 mt-2 py-2.5 rounded-lg"
                                />
                            </div>
                        </div>
                        <div class="flex space-x-5 justify-end mt-5">
                            <button
                                type="submit"
                                class="py-2.5 px-6 cursor-pointer rounded text-white bg-[#0f79bc] hover:bg-[#4A4745] duration-300"
                            >
                                Approve
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AdminAppLayout>
</template>
