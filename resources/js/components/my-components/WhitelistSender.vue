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
    parameters: 'SenderId',
    required: 'Required',
    type: 'string',
    value: '	The Sender id do you want to whiten',
  },
  {
    id: 2,
    parameters: 'UserId',
    required: 'optional',
    type: 'string',
    value: 'If you want to whiten for another UserId under your account',
  },
  {
    id: 3,
    parameters: 'Username',
    required: 'optional',
    type: 'string',
    value: 'If you want to whiten for another username under your account.',
  },
  {
    id: 4,
    parameters: 'OtpType',
    required: 'optional',
    type: 'string',
    value: 'AUTO/SMS/VOICE – If you do not provide this parameter the default setting will be AUTO, meaning that if the Sender ID is a landline or a Kosher phone a Voice OTP will be sent, for all other phone types the OTP will be sent as text by SMS.',
  }
]



const whitelistBody = `
{
    "Data": {
        "SenderId":"0529999999",
        "UserId": "12346",
        "Username": "Username",
        "OtpType": "SMS/VOICE/AUTO"
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/SMS/Whitelist/SendOtp' \
--header 'Authorization: Your Base Credentials' \
--data '{
    "Data": {
        "SenderId":"0529999999"
    }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/SMS/Whitelist/SendOtp",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJ3MTQzUSOzE0MlkDMrMTMtITMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "Sent": true,
    "SenderId": "0529999999",
    "UserId": 1044244
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Mon, 13 Dec 2021 07:39:36 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '372' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/SMS/Whitelist/SendOtp`;

</script>
<template>
    <div class="xl:flex rounded-md space-x-5">
        <!-- Left Panel -->
        <div class="xl:w-[50%] mt-5">
            <div class="mt-10 border-b border-gray-300 pt-5">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">Whitelist - Sender</h2>
            </div>
            <div class="mt-10 border-b border-gray-300 pt-5">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">Whitelist - Send OTP</h2>
            </div>
            <div class="mb-6 mt-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                    <h1 class=" font-semibold text-gray-900">SendOtp</h1>
                </div>
                <Murkdown :rawCode="whitelistlink" />
                <p class="mt-3">This function sends SMS/Call OTP for Submit a request to whitelist</p>
                <p class="mt-3">To use this function contact our customer support.</p>
                <p class="mt-3">The Authentication method is basic authentication <a href="https://en.wikipedia.org/wiki/Basic_access_authentication" class="text-blue-600">link for explanation</a></p>
            </div>

            <div class="mb-8 mt-10">
                <p class="font-semibold pb-4 text-sm">Parameters</p>
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
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="SendOtp" language="json"
                borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
                borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
                :headers="whitelistHeaders" />
        </div>
    </div>
</template>