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
    parameters: 'GetGroupBy',
    required: 'Required',
    type: 'string',
    value: 'GroupId/GroupNumber/GroupName',
  },
  {
    id: 2,
    parameters: 'Value',
    required: 'Required',
    type: 'int',
    value: 'The value of the get group by',
  }
];


const whitelistBody = `
{
    "Data": {
        "GetGroupBy": "GroupNumber",
        "Value": "7"
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Contact/GetGroup' \
--header 'Content-Type: application/json' \
--header 'Authorization:  Basic USER:TOKEN (Encode Base64)' \
--data '{
    "Data": {
        "GetGroupBy": "GroupNumber",
        "Value": "7"
    }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Contact/GetGroup",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJ2UTQzUSNxE0MlATMrEDMtYDMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "Count": 1,
    "List": [
      {
        "GroupId": 300226604,
        "GroupTypeId": 1,
        "GroupNumber": 7,
        "GroupName": 1805,
        "Description": "",
        "CountActiveContacts": 1,
        "CountActiveContactsMail": 0,
        "CountActiveContactsSms": 1,
        "CountActiveContactsDevice1": 0,
        "CountActiveContactsDevice2": 0,
        "DateCreated": "2021-05-18 09:25:37",
        "UpdateDate": "2021-05-18 09:29:48"
      }
    ]
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Tue, 01 Jun 2021 07:15:55 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '874' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Contact/GetGroup`;

</script>
<template>
  <div class="xl:flex rounded-md space-x-10 border-b border-gray-300">
    <!-- Left Panel -->
    <div class="xl:w-[50%]">
      <div class="mb-6 mt-5 border-b border-gray-300 pb-4">
        <div class="flex items-center gap-2 mb-2">
          <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
          <h1 class=" font-semibold text-gray-900">Get Group</h1>
        </div>
        <Murkdown :rawCode="whitelistlink" />
        <p class="mt-3 test-sm">This function finds group by GroupId/GroupNumber/GroupName.</p>
        <p class="mt-3 test-sm">You can find more than one Group at a time if you use by GroupName.</p>
        <p class="mt-3 test-sm">The request should be POST</p>
      </div>

      <div class="mb-8 mt-5">
        <p class="font-semibold my-5">Parameters</p>
        <DocTable :columns="columns" :plans="parameters" />
      </div>

      <div class="mt-5 border-b border-gray-300 pb-10">
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
      <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Get Group" language="json"
        borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
      <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
        borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
        :headers="whitelistHeaders" />
    </div>
  </div>

</template>