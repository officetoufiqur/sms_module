<script setup lang="ts">
const props = defineProps<{ 
    placeholder: string
 }>()
</script>
<template>
    <div>
        <textarea class="w-full rounded-lg py-3 px-4 h-30 text-slate-900 text-sm bg-white border border-gray-200"
            :placeholder="props.placeholder"></textarea>
    </div>
</template>