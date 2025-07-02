<!-- File: pages/YourPage.vue -->
<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import DocTable from '@/components/my-components/DocTable.vue';
import DocCode from '@/components/my-components/DocCode.vue';
import { type BreadcrumbItem } from '@/types';
import Murkdown from '@/components/my-components/Murkdown.vue';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'SMS Document', href: '/rate-plan' },
];

const columns = [
  { key: 'id', label: 'ID' },
  { key: 'parameters', label: 'Parameters' },
  { key: 'required', label: 'Required' },
  { key: 'type', label: 'Type' },
  { key: 'value', label: 'Value' },
];

const data = [
  {
    id: 1,
    parameters: 'Message',
    required: 'Required',
    type: 'string',
    value: 'SMS message that needs to be sent.',
  },
  {
    id: 2,
    parameters: 'Phone',
    required: 'Required',
    type: 'string',
    value: 'The recipient phone number.',
  },
  {
    id: 3,
    parameters: 'Sender',
    required: 'Required',
    type: 'string',
    value: `The ID that will be displayed in the recipient's phone as the sender.\nThe "Sender" field is restricted to a maximum of 11 characters (no spaces) or a phone number with a maximum of 14 digits. You can also write an asterisk (*) at the beginning.`,
  },
];

const curlExampleRaw = `
curl --location 'https://capi.mesergo.co.il/api/v2/SMS/SendSms' \\
--header 'Content-Type: application/json' \\
--header 'Authorization: Your Base Credentials' \\
--data '{
  "Data": {
    "Message": "hello world",
    "Recipients": [
      { "Phone": "0541234567" }
    ]
  }
}'`;

const response = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/SMS/SendSms",
  "RequestId": "sFmbyVGdulmL1J3bm5WauEjMnR3ckV3bsNWPl1WYOR3cvhkJxETQzUSO1E0MlkDMrgTMtATMtEjMwITPw1WY0NVZtlGVmcjM4MDMwETPklkclNXV",
  "Data": {
    "Recipients": 1,
    "Errors": null
  }
}`;

const link = `
https://mesergo.co.il/
`;
</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">

    <Head title="SMS Document" />

    <div class="mt-20 xl:ml-14 mx-10 lg:mx-0">
      <div class="xl:flex">
        <!-- Left Panel -->
        <div class="xl:w-[50%] border-b border-gray-300 pb-10">
          <div class="border-b border-gray-300 pb-10">
            <h1 class="text-2xl font-semibold text-gray-900 pb-5">SMS</h1>
            <p>Using InfoUMobile's API, you can send outgoing SMS messages world wide.</p>
          </div>

          <div class="border-b border-gray-300 pb-10 mt-10">
            <h1 class="text-2xl font-semibold text-gray-900 pb-5">Send SMS</h1>
            <p>MeserGO's Programmable SMS API helps you add robust messaging capabilities to your applications.</p>
            <p>Using this API, you can send SMS messages using json, xml , web service and parameters.</p>
            <p class="py-3">In order to send the API request you need the User and Token from meserGO system (can use
              this explanation to create a token).</p>
            <a href="https://mesergo.co.il/" class="text-blue-600">Link to Response Status Codes</a>
          </div>

          <div class="mt-10">
            <h1 class="text-2xl font-semibold text-gray-900 pb-5">Send SMS using json</h1>
            <p>Client should perform Http Post .</p>
            <p>The encoding should be UTF-8.</p>
            <p class="mt-3">The Authentication method is basic authentication <a href="https://en.wikipedia.org/wiki/Basic_access_authentication" class="text-blue-600">link for explanation</a></p>
            <p class="py-3">You can see the code example and change the coding language in the field up here.</p>
          </div>

        </div>

        <!-- Right Panel -->
        <div class="xl:w-[50%] bg-[#272822] h-auto rounded-md">
          
        </div>
      </div>


      <div class="xl:flex rounded-md space-x-5">
        <!-- Left Panel -->
        <div class="xl:w-[50%] mt-5">
          <div class="mb-6 mt-5">
            <div class="flex items-center gap-2 mb-2">
              <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
              <h1 class="text-lg font-semibold text-gray-900">Simple example</h1>
            </div>
            <Murkdown :rawCode="link" />
          </div>

          <div class="mb-8 mt-10">
            <DocTable :columns="columns" :plans="data" />
          </div>

          <h2 class="text-lg font-semibold text-gray-900 mb-4">HEADERS</h2>
        </div>

        <!-- Right Panel -->
        <div class="xl:w-[50%] mt-10">
          <DocCode title="Example Request" subtitle="simple version" language="json" codeTitle="curl"
            :rawCode="curlExampleRaw" :headerBtn="true" />
          <DocCode class="mt-[-.5rem]" title="Example Response" subtitle="simple version" language="json" codeTitle="json"
            :rawCode="response" />
        </div>
      </div>
    </div>
  </AppLayout>
</template>
