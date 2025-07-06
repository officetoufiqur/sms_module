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

const parameters = [
  {
    id: 1,
    parameters: 'FirstName',
    required: 'Optional',
    type: 'string',
    value: 'The first name of the contact'
  },
  {
    id: 2,
    parameters: 'LastName',
    required: 'Optional',
    type: 'string',
    value: 'The last name of the contact'
  },
  {
    id: 3,
    parameters: 'PhoneNumber',
    required: 'Required',
    type: 'string',
    value: 'The phone number of the contact'
  },
  {
    id: 4,
    parameters: 'Email',
    required: 'Required',
    type: 'string',
    value: 'The email of the contact'
  },
  {
    id: 5,
    parameters: 'ContactRefId',
    required: 'Optional',
    type: 'string',
    value: "The Contact's unique ID in the calling system"
  },
  {
    id: 6,
    parameters: 'FirebaseToken',
    required: 'Optional',
    type: 'string',
    value: 'Use for sending notifications to Google devices and Apple. If you send only FirebaseToken without Email or Phone, you should also send ContactRefId.'
  },
  {
    id: 7,
    parameters: 'Platform',
    required: 'Optional',
    type: 'string',
    value: '"ANDROID" / "IOS", If you use FirebaseToken you should also send Platform'
  },
  {
    id: 8,
    parameters: 'Device1StatusId',
    required: 'Optional',
    type: 'int',
    value: 'Use for sending notifications to Google devices and Apple. The parameter can be set to 1 = active, -3 = inactive'
  },
  {
    id: 9,
    parameters: 'GenderId',
    required: 'Optional',
    type: 'int',
    value: '1 = Male, 2 = Female'
  },
  {
    id: 10,
    parameters: 'AddToGroupName',
    required: 'Optional',
    type: 'string',
    value: 'Add to group by name, if the group does not exist it will be created automatically'
  },
  {
    id: 11,
    parameters: 'RemoveFromGroupName',
    required: 'Optional',
    type: 'string',
    value: 'Remove from group by name'
  },
  {
    id: 12,
    parameters: 'RegistrationCampaign',
    required: 'Optional',
    type: 'string',
    value: 'Allows you to record where the contact came from. You can enter a value in the field only when creating a new contact'
  }
];




const whitelistBody = `
{
    "Data": {
        "List": [
            {
                "FirstName": "string",
                "LastName": "string",
                "PhoneNumber": "string",
                "Email": "string",
                "AddToGroupName": "string"
            }
        ]
    }
}
`;

const whitelistExample = `
curl --location 'https://capi.mesergo.co.il/api/v2/Contact/CreateOrUpdateContacts' \
--header 'Content-Type: application/json' \
--header 'Authorization:  Basic USER:TOKEN (Encode Base64)' \
--data-raw '{
"Data": {
"List": [
        {
        "FirstName": "Kurt",
        "LastName": "Cohen",
        "PhoneNumber": "0589995551",
        "Email": "Cohen@test.com ",
        "AddToGroupName": "תמיכה"
        }
      ]
   }
 }'
`;

const whitelistResponse = `
{
  "StatusId": 1,
  "StatusDescription": "Success",
  "DetailedDescription": "",
  "FunctionName": "api/v2/Contact/CreateOrUpdateContacts",
  "RequestId": ",,Abh5mclRnbp5Sdy9mZulmLkV3bsNWPl1WYOR3cvhkJzETQzUyN1E0MlITMrETMtUDMtEjMwITPw1WY0NVZtlGVmQDNyQDNwETPklkclNXV",
  "Data": {
    "UploadToken": "BodyPart_a66bcef1-8b5a-4578-84ed-43bdb0a3402e",
    "Rows": 1,
    "ContactsUpdates": 0,
    "ContactsNew": 0,
    "ContactsExisting": 1,
    "RowsFailed": 0,
    "CountErrors": 0,
    "Errors": []
  }
}
`;

const whitelistHeaders = [
  { key: 'Date', value: 'Tue, 11 May 2021 09:57:13 GMT' },
  { key: 'Server', value: 'Apache' },
  { key: 'Content-Length', value: '254' },
  { key: 'Keep-Alive', value: 'timeout=5, max=100' },
  { key: 'Connection', value: 'Keep-Alive' },
  { key: 'Content-Type', value: 'application/json; charset=utf-8' }
];

const whitelistlink = `https://capi.mesergo.co.il/api/v2/Contact/CreateOrUpdateContacts`;
const advancedLink = `https://capi.mesergo.co.il/api/v2/Contact/CreateOrUpdateContacts?view=json`;

</script>
<template>
    <div class="xl:flex rounded-md space-x-10 border-b border-gray-300">
        <!-- Left Panel -->
        <div class="xl:w-[50%]">
            <div class="mb-6 mt-5">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-orange-100 text-orange-800 px-2 py-1 rounded text-sm font-medium">POST</span>
                    <h1 class=" font-semibold text-gray-900">Create or Update Contact</h1>
                </div>
                <Murkdown :rawCode="whitelistlink" />
                <p class="mt-3">This function creates or updates contacts.</p>
                <p class="mt-3">You can send up to 5000 items per request. (If you send up to 10 items, the response is final,if you send more, for final response use "Check Status Token" function).</p>
                <p class="mt-3">The key for update is Email address, or Phone number, or both.</p>
                <p class="mt-3">Email or Phone is mandatory all other fields are optional.</p>
                <p class="font-semibold my-5">Parameters</p>
              </div>
              
              <div class="mb-8 mt-5">
                <DocTable :columns="columns" :plans="parameters" />
                <p class="pt-5 text-sm">Note: To delete an existing means of contact (email or phone) you need to write "delete" in value.</p>
              </div>
              <div>
              <p class="mt-3">Advanced options</p>
              <Murkdown :rawCode="advancedLink" />
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
        <div class="xl:w-[50%] bg-[#272822] h-auto rounded-md">
            <DocCode class="mt-[-.5rem]" title="Example Request" subtitle="Create Contact" language="json"
                borderStyle="border-b border-gray-700" codeTitle="curl" :rawCode="whitelistExample" />
            <DocCode title="Example Response" subtitle="200 Ok" language="json" codeTitle="json"
                borderStyle="border-b border-gray-700" :rawCode="whitelistResponse" :headerBtn="true"
                :headers="whitelistHeaders" />
        </div>
    </div>

</template>