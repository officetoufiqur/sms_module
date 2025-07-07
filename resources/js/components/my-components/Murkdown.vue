<!-- File: components/my-components/DocCode.vue -->
<script setup lang="ts">
import { ref, onMounted, nextTick } from 'vue';
import { CopyIcon, CheckIcon } from 'lucide-vue-next';
import Prism from 'prismjs';
import 'prismjs/themes/prism-tomorrow.css';
import 'prismjs/components/prism-json';
import 'prismjs/components/prism-bash';

const props = defineProps<{
  rawCode: string;
  language?: string;
}>();

const codeRef = ref<HTMLElement | null>(null);
const copied = ref(false);

const copyToClipboard = async () => {
  try {
    await navigator.clipboard.writeText(props.rawCode);
    copied.value = true;
    setTimeout(() => (copied.value = false), 2000);
  } catch {
    alert('Failed to copy!');
  }
};

onMounted(async () => {
  await nextTick();
  if (codeRef.value) {
    codeRef.value.textContent = props.rawCode;
    Prism.highlightElement(codeRef.value);
  }
});
</script>

<template>
   <!-- Code Area -->
    <div class="relative overflow-hidden">
      <!-- <pre class="rounded-md">
        <code ref="codeRef" :class="'language-' + (language || 'bash')"></code>
      </pre> -->

      <div class="mt-5 bg-[#F9F9F9] p-8 rounded-md text-sm">
        <h1>{{ rawCode }}</h1>
      </div>
      <div class="absolute top-7 right-3 flex items-center gap-2">
        <button class="p-1 hover:bg-gray-700 rounded" @click="copyToClipboard">
          <component
            :is="copied ? CheckIcon : CopyIcon"
            class="w-4 h-4 cursor-pointer"
            :class="copied ? 'text-green-400' : ''"
          />
        </button>
      </div>
    </div>
</template>

