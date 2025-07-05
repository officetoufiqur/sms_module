<!-- File: pages/YourPage.vue -->
<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import DocTable from '@/components/my-components/DocTable.vue';
import DocCode from '@/components/my-components/DocCode.vue';
import { type BreadcrumbItem } from '@/types';
import Murkdown from '@/components/my-components/Murkdown.vue';
import CheckIfSenderAllowed from '@/components/my-components/CheckIfSenderAllowed.vue';
import WhitelistSender from '@/components/my-components/WhitelistSender.vue';
import AuthenticateOtp from '@/components/my-components/AuthenticateOtp.vue';
import Reports from '@/components/my-components/Reports.vue';
import GetUnsubscribeLink from '@/components/my-components/GetUnsubscribeLink.vue';
import OTPInterface from '@/components/my-components/OTPInterface.vue';

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
    parameters: 'Type',
    required: 'required',
    type: 'string',
    value: 'For pull the Delivery Notification use Type: DeliveryNotificationSMS',
  },
  {
    id: 2,
    parameters: 'PhoneNumber',
    required: 'optional',
    type: 'string',
    value: 'For pull the receiving messages of this phone number only',
  },
  {
    id: 3,
    parameters: 'BatchSize',
    required: 'optional',
    type: 'string',
    value: 'The number of notifications transferred',
  }
];

const pullReceiving = [
  {
    id: 1,
    parameters: 'Type',
    required: 'required',
    type: 'string',
    value: 'For pull Incoming Messages use Type: IncomingMessagesSMS',
  },
  {
    id: 2,
    parameters: 'PhoneNumber',
    required: 'optional',
    type: 'string',
    value: 'For pull the receiving messages of this phone number only',
  },
  {
    id: 3,
    parameters: 'BatchSize',
    required: 'optional',
    type: 'string',
    value: 'The number of Messages transferred',
  }
]

const deleteFutureMessages = [
  {
    id: 1,
    parameters: 'PhoneNumber',
    required: 'optional',
    type: 'string',
    value: '	The phone number for which you want to delete future messages',
  },
  {
    id: 2,
    parameters: 'CustomerParam',
    required: 'optional',
    type: 'string',
    value: 'The customer paramter that sent in the send sms request',
  },
  {
    id: 3,
    parameters: 'CustomerMessageId',
    required: 'optional',
    type: 'string',
    value: 'The customer message ID that sent in the send sms request',
  }
]

const pullBody = `
{
"Data": {
        "Type": "IncomingMessagesSMS",
        "BatchSize": 500
  }
}
`;

const smsAdvanceBody = `
{
"Data": {
        "Type": "DeliveryNotificationSMS",
        "BatchSize": 500
  }
}
`;

const deleteBody = `
{
    "Data": {
        "PhoneNumber": "0549999999",
        "CustomerMessageID": "123456",
        "CustomerParameter": "123456"
    }
}
`;

const curlExampleRaw = `
curl --location 'https://capi.mesergo.co.il/api/v2/PullData' \
--header 'Authorization: Your Base Credentials' \
--data '{
"Data": {
        "Type": "DeliveryNotificationSMS",
        "BatchSize": 500
  }
}'
`;

const jsonResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/PullData",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJxITQzUyMxE0MlMTMrUTMtETMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "Count": 3,
    "List": [
      {
        "PartnerId": null,
        "CustomerId": null,
        "ProjectId": 1040177,
        "UserId": null,
        "InsertDate": "2021-11-15T13:12:34.617",
        "PullDataType": "DeliveryNotificationSMS",
        "PullData": {
          "PhoneNumber": "0541234657",
          "Network": "053",
          "Status": 2,
          "StatusDescription": "Delivered",
          "CustomerMessageId": 3,
          "CustomerParam": "sms",
          "SenderNumber": "ar",
          "SegmentsNumber": 1,
          "SentMessage": "Hello this is send sms api https://zapier.com/app/zap/137759827/history",
          "NotificationDate": "2021-11-15T13:12:23"
        }
      },
      {
        "PartnerId": null,
        "CustomerId": null,
        "ProjectId": 1040177,
        "UserId": null,
        "InsertDate": "2021-11-15T13:12:35.15",
        "PullDataType": "DeliveryNotificationSMS",
        "PullData": {
          "PhoneNumber": "0541234567",
          "Network": "053",
          "Status": 2,
          "StatusDescription": "Delivered",
          "CustomerMessageId": 3,
          "CustomerParam": "sms",
          "SenderNumber": "ar",
          "SegmentsNumber": 1,
          "SentMessage": "Hello this is send sms api",
          "NotificationDate": "2021-11-15T13:12:25"
        }
      },
      {
        "PartnerId": null,
        "CustomerId": null,
        "ProjectId": 1040177,
        "UserId": null,
        "InsertDate": "2021-11-15T13:13:05.537",
        "PullDataType": "DeliveryNotificationSMS",
        "PullData": {
          "PhoneNumber": "0541234567",
          "Network": "053",
          "Status": 2,
          "StatusDescription": "Delivered",
          "CustomerMessageId": 3,
          "CustomerParam": "sms",
          "SenderNumber": "ar",
          "SegmentsNumber": 1,
          "SentMessage": "Hello this is send sms api ",
          "NotificationDate": "2021-11-15T13:12:55"
        }
      }
    ]
  }
}
`;

const dataExample = `
[
  {
    "mesergoId": "SQLQ1_7ecf79b4-7581-4eb1-8693-612ff75bf251",
    "PhoneNumber": "0543266290",
    "Network": "054",
    "Status": 2,
    "OperatorResultId": 2,
    "StatusDescription": "Delivered",
    "ProjectId": 1040177,
    "CustomerMessageId": "",
    "CustomerParam": "",
    "id": "",
    "SenderNumber": "0537038376",
    "BillingCodeId": 1,
    "Price": 0,
    "SegmentsNumber": 1,
    "ActionType": "",
    "OriginalMessage": "בדיקה\n\nלהסרה השב הסר",
    "NotificationDate": "2024-09-30T13:26:00",
    "RetriesNumber": 0
  }
]
`;

const pushOption = `
{
  "CustomerId":28132,
  "ProjectId":1042593,
  "Data":[
    {
    "Channel":"SMS_MO",
    "Type":"PhoneNumber",
    "Value":"0522222229",
    "Keyword":"הסר",
    "Message":"הסר",
    "Network":"SMS",
    "ShortCode":"+97233769182",
    "ApplicationID":"11542",
    "CustomerParam":"SMf14104210035723ecab943567b4ad4b5",
    "MoSessionId":"SMf14104210035723ecab943567b4ad4b5"
    }
  ]
}
`;

const receivingRequest = `
curl --location 'https://capi.mesergo.co.il/api/v2/PullData' \
--header 'Authorization: Your Base Credentials' \
--data '{
"Data": {
        "Type": "IncomingMessagesSMS",
        "BatchSize": 500
}
}'
`;

const receivingResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/PullData",
  "RequestId": ",wWYuJXZ05WauUncvZmbp5CZ19Gbj1TZtFmT0N3bIZyM0E0MlAzMBNTJ2EzK5ATLyATLyIDMy0DctFGdTVWbpRlJzUjMwMTPklkclNXV",
  "Data": {
    "Count": 2,
    "List": [
      {
        "PartnerId": null,
        "CustomerId": null,
        "ProjectId": 25312,
        "UserId": null,
        "InsertDate": "2022-02-09T16:28:14.837",
        "PullDataType": "",
        "PullData": {
          "PhoneNumber": "0521234567",
          "Network": "052",
          "Status": "",
          "StatusDescription": "",
          "CustomerMessageId": "",
          "CustomerParam": "",
          "SenderNumber": "0521234567",
          "SegmentsNumber": "",
          "SentMessage": "T10",
          "NotificationDate": "2022-02-09T16:28:14"
        }
      },
      {
        "PartnerId": null,
        "CustomerId": null,
        "ProjectId": 25312,
        "UserId": null,
        "InsertDate": "2022-02-09T16:28:17.687",
        "PullDataType": "",
        "PullData": {
          "PhoneNumber": "0521234567",
          "Network": "052",
          "Status": "",
          "StatusDescription": "",
          "CustomerMessageId": "",
          "CustomerParam": "",
          "SenderNumber": "0529999999",
          "SegmentsNumber": "",
          "SentMessage": "T10",
          "NotificationDate": "2022-02-09T16:28:17"
        }
      }
    ]
  }
}
`;

const deleteExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/SMS/DeleteFutureMessages' \
--header 'Content-Type: application/json' \
--header 'Authorization: Your Base Credential' \
--data '{
    "Data": {
        "PhoneNumber": "0549999999",
        "CustomerMessageID": "123456",
        "CustomerParameter": "123456"
    }
}'
`;

const deleteResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/SMS/DeleteFutureMessages",
  "RequestId": ",wWYuJXZ05WauUncvZmbp5CMykGchNWPl1WYOR3cvhkJzETQzUyN0E0MlQTMrITMtcDMtMjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "DeletedCount": 1
  }
}
`;


const headers = [
  { key: 'Date', value: 'Mon, 15 Nov 2021 11:13:21 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '2876' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const deleteHeaders = [
  { key: 'Date', value: 'Wed, 12 Jul 2023 11:47:13 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '319' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' },
  { key: 'Strict-Transport-Security', value: 'max-age=15552000' }
];

const link = `https://capi.mesergo.co.il/api/v2/PullData`;
const recivelink = `https://capi.mesergo.co.il/api/v2/PullData`;
const deletelink = `https://capi.mesergo.co.il/api/v2/PullData`;

</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">

    <Head title="SMS Document" />

    <div class="mt-20 xl:ml-14 mx-10 lg:mx-0 max-w-[95.55rem]">
      <!-- symple example -->
      <div class="border-b border-gray-300 pb-10">
        <div class="xl:flex space-x-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] border-b border-gray-300 pb-10">
            <div class="border-b border-gray-300 pb-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Utilities</h1>
            </div>

            <div class="border-b border-gray-300 pb-10 mt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Delivery Notification</h1>
            </div>

            <div class="mt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Pull option using json</h1>
              <p class="pb-2">This function gets a list of Delivery Notification</p>
              <p class="pb-2">In order to pull notifications you need to enter the following address under the
                DeliveryNotificationUrl
                tag in send SMS. <a href="https://api.mesergo.co.il/InsertNotificationsToPullQueue.ashx"
                  class="text-blue-600">https://api.mesergo.co.il/InsertNotificationsToPullQueue.ashx</a></p>
              <p class="pb-2">NOTE: Once pulled, the notification entries are removed from our system queue</p>
              <p class="py-2">The Authentication method is basic authentication <a
                  href="https://en.wikipedia.org/wiki/Basic_access_authentication" class="text-blue-600">link for
                  explanation</a></p>
            </div>

          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] bg-[#272822] h-auto rounded-md">

          </div>
        </div>


        <div class="xl:flex rounded-md">
          <!-- Left Panel -->
          <div class="xl:w-[50%] mt-5">
            <div class="mb-6 mt-5">
              <div class="flex items-center gap-2 mb-2">
                <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                <h1 class="text-lg font-semibold text-gray-900">Pull DLR using json</h1>
              </div>
              <Murkdown :rawCode="link" />
            </div>

            <div class="mb-8 mt-10">
              <DocTable :columns="columns" :plans="params" />
            </div>

            <div class="mt-6">
              <p class="font-semibold mb-2">An explanation of the return parameters:</p>
              <ul class="list-disc list-inside text-sm space-y-1">
                <li><strong>PhoneNumber</strong> – The number of the recipient.</li>
                <li><strong>Network</strong> – The network of the recipient.</li>
                <li><strong>Status</strong> – The status of the message:
                  <ul class="list-disc list-inside ml-4">
                    <li>(2) – Delivered.</li>
                    <li>(-2) – Not delivered.</li>
                    <li>(-4) – Blocked by meserGO.</li>
                    <li>(6) – Clicked.</li>
                    <li>(-107) – Convert to IVR.</li>
                  </ul>
                </li>
                <li><strong>StatusDescription</strong> – If not delivered, contains the reason.</li>
                <li><strong>ProjectId</strong> – The project ID of the user who sent the message.</li>
                <li><strong>CustomerMessageId</strong> – The client message ID.</li>
                <li><strong>CustomerParam</strong> – The client parameter.</li>
                <li><strong>SenderNumber</strong> – The ID of the sender who sent the message.</li>
                <li><strong>SegmentsNumber</strong> – The amount of segments in the message.</li>
                <li><strong>SentMessage</strong> – The content of the sent message.</li>
                <li><strong>InsertDate</strong> – Time of receiving the notification from the cellular operator.</li>
              </ul>
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
              <DocCode language="json" :rawCode="smsAdvanceBody" />
            </div>

          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="https://capi.mesergo.co.il/api/v2/PullData"
              language="json" borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="curlExampleRaw" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
              borderStyle="border-b border-gray-700" :rawCode="jsonResponse" :headerBtn="true" :headers="headers" />
          </div>



        </div>

        <div class="xl:flex mt-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] border-b border-gray-300 pb-10">
            <div class="border-b border-gray-300 pb-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Pull option using xml</h1>
              <p class="pb-2">For Pull Delivery Notification using xml click on the link and see Pages 14-15</p>
              <a href="https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf"
                class="text-blue-600">https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf</a>
            </div>

            <div class="border-b border-gray-300 pb-10 mt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Push option using xml</h1>
              <p class="pb-2">For Push Delivery Notification using xml click on the link and see Pages 13</p>
              <a href="https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf"
                class="text-blue-600">https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf</a>
            </div>

            <div class="mt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Push option using json</h1>
              <p class="pb-2">The client can receive confirmation on delivery on each message sent. When sending the
                message the
                client should use the CustomerMessageID and the DeliveryNotificationUrl parameters. The system
                performs an HTTP Post request to this URL regarding any message.</p>
              <p class="pb-2">To configure push DLR in json format, contact the support department.</p>
              <p class="pt-2">Data exmaple :</p>

              <DocCode language="json" :rawCode="dataExample" />

              <div class="mt-6">
                <p class="font-semibold mb-2">An explanation of the return parameters:</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                  <li><strong>mesergold</strong> – The Id of the message in meserGO system.</li>
                  <li><strong>PhoneNumber</strong> – The number of the recipient.</li>
                  <li><strong>Network</strong> – The network of the recipient.</li>
                  <li><strong>Status</strong> – The status of the message:
                    <ul class="list-disc list-inside ml-4">
                      <li>(2) – Delivered.</li>
                      <li>(-2) – Not delivered.</li>
                      <li>(-4) – Blocked by meserGO.</li>
                      <li>(4) – Read</li>
                      <li>(6) – Clicked.</li>
                    </ul>
                  </li>
                  <li><strong>StatusDescription</strong> – If not delivered, contains the reason.</li>
                  <li><strong>ProjectId</strong> – The project ID Below describes the user who sent the message.</li>
                  <li><strong>CustomerMessageId</strong> – The client message ID.</li>
                  <li><strong>CustomerParam</strong> – The client parameter.</li>
                  <li><strong>SenderNumber</strong> – The ID of the sender who sent the message.</li>
                  <li><strong>SegmentsNumber</strong> – The amount of segments in the message (See "Message character
                    length").</li>
                  <li><strong>OrginalMessage</strong> – The content of the sent message.</li>
                  <li><strong>InsertDate</strong> – Time of receiving the notification from the cellular operator.</li>
                </ul>
                <p class="mt-5 text-sm">*The parameters that not in the explanaton is unrellevant .</p>
              </div>
            </div>

          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] bg-[#272822] h-auto rounded-md">

          </div>
        </div>


        <div class="xl:flex mt-5 space-x-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] ">
            <div class="border-b border-gray-300 ">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Receiving SMS</h1>
            </div>

            <div class="border-b border-gray-300 pb-10 mt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Pull option using json</h1>
              <p class="pb-2">The Authentication method is basic authentication <a class="text-blue-600"
                  href="https://en.wikipedia.org/wiki/Basic_access_authentication">link for explanation.</a></p>
              <p class="pb-2">NOTE: Once pulled, the Messages are removed from our system queue, you can allways see all
                incoming message in system reports.</p>
              <p>In order to activate this option, refer to the support department which will enable it for you.</p>
            </div>

            <div class="mt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Pull Receiving SMS using json</h1>
              <Murkdown :rawCode="recivelink" />

              <div class="mb-8 mt-10">
                <DocTable :columns="columns" :plans="pullReceiving" />
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
                <DocCode language="json" :rawCode="pullBody" />
              </div>

            </div>

          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] bg-[#272822] h-auto rounded-md">
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="https://capi.mesergo.co.il/api/v2/PullData"
              language="json" borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="receivingRequest" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
              borderStyle="border-b border-gray-700" :rawCode="receivingResponse" :headerBtn="true"
              :headers="headers" />
          </div>
        </div>

        <div class="xl:flex mt-5 space-x-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] border-b border-gray-300 pb-10">
            <div class="mt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Push Option using json</h1>
              <p class="pb-2">In this option you have to provide a URL</p>
              <p class="pb-2">To our support department.</p>
              <p class="pb-2">The support department will set up to send a post request on every incoming WhatsApp
                message</p>
              <p class="pt-2">JSON Example :</p>

              <DocCode language="json" :rawCode="pushOption" />

              <div class="mt-6">
                <p class="font-semibold mb-2">An explanation of the return parameters:</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                  <li><strong>Chanel</strong> – The source of the message</li>
                  <li><strong>CustomerId</strong> – Customer ID in our system.</li>
                  <li><strong>ProjectId</strong> – Project ID in our system.</li>
                  <li><strong>PhoneNumber</strong> – The phone number of the message.</li>
                  <li><strong>Keyword</strong> – First word in the message.</li>
                  <li><strong>Message</strong> – The message incoming message.</li>
                  <li><strong>Network</strong> – The source network</li>
                  <li><strong>ShortCode</strong> – Phone number to which the incoming message was sent.</li>
                  <li><strong>ApplicationId</strong> – Application ID in our system.</li>
                  <li><strong>CustomerParam</strong> – Not in use</li>
                  <li><strong>MoSessionId</strong> – Not in use</li>
                </ul>
              </div>
            </div>

            <div class="mt-10 border-t border-gray-300 pt-5">
              <h2 class="text-lg font-semibold text-gray-900 pb-5">Pull option using xml</h2>
              <p class="pb-2">For Pull Receiving SMS using xml click on the link and see Pages 17-18</p>
              <a class="text-blue-600"
                href="https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf">https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf</a>
            </div>

            <div class="mt-10 border-t border-gray-300 pt-5">
              <h2 class="text-lg font-semibold text-gray-900 pb-5">Push option using xml</h2>
              <p class="pb-2">For Push Receiving SMS using xml click on the link and see Pages 16</p>
              <a class="text-blue-600"
                href="https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf">https://www.mesergo.co.il/wp-content/uploads/2020/12/SMS_API-6.1.pdf</a>
            </div>

          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] bg-[#272822] h-auto rounded-md">

          </div>
        </div>

        <div class="xl:flex rounded-md space-x-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] mt-5">
             <div class="mt-10 border-b border-gray-300 pt-5">
              <h2 class="text-lg font-semibold text-gray-900 pb-5">Delete Future Messages</h2>
            </div>
            <div class="mb-6 mt-5">
              <div class="flex items-center gap-2 mb-2">
                <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                <h1 class="text-lg font-semibold text-gray-900">Pull DLR using json</h1>
              </div>
              <Murkdown :rawCode="deletelink" />
              <p class="mt-3">This function deletes future messages by phone number or customer parameter or customer message id.
One of these fields must contain a value, the condition is AND, so if the request contains 2 or 3 parameters, so the message will be deleted only if when you send the message you provided same values in this parameters.</p>
            </div>

            <div class="mb-8 mt-10">
              <DocTable :columns="columns" :plans="deleteFutureMessages" />
            </div>

            <div class="mt-6">
              <p>*A single phone can also be deleted by sending the SMS message to many recipients at the same time, but in this case the quota will not be refunded.</p>
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
              <DocCode language="json" :rawCode="deleteBody" />
            </div>

          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Delete Future Messages SMS"
              language="json" borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="deleteExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
              borderStyle="border-b border-gray-700" :rawCode="deleteResponse" :headerBtn="true" :headers="deleteHeaders" />
          </div>
        </div>

        <CheckIfSenderAllowed />
        <WhitelistSender />
        <AuthenticateOtp />
        <Reports />
        <GetUnsubscribeLink />
        <OTPInterface />

      </div>
    </div>
  </AppLayout>
</template>
