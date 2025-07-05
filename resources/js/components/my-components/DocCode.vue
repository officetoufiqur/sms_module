<script setup lang="ts">
import { ref, onMounted, nextTick, watch } from 'vue';
import { CopyIcon, CheckIcon } from 'lucide-vue-next';
import Prism from 'prismjs';
import 'prismjs/themes/prism-tomorrow.css';
import 'prismjs/components/prism-json';
import 'prismjs/components/prism-bash';

const props = defineProps<{
  title?: string;
  subtitle?: string;
  language?: string;
  rawCode: string;
  codeTitle?: string;
  headerBtn?: boolean;
  borderStyle?: string;
  headers?: { key: string; value: string }[];
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

const activeTab = ref<'body' | 'headers'>('body');
const headers = ref(props.headers ?? []);

const highlight = async () => {
  await nextTick();
  if (codeRef.value) {
    codeRef.value.textContent = props.rawCode;
    Prism.highlightElement(codeRef.value);
  }
};

onMounted(highlight);

watch(activeTab, (newTab) => {
  if (newTab === 'body') highlight();
});
</script>

<template>
  <div class="text-white pt-5">
    <!-- Header -->
    <div class="flex items-center justify-between p-4" :class="borderStyle">
      <h3 v-if="title" class="font-medium">{{ title }}</h3>
      <div class="flex items-center gap-2" v-if="subtitle">
        <span class="text-sm text-gray-400">{{ subtitle }}</span>
      </div>
    </div>

    <!-- Tabs -->
    <div v-if="headerBtn" class="text-white p-4 rounded-md w-full max-w-lg">
      <div class="flex gap-4 text-sm">
        <button @click="activeTab = 'body'" class="cursor-pointer" :class="[ 
          'pb-1',
          activeTab === 'body' 
            ? 'text-white border-b-2 border-orange-400 font-medium' 
            : 'text-gray-400 hover:text-white' 
        ]">
          Body
        </button>
        <button @click="activeTab = 'headers'" class="cursor-pointer" :class="[ 
          'pb-1',
          activeTab === 'headers' 
            ? 'text-white border-b-2 border-orange-400 font-medium' 
            : 'text-gray-400 hover:text-white' 
        ]">
          Headers ({{ headers.length }})
        </button>
      </div>

      <!-- Header View -->
      <div v-if="activeTab === 'headers'" class="space-y-4 text-sm mt-5">
        <div v-for="(header, index) in headers" :key="index" class="flex justify-between">
          <span class="text-gray-300">{{ header.key }}</span>
          <span>{{ header.value }}</span>
        </div>
      </div>
    </div>

    <!-- Code Area -->
    <div v-if="activeTab === 'body'" class="px-4 relative">
      <div class="language-bash text-sm rounded shadow-lg relative">
        <div class="flex justify-between items-center mt-2">
          <span v-if="codeTitle"
            class="text-sm text-gray-400 bg-[#2D2D2D] px-3 py-1 rounded font-medium">
            {{ codeTitle || 'bash' }}
          </span>
          <button class="p-1 bg-gray-700 rounded absolute top-10 right-4" @click="copyToClipboard">
            <component
              :is="copied ? CheckIcon : CopyIcon"
              class="w-4 h-4 cursor-pointer"
              :class="copied ? 'text-green-400' : ''"
            />
          </button>
        </div>
        <pre class="max-h-80">
          <code ref="codeRef" :class="'language-' + (language || 'bash')"></code>
        </pre>
      </div>
    </div>
  </div>
</template>
