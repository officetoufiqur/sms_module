<script setup lang="ts">
import DocTable from '@/components/my-components/DocTable.vue';
import DocCode from '@/components/my-components/DocCode.vue';
import Murkdown from '@/components/my-components/Murkdown.vue';

const columns = [
  { key: 'parameters', label: 'Parameters' },
  { key: 'type', label: 'Type' },
  { key: 'value', label: 'Description' },
];

const parameters = [
  {
    id: 1,
    parameters: 'FieldId',
    type: 'int',
    value: 'The filed ID in meserGO system',
  },
  {
    id: 2,
    parameters: 'ActualFieldName',
    type: 'string',
    value: 'The API Filed Name',
  },
  {
    id: 3,
    parameters: 'Caption',
    type: 'string',
    value: 'The filed name in meserGO system',
  },
  {
    id: 4,
    parameters: 'FieldType',
    type: 'string',
    value: 'The filed type',
  }
];


const whitelistBody = `
{}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Contact/GetFields/' \
--header 'Content-Type: application/json' \
--header 'Authorization: Your Base Credentials' \
--data '{}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Contact/GetFields",
  "RequestId": ",wWYuJXZ05WauUncvZmbp5CMykGchNWPl1WYOR3cvhkJwATQzUyNzE0MlkDMrAzMtcDMtQjMwITPw1WY0NVZtlGVmcjNzQjNwETPklkclNXV",
  "Data": {
    "Count": 21,
    "List": [
      {
        "FieldId": 1,
        "ActualFieldName": "FirstName",
        "Caption": "שם פרטי",
        "FieldType": "string"
      },
      {
        "FieldId": 2,
        "ActualFieldName": "LastName",
        "Caption": "שם משפחה",
        "FieldType": "string"
      },
      {
        "FieldId": 3,
        "ActualFieldName": "PhoneNumber",
        "Caption": "טלפון",
        "FieldType": "string"
      },
      {
        "FieldId": 5,
        "ActualFieldName": "Email",
        "Caption": "אימייל",
        "FieldType": "string"
      },
      {
        "FieldId": 42,
        "ActualFieldName": "BirthDate",
        "Caption": "תאריך לידה",
        "FieldType": "date"
      },
      {
        "FieldId": 46,
        "ActualFieldName": "GenderId",
        "Caption": "מגדר",
        "FieldType": "gender"
      },
      {
        "FieldId": 48,
        "ActualFieldName": "AdditionalDate",
        "Caption": "תאריך נוסף",
        "FieldType": "date"
      },
      {
        "FieldId": 153,
        "ActualFieldName": "ContactRefId",
        "Caption": "מספר אסמכתא",
        "FieldType": "string"
      },
      {
        "FieldId": 162,
        "ActualFieldName": "Device1Id",
        "Caption": "מזהה מכשיר 1",
        "FieldType": "string"
      },
      {
        "FieldId": 164,
        "ActualFieldName": "Device2Id",
        "Caption": "מזהה מכשיר 2",
        "FieldType": "string"
      },
      {
        "FieldId": 166,
        "ActualFieldName": "Device1Type",
        "Caption": "סוג מכשיר 1",
        "FieldType": "string"
      },
      {
        "FieldId": 168,
        "ActualFieldName": "Device2Type",
        "Caption": "סוג מכשיר 2",
        "FieldType": "string"
      },
      {
        "FieldId": 170,
        "ActualFieldName": "Device1StatusId",
        "Caption": "סטטוס מכשיר 1",
        "FieldType": "int"
      },
      {
        "FieldId": 172,
        "ActualFieldName": "Device2StatusId",
        "Caption": "סטטוס מכשיר 2",
        "FieldType": "int"
      },
      {
        "FieldId": 183,
        "ActualFieldName": "ContactScoring",
        "Caption": "דירוג",
        "FieldType": "int"
      },
      {
        "FieldId": 16522,
        "ActualFieldName": "Text1",
        "Caption": "קישור",
        "FieldType": "string"
      },
      {
        "FieldId": 16907,
        "ActualFieldName": "Text25",
        "Caption": "טקסט חדש",
        "FieldType": "string"
      },
      {
        "FieldId": 16908,
        "ActualFieldName": "Text26",
        "Caption": "מספר חדש",
        "FieldType": "string"
      },
      {
        "FieldId": 16909,
        "ActualFieldName": "Text27",
        "Caption": "תאריך חדש",
        "FieldType": "string"
      },
      {
        "FieldId": 16910,
        "ActualFieldName": "Date25",
        "Caption": "תאריך",
        "FieldType": "date"
      },
      {
        "FieldId": 17765,
        "ActualFieldName": "Number25",
        "Caption": "מספרי",
        "FieldType": "int"
      }
    ]
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Tue, 30 Jul 2024 06:37:00 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '4393' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' },
  { key: 'Strict-Transport-Security', value: 'max-age=15552000' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Contact/GetFields/`;

</script>
<template>
  <div class="xl:flex rounded-md space-x-10 border-b border-gray-300">
    <!-- Left Panel -->
    <div class="xl:w-[50%]">
      <div class="mb-6 mt-5 border-b border-gray-300 pb-4">
        <div class="flex items-center gap-2 mb-2">
          <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
          <h1 class=" font-semibold text-gray-900">Get Fields</h1>
        </div>
        <Murkdown :rawCode="whitelistlink" />
        <p class="mt-3 test-sm">This function Gets the list of contact fields</p>
        <p class="mt-3 test-sm">The request is to be by POST</p>
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
      <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Get Fields" language="json"
        borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
      <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
        borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
        :headers="whitelistHeaders" />
    </div>
  </div>

</template>