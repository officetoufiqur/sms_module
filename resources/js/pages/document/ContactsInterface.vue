<!-- File: pages/YourPage.vue -->
<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import DocTable from '@/components/my-components/DocTable.vue';
import CreateContact from '@/components/my-components/CreateContact.vue';
import CheckStatusToken from '@/components/my-components/CheckStatusToken.vue';
import DeleteContact from '@/components/my-components/DeleteContact.vue';
import GetContact from '@/components/my-components/GetContact.vue';
import GetContactList from '@/components/my-components/GetContactList.vue';
import CreateUpdateGroup from '@/components/my-components/CreateUpdateGroup.vue';
import DeleteGroup from '@/components/my-components/DeleteGroup.vue';
import GetGroup from '@/components/my-components/GetGroup.vue';
import GetGroupList from '@/components/my-components/GetGroupList.vue';
import Unsubscribe from '@/components/my-components/Unsubscribe.vue';
import ReactivateUnsubscribe from '@/components/my-components/ReactivateUnsubscribe.vue';
import GetUnsubscribeList from '@/components/my-components/GetUnsubscribeList.vue';
import GetUnsubscribeHistory from '@/components/my-components/GetUnsubscribeHistory.vue';
import GetUnsubscribeHistoryList from '@/components/my-components/GetUnsubscribeHistoryList.vue';
import CheckifUnsubscribed from '@/components/my-components/CheckifUnsubscribed.vue';
import GetFields from '@/components/my-components/GetFields.vue';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'SMS Document', href: '/rate-plan' },
];

const columns = [
  { key: 'http_code', label: 'Http Code' },
  { key: 'status_code', label: 'Status Code' },
  { key: 'status_description', label: 'Status Description' },
];

const data = [
  {
    id: 1,
    http_code: '200',
    status_code: '1',
    status_description: 'OK',
  },
  {
    id: 2,
    http_code: '401',
    status_code: '-1',
    status_description: 'General failure',
  },
  {
    id: 3,
    http_code: '401',
    status_code: '-2',
    status_description: 'Authentication failed or illegal IP address',
  },
  {
    id: 4,
    http_code: '403',
    status_code: '-221',
    status_description: 'User Not Active',
  },
  {
    id: 5,
    http_code: '403',
    status_code: '-222',
    status_description: 'Locked Out',
  },
  {
    id: 6,
    http_code: '403',
    status_code: '-2010',
    status_description: 'Max records for this method is 100',
  },
  {
    id: 7,
    http_code: '403',
    status_code: '-2011',
    status_description: 'Max records for this method is 5000',
  },
  {
    id: 8,
    http_code: '403',
    status_code: '-2014',
    status_description: 'RequestToken not found',
  },
  {
    id: 9,
    http_code: '403',
    status_code: '-2015',
    status_description: 'Job in progress',
  },
];






</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">

    <Head title="SMS Document" />

    <div class="mt-20 xl:ml-14 mx-10 lg:mx-0 max-w-[95.55rem]">
      <!-- symple example -->
      <div class="pb-10">
        <div class="xl:flex rounded-md space-x-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] mt-5">
            <div class="border-b border-gray-300 pb-5 mt-5">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Contacts Interface</h1>
              <p class="pb-2">All functions in this document works in the same way.</p>
              <p class="pb-2">The URL contains version and function names.</p>
              <p class="pb-2">The authentication can be transmitted in the header in Base64, it can also be transmitted
                in the Body.</p>
              <p class="pb-2">The Body contains the JOSN data</p>
            </div>

            <div class="border-b border-gray-300 pb-5 mt-5">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Response Status Codes</h1>
              <p class="pb-2">In response to your request you will receive an Http code, as well as a StatusId & Status
                Description.</p>
              <p class="pb-2">Note: the Status Description may change from time to time, hence we do not recommend
                basing logic on it, only on StatusId or Http code.</p>

              <DocTable :columns="columns" :plans="data" />
            </div>
          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] mt-10 bg-[#272822] h-auto rounded-md">
          </div>



        </div>

      </div>

      <div class="space-y-5">
        <CreateContact />
        <CheckStatusToken />
        <DeleteContact />
        <GetContact />
        <GetContactList />
        <CreateUpdateGroup />
        <DeleteGroup />
        <GetGroup />
        <GetGroupList />
        <Unsubscribe />
        <ReactivateUnsubscribe />
        <GetUnsubscribeList />
        <GetUnsubscribeHistory />
        <GetUnsubscribeHistoryList />
        <CheckifUnsubscribed />
        <GetFields />
      </div>

    </div>
  </AppLayout>
</template>
