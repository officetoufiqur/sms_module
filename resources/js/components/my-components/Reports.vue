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
    parameters: 'Phone',
    required: 'Required',
    type: 'string',
    value: 'The phone number you want to receive the report on',
  },
  {
    id: 2,
    parameters: 'FromDate',
    required: 'Required',
    type: 'date',
    value: 'Start report date (incloud this day)',
  },
  {
    id: 3,
    parameters: 'ToDate',
    required: 'Required',
    type: 'date',
    value: 'End report date (incloud this day)',
  },
  {
    id: 4,
    parameters: 'Lavel',
    required: 'Required',
    type: 'string',
    value: '	Customer /Project /User',
  }
]



const whitelistBody = `
{
    "Data": {
        "Phone": "0543266290",
        "FromDate": "2021-08-03",
        "ToDate": "2021-08-03",
        "Level": "User"
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/SMS/GetSentMessages' \
--header 'Content-Type: application/json' \
--header 'Authorization: Your Base Credentials' \
--data '{
"Data": {
"Phone": "0543266290",
"FromDate": "2021-08-03",
"ToDate": "2021-08-03",
"Level": "User"

}
}'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/SMS/GetSentMessages",
  "RequestId": ",,Abh5mclRnbp5yZul2ZhR3cuEjMkV3bsN2Z0NXPl1WYOR3cvhkJ3QTQzUyNxE0MlUTMrITMtcDMtMjMwITPw1WY0NVZtlGVmQzM4QDMwETPklkclNXV",
  "Data": {
    "List": [
      {
        "CustomerId": 3,
        "ProjectId": 24,
        "UserId": 1004834,
        "TimeSent": "2021-08-03T13:53:43.31",
        "TimeOfConfirmation": "2021-08-03T13:53:44",
        "SenderId": "ariellevi",
        "DeliveryNotificationStatusId": 2,
        "DeliveryNotificationReasonName": "Delivered",
        "PhoneNumber": "0549999999",
        "ContactId": 0,
        "CustomerMessageId": "",
        "ContactFullName": null,
        "CustomerParameter": "",
        "mesergoApplicationParameter": "9W0GJB6311K0KJCB",
        "Message": "This is a test SMS Message",
        "NumberOfSegments": 1
      },
      {
        "CustomerId": 3,
        "ProjectId": 24,
        "UserId": 1004834,
        "TimeSent": "2021-08-03T13:58:14.123",
        "TimeOfConfirmation": "2021-08-03T13:58:15",
        "SenderId": "ariellevi",
        "DeliveryNotificationStatusId": 2,
        "DeliveryNotificationReasonName": "Delivered",
        "PhoneNumber": "0549999999",
        "ContactId": 0,
        "CustomerMessageId": "",
        "ContactFullName": null,
        "CustomerParameter": "",
        "mesergoApplicationParameter": "9W0GJB6311K0KJCB",
        "Message": "This is a test SMS Message ",
        "NumberOfSegments": 1
      }
    ],
    "LastFetch": {
      "DateTime": "2021-08-03T13:58:14.123",
      "Id": 10224
    }
  }
}
`;

const whitelistHeaders = [
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/SMS/GetSentMessages`;

</script>
<template>
    <div class="xl:flex rounded-md space-x-5 border-b border-gray-300">
        <!-- Left Panel -->
        <div class="xl:w-[50%] mt-5">
            <div class="mt-10 border-b border-gray-300 pt-5">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">Reports</h2>
            </div>
             <div class="border-b border-gray-300 pt-5">
                <h2 class="text-lg font-semibold text-gray-900 pb-5">Get Sent Messages</h2>
            </div>
            <div class="mb-6 mt-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                    <h1 class=" font-semibold text-gray-900">AuthenticateOtp</h1>
                </div>
                <Murkdown :rawCode="whitelistlink" />
                <p class="mt-3">This function gets the sent messages report by phone number.</p>
                <p class="mt-3">*To use this function please contact to sales department</p>
            </div>

            <div class="mb-8 mt-5">
                <DocTable :columns="columns" :plans="whitelistRow" />
                <p class="mt-3 text-sm">If you choose level "customer\Project" then you will also receive in the report messages sent by other users in the same customer or project, provided you have the appropriate permissions.</p>
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
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Get Sent Messages" language="json"
                borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
                borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
                :headers="whitelistHeaders" />
        </div>
    </div>
</template>