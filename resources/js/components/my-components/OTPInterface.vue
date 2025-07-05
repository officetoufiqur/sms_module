<script setup lang="ts">
import DocTable from '@/components/my-components/DocTable.vue';
import DocCode from '@/components/my-components/DocCode.vue';
import Murkdown from '@/components/my-components/Murkdown.vue';
import OTPAuthenticate from './OTPAuthenticate.vue';

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
    value: 'Username of the account that was supplied by muserGO'
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
    parameters: 'OrpType',
    required: 'Required',
    type: 'string',
    value: 'SMS or Mail'
  },
  {
    id: 4,
    parameters: 'OrpValue',
    required: 'Required',
    type: 'string',
    value: 'The mobile number or Email address'
  },
  {
    id: 5,
    parameters: 'UserIP',
    required: 'Optional',
    type: 'string',
    value: 'The IP of the end user, for documentation only'
  },
  {
    id: 6,
    parameters: 'UserName',
    required: 'Optional',
    type: 'string',
    value: 'The UserName of end user, used to strengthen OTP authentication or for documentation such as IP'
  },
  {
    id: 7,
    parameters: 'RequestToken',
    required: 'Optional',
    type: 'string',
    value: 'If you want to determine the token of OTP authentication, Otherwise the system will issue one for you'
  }
]



const whitelistBody = `
{
  "User": {
  "UserName": "UserName",
  "Token": "Token"
  },
  "Data": {
  "OtpType": "sms",
  "OtpValue": "0529999999"
  }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/Otp/SendOtp' \
--data '{
"User": {
  "UserName": "UserName",
  "Token": "Token"
  },
  "Data": {
  "OtpType": "sms",
  "OtpValue": "0529999999"
  }
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "OK",
  "DetailDescription": "Message accepted successfully",
  "RequestToken": "1c03ef46-c09b-460e-a612-4760677ab4f4",
  "FunctionName": "api/Otp/SendOtp",
  "Records": null,
  "ReturnData": null
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Sun, 17 Jul 2022 08:51:17 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '254' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' },
  { key: 'Strict-Transport-Security', value: 'max-age=15552000' },
];

const whitelistlink = `https://capi.mesergo.co.il/api/Otp/SendOtp`;

</script>
<template>
    <div class="xl:flex rounded-md space-x-5 border-b border-gray-300">
        <!-- Left Panel -->
        <div class="xl:w-[50%] mt-5">
            <div class="mt-10 border-b border-gray-300 pt-5">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">OTP Interface</h2>
                <p class="text-sm mb-3">Sending one time password to a recipient and verifying the code that he or she enters. Note: if this option is not available to you- please contact sales department.</p>
            </div>
            <div class="mb-6 mt-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                    <h1 class=" font-semibold text-gray-900">Send Otp</h1>
                </div>
                <Murkdown :rawCode="whitelistlink" />
                <p class="mt-3">This function sends an OTP message to a customer via SMS or Email. The function generates the code automatically.</p>
                <p class="mt-3">The client should perform Http Post request to the following URL using UTF-8 encoding</p>
            </div>

            <div class="mb-8 mt-5">
                <DocTable :columns="columns" :plans="whitelistRow" />
                <p class="mt-3 text-sm">For full JSON options please click on bellow link:</p>
                <a href="https://capi.mesergo.co.il/api/Otp/SendOtp?view=json" class="text-blue-600 text-sm mt-3">https://capi.mesergo.co.il/api/Otp/SendOtp?view=json</a>
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
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Send Otp" language="json"
                borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
                borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
                :headers="whitelistHeaders" />
        </div>
    </div>

    <OTPAuthenticate />
</template>