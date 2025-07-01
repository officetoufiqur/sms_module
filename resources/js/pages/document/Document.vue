<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { onMounted, ref, nextTick } from 'vue';
import AppLayout from '@/layouts/AppLayout.vue';
import DocTable from '@/components/my-components/DocTable.vue';
import { ChevronDownIcon, AlignJustifyIcon, CopyIcon, CheckIcon } from 'lucide-vue-next';
import { type BreadcrumbItem } from '@/types';

import 'prismjs/themes/prism-tomorrow.css';
import 'prismjs/plugins/toolbar/prism-toolbar.css';
import 'prismjs/plugins/toolbar/prism-toolbar';
import Prism from 'prismjs';
import 'prismjs/components/prism-json';
import 'prismjs/components/prism-bash';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'SMS Document', href: '/rate-plan' }
];

const columns = [
  { key: 'id', label: 'ID' },
  { key: 'parameters', label: 'Parameters' },
  { key: 'required', label: 'Required' },
  { key: 'type', label: 'Type' },
  { key: 'value', label: 'Value' },
];

const data = [
  {
    id: 1,
    parameters: 'Message',
    required: 'Required',
    type: 'string',
    value: 'SMS message that needs to be sent.',
  },
  {
    id: 2,
    parameters: 'Phone',
    required: 'Required',
    type: 'string',
    value: 'The recipient phone number.',
  },
  {
    id: 3,
    parameters: 'Sender',
    required: 'Required',
    type: 'string',
    value: `The ID that will be displayed in the recipient's phone as the sender.  
The "Sender" field is restricted to a maximum of 11 characters (no spaces) or a phone number with a maximum of 14 digits. You can also write an asterisk (*) at the beginning.`,
  },
];

const jsonResponseRaw = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/SMS/SendSms",
  "RequestId": "...",
  "Data": {
    "Recipients": 1,
    "Errors": null
  }
}`.trim();

const curlExampleRaw = `curl --location 'https://capi.mesergo.co.il/api/v2/SMS/SendSms' \\
--header 'Content-Type: application/json' \\
--header 'Authorization: Your Base Credentials' \\
--data '{
  "Data": {
    "Message": "hello world",
    "Recipients": [
      { "Phone": "0541234567" }
    ]
  }
}'`.trim();

const jsonRef = ref<HTMLElement | null>(null);
const curlRef = ref<HTMLElement | null>(null);

const copiedCurl = ref(false);
const copiedJson = ref(false);

const copyToClipboard = async (text: string, type: 'curl' | 'json') => {
  try {
    await navigator.clipboard.writeText(text);
    if (type === 'curl') {
      copiedCurl.value = true;
      setTimeout(() => {
        copiedCurl.value = false;
      }, 2000);
    } else if (type === 'json') {
      copiedJson.value = true;
      setTimeout(() => {
        copiedJson.value = false;
      }, 2000);
    }
  } catch {
    alert('Failed to copy!');
  }
};

onMounted(async () => {
  await nextTick();

  if (jsonRef.value) {
    jsonRef.value.textContent = jsonResponseRaw;
    Prism.highlightElement(jsonRef.value);
  }

  if (curlRef.value) {
    curlRef.value.textContent = curlExampleRaw;
    Prism.highlightElement(curlRef.value);
  }
});

const modalCurlRef = ref<HTMLElement | null>(null);
const isCurlModalOpen = ref(false);
const openCurlModal = () => {
  isCurlModalOpen.value = true;
  nextTick(() => {
    if (modalCurlRef.value) {
      modalCurlRef.value.textContent = curlExampleRaw;
      Prism.highlightElement(modalCurlRef.value);
    }
  });
};

</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">
    <Head title="SMS Document" />

    <div class="mt-20 mx-14">
      <div class="flex h-[calc(100vh-5rem)] bg-white">
        <!-- Left Panel -->
        <div class="flex-1 p-6 overflow-y-auto">
          <div class="mb-6">
            <div class="flex items-center gap-2 mb-2">
              <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
              <h1 class="text-lg font-semibold text-gray-900">Simple example</h1>
            </div>
            <div class="text-blue-600 text-sm">
              https://capi.mesergo.co.il/api/v2/SMS/SendSms
            </div>
          </div>

          <div class="mb-8">
            <DocTable :columns="columns" :plans="data" />
          </div>

          <h2 class="text-lg font-semibold text-gray-900 mb-4">HEADERS</h2>
        </div>

        <!-- Right Panel -->
        <div class="w-1/2 bg-gray-800 text-white flex flex-col">
          <!-- Example Request -->
          <div class="flex-1 min-h-0 border-b border-gray-700 relative">
            <div class="flex items-center justify-between p-4 border-b border-gray-700">
              <h3 class="font-medium">Example Request</h3>
              <div class="flex items-center gap-2">
                <span class="text-sm text-gray-400">simple version</span>
                <ChevronDownIcon class="w-4 h-4 text-gray-400" />
              </div>
            </div>

            <div class="p-4 relative">
              <div class="flex items-center justify-between mb-4">
                <span class="text-sm text-gray-400">bash</span>
                <div class="flex gap-2">
                  <button
                    class="p-1 hover:bg-gray-700 rounded"
                    @click="copyToClipboard(curlExampleRaw, 'curl')"
                    aria-label="Copy curl example"
                  >
                    <template v-if="!copiedCurl">
                      <CopyIcon class="w-4 h-4" />
                    </template>
                    <template v-else>
                      <CheckIcon class="w-4 h-4 text-green-400" />
                    </template>
                  </button>
                  <button class="p-1 hover:bg-gray-700 rounded">
                    <AlignJustifyIcon class="w-4 h-4" />
                  </button>
                </div>
              </div>

              <!-- Code block without scroll, limited lines, with wrap -->
              <div class="relative">
                <pre
                  class="language-bash text-sm overflow-clip"
                  style="white-space: pre-wrap;"
                >
                  <code ref="curlRef" class="language-bash"></code>
                </pre>

                <!-- Optional fade overlay -->
                <div
                  class="absolute bottom-0 left-0 right-0 h-6 bg-gradient-to-t from-gray-800 to-transparent pointer-events-none"
                ></div>
              </div>

              <button
                class="absolute bottom-4 right-4 text-blue-400 hover:text-blue-300 text-sm"
                @click="openCurlModal"
              >
                View More
              </button>
            </div>
          </div>

          <!-- Example Response -->
          <div class="flex-1 min-h-0 overflow-auto">
  <div class="flex items-center justify-between p-4 border-b border-gray-700">
    <h3 class="font-medium">Example Response</h3>
  </div>
  <div class="flex border-b border-gray-700">
    <button class="px-4 py-2 text-sm border-b-2 border-orange-500 text-white">Body</button>
    <button class="px-4 py-2 text-sm text-gray-400 hover:text-white">Headers (7)</button>
    <div class="ml-auto px-4 py-2">
      <span class="bg-green-600 text-white px-2 py-1 rounded text-xs">200 OK</span>
    </div>
  </div>
  <div class="p-4 relative">
    <div class="flex items-center justify-between mb-4">
      <span class="text-sm text-gray-400">json</span>
      <div class="flex gap-2">
        <button
          class="p-1 hover:bg-gray-700 rounded"
          @click="copyToClipboard(jsonResponseRaw, 'json')"
          aria-label="Copy JSON response"
        >
          <template v-if="!copiedJson">
            <CopyIcon class="w-4 h-4" />
          </template>
          <template v-else>
            <CheckIcon class="w-4 h-4 text-green-400" />
          </template>
        </button>
        <button class="p-1 hover:bg-gray-700 rounded">
          <AlignJustifyIcon class="w-4 h-4" />
        </button>
      </div>
    </div>
    
    <!-- Modified code block with limited height -->
    <div class="relative">
      <pre
        class="language-json text-sm overflow-hidden"
        style="max-height: 6.5rem; white-space: pre-wrap; word-break: break-word;"
      >
        <code ref="jsonRef" class="language-json"></code>
      </pre>
      
      <!-- Optional fade overlay -->
      <div
        class="absolute bottom-0 left-0 right-0 h-6 bg-gradient-to-t from-gray-800 to-transparent pointer-events-none"
      ></div>
    </div>
    
    <button
      class="absolute bottom-4 right-4 text-blue-400 hover:text-blue-300 text-sm"
      
    >
    </button>
  </div>
</div>
        </div>
      </div>
    </div>

  </AppLayout>
</template>

