<script setup lang="ts">
import { ref, computed } from 'vue';

interface RatePlan {
    id: number;
    operator: string;
    logo: string;
    country: string;
    nonMasking: string;
    masking: string;
}

const allData = ref<RatePlan[]>([
    {
        id: 1,
        operator: 'Grameenphone',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
    {
        id: 2,
        operator: 'Banglalink',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
    {
        id: 3,
        operator: 'Robi',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
    {
        id: 4,
        operator: 'Airtel',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
    {
        id: 5,
        operator: 'Teletalk',
        logo: 'https://portal.smsorbis.com/assets/images/operator/1.png',
        country: 'Bangladesh',
        nonMasking: '0.35',
        masking: '0.65',
    },
]);

const entriesPerPage = ref(10);
const currentPage = ref(1);
const search = ref('');

const filteredData = computed(() =>
    allData.value.filter((item) =>
        item.operator.toLowerCase().includes(search.value.toLowerCase())
    )
);

const totalPages = computed(() =>
    Math.ceil(filteredData.value.length / entriesPerPage.value)
);

const paginatedData = computed(() => {
    const start = (currentPage.value - 1) * entriesPerPage.value;
    return filteredData.value.slice(start, start + entriesPerPage.value);
});
</script>

<template>
    <div class="p-14">
        <h2 class="text-2xl font-semibold mb-4">Rate Plan</h2>

        <div class="flex items-center justify-between mb-3 mt-8">
            <div class="flex items-center gap-2">
                <select v-model="entriesPerPage" class="border px-2 py-1 rounded text-sm border-gray-300">
                    <option :value="5">5</option>
                    <option :value="10">10</option>
                    <option :value="20">20</option>
                </select>
                <span class="text-sm text-gray-700">entries per page</span>
            </div>
            <div class="text-sm">
                <label class="mr-2">Search:</label>
                <input v-model="search" type="text" class="border px-2 py-1 rounded border-gray-300" />
            </div>
        </div>

        <table class="min-w-full bg-white border relative overflow-x-auto">
            <thead class="bg-gray-100 text-sm text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-left">Operator</th>
                    <th class="px-4 py-2 text-left">Country</th>
                    <th class="px-4 py-2 text-left">Non Masking</th>
                    <th class="px-4 py-2 text-left">Masking</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in paginatedData" :key="item.id" class="">
                    <td class="border border-gray-200 px-4 py-2 flex items-center gap-2">
                        <img :src="item.logo" alt="logo" class="h-5 w-5" />
                        {{ item.operator }}
                    </td>
                    <td class="border border-gray-200 px-4 py-2">{{ item.country }}</td>
                    <td class="border border-gray-200 px-4 py-2">{{ item.nonMasking }} BDT</td>
                    <td class="border border-gray-200 px-4 py-2">{{ item.masking }} BDT</td>
                </tr>
            </tbody>
        </table>

        <div class="flex items-center justify-between mt-4 text-sm text-gray-600">
            <div>
                Showing
                {{ (currentPage - 1) * entriesPerPage + 1 }}
                to
                {{
                    Math.min(currentPage * entriesPerPage, filteredData.length)
                }}
                of {{ filteredData.length }} entries
            </div>
            <div class="flex gap-1">
                <button @click="currentPage--" :disabled="currentPage === 1"
                    class="px-2 py-1 border rounded disabled:opacity-50">
                    ‹
                </button>
                <button class="px-2 py-1 border rounded bg-blue-600 text-white">{{ currentPage }}</button>
                <button @click="currentPage++" :disabled="currentPage >= totalPages"
                    class="px-2 py-1 border rounded disabled:opacity-50">
                    ›
                </button>
            </div>
        </div>
    </div>
</template>


