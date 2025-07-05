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
  { key: 'type', label: 'Type' },
  { key: 'value', label: 'Value' },
];


const params = [
  {
    id: 1,
    parameters: 'UserName',
    type: 'string',
    value: 'The username in meserGO system',
  },
  {
    id: 2,
    parameters: 'ApiToken',
    type: 'string',
    value: 'The token from meserGO system',
  },
  {
    id: 3,
    parameters: 'SenderCellNumber',
    type: 'string',
    value:
      'The ID that will be displayed in the recipient\'s phone as the sender. The "Sender" field is restricted to a maximum of 11 Latin characters (Consecutive characters, no spaces) or 14 digits (no characters). You can also write an asterisk (*) at the beginning of the identifier.',
  },
  {
    id: 4,
    parameters: 'CellNumber',
    type: 'string',
    value: 'Recipient\'s phone list. Multiple recipients may be added when separated by a semicolon ";"',
  },
  {
    id: 5,
    parameters: 'MessageString',
    type: 'string',
    value: 'SMS message that needs to be sent.',
  },
  {
    id: 6,
    parameters: 'IgnoreUnsubscribeCheck',
    type: 'boolean',
    value: 'Set true for ignore blacklist check. (Contact customer support for this option).',
  },
];



const curlExampleRaw = `
curl --location 'https://api.mesergo.co.il/mesergofrontend/WebInterface/SendMessageByNumber.aspx?UserName=string&ApiToken=string&SenderCellNumber=string&CellNumber=string&MessageString=string&IgnoreUnsubscribeCheck=boolean'
`;



const link = `https://api.mesergo.co.il/mesergofrontend/WebInterface/SendMessageByNumber.aspx?UserName=string&ApiToken=string&SenderCellNumber=string&CellNumber=string&MessageString=
string&IgnoreUnsubscribeCheck=boolean`;

</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">

    <Head title="SMS Document" />

    <div class="mt-20 xl:ml-14 mx-10 lg:mx-0 max-w-[94.3rem]">
      <!-- symple example -->
      <div class="border-b border-gray-300 pb-10">
        <div class="xl:flex space-x-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] border-b border-gray-300 pb-10">
            <div class="border-b border-gray-300 pb-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Send SMS using xml</h1>
              <p class="pb-2">For sending SMS using xml click on the link and see Pages 1-9</p>
              <a href="https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf" class="text-blue-600">https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf</a>
            </div>

            <div class="border-b border-gray-300 pb-10 mt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Send SMS Using Web Service Interface</h1>
              <p class="pb-2">For sending SMS using Web Service Interface click on the link and see Pages 10-11</p>
              <a href="https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf" class="text-blue-600">https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf</a>
            </div>
            
            <div class="mt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Send SMS Using Email to SMS</h1>
              <p class="pb-2">For sending SMS using Email to SMS Interface click on the link</p>
              <a href="https://www.mesergo.co.il/wp-content/uploads/2013/03/Email2SMS.pdf" class="text-blue-600">https://www.mesergo.co.il/wp-content/uploads/2013/03/Email2SMS.pdf</a>
            </div>

          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] bg-[#272822] h-auto rounded-md">

          </div>
        </div>


        <div class="xl:flex rounded-md space-x-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] mt-5">
            <div class="border-b border-gray-300 pb-5 mt-5">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Send SMS Using Parameters</h1>
            </div>

            <div class="mb-6 mt-5">
              <div class="flex items-center gap-2 mb-2">
                <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">GET</span>
                <h1 class="text-lg font-semibold text-gray-900">Send SMS using parameters</h1>
              </div>
              <Murkdown :rawCode="link" />
            </div>

            <div class="mb-8 mt-10">
              <DocTable :columns="columns" :plans="params" />
            </div>

            <div class="mt-10 border-b border-gray-300 pb-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Send SMS using Email</h1>
              <p class="pb-2">For sending SMS using Email click on the link below:</p>
              <a href="https://www.mesergo.co.il/wp-content/uploads/2013/03/Email2SMS.pdf" class="text-blue-600">https://www.mesergo.co.il/wp-content/uploads/2013/03/Email2SMS.pdf</a>
            </div>

          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
            <DocCode class="mt-[-.5rem]" title="Example Response" subtitle="simple version" language="json"
              borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="curlExampleRaw" />
          </div>



        </div>
      </div>

    </div>
  </AppLayout>
</template>
