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
    parameters: 'FilterBy',
    required: 'Required',
    type: 'string',
    value: 'CreatedDate/UpdatedDate',
  },
  {
    id: 2,
    parameters: 'FromDate',
    required: 'Required',
    type: 'Date',
    value: 'From Date includes this date',
  },
  {
    id: 3,
    parameters: 'ToDate',
    required: 'Required',
    type: 'Date',
    value: 'To Date include this date',
  },
  {
    id: 4,
    parameters: 'OnlyForGroupId',
    required: 'Optional',
    type: 'int',
    value: 'If you want to get contacts on specific group',
  },
  {
    id: 5,
    parameters: 'LastFetchedId',
    required: 'Optional',
    type: 'int',
    value: 'Get batch starting with ID larger than xxx (if a first request is made use 0 or null)',
  },
];


const whitelistBody = `
{
    "Data": {
        "FilterBy": "CreatedDate",
        "FromDate": "2021/05/15",
        "ToDate": "2021/05/30",
        "OnlyForGroupId": "300226604",
        "LastFetchedId": 0
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Contact/GetContactList?Content-Type=application%2Fjson&Authorization=%20Basic%20USER%3ATOKEN%20(Encode%20Base64)' \
--data '{
    "Data": {
        "FilterBy": "CreatedDate",
        "FromDate": "2021/05/15",
        "ToDate": "2021/05/30",
        "OnlyForGroupId": "300226604",
        "LastFetchedId": 0
    }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Contact/GetContactList",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJ1QTQzUCO0E0MlMTMrEzMtUDMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "LastFetchedId": 578674342,
    "Count": 1,
    "List": [
      {
        "ContactId": 578674342,
        "ContactRefId": null,
        "Email": null,
        "EmailStatusId": 0,
        "PhoneNumber": "0732224536",
        "PhoneStatusId": 1,
        "DateCreated": "2021-05-18 09:25:55",
        "UpdateDate": "2021-05-24 09:48:03",
        "FirstName": "אריאל",
        "LastName": "Levi",
        "GenderId": null,
        "BirthDate": "",
        "AdditionalDate": "",
        "Text1": "",
        "Text2": null,
        "Text3": null,
        "Text4": null,
        "Text5": null,
        "Text6": null,
        "Text7": null,
        "Text8": null,
        "Text9": null,
        "Text10": null,
        "Text11": null,
        "Text12": null,
        "Text13": null,
        "Text14": null,
        "Text15": null,
        "Text16": null,
        "Text17": null,
        "Text18": null,
        "Text19": null,
        "Text20": null,
        "Number1": null,
        "Number2": null,
        "Number3": null,
        "Number4": null,
        "Date1": null,
        "Date2": null,
        "Date3": null,
        "Date4": null,
        "Date5": null,
        "Date6": null,
        "Date7": null,
        "Date8": null
      }
    ]
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Mon, 31 May 2021 10:48:45 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '254' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Contact/GetContactList`;

</script>
<template>
  <div class="xl:flex rounded-md space-x-10 border-b border-gray-300">
    <!-- Left Panel -->
    <div class="xl:w-[50%]">
      <div class="mb-6 mt-5 border-b border-gray-300 pb-4">
        <div class="flex items-center gap-2 mb-2">
          <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
          <h1 class=" font-semibold text-gray-900">Get Contact List</h1>
        </div>
        <Murkdown :rawCode="whitelistlink" />
        <p class="mt-3 test-sm">This function Gets the list of contacts.</p>
        <p class="mt-3 test-sm">The request is to be by POST.</p>
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
      <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Get contact list
" language="json"
        borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
      <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
        borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
        :headers="whitelistHeaders" />
    </div>
  </div>

</template>