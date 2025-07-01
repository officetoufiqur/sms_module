<script setup lang="ts">
import { ref, onMounted, nextTick, type Ref } from 'vue';
import Prism from 'prismjs';
import 'prismjs/themes/prism-tomorrow.css';
import 'prismjs/plugins/toolbar/prism-toolbar.css';
import 'prismjs/plugins/toolbar/prism-toolbar';
import 'prismjs/components/prism-json';
import 'prismjs/components/prism-bash';
import { CopyIcon, CheckIcon, XIcon } from 'lucide-vue-next';

const props = defineProps<{
  code: string;
  language: 'bash' | 'json' | string;
  title?: string;
}>();

// ✅ FIXED typing
const codeRef: Ref<HTMLElement | null> = ref(null);
const modalRef: Ref<HTMLElement | null> = ref(null);
const copied = ref(false);
const isModalOpen = ref(false);

const copyToClipboard = async () => {
  try {
    await navigator.clipboard.writeText(props.code.trim());
    copied.value = true;
    setTimeout(() => (copied.value = false), 2000);
  } catch {
    alert('Copy failed!');
  }
};

const openModal = () => {
  isModalOpen.value = true;
  nextTick(() => {
    if (modalRef.value) {
      modalRef.value.textContent = props.code.trim();
      Prism.highlightElement(modalRef.value);
    }
  });
};

const closeModal = () => {
  isModalOpen.value = false;
};

onMounted(() => {
  if (codeRef.value) {
    codeRef.value.textContent = props.code.trim();
    Prism.highlightElement(codeRef.value);
  }
});
</script>

<template>
  <div class="w-full bg-gray-800 text-white flex flex-col">
    <div class="flex items-center justify-between p-4 border-b border-gray-700">
      <h3 class="font-medium">{{ title || 'Code Example' }}</h3>
    </div>

    <div class="p-4 relative">
      <div class="flex items-center justify-between mb-4">
        <span class="text-sm text-gray-400">{{ language }}</span>
        <button class="p-1 hover:bg-gray-700 rounded" @click="copyToClipboard">
          <component :is="copied ? CheckIcon : CopyIcon" class="w-4 h-4" :class="{ 'text-green-400': copied }" />
        </button>
      </div>
      <pre :class="`language-${language} text-sm overflow-auto max-h-96`">
        <code :ref="codeRef" :class="`language-${language}`"></code>
      </pre>
      <button class="absolute bottom-4 right-4 text-blue-400 hover:text-blue-300 text-sm" @click="openModal">
        View More
      </button>
    </div>

    <transition name="fade">
      <div
        v-if="isModalOpen"
        class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60"
        @click.self="closeModal"
      >
        <div class="bg-gray-900 rounded-md max-w-3xl w-full max-h-[80vh] overflow-auto p-6 relative">
          <button @click="closeModal" class="absolute top-4 right-4 text-gray-400 hover:text-white">
            <XIcon class="w-6 h-6" />
          </button>
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-white">Full Code</h3>
            <button @click="copyToClipboard" class="p-1 hover:bg-gray-700 rounded">
              <component :is="copied ? CheckIcon : CopyIcon" class="w-5 h-5 text-white" />
            </button>
          </div>
          <pre :class="`language-${language} text-sm`">
            <code :ref="modalRef" :class="`language-${language}`"></code>
          </pre>
        </div>
      </div>
    </transition>
  </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>
