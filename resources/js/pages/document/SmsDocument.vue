<!-- File: pages/YourPage.vue -->
<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import DocTable2 from '@/components/my-components/DocTable2.vue';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'SMS API Document', href: '/send/sms/document' },
];

const columns = [
  { key: 'parameters', label: 'Parameters' },
  { key: 'description', label: 'Description' },
  { key: 'required', label: 'Required' },
  { key: 'urlencoded', label: 'urlencoded' },
];

const data = [
  {
    id: 1,
    parameters: 'ApiKey',
    description: 'Your ApiKey',
    required: 'Yes',
    urlencoded: 'No',
  },
  {
    id: 2,
    parameters: 'SenderID',
    description: '*************',
    required: 'Yes',
    urlencoded: 'Yes',
  },
  {
    id: 3,
    parameters: 'number',
    description: `Single: 8801XXXXXXXXX\n\nMultiple: 8801XXXXXXXXX,8801XXXXXXXXX,8801XXXXXXXXX`,
    required: 'Yes',
    urlencoded: 'Yes',
  },
  {
    id: 4,
    parameters: 'message',
    description: 'hello world',
    required: 'Yes',
    urlencoded: 'Yes',
  }
]
</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">

    <Head title="SMS Document" />

    <div class="mt-15 xl:ml-14 mx-10 lg:mx-0  max-w-[90rem]">
      <!-- Header Section -->
      <header>
        <div class="border-b border-gray-300 pb-5">
          <h1 class="text-xl font-semibold">Send SMS API Documentation</h1>
          <p class="mt-2">Integrate SMS functionality with ease using this API.</p>
        </div>
      </header>

      <!-- Main Section -->
      <div class="container mx-auto my-12 px-4 space-y-10">
        <!-- Overview -->
        <section class="">
          <h2 class="text-xl font-semibold mb-2">Overview</h2>
          <p class="text-gray-700">
            This API allows users to send SMS messages to specified phone numbers. The request must include valid
            credentials, message details, and the phone numbers of recipients. The system supports both immediate
            and queued SMS sending based on the number of recipients.
          </p>
        </section>

        <!-- Endpoint Section -->
        <section>
          <h2 class="text-xl font-semibold mb-2">Endpoint</h2>
          <div class="text-gray-700">
            <p><strong>Method:</strong> POST / GET</p>
            <p class="py-2"><strong>URL: </strong>https://yourdomain.com/api/send-sms</p>
            <p><strong>Example:</strong></p>
            <pre class="bg-gray-100 pt-5 px-8 rounded mt-2">
https://yourdomain.com/api/send-sms?ApiKey={YourApiKey}&SenderID={YourSenderID}&number=8801XXXXXXXXXX&sms=test
              </pre>
          </div>
        </section>

        <!-- Parameters Section -->
        <section>
          <h2 class="text-xl font-semibold mb-4">Request Parameters</h2>
          <div class="mb-8 mt-1">
            <DocTable2 :columns="columns" :plans="data">
              <template #description="{ item }">
                <span v-for="(line, idx) in item.description.split('\n').filter((l: string) => l.trim() !== '')"
                  :key="idx">
                  {{ line }}<br
                    v-if="idx < item.description.split('\n').filter((l: string) => l.trim() !== '').length - 1" />
                </span>
              </template>
            </DocTable2>
          </div>
        </section>

        <!-- Response Section -->
        <section>
          <h2 class="text-xl font-semibold mb-4">Response</h2>

          <h3 class="text-lg font-semibold text-gray-800">Success Response</h3>
          <pre class="bg-gray-100 p-4 rounded mt-2">
    {
    "success": true,
    "message": "SMS sent successfully!",
    "total_cost": 15.00,
    "segments": 1,
    "numbers_count": 1
    }
  </pre>

          <h3 class="text-xl font-semibold text-gray-800 mt-6">Error Responses</h3>
          <h4 class="font-semibold text-gray-700">User Authentication Failed</h4>
          <pre class="bg-gray-100 p-4 rounded mt-2">
    {
    "success": false,
    "message": "Invalid user key."
    }
  </pre>

          <h4 class="font-semibold text-gray-700 mt-4">Insufficient Funds</h4>
          <pre class="bg-gray-100 p-4 rounded mt-2">
    {
    "success": false,
    "message": "Insufficient amount"
    }
  </pre>

          <h4 class="font-semibold text-gray-700 mt-4">Internal Server Error</h4>
          <pre class="bg-gray-100 p-4 rounded mt-2">
    {
    "success": false,
    "message": "Something went wrong, please try again.",
    "error": `error_message`
    }
  </pre>
        </section>

        <!-- Authentication Section -->
        <section>
          <h2 class="text-xl font-semibold mb-2">Authentication</h2>
          <p class="text-gray-700">
            To use the API, a valid `ApiKey` and `SenderID` are required. The `user_key` provided must also match
            the associated user's key.
          </p>
        </section>

        <!-- Cost Calculation Section -->
        <section>
          <h2 class="text-xl font-semibold mb-2">Cost Calculation</h2>
          <p class="text-gray-700">
            The cost for sending SMS is calculated based on the message length (number of segments) and the rate
            assigned to the sender (either `musking` or `non_musking`). The total cost is computed as:
          </p>
          <pre class="bg-gray-100 pt-4 rounded mt-3">
    TotalCost = Rate * CountOfRecipients * Segments
  </pre>
        </section>

        <!-- SMS Sending Flow Section -->
        <section>
          <h2 class="text-xl font-semibold mb-2">SMS Sending Flow</h2>
          <ol class="list-decimal pl-5 text-gray-700">
            <li>Validate the Request: The request parameters `sender_id`, `number`, and `sms` are validated.</li>
            <li>Check User Authentication: Ensure the `user_key` matches the sender’s associated user.</li>
            <li>Cost Calculation: Calculate the cost based on the rate for the sender type (`musking` or `non_musking`).
            </li>
            <li>Message Processing:
              <ul class="list-inside">
                <li>If the number of recipients is less than or equal to 5, the messages are sent immediately.</li>
                <li>If more than 5 recipients, the messages are queued for later sending.</li>
              </ul>
            </li>
            <li>Deduct Amount: The total cost is deducted from the user’s balance.</li>
          </ol>
        </section>
      </div>
    </div>
  </AppLayout>
</template>
