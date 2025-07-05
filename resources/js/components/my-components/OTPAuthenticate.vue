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
    parameters: 'UserName',
    required: 'Required',
    type: 'string',
    value: 'Username of the account that was supplied by meserGO'
  },
  {
    id: 2,
    parameters: 'Token',
    required: 'Required',
    type: 'string',
    value: 'Token of the account'
  },
  {
    id: 3,
    parameters: 'OtpType',
    required: 'Required',
    type: 'string',
    value: 'SMS or Mail'
  },
  {
    id: 4,
    parameters: 'OtpValue',
    required: 'Required',
    type: 'string',
    value: 'The mobile number or Email address'
  },
  {
    id: 5,
    parameters: 'UserName',
    required: 'Optional',
    type: 'string',
    value: 'Leave blank if you want to verify only by OtpCode & OtpValue. Otherwise, use the compatible field as in the SendOtp Request'
  },
  {
    id: 6,
    parameters: 'RequestToken',
    required: 'Optional',
    type: 'string',
    value: 'Leave blank if you want to verify only by OtpCode & OtpValue. Otherwise, use the compatible field as in the SendOtp Request'
  }
]



const whitelistBody = `
{
  "User": {
  "Username": "UserName",
  "Token": "Token"
  },
  "Data": {
  "OtpCode": "615830",
  "OtpValue": "0529999999"
  }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/Otp/Authenticate' \
--data '{
"User": {
  "Username": "UserName",
  "Token": "Token"
  },
  "Data": {
  "OtpCode": "615830",
  "OtpValue": "0529999999"
  }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "OK",
  "DetailDescription": null,
  "RequestToken": null,
  "FunctionName": "api/Otp/Authenticate",
  "Records": null,
  "ReturnData": null
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Sun, 17 Jul 2022 08:56:08 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '198' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' },
  { key: 'Strict-Transport-Security', value: 'max-age=15552000' },
];

const whitelistlink = `https://capi.mesergo.co.il/api/Otp/Authenticate`;

</script>
<template>
    <div class="xl:flex rounded-md space-x-5 border-b border-gray-300">
        <!-- Left Panel -->
        <div class="xl:w-[50%] mt-5">
            <div class="mb-6 mt-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                    <h1 class=" font-semibold text-gray-900">Authenticate</h1>
                </div>
                <Murkdown :rawCode="whitelistlink" />
                <p class="mt-3">This function authenticates the code of the user entered into your system.</p>
                <p class="mt-3">The client should perform Http Post request to the following URL using UTF-8 encoding:</p>
            </div>

            <div class="mb-8 mt-5">
                <DocTable :columns="columns" :plans="whitelistRow" />
                <p class="mt-3 text-sm">For full JSON options please click on bellow link:</p>
                <a href="https://capi.mesergo.co.il/api/Otp/Authenticate?view=json" class="text-blue-600 text-sm mt-3">https://capi.mesergo.co.il/api/Otp/Authenticate?view=json</a>
            </div>

            <div class="mt-10 border-b border-gray-300 pb-10">
                <h2 class="text-lg font-semibold text-gray-800 border-b border-gray-200 pb-3 mt-10">Body <span
                        class="text-gray-400">raw (json)</span></h2>
                <DocCode language="json" :rawCode="whitelistBody" />
            </div>

        </div>

        <!-- Right Panel -->
        <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Authenticate" language="json"
                borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
                borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
                :headers="whitelistHeaders" />
        </div>
    </div>
</template>