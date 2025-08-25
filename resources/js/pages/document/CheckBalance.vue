<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import DocTable2 from '@/components/my-components/DocTable2.vue';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'Check Balance API Document', href: '/check/balance/document' },
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
    parameters: 'user_key',
    description: 'The unique user identifier key.',
    required: 'Yes',
    urlencoded: 'No',
  },
];

const success = `
{
  "success": true,
  "message": "Balance fetched successfully.",
  "balance": "100.00"
}`;

const failed = `
{
  "success": false,
  "message": "Invalid user key."
}`;

const error = `
{
  "success": false,
  "message": "Something went wrong, please try again.",
  "error": "error_message"
}`

</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">

    <Head title="Check Balance Document" />

    <div class="mt-15 xl:ml-14 mx-10 lg:mx-0 max-w-[90rem]">
      <!-- Header Section -->
      <header>
        <div class="border-b border-gray-300 pb-5">
          <h1 class="text-xl font-semibold">Check Balance API Documentation</h1>
          <p class="mt-2">This API allows you to check the current balance of a user.</p>
        </div>
      </header>

      <!-- Main Section -->
      <div class="container mx-auto my-12 px-4 space-y-10">
        <!-- Overview -->
        <section>
          <h2 class="text-xl font-semibold mb-2">Overview</h2>
          <p class="text-gray-700">
            This API allows you to retrieve the balance of a user. The request requires a valid `user_key`. 
            Upon successful validation, the balance of the user will be returned.
          </p>
        </section>

        <!-- Endpoint Section -->
        <section>
          <h2 class="text-xl font-semibold mb-2">Endpoint</h2>
          <div class="text-gray-700">
            <p><strong>Method:</strong> GET / POST</p>
            <p class="py-2"><strong>URL: </strong>https://yourdomain.com/api/check-balance</p>
            <p><strong>Example:</strong></p>
            <pre class="bg-gray-100 pt-5 px-8 rounded mt-2">
https://yourdomain.com/api/check-balance?user_key={YourUserKey}
            </pre>
          </div>
        </section>

        <!-- Parameters Section -->
        <section>
          <h2 class="text-xl font-semibold mb-4">Request Parameters</h2>
          <div class="mb-8 mt-1">
            <DocTable2 :columns="columns" :plans="data" />
          </div>
        </section>

        <!-- Response Section -->
        <section>
          <h2 class="text-xl font-semibold mb-4">Response</h2>

          <h3 class="text-lg font-semibold text-gray-800">Success Response</h3>
          <pre class="bg-gray-100 p-4 rounded mt-2 pl-10">
            {{ success }}
          </pre>

          <h3 class="text-xl font-semibold text-gray-800 mt-6">Error Responses</h3>
          <h4 class="font-semibold text-gray-700">User Authentication Failed</h4>
          <pre class="bg-gray-100 p-4 rounded mt-2 pl-10">
            {{ failed }}
          </pre>

          <h4 class="font-semibold text-gray-700 mt-4">Internal Server Error</h4>
          <pre class="bg-gray-100 p-4 rounded mt-2 pl-10">
            {{ error }}
          </pre>
        </section>

        <!-- Authentication Section -->
        <section>
          <h2 class="text-xl font-semibold mb-2">Authentication</h2>
          <p class="text-gray-700">
            To use the API, a valid `user_key` is required to authenticate the user. If the key is invalid, 
            the request will return an error.
          </p>
        </section>

        <!-- Check Balance Flow Section -->
        <section>
          <h2 class="text-xl font-semibold mb-2">Check Balance Flow</h2>
          <ol class="list-decimal pl-5 text-gray-700">
            <li>Validate the Request: Ensure the `user_key` is valid.</li>
            <li>Retrieve User Balance: Fetch the balance associated with the `user_key`.</li>
            <li>Return Response: The balance is returned in the response if valid; otherwise, an error is returned.</li>
          </ol>
        </section>
      </div>
    </div>
  </AppLayout>
</template>
