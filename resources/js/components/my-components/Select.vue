<!-- components/BaseSelect.vue -->
<script setup lang="ts">

defineProps<{
  value?: string
  placeholder?: string
  options: { value: string; label: string }[]
}>()

// const emit = defineEmits<{
//   (e: 'update:value', value: string): void
// }>()

// function onChange(event: Event) {
//   const target = event.target as HTMLSelectElement
//   emit('update:value', target.value)
// }
</script>

<template>
  <div>
    <select
      :value="value"
      class="bg-white border cursor-pointer w-full mt-3 border-gray-200 text-gray-900 text-sm rounded-lg block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
    >
      <option disabled value="">{{ placeholder || 'Select an option' }}</option>
      <option
        v-for="opt in options"
        :key="opt.value"
        :value="opt.value"
      >
        {{ opt.label }}
      </option>
    </select>
  </div>
</template>
