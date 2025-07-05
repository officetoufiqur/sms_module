<script setup lang="ts">
import DocTable from '@/components/my-components/DocTable.vue';
import DocCode from '@/components/my-components/DocCode.vue';
import Murkdown from '@/components/my-components/Murkdown.vue';

const columns = [
  { key: 'id', label: 'ID' },
  { key: 'parameters', label: 'Parameters' },
  { key: 'type', label: 'Type' },
  { key: 'value', label: 'Value' },
];

const checkRow = [
  {
    id: 1,
    parameters: 'SenderId',
    required: 'Required',
    type: 'string',
    value: 'The Sender id do you want to check',
  },
  {
    id: 2,
    parameters: 'CustomerId',
    required: 'optional',
    type: 'integer',
    value: 'If you want to check for another CustomerId under your account',
  },
  {
    id: 3,
    parameters: 'Username',
    required: 'optional',
    type: 'string',
    value: 'If you want to check for another username under your account',
  }
]



const checkBody = `
{
    "Data": {
        "SenderId": "0529999999",
        "CustomerId": 123,
        "Username": "user123"
    }
}
`;

const checkExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/SMS/Whitelist/SenderIdIsAllowed' \
--header 'Authorization: Your Base Credentials' \
--data '{
    "Data": {
        "SenderId": "0529999999"
    }
}'
`;

const checkResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/SMS/Whitelist/SenderIdIsAllowed",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJzATQzUSOyE0MlQTMrUDMtITMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "CustomerId": 26745,
    "SenderId": "0529999999",
    "IsAllowed": false
    }
}
`;

const checkHeaders = [
  { key: 'Date', value: 'Sun, 05 Dec 2021 12:29:03 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '390' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const checklink = `https://capi.mesergo.co.il/api/v2/SMS/Whitelist/SenderIdIsAllowed`;

</script>
<template>
    <div class="xl:flex rounded-md space-x-5">
        <!-- Left Panel -->
        <div class="xl:w-[50%] mt-5">
            <div class="mt-10 border-b border-gray-300 pt-5">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">Check if Sender allowed</h2>
            </div>
            <div class="mb-6 mt-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                    <h1 class="text-lg font-semibold text-gray-900">SenderIdIsAllowed using json</h1>
                </div>
                <Murkdown :rawCode="checklink" />
                <p class="mt-3">This function checks if sender id is allowed to send SMS</p>
                <p class="mt-3">The Authentication method is basic authentication <a href="https://en.wikipedia.org/wiki/Basic_access_authentication" class="text-blue-600">link for explanation</a></p>
            </div>

            <div class="mb-8 mt-10">
                <p class="font-semibold pb-4 text-sm">Parameters</p>
                <DocTable :columns="columns" :plans="checkRow" />
            </div>

            <div class="mt-10 border-b border-gray-300 pb-10">
                <h2 class="text-lg font-semibold text-gray-900 border-b border-gray-200 pb-3">HEADERS</h2>

                <ul class="max-w-md">
                    <div class="flex justify-between items-center mt-10">
                        <li class="font-medium">Content-Type:</li>
                        <li>application/json; charset=utf-8</li>
                    </div>
                    <div class="flex justify-between items-center mt-5">
                        <li class="font-medium">Authorization</li>
                        <li>Your Base Credentials</li>
                    </div>
                </ul>

                <h2 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-3 mt-10">Body <span
                        class="text-gray-400">raw (json)</span></h2>
                <DocCode language="json" :rawCode="checkBody" />
            </div>

        </div>

        <!-- Right Panel -->
        <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="SenderIdIsAllowed using json" language="json"
                borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="checkExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
                borderStyle="border-b border-gray-700" :rawCode="checkResponse" :headerBtn="true"
                :headers="checkHeaders" />
        </div>
    </div>
</template>