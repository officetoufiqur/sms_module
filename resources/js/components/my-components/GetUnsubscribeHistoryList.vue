<script setup lang="ts">
import DocTable from '@/components/my-components/DocTable.vue';
import DocCode from '@/components/my-components/DocCode.vue';
import Murkdown from '@/components/my-components/Murkdown.vue';

const columns = [
  { key: 'parameters', label: 'Key' },
  { key: 'required', label: 'Required/Optional' },
  { key: 'type', label: 'Type' },
  { key: 'value', label: 'Value' },
];

const parameters = [
  {
    id: 1,
    parameters: 'Type',
    required: 'Required',
    type: 'string',
    value: 'Phone/Email',
  },
  {
    id: 2,
    parameters: 'FromDate',
    required: 'Required',
    type: 'date',
    value: 'From Date includes this date',
  },
  {
    id: 3,
    parameters: 'ToDate',
    required: 'Required',
    type: 'date',
    value: 'To Date include this date',
  },
  {
    id: 4,
    parameters: 'Action',
    required: 'Required',
    type: 'string',
    value: 'Unsubscribe/Reactivate/All',
  },
  {
    id: 5,
    parameters: 'LastFetchedId',
    required: 'Optional',
    type: 'int',
    value: 'Get batch starting with ID larger than X',
  }
];


const whitelistBody = `
{
    "Data": {
        "Type": "Phone",
        "FromDate": "2021/05/08",
        "ToDate": "2021/06/10",
        "Action": "All",
        "LastFetchedId": 0
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Contact/GetUnsubscribeHistoryList?Content-Type=application%2Fjson&Authorization=%20Basic%20USER%3ATOKEN%20(Encode%20Base64)' \
--header 'Content-Type: application/json' \
--data '{
    "Data": {
        "Type": "Phone",
        "FromDate": "2021/05/08",
        "ToDate": "2021/06/10",
        "Action": "All",
        "LastFetchedId": 0
    }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Contact/GetUnsubscribeHistoryList",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJ5MTQzUyMzE0MlkDMrIDMtYDMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "LastFetchedId": 94121250,
    "Count": 11,
    "List": [
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Unsubscribe",
        "ActionDateTime": "2021-05-09 14:20:36",
        "ActionSource": "api",
        "ActionReason": "Customer request",
        "DoActionName": "API"
      },
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Reactivate",
        "ActionDateTime": "2021-05-09 14:21:01",
        "ActionSource": "manual",
        "ActionReason": "tesy",
        "DoActionName": "ariel"
      },
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Unsubscribe",
        "ActionDateTime": "2021-05-09 14:22:07",
        "ActionSource": "api",
        "ActionReason": "Customer request",
        "DoActionName": "API"
      },
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Reactivate",
        "ActionDateTime": "2021-05-09 14:23:03",
        "ActionSource": "api",
        "ActionReason": "Customer request",
        "DoActionName": "API"
      },
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Unsubscribe",
        "ActionDateTime": "2021-05-09 14:27:37",
        "ActionSource": "mesergoContacts",
        "ActionReason": "test -",
        "DoActionName": "ariel"
      },
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Reactivate",
        "ActionDateTime": "2021-05-18 14:41:23",
        "ActionSource": "manual",
        "ActionReason": "test",
        "DoActionName": "ariel"
      },
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Unsubscribe",
        "ActionDateTime": "2021-06-01 10:43:03",
        "ActionSource": "api",
        "ActionReason": "Customer request",
        "DoActionName": "API"
      },
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Reactivate",
        "ActionDateTime": "2021-06-01 14:29:27",
        "ActionSource": "api",
        "ActionReason": "Customer request",
        "DoActionName": "API"
      },
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Unsubscribe",
        "ActionDateTime": "2021-06-01 17:31:12",
        "ActionSource": "api",
        "ActionReason": "Customer request",
        "DoActionName": "API"
      },
      {
        "Type": "Phone",
        "Value": "0543266290",
        "Action": "Reactivate",
        "ActionDateTime": "2021-06-01 17:31:55",
        "ActionSource": "api",
        "ActionReason": "Customer request",
        "DoActionName": "API"
      },
      {
        "Type": "Phone",
        "Value": "0541234567",
        "Action": "Unsubscribe",
        "ActionDateTime": "2021-06-01 17:34:38",
        "ActionSource": "api",
        "ActionReason": "Customer request",
        "DoActionName": "API"
      }
    ]
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Wed, 02 Jun 2021 06:33:39 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '3977' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Contact/GetUnsubscribeHistoryList`;

</script>
<template>
  <div class="xl:flex rounded-md space-x-10 border-b border-gray-300">
    <!-- Left Panel -->
    <div class="xl:w-[50%]">
      <div class="mb-6 mt-5 border-b border-gray-300 pb-4">
        <div class="flex items-center gap-2 mb-2">
          <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
          <h1 class=" font-semibold text-gray-900">Get Unsubscribe History List</h1>
        </div>
        <Murkdown :rawCode="whitelistlink" />
        <p class="mt-3 test-sm">This function get unsubscribed history List for all Phones / Emails.</p>
        <p class="mt-3 test-sm">The request is to by POST.</p>
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
      <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Get Unsubscribe History List" language="json"
        borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
      <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
        borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
        :headers="whitelistHeaders" />
    </div>
  </div>

</template>