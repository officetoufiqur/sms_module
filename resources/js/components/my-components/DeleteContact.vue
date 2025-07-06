<script setup lang="ts">
import DocTable from '@/components/my-components/DocTable.vue';
import DocCode from '@/components/my-components/DocCode.vue';
import Murkdown from '@/components/my-components/Murkdown.vue';

const columns = [
  { key: 'id', label: 'ID' },
  { key: 'parameters', label: 'Parameters' },
  { key: 'required', label: 'Required' },
  { key: 'type', label: 'Type' },
  { key: 'value', label: 'Value' },
];

const parameters = [
  {
    id: 1,
    parameters: 'Type',
    required: 'Request',
    type: 'string',
    value: 'Phone/ Email/ ContactRefId/ ContactId'
  },
  {
    id: 2,
    parameters: 'Value',
    required: 'Request',
    type: 'string',
    value: 'The value of the type'
  }
];

const whitelistBody = `
{
    "Data": {
        "List": [
            {
                "Type": "Phone",
                "Value": "0541234567"
            }
        ]
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Contact/DeleteContacts' \
--header 'Content-Type: application/json' \
--header 'Authorization:  Basic USER:TOKEN (Encode Base64)' \
--data '{
    "Data": {
        "List": [
            {
                "Type": "Phone",
                "Value": "0541234567"
            }
        ]
    }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Contact/DeleteContacts",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJ0UTQzUCNzE0MlATMrEzMtUDMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "DeletedCount": 1
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Mon, 31 May 2021 07:34:53 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '254' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Contact/DeleteContacts`;
const advancedLink = `https://capi.mesergo.co.il/api/v2/Contact/DeleteContacts?view=json`;

</script>
<template>
  <div class="xl:flex rounded-md space-x-10 border-b border-gray-300">
    <!-- Left Panel -->
    <div class="xl:w-[50%]">
      <div class="mb-6 mt-5 border-b border-gray-300 pb-4">
        <div class="flex items-center gap-2 mb-2">
          <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
          <h1 class=" font-semibold text-gray-900">Delete Contact</h1>
        </div>
        <Murkdown :rawCode="whitelistlink" />
        <p class="mt-3 test-sm">This function deletes contacts by Phone/Email/ContactRefId/ContactId.</p>
        <p class="mt-3 test-sm">The contacts that t you delete removed from all groups.</p>
        <p class="mt-3 test-sm">You can send up to 100 items per request.</p>
        <p class="mt-3 test-sm">The request should be POST</p>
      </div>

      <div class="mb-8 mt-5">
        <p class="font-semibold my-5">Parameters</p>
        <DocTable :columns="columns" :plans="parameters" />
      </div>

      <p class="mt-3">Advanced options</p>
      <Murkdown :rawCode="advancedLink" />

      <div class="mt-10 border-b border-gray-300 pb-10">
        <h2 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-3">HEADERS</h2>

        <ul class="max-w-md">
          <div class="flex justify-between items-center mt-10">
            <li class="font-medium">Content-Type:</li>
            <li>application/json</li>
          </div>
          <div class="flex justify-between items-center mt-5">
            <li class="font-medium">Authorization</li>
            <li class="text-sm">Basic USER:TOKEN (Encode Base64)</li>
          </div>
        </ul>

        <h2 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-3 mt-10">Body <span
            class="text-gray-400">raw (json)</span></h2>
        <DocCode language="json" :rawCode="whitelistBody" />
      </div>

    </div>

    <!-- Right Panel -->
    <div class="xl:w-[50%] bg-[#272822] h-auto rounded-md">
      <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Delete Contact" language="json"
        borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
      <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
        borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
        :headers="whitelistHeaders" />
    </div>
  </div>

</template>