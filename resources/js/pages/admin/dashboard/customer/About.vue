<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';

import HeadingSmall from '@/components/HeadingSmall.vue';
import AdminAppLayout from '@/layouts/AdminAppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { ref } from 'vue';
import FilterTable from '@/components/home/FilterTable.vue';
import { EyeIcon, SquarePenIcon } from 'lucide-vue-next';
import Modal from '@/components/my-components/Modal.vue';
import InputLabel from '@/components/my-components/InputLabel.vue';
import FlashMessage from '@/components/my-components/FlashMessage.vue';

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
    transection:{
        id: number;
        plan_name: string;
        amount: string;
    }[];
}>();

interface Rate {
    id: number;
    musking: string;
    non_musking: string;
    action?: string;
}

const columnsRate: { key: keyof Rate; label: string }[] = [
    { key: 'id', label: 'ID' },
    { key: 'musking', label: 'musking' },
    { key: 'non_musking', label: 'non_musking' },
    { key: 'action', label: 'Action' },
];

const dataRate = ref<Rate[]>([
    {
        id: props.user.id,
        musking: props.user.musking,
        non_musking: props.user.non_musking,
    }
]);



const columnsTr =  [
    { key: 'id', label: 'ID' },
    { key: 'plan_name', label: 'Plan Name' },
    { key: 'amount', label: 'Amount' },
];

function viewCustomer(id: number) {
    router.visit(`/admin/manage/customer/${id}`);
}

const currentStep = ref('about');
const openRateModal = ref(false);

const steps = [
    { key: 'about', label: 'About' },
    { key: 'rate', label: 'Rate Plan' },
    { key: 'transition', label: 'Transition' },
];

const form = ref({
    musking: props.user.musking,
    non_musking: props.user.non_musking,
});

const submit = () => {
    router.post(`/update/rate/${props.user.id}`, form.value, {
        onSuccess: () => {
            dataRate.value[0].musking = form.value.musking;
            dataRate.value[0].non_musking = form.value.non_musking;
            openRateModal.value = false;
        },
    });
};

</script>

<template>
    <AdminAppLayout :breadcrumbs="breadcrumbs">

        <Head title="Customer About" />
        <FlashMessage :message="props.flash.message" />
        <div class="p-20">
            <div class="flex gap-10">
                <aside class="w-1/6 space-y-3">
                    <button v-for="step in steps" :key="step.key" @click="currentStep = step.key"
                        class="block text-left duration-300 py-2 pl-4 w-[90%] rounded cursor-pointer font-medium text-sm"
                        :class="currentStep === step.key ? 'bg-gray-100 text-[#0F79BB]' : 'hover:bg-gray-100'">
                        {{ step.label }}
                    </button>
                </aside>

                <div class="flex flex-col space-y-6 w-5/6">

                    <div v-if="currentStep === 'about'">
                        <HeadingSmall title="User information" />
                        <div class="gap-10 border border-gray-300 rounded-lg p-10 mt-5">

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

                    <div v-if="currentStep === 'rate'">
                        <h1 class="text-lg font-medium text-slate-800">Rate Plan</h1>


                        <div class="relative overflow-x-auto shadow mt-5 sm:rounded-lg">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 border border-gray-200">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th v-for="col in columnsRate" :key="col.key" scope="col" class="px-6 py-3">
                                            {{ col.label }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="row in dataRate" :key="row.id"
                                        class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                        <td v-for="col in columnsRate" :key="col.key"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <!-- Action column -->
                                            <template v-if="col.key === 'action'">
                                                <div class="flex gap-2">
                                                    <button @click="openRateModal = true"
                                                        class="px-3 cursor-pointer py-2 text-xs font-medium text-white bg-[#1079BB] rounded hover:bg-[#4B4744] transition-colors">
                                                        <SquarePenIcon class="w-5 h-5" />
                                                    </button>
                                                </div>
                                            </template>
                                            <!-- Other columns -->
                                            <template v-else>
                                                {{ row[col.key] }}
                                            </template>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <Modal @submit="submit" :title="`Edit Rate Plan`" :submitText="`Update`"
                            v-model="openRateModal">
                            <div class="grid gap-2">
                                <InputLabel for="musking" v-model="form.musking" label="Musking" value="Musking"
                                    placeholder="Enter Musking Rate" />
                            </div>
                            <div class="grid gap-2 mt-2">
                                <InputLabel for="non_musking" v-model="form.non_musking" label="Non Musking"
                                    value="Non Musking" placeholder="Enter Non Musking Rate" />
                            </div>
                        </Modal>


                    </div>

                    <div v-if="currentStep === 'transition'">
                        <!-- Rate Plans Table -->
                        <div>
                            <FilterTable :plans="props.transection" :columns="columnsTr" :title="'Customer Transaction'">
                                <template #action="{ }">
                                    <div class="space-x-2.5">
                                        <button @click="viewCustomer(1)"
                                            class="text-white bg-blue-500 hover:bg-blue-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                                            <EyeIcon class="w-5 h-5" />
                                        </button>
                                    </div>
                                </template>
                            </FilterTable>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </AdminAppLayout>
</template>
