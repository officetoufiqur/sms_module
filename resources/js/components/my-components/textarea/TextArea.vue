<script setup lang="ts">
import { useVModel } from '@vueuse/core'

const props = defineProps<{
    placeholder: string,
    modelValue?: string | number
}>()

const emits = defineEmits<{
    (e: 'update:modelValue', payload: string | number): void
}>()

const modelValue = useVModel(props, 'modelValue', emits, {
    passive: true
})
</script>

<template>
    <textarea class="w-full rounded-lg py-3 px-4 h-30 text-slate-900 text-sm bg-white border border-gray-200"
        v-model="modelValue" :placeholder="props.placeholder">
    </textarea>
</template>