<!-- File: pages/YourPage.vue -->
<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import AppLayout from '@/layouts/AppLayout.vue';
import DocCode from '@/components/my-components/DocCode.vue';
import { type BreadcrumbItem } from '@/types';
import Quota from '@/components/my-components/Quota.vue';
import CreateQuota from '@/components/my-components/CreateQuota.vue';

const breadcrumbs: BreadcrumbItem[] = [
  { title: 'SMS Document', href: '/rate-plan' },
];




const C = `
string username = "Your username";
string token = "Your token";
string svcCredentials = Convert.ToBase64String(ASCIIEncoding.ASCII.GetBytes(username + ":" + token));
request.Headers.Add("Authorization", "Basic " + svcCredentials);
`;

const PHP = `
$mesergo_username = "Your username";
$mesergo_apitoken = "Your token";
$ch = curl_init();
curl_setopt($ch, CURLOPT_USERPWD, $mesergo_username.":".$mesergo_apitoken);
`;

const CURL = `
curl https://capi.mesergo.co.il/api/v2/PullData
   -u "USER:TOKEN"
`;


</script>

<template>
  <AppLayout :breadcrumbs="breadcrumbs">

    <Head title="SMS Document" />

    <div class="mt-20 xl:ml-14 mx-10 lg:mx-0 max-w-[94.3rem]">
      <!-- symple example -->
      <div class="pb-10">
        <div class="xl:flex space-x-5">
          <!-- Left Panel -->
          <div class="xl:w-[50%] border-b border-gray-300 pb-10">
            <div class="border-b border-gray-300 pb-10">
              <h1 class="text-2xl font-semibold text-gray-900">Doc General</h1>
            </div>
            <div class="pt-10">
              <h1 class="text-2xl font-semibold text-gray-900 pb-5">Basic Auth</h1>
              <p class="pb-2">There example for basic Authorization syntax by Programming languages.</p>
            </div>

            <div class="relative">
              <p class="absolute top-7 font-semibold">C#</p>
              <DocCode language="json" :rawCode="C" />
            </div>

             <div class="relative">
              <p class="absolute top-7 font-semibold">PHP</p>
              <DocCode language="json" :rawCode="PHP" />
            </div>

             <div class="relative">
              <p class="absolute top-7 font-semibold">CURL</p>
              <DocCode language="json" :rawCode="CURL" />
            </div>

          </div>

          <!-- Right Panel -->
          <div class="xl:w-[50%] bg-[#272822] h-auto rounded-md">

          </div>
        </div>

      </div>

      <Quota />
      <CreateQuota />
    </div>
  </AppLayout>
</template>
