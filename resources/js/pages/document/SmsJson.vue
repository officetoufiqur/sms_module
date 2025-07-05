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

const advanceData = [
  {
    id: 1,
    parameters: 'Message',
    required: 'Required',
    type: 'string',
    value: 'SMS message that needs to be sent.',
  },
  {
    id: 2,
    parameters: 'SavedMessageId',
    required: 'Optional',
    type: 'integer',
    value: "Send saved message in your account by id. (if you use this tag, don't use Message tag)",
  },
  {
    id: 3,
    parameters: 'Recipients',
    required: '',
    type: 'array',
    value: 'You can send the message to multiple recipients in array. The message can be sent to recipients or groups',
  },
  {
    id: 4,
    parameters: 'FirstName',
    required: 'Optional',
    type: 'string',
    value: 'The first name of the customer(can be used for personalization in the sending SMS)',
  },
  {
    id: 5,
    parameters: 'LastName',
    required: 'Optional',
    type: 'string',
    value: 'The last name of the customer(can be used for personalization in the sending SMS)',
  },
  {
    id: 6,
    parameters: 'Representative',
    required: 'Optional',
    type: 'string',
    value: 'You can add custom fields for any recipients and use this fields in the SMS message',
  },
  {
    id: 7,
    parameters: 'Phone',
    required: 'required',
    type: 'string',
    value: 'The recipient phone number.',
  },
  {
    id: 8,
    parameters: 'GroupNumbers',
    required: '',
    type: 'array',
    value: '',
  },
  {
    id: 9,
    parameters: 'GroupNumber',
    required: 'Optional',
    type: 'integer',
    value: 'Use this parameter in order to send messages to a group according to the group number defined in your account',
  },
  {
    id: 10,
    parameters: 'ExcludeGroupNumber',
    required: '',
    type: 'array',
    value: '',
  },
  {
    id: 11,
    parameters: 'GroupNumber',
    required: 'Optional',
    type: 'integer',
    value: 'Use this parameter in order to exclude this group from all recipients you want to send the message to',
  },
  {
    id: 12,
    parameters: 'Settings',
    required: '',
    type: '',
    value: '',
  },
  {
    id: 13,
    parameters: 'Sender',
    required: 'required',
    type: 'string',
    value: `The ID that will be displayed in the recipient's phone as the sender. The "Sender" field is restricted to a maximum of 11 characters (Consecutive characters, no spaces) or a Phone number that contains maximum 14 digits (no characters)that allowed in the white list in the system(to insert the phone to the white list go to the folder Whitelist - Sender ). You can also write an asterisk (\\\\\*) at the beginning of the identifier.`,
  },
  {
    id: 14,
    parameters: 'CampaignName',
    required: 'Optional',
    type: 'string',
    value: 'The campaign name which will appear in your campaign reports.The messaged will be aggregate to this campaign'
  },
  {
    id: 15,
    parameters: 'TimeToSend',
    required: 'Optional',
    type: 'date time',
    value: 'Date and time on which the messages will be sent. Please use the following format: yyyy-mm-dd hh:mm:ss. If left blank, the message will be sent immediately.'
  },
  {
    id: 13,
    parameters: 'DelaySeconds',
    required: 'Optional',
    type: 'integer',
    value: 'Number of seconds of delay from receiving the request in the system and up to sending the message (use this parameter as long as the TimeToSend parameter is not in use).'
  },
  {
    id: 14,
    parameters: 'CustomerMessageId',
    required: 'Optional',
    type: 'string',
    value: 'Message ID on the client application. When confirmation on delivery is sent back to the client, the message ID is also sent for synchronization.'
  },
  {
    id: 15,
    parameters: 'CustomerParameter',
    required: 'Optional',
    type: 'string',
    value: 'Parameter set by the client that can be seen in the detail message reports, later. Can be used to mark each message by activity segmentation, for example.'
  },
  {
    id: 16,
    parameters: 'DeliveryNotificationUrl',
    required: 'Optional',
    type: 'string',
    value: 'Enter the URL address to which the DLR will be sent via a POST request'
  },
  {
    id: 17,
    parameters: 'Priority',
    required: 'Optional',
    type: 'string',
    value: 'In order to prioritize your messages, you can use the priority tag, when 0 means normal priority, -1 high priority (used only for a single message), and then 1,2 and so on. The higher the value, the lower the priority.'
  },
  {
    id: 18,
    parameters: 'MaxSegments',
    required: 'Optional',
    type: 'string',
    value: 'When sending long messages, this parameter allows the client to set the maximum number of segments per message. Value 0 means unlimited segments.'
  },
  {
    id: 19,
    parameters: 'IgnoreUnsubscribeCheck',
    required: 'Optional',
    type: 'boolean',
    value: 'Set true for ignore blacklist check. (Contact customer support for this option).'
  },
  {
    id: 20,
    parameters: 'ExpireDate',
    required: 'Optional',
    type: 'date time',
    value: 'In case of delay in sending the messages the cellular company will check if the date in this parameter has passed. If the date has passed the message will not be sent.'
  },
  {
    id: 21,
    parameters: 'IgnorePossibleSendingTime',
    required: 'Optional',
    type: 'boolean',
    value: 'Set true for ignore the time sending that you set in your account'
  },
  {
    id: 22,
    parameters: 'CheckTimeRestiction',
    required: 'Optional',
    type: 'boolean',
    value: 'Set true to not send the message to recipient that already received a message in the last X days (default x is 14, you can change the number in your account)'
  },
  {
    id: 23,
    parameters: 'ShortenUrlEnable',
    required: 'Optional',
    type: 'boolean',
    value: 'Set true for replace the URL addresses in the message to shorten the URLs'
  },
  {
    id: 24,
    parameters: 'AllowDuplicates',
    required: 'Optional',
    type: 'string',
    value: 'Set true to allow to send message to the same recipient in same request.'
  },
  {
    id: 25,
    parameters: 'TrackPurchaseTData',
    required: 'Optional',
    type: 'boolean',
    value: 'Set true to associate purchasing with this campaign. If you set true the CampaignName is required. This function is paid extra'
  }
]

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

const smsBody = `
{
    "Data": {
        "Message": "Hello world",
        "Recipients": [
            {
                "Phone": "0541234567"
            }
        ],
         "Settings": {
            "Sender": "MyBrand"
            } 
}
}`;

const smsAdvanceBody = `
{
    "Data": {
        "Message": "Hello [#FirstName#] [#LastName#], reminder for meeting with [#Representative#]",
        
        "Recipients": [
            {
                "FirstName": "Jon",
                "LastName": "Smith",
                "Representative": "David",
                "Phone": "0541234567"
            },
            {
                "FirstName": "Danni",
                "LastName": "levi",
                "Representative": "Mike",
                "Phone": "0581234567"
            }
        ],
        "GroupNumbers": [
            {
                "GroupNumber": 7
            }
        ],
        "ExcludeGroupNumbers": [
            {
                "GroupNumber": 29
            }
        ],
        "Settings": {
            "Sender": "info",
            "CampaignName": "Advance sending",
            "TimeToSend": "2022-11-13 13:00:00",
            "DelayInSeconds": 10,
            "CustomerMessageID": "AF7864348",
            "CustomerParameter": "sms",
            "DeliveryNotificationUrl": "https://mysite.co.il/DeliveryNotification.aspx",
            "Priority": 0,
            "MaxSegments": 0,
            "IgnoreUnsubscribeCheck": false,
            "ExpireDate": "2022-11-13 13:00:00",
            "IgnorePossibleSendingTime": false,
            "CheckTimeRestiction": false,
            "ShortenUrlEnable": true,
            "AllowDuplicates": false,
            "TrackPurchaseTData": true

        }
    }
}`;

const headers = [
  { key: 'Date', value: 'Mon, 18 Oct 2021 06:59:10 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'X-XSS-Protection', value: '1; mode=block' },
  { key: 'Content-Length', value: '332' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const link = `https://mesergo.co.il/`;

const advanceExample = `https://capi.mesergo.co.il/api/v2/SMS/SendSms`;
</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">

    <Head title="SMS Document" />

    <div class="mt-20 xl:ml-14 mx-10 lg:mx-0  max-w-[94.3rem]">
      <!-- symple example -->
      <div class="border-b border-gray-300 pb-10">
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
              <p class="mt-3">The Authentication method is basic authentication <a
                  href="https://en.wikipedia.org/wiki/Basic_access_authentication" class="text-blue-600">link for
                  explanation</a></p>
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
            <DocCode language="json" :rawCode="smsBody" />
          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
            <DocCode title="Example Request" subtitle="simple version" language="json" codeTitle="curl"
              borderStyle="border-b border-gray-700" :rawCode="curlExampleRaw" :headerBtn="true" />
            <DocCode class="mt-[-.5rem]" title="Example Response" subtitle="simple version" language="json"
              borderStyle="border-b border-gray-700" codeTitle="json" :rawCode="response" />
          </div>



        </div>
      </div>

      <!-- Advanced example -->
      <div class="mt-5">
        <div class="xl:flex rounded-md space-x-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] mt-5">
            <div class="mb-6 mt-5">
              <div class="flex items-center gap-2 mb-2">
                <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                <h1 class="text-lg font-semibold text-gray-900">Advanced example</h1>
              </div>
              <Murkdown :rawCode="advanceExample" />
            </div>

            <div class="mb-8 mt-10">
              <DocTable :columns="columns" :plans="advanceData" />
            </div>

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
            <DocCode language="json" :rawCode="smsAdvanceBody" />
          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
            <DocCode title="Example Request" subtitle="simple version" language="json" codeTitle="curl"
              borderStyle="border-b border-gray-700" :rawCode="curlExampleRaw" :headerBtn="true" :headers="headers" />
            <DocCode class="mt-[-.5rem]" title="Example Response" subtitle="simple version" language="json"
              borderStyle="border-b border-gray-700" codeTitle="json" :rawCode="response" />
          </div>



        </div>
      </div>
    </div>
  </AppLayout>
</template>
