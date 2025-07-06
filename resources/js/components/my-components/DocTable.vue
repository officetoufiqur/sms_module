<script setup lang="ts">
import { defineProps } from 'vue';

interface TableData {
    [key: string]: any;
    id: number;
}

interface TableColumn {
    key: string;
    label: string;
    icon?: any;
}

defineProps<{
    plans: TableData[];
    columns: TableColumn[];
    title?: string;
}>();


</script>

<template>
    <div class="">
        <div class="overflow-x-auto max-h-100">
        <table class="min-w-full bg-[#f9f9f9] border relative">
            <thead class="bg-gray-100 text-sm text-gray-700">
                <tr>
                    <th v-for="col in columns" :key="col.key" class="px-4 py-2 text-left">
                        {{ col.label }}
                        <component :is="col.icon" v-if="col.icon" class="inline w-4 h-4 ml-1" />
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in plans" :key="item.id">
                    <td v-for="col in columns" :key="col.key" class="border text-sm border-gray-200 px-4 py-2">
                        <slot :name="col.key" :item="item">
                            {{ item[col.key] }}
                        </slot>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>

    </div>
</template>