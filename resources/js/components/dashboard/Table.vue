<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref, computed, watch, defineProps } from 'vue';

interface TableData {
    [key: string]: any;
    id: number;
    contact_id?: number | string;
}

interface TableColumn {
    key: string;
    label: string;
    icon?: any;
    sortable?: boolean;
}

const props = defineProps<{
    plans: TableData[];
    columns: TableColumn[];
    title?: string;
    showCreateButton?: boolean;
    createRoute?: string;
    createTitle?: string;
    shortIcon?: boolean;
}>();

const entriesPerPage = ref(5);
const currentPage = ref(1);
const search = ref('');
const sortKey = ref('');
const sortAsc = ref(true);


const toggleSort = (key: string) => {
    if (sortKey.value === key) {
        sortAsc.value = !sortAsc.value;
    } else {
        sortKey.value = key;
        sortAsc.value = true;
    }
};

const filteredData = computed(() => {
    const data = [...props.plans].filter((item) =>
        Object.values(item)
            .join(' ')
            .toLowerCase()
            .includes(search.value.toLowerCase())
    );
    if (sortKey.value) {
        data.sort((a, b) => {
            const aVal = a[sortKey.value];
            const bVal = b[sortKey.value];
            if (aVal === bVal) return 0;
            if (sortAsc.value) {
                return aVal > bVal ? 1 : -1;
            } else {
                return aVal < bVal ? 1 : -1;
            }
        });
    }
    return data;
});

const totalPages = computed(() =>
    Math.ceil(filteredData.value.length / entriesPerPage.value)
);

const paginatedData = computed(() => {
    const start = (currentPage.value - 1) * entriesPerPage.value;
    return filteredData.value.slice(start, start + entriesPerPage.value);
});

watch([search, entriesPerPage], () => {
    currentPage.value = 1;
});


</script>

<template>
    <div class="">
        <div class="lg:flex md:flex items-center gap-2 justify-between mb-2">
            <h2 class="text-[1.3rem] font-medium mb-4">{{ title }}</h2>
            <div>
                <div class="lg:flex gap-2 mb-4 space-x-4 space-y-5 lg:space-y-0 lg:space-x-0">
                    <template v-if="showCreateButton">
                        <Link :href="createRoute ?? '#'"
                            class="bg-[#74B53B] duration-300 hover:bg-[#344248] text-[13px] md:text-[15px] lg:[16px] cursor-pointer text-white px-8 py-2 rounded">
                        {{ props.createTitle ?? 'Create' }}
                        </Link>
                    </template>
                </div>
            </div>
        </div>

        <div class="lg:flex md:flex items-center justify-between mb-4 space-y-2 lg:space-y-0">
            <div class="flex items-center gap-5">
                <select v-model="entriesPerPage" class="border px-2 py-1 rounded text-sm border-gray-300">
                    <option :value="5">5</option>
                    <option :value="10">10</option>
                    <option :value="20">20</option>
                </select>
                <span class="text-sm">Entries per page</span>
            </div>

            <div class="text-sm flex gap-2 relative">
                <div>
                    <label class="mr-2">Search:</label>
                    <input v-model="search" type="text" class="border px-2 py-1 rounded border-gray-300" />
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead class="bg-[#74B53B]/20 text-sm text-gray-600">
                    <tr>
                        <th v-for="col in columns" :key="col.key" class="px-4 py-4 text-left cursor-pointer select-none"
                            @click="() => toggleSort(col.key)">
                            {{ col.label }}
                            <component :is="col.icon" v-if="col.icon" class="inline w-4 h-4 ml-1" />
                            <span v-if="sortKey === col.key">
                                {{ sortAsc ? '▲' : '▼' }}
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <!-- When there is data -->
                    <template v-if="paginatedData.length">
                        <tr v-for="item in paginatedData" :key="item.id">
                            <td v-for="col in columns" :key="col.key"
                                class="border text-[13px] md:text-[15px] lg:[16px] border-gray-200 px-4 py-2">
                                <slot :name="col.key" :item="item">
                                    <template v-if="item[col.key]">
                                        {{ item[col.key] }}
                                    </template>
                                    <template v-else>
                                        <span class="italic text-gray-500">N/A</span>
                                    </template>
                                </slot>
                            </td>
                        </tr>
                    </template>

                    <!-- When no data is available -->
                    <template v-else>
                        <tr>
                            <td :colspan="columns.length" class="text-center py-4 text-gray-500 italic">
                                No data found
                            </td>
                        </tr>
                    </template>
                </tbody>

            </table>
        </div>

        <div class="flex items-center justify-between mt-4 text-sm text-gray-600">
            <div>
                Showing
                {{ (currentPage - 1) * entriesPerPage + 1 }}
                to
                {{ Math.min(currentPage * entriesPerPage, filteredData.length) }}
                of {{ filteredData.length }} entries
            </div>
            <div class="flex gap-1">
                <button @click="currentPage--" :disabled="currentPage === 1"
                    class="px-2 py-1 border rounded disabled:opacity-50 cursor-pointer">
                    ‹
                </button>
                <button class="px-2 py-1 border rounded bg-[#74B53B] cursor-pointer text-white">{{ currentPage
                }}</button>
                <button @click="currentPage++" :disabled="currentPage >= totalPages"
                    class="px-2 py-1 border rounded disabled:opacity-50 cursor-pointer">
                    ›
                </button>
            </div>
        </div>
    </div>
</template>
