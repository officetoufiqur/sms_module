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
    parameters: 'Level',
    required: 'Required',
    type: 'string',
    value: 'The Level options are: Customer/Project/User'
  },
  {
    id: 2,
    parameters: 'LevelValue',
    required: 'Required',
    type: 'string',
    value: 'The number of the Customer/Project/User'
  },
  {
    id: 3,
    parameters: 'QuotaUsageType',
    required: 'Required',
    type: 'string',
    value: 'The QuotaUsageType options are: SMS/Mail/IVR/WhatsApp'
  },
  {
    id: 4,
    parameters: 'QuotaType',
    required: 'Required',
    type: 'string',
    value: 'Packages/Monthly/Unlimited'
  },
  {
    id: 5,
    parameters: 'QuotaAmount',
    required: 'Required',
    type: 'string',
    value: 'The amount you want to add/set'
  },
  {
    id: 6,
    parameters: 'AllowChangeQuotaType',
    required: 'Optional',
    type: 'string',
    value: 'In the case you want to change the quota type set true, the default is false'
  }
]

const responseColumn = [
  { key: 'type', label: 'Code' },
  { key: 'value', label: 'Status' },
];

const ResponseStatusCodes = [
  {
    id: 1,
    type: '1',
    value: 'Success'
  },
  {
    id: 2,
    type: '-1',
    value: 'Failed'
  },
  {
    id: 3,
    type: '-2',
    value: 'Bad user name or password'
  },
  {
    id: 4,
    type: '-6',
    value: 'RecipientsDataNotExists'
  },
  {
    id: 5,
    type: '-9',
    value: 'MessageTextNotExists'
  },
  {
    id: 6,
    type: '-13',
    value: 'UserQuotaExceeded'
  },
  {
    id: 7,
    type: '-14',
    value: 'ProjectQuotaExceeded'
  },
  {
    id: 8,
    type: '-15',
    value: 'CustomerQuotaExceeded'
  },
  {
    id: 9,
    type: '-16',
    value: 'WrongDateTime'
  },
  {
    id: 10,
    type: '-17',
    value: 'WrongNumberParameter'
  },
  {
    id: 11,
    type: '-18',
    value: 'No valid recipients'
  },
  {
    id: 12,
    type: '-21',
    value: 'InvalidSenderName'
  },
  {
    id: 13,
    type: '-22',
    value: 'UserBlocked'
  },
  {
    id: 14,
    type: '-26',
    value: 'UserAuthenticationError'
  },
  {
    id: 15,
    type: '-90',
    value: 'InvalidSenderIdentification'
  },
  {
    id: 16,
    type: '-94',
    value: 'SenderId is not in allow list'
  },
  {
    id: 17,
    type: '-96',
    value: 'MessageLengthExceeded'
  },
  {
    id: 18,
    type: '-230',
    value: 'Invalid Uri'
  },
  {
    id: 19,
    type: '-291',
    value: 'Unverified Sender ID'
  },
  {
    id: 20,
    type: '-1159',
    value: 'Invalid TemplateComponents (Invalid char in the template or buttons)'
  },
  {
    id: 21,
    type: '-180',
    value: 'Illegal Custom Field Name (Invalid char in the varible)'
  },
  {
    id: 22,
    type: '-181',
    value: 'Missing Custom Field Value'
  },
  {
    id: 23,
    type: '-524',
    value: 'MaxAmountOfSmsinOneMinuteReached'
  }
];

const whitelistBody = `
{
    "Data": {
        "Level": "User",
        "LevelValue": "1047435",
        "QuotaUsageType": "SMS",
        "QuotaType": "Packages",
        "QuotaAmount": "200",
        "AllowChangeQuotaType": "true"
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Admin/CreateOrAddQuota' \
--header 'Content-Type: application/json' \
--header 'Authorization: Your Base Credentials' \
--data '{
    "Data": {
        "Level": "User",
        "LevelValue": "1047435",
        "QuotaUsageType": "SMS",
        "QuotaType": "Packages",
        "QuotaAmount": "200",
        "AllowChangeQuotaType": "true"
    }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Admin/CreateOrAddQuota",
  "RequestId": ",wWYuJXZ05WauUncvZmbp5CMxkGchNWPl1WYOR3cvhkJwETQzUSOxE0MlcTMrITMtcDMtMjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "Level": "User",
    "LevelValue": 1047435,
    "Before": {
      "QuotaUsageType": "SMS",
      "QuotaType": "Packages",
      "QuotaAmount": 100,
      "RemainingQuota": 100,
      "WarningLevel": 20
    },
    "After": {
      "QuotaUsageType": "SMS",
      "QuotaType": "Packages",
      "QuotaAmount": 200,
      "RemainingQuota": 200,
      "WarningLevel": 20
    }
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Wed, 12 Jul 2023 14:19:10 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '254' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' },
  { key: 'Strict-Transport-Security', value: 'max-age=15552000' },
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Admin/CreateOrAddQuota`;

</script>
<template>
    <div class="xl:flex rounded-md space-x-5 border-b border-gray-300">
        <!-- Left Panel -->
        <div class="xl:w-[50%] mt-5">
            <div class="mt-10 border-b border-gray-300 pt-5">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">Create Or Add Quota</h2>
            </div>
            <div class="mb-6 mt-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                    <h1 class=" font-semibold text-gray-900">Create Or Add Quota</h1>
                </div>
                <Murkdown :rawCode="whitelistlink" />
                <p class="mt-3">Use this function for create or add quota to customer\project\user.</p>
                <p class="mt-3">For example: user in customer manager level can add quota to project or user.</p>
              </div>
              
              <div class="mb-8 mt-5">
                <DocTable :columns="columns" :plans="whitelistRow" />
                <p class="mt-3">*If the quota type is packages then the amount will be added to the amount that was before.</p>
                <p class="mt-3">*If the quota type is monthly then the amount in the amount field will overwrite the existing quota.</p>
                <p class="mt-3">*If you change from any type of quota (which is not monthly) to a monthly type, then the amount sent so far will be reset.</p>
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

            <div class="mt-10 border-b border-gray-300 pb-10">
                <h2 class="text-lg font-semibold text-gray-900">Response Status Codes</h2>
                <p class="mt-3 text-sm">Here is the list of message statuses and their meanings:</p>
                <DocTable :columns="responseColumn" :plans="ResponseStatusCodes" />
            </div>

        </div>

        <!-- Right Panel -->
        <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Create Or Add Quota" language="json"
                borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
                borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
                :headers="whitelistHeaders" />
        </div>
    </div>

</template>