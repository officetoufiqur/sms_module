<script setup lang="ts">
import { Head, router, Link, useForm } from '@inertiajs/vue3';

import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon, TrashIcon } from 'lucide-vue-next';
import { ref } from 'vue';
import { Input } from '@/components/ui/input';
import Swal from 'sweetalert2';
import FlashMessage from '@/components/my-components/FlashMessage.vue';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Group Contact',
        href: '/group/contact',
    },
];

const props = defineProps<{
    userGroup: {
        id: number;
        group_name: string;
    }[];
    groupContacts: {
        id: number;
        name: string;
        mobile: string;
        email: string;
        group: string;
    }[];
    flash: {
        message?: string;
    };
}>();

const columns = [
    { key: 'id', label: 'ID' },
    { key: 'name', label: 'Name' },
    { key: 'mobile', label: 'Mobile' },
    { key: 'email', label: 'Email' },
    { key: 'group', label: 'Group Name' },
    { key: 'action', label: 'Action' },
];

const data = ref(props.groupContacts);


const openModal = ref(false);

function editContact(id: number) {
    router.visit(`/group/contact/edit/${id}`);
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
            router.delete(`/group/contact/delete/${id}`, {
                preserveScroll: true,
                onSuccess: () => {
                    data.value = props.groupContacts;
                }
            });
        }
    })
}

const form = useForm({
    name: '',
    mobile: '',
    email: '',
    group_id: ''
});


function submit() {
    form.post('/group/contact/store', {
        onSuccess: () => {
            openModal.value = false;
            form.reset();
            data.value = props.groupContacts;
        }
    });
}

</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">

        <Head title="Group Contact" />

        <FlashMessage :message="props.flash.message" />
        <div class="mt-20 mx-14">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-slate-900">Group Contact</h1>
                <div class="flex items-center gap-3">
                    <Link href="/group" class=" bg-blue-500 hover:bg-blue-600 px-6 py-2 text-white rounded-md">Back
                    </Link>
                    <button @click="openModal = true"
                        class=" bg-[#0f79bc] cursor-pointer hover:bg-[#4a4745] px-6 py-2 text-white rounded-md">Add
                        Contact</button>
                </div>
            </div>

            <!-- create modal -->
            <div v-if="openModal" class="relative z-10" aria-labelledby="dialog-title" role="dialog" aria-modal="true">
                <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>

                <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                        <div
                            class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-3xl pt-8 pb-4 px-5">
                            <h1 class="text-xl font-semibold text-gray-600">Add Group Contact</h1>
                            <hr class="mt-4" />
                            <form @submit.prevent="submit">
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <div class="grid gap-2">
                                        <Label for="title">Name (optional)</Label>
                                        <Input id="title" name="title" type="text" v-model="form.name" class="mt-1 block w-full"
                                            placeholder="Enter name" />
                                        <div class="text-red-500 text-sm" v-if="form.errors.name">{{ form.errors.name }}</div>
                                    </div>
                                    <div class="grid gap-2 mt-2">
                                        <Label for="title">Mobile <span class="text-red-600">*</span></Label>
                                        <Input id="title" name="title" type="text" v-model="form.mobile" class="mt-1 block w-full"
                                            placeholder="Enter mobile number" />
                                        <div class="text-red-500 text-sm" v-if="form.errors.mobile">{{ form.errors.mobile }}</div>
                                    </div>
                                    <div class="grid gap-2 mt-2">
                                        <Label for="title">Emial (optional)</Label>
                                        <Input id="title" name="title" v-model="form.email" type="text" class="mt-1 block w-full"
                                            placeholder="Enter email" />
                                        <div class="text-red-500 text-sm" v-if="form.errors.email">{{ form.errors.email }}</div>
                                    </div>
                                    <div class="grid gap-2 mt-2">
                                        <Label for="title">Select Group <span class="text-red-600">*</span></Label>
                                        <select name="group_id" v-model="form.group_id" id="group_id" class="bg-white border cursor-pointer w-full border-gray-200 text-gray-900 text-sm rounded-lg block p-3">
                                            <option value="">Select an group</option>
                                            <option v-for="group in props.userGroup" :key="group.group_name" :value="group.id">
                                                {{ group.group_name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="mb-4" />
                                <div class="px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    <button type="submit"
                                        class="inline-flex cursor-pointer w-full justify-center rounded-md bg-[#0f79bc] px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-[#4a4745] sm:ml-3 sm:w-auto">Submit</button>
                                    <button @click="openModal = false" type="button"
                                        class="inline-flex cursor-pointer w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 sm:ml-3 sm:w-auto">Cancle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <FilterTable :plans="data" :columns="columns">
                <template #group="{ item }">
                    <span class="text-gray-600 font-semibold">{{ item.group.group_name }}</span>
                </template>
                <template #name="{ item }">
                    <span class="text-gray-600 font-semibold">{{ item.name ? item.name : 'N/A' }}</span>
                </template>
                <template #email="{ item }">
                    <span class="text-gray-600 font-semibold">{{ item.email ? item.email : 'N/A' }}</span>
                </template>
                <template #action="{ item }">
                    <div class="space-x-2">
                        <button @click="editContact(item.id)"
                            class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <EyeIcon class="w-5 h-5" />
                        </button>
                        <button @click="deleteCustomer(item.id)"
                            class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                            <TrashIcon class="w-5 h-5" />
                        </button>
                    </div>
                </template>

            </FilterTable>


        </div>

    </AppLayout>
</template>
