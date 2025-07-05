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

const whitelistRow = [
  {
    id: 1,
    parameters: 'Username',
    required: 'Required',
    type: 'string',
    value: 'Enter the username that you want to get his unsubscibe link',
  },
  {
    id: 2,
    parameters: 'Withphonenumber',
    required: 'optional',
    type: 'boolean',
    value: `Set true to "_phnx" will be added to the link. (This addition means that when sending the SMS, the system encodes the recipient's phone number at the end of the link so that he does not have to enter it.`,
  }
]



const whitelistBody = `
{
    "Data": {
        "Username": "Username",
        "WithPhoneNumber": "1"
      }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Admin/GetBlockLink' \
--header 'Content-Type: application/json' \
--header 'Authorization: Your Base Credential' \
--data '{
    "Data": {
        "Username": "Username",
        "WithPhoneNumber": "1"
        }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Admin/GetBlockLink",
  "RequestId": ",wWYuJXZ05WauUncvZmbp5CMxkGchNWPl1WYOR3cvhkJ4ETQzUSNwE0MlcTMrMTMtcDMtMjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "BlockText": "להסרה https://l5k.me/Zh1ef_#phnx",
    "BlockLink": "https://l5k.me/Zh1ef"
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Thu, 13 Jul 2023 14:05:18 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '393' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' },
  { key: 'Strict-Transport-Security', value: 'max-age=15552000' },
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Admin/GetBlockLink`;

</script>
<template>
    <div class="xl:flex rounded-md space-x-5 border-b border-gray-300">
        <!-- Left Panel -->
        <div class="xl:w-[50%] mt-5">
            <div class="mt-10 border-b border-gray-300 pt-5">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">Get Unsubscribe Link</h2>
            </div>
            <div class="mb-6 mt-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                    <h1 class=" font-semibold text-gray-900">Get Unsubscribe Link</h1>
                </div>
                <Murkdown :rawCode="whitelistlink" />
                <p class="mt-3">StartFragment</p>
                <p class="mt-3">This function gets the sms unsubscribe link</p>
                <p class="mt-3">StartFragment</p>
                <p class="mt-3">Parameters</p>
                <p class="mt-3">EndFragment</p>
            </div>

            <div class="mb-8 mt-5">
                <DocTable :columns="columns" :plans="whitelistRow" />
                <p class="mt-3 text-sm">If you choose level "customer\Project" then you will also receive in the report messages sent by other users in the same customer or project, provided you have the appropriate permissions.</p>
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
                <DocCode language="json" :rawCode="whitelistBody" />
            </div>

        </div>

        <!-- Right Panel -->
        <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Get Unsubscribe Link" language="json"
                borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
                borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
                :headers="whitelistHeaders" />
        </div>
    </div>
</template>