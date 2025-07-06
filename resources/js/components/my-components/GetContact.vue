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
    value: 'Phone/Email/ContactRefId/ContactId'
  },
  {
    id: 2,
    parameters: 'Value',
    required: 'Request',
    type: 'string',
    value: 'Value of the type'
  },
  {
    id: 3,
    parameters: 'Configuration',
    required: 'Request',
    type: 'string',
    value: 'WithGroups/WithoutGroups'
  }
];

const whitelistBody = `
{
    "Data": {
        "Type": "Phone",
        "Value": "string",
        "Configuration": "WithoutGroups"
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Contact/GetContact?=null' \
--header 'Content-Type: application/json' \
--header 'Authorization:  Basic USER:TOKEN (Encode Base64)' \
--data '{
    "Data": {
        "Type": "Phone",
        "Value": "string",
        "Configuration": "WithoutGroups"
    }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Contact/GetContact",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJzATQzUCN1E0MlETMrEzMtUDMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "Contacts": {
      "Count": 1,
      "List": [
        {
          "ContactId": 585578002,
          "ContactRefId": "",
          "Email": "cohen@test.com",
          "EmailStatusId": 1,
          "PhoneNumber": "0541234567",
          "PhoneStatusId": 1,
          "DateCreated": "2021-05-31 11:08:31",
          "UpdateDate": "2021-05-31 11:08:31",
          "FirstName": "David",
          "LastName": "Cohen",
          "GenderId": null,
          "BirthDate": "",
          "AdditionalDate": "",
          "Text1": "",
          "Text2": "",
          "Text3": "",
          "Text4": "",
          "Text5": "",
          "Text6": "",
          "Text7": "",
          "Text8": "",
          "Text9": "",
          "Text10": "",
          "Text11": "",
          "Text12": "",
          "Text13": "",
          "Text14": "",
          "Text15": "",
          "Text16": "",
          "Text17": "",
          "Text18": "",
          "Text19": "",
          "Text20": "",
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
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Mon, 31 May 2021 08:54:02 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '254' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Contact/GetContact`;

</script>
<template>
  <div class="xl:flex rounded-md space-x-10 border-b border-gray-300">
    <!-- Left Panel -->
    <div class="xl:w-[50%]">
      <div class="mb-6 mt-5 border-b border-gray-300 pb-4">
        <div class="flex items-center gap-2 mb-2">
          <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
          <h1 class=" font-semibold text-gray-900">Get Contact</h1>
        </div>
        <Murkdown :rawCode="whitelistlink" />
        <p class="mt-3 test-sm">This function finds contacts by Phone/Email/ContactRefId/ContactId.</p>
        <p class="mt-3 test-sm">You can find more than one contact at a time if there is more than one contact based on your search.</p>
        <p class="mt-3 test-sm">The request should be POST</p>
      </div>

      <div class="mb-8 mt-5">
        <p class="font-semibold my-5">Parameters</p>
        <DocTable :columns="columns" :plans="parameters" />
      </div>

      <div class="border-b border-gray-300 pb-5">
        <p class="mt-3 text-sm">Response fieldes:</p>
        <p class="mt-3 text-sm">ContactId - (int) The system contact number.</p>
        <p class="mt-3 text-sm">ContactRefId - (string) The ID you provided for the contact (could be null).</p>
        <p class="mt-3 text-sm">EmailStatusId / PhoneStatusId - (int) The Phone / Email status.</p>
        <p class="mt-3 text-sm">• 1 - Active</p>
        <p class="mt-3 text-sm">• -2 - Unsubscribe</p>
        <p class="mt-3 text-sm">• 0 - WithOutStatus (if Email or Phone is empty)</p>
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
      <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="GetContact" language="json"
        borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
      <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
        borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
        :headers="whitelistHeaders" />
    </div>
  </div>

</template>