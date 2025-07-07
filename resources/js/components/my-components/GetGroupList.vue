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
    parameters: 'FromDate',
    required: 'Optional',
    type: 'date',
    value: 'From Date includes this date',
  },
  {
    id: 2,
    parameters: 'ToDate',
    required: 'Optional',
    type: 'date',
    value: 'To Date include this date',
  },
  {
    id: 3,
    parameters: 'Type',
    required: 'Optional',
    type: 'string',
    value: 'Can be Regular/Dynamic/All',
  },
  {
    id: 4,
    parameters: 'LastFetchedId',
    required: 'Optional',
    type: 'int',
    value: 'Get batch starting with ID larger than X (if a first request is made use 0 or null).',
  }
];


const whitelistBody = `
{
  "Data": {
  }
 }
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Contact/GetGroupList' \
--header 'Content-Type: application/json' \
--header 'Authorization:  Basic USER:TOKEN (Encode Base64)' \
--data '{
    "Data": {}
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Contact/GetGroupList",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJwITQzUiNyE0MlATMrEDMtYDMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "LastFetchedId": 300230515,
    "Count": 7,
    "List": [
      {
        "GroupId": 300222716,
        "GroupNumber": 1,
        "GroupName": "בדיקה",
        "GroupTypeId": 1,
        "Description": "",
        "CountActiveContactsMail": 7,
        "CountActiveContactsSms": 7,
        "CountActiveContactsDevice1": 0,
        "CountActiveContactsDevice2": 0,
        "DateCreated": "2021-05-03 10:40:03",
        "UpdateDate": "2021-05-10 10:33:24"
      },
      {
        "GroupId": 300224145,
        "GroupNumber": 3,
        "GroupName": "תמיכה",
        "GroupTypeId": 1,
        "Description": null,
        "CountActiveContactsMail": 3,
        "CountActiveContactsSms": 3,
        "CountActiveContactsDevice1": 0,
        "CountActiveContactsDevice2": 0,
        "DateCreated": "2021-05-09 10:09:19",
        "UpdateDate": "2021-05-09 10:09:19"
      },
      {
        "GroupId": 300226604,
        "GroupNumber": 7,
        "GroupName": 1805,
        "GroupTypeId": 1,
        "Description": "",
        "CountActiveContactsMail": 0,
        "CountActiveContactsSms": 1,
        "CountActiveContactsDevice1": 0,
        "CountActiveContactsDevice2": 0,
        "DateCreated": "2021-05-18 09:25:37",
        "UpdateDate": "2021-05-18 09:29:48"
      },
      {
        "GroupId": 300228339,
        "GroupNumber": 11,
        "GroupName": "TEST123456",
        "GroupTypeId": 1,
        "Description": "",
        "CountActiveContactsMail": 29143,
        "CountActiveContactsSms": 0,
        "CountActiveContactsDevice1": 0,
        "CountActiveContactsDevice2": 0,
        "DateCreated": "2021-05-24 10:37:09",
        "UpdateDate": "2021-05-24 10:37:09"
      },
      {
        "GroupId": 300228432,
        "GroupNumber": 12,
        "GroupName": "cxz",
        "GroupTypeId": 1,
        "Description": "",
        "CountActiveContactsMail": 0,
        "CountActiveContactsSms": 0,
        "CountActiveContactsDevice1": 0,
        "CountActiveContactsDevice2": 0,
        "DateCreated": "2021-05-24 12:03:20",
        "UpdateDate": "2021-05-24 12:03:20"
      },
      {
        "GroupId": 300230511,
        "GroupNumber": 14,
        "GroupName": "test",
        "GroupTypeId": 1,
        "Description": null,
        "CountActiveContactsMail": 0,
        "CountActiveContactsSms": 0,
        "CountActiveContactsDevice1": 0,
        "CountActiveContactsDevice2": 0,
        "DateCreated": "2021-05-31 14:42:02",
        "UpdateDate": "2021-05-31 14:42:02"
      },
      {
        "GroupId": 300230515,
        "GroupNumber": 15,
        "GroupName": "New Groupe",
        "GroupTypeId": 1,
        "Description": null,
        "CountActiveContactsMail": 0,
        "CountActiveContactsSms": 0,
        "CountActiveContactsDevice1": 0,
        "CountActiveContactsDevice2": 0,
        "DateCreated": "2021-05-31 14:57:21",
        "UpdateDate": "2021-05-31 14:57:21"
      }
    ]
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Tue, 01 Jun 2021 07:26:20 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '3921' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Contact/GetGroupList`;
const advancedLink = `https://capi.mesergo.co.il/api/v2/Contact/GetGroupList?view=json`;

</script>
<template>
  <div class="xl:flex rounded-md space-x-10 border-b border-gray-300">
    <!-- Left Panel -->
    <div class="xl:w-[50%]">
      <div class="mb-6 mt-5 border-b border-gray-300 pb-4">
        <div class="flex items-center gap-2 mb-2">
          <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
          <h1 class=" font-semibold text-gray-900">Get Group List</h1>
        </div>
        <Murkdown :rawCode="whitelistlink" />
        <p class="mt-3 test-sm">This function Gets the list of Groups.</p>
        <p class="mt-3 test-sm">The request is to be by POST.</p>
      </div>

      <div class="mb-8 mt-5">
        <p class="font-semibold my-5">Parameters</p>
        <DocTable :columns="columns" :plans="parameters" />
      </div>

      <p class="mt-3 font-medium">Advanced options</p>
      <Murkdown :rawCode="advancedLink" />

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
      <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Get group list" language="json"
        borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
      <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
        borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
        :headers="whitelistHeaders" />
    </div>
  </div>

</template>