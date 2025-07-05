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
    parameters: 'QuotaUsageType',
    required: 'Optional',
    type: 'string',
    value: 'choose type to get the quota for specific product (SMS/Email/VR). If the field is empty the result will return all the Quota types'
  },
  {
    id: 2,
    parameters: 'Level',
    required: 'Optional',
    type: 'string',
    value: 'choose level under your account to get quota to this level (Partner/Customer/Project/User). If the field is empty the result will be by customer level'
  },
  {
    id: 3,
    parameters: 'LevelValue',
    required: 'Optional',
    type: 'string',
    value: 'Enter the value of the level that you chose'
  }
]



const whitelistBody = `
{
    "Data": {
         "QuotaUsageType": "",
         "Level": "User",
         "LevelValue": "1044244"
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Admin/GetQuota' \
--header 'Authorization: Your Base Credentials' \
--header 'Content-Type: application/json; charset=utf-8' \
--data '{
    "Data": {
         "QuotaUsageType": "",
         "Level": "User",
         "LevelValue": "1044244"
    }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Admin/GetQuota",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJ0ETQzUCOzE0MlQTMrkDMtIDMtIjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "Level": "User",
    "LevelValue": 1044244,
    "List": [
      {
        "QuotaUsageType": "SMS",
        "QuotaType": "Packages",
        "RemainingQuota": 1996,
        "WarningLevel": 200
      },
      {
        "QuotaUsageType": "Newsletters",
        "QuotaType": "Packages",
        "RemainingQuota": 100,
        "WarningLevel": 20
      },
      {
        "QuotaUsageType": "IVR",
        "QuotaType": "Packages",
        "RemainingQuota": 400,
        "WarningLevel": 40
      }
    ]
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Wed, 09 Feb 2022 12:38:14 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '254' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Admin/GetQuota`;

</script>
<template>
    <div class="xl:flex rounded-md space-x-5 border-b border-gray-300">
        <!-- Left Panel -->
        <div class="xl:w-[50%] mt-5">
            <div class="mt-10 border-b border-gray-300 pt-5">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">Get Quota</h2>
            </div>
            <div class="mt-10 border-b border-gray-300">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">Get Quota using json</h2>
            </div>
            <div class="mb-6 mt-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                    <h1 class=" font-semibold text-gray-900">Get Quota</h1>
                </div>
                <Murkdown :rawCode="whitelistlink" />
                <p class="mt-3">This function returns the amount of SMS\Email\IVR remaining in account by the chosen level (Partner/Customer/Project/User).</p>
                <p class="mt-3">The Authentication method is basic authentication <a href="https://en.wikipedia.org/wiki/Basic_access_authentication" class="text-blue-600 text-sm">link for explanation</a></p>

                <p class="font-semibold my-5">Parameters</p>
            </div>

            <div class="mb-8 mt-5">
                <DocTable :columns="columns" :plans="whitelistRow" />
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
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="GetQuota" language="json"
                borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
                borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
                :headers="whitelistHeaders" />
        </div>
    </div>

</template>