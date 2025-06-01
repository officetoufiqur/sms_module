<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { SidebarGroup, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem, type SharedData } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';

const props = defineProps<{
  items: NavItem[];
}>();

const page = usePage<SharedData>();
const currentUrl = page.url;

const open = ref<string | null>(null);

function toggle(title: string) {
  open.value = open.value === title ? null : title;
}

function handleClick(item: NavItem) {
  if (item.subItems) {
    toggle(item.title);
  } else {
    window.location.href = item.href;
  }
}

// Fix: use `props.items` and type `sub`
onMounted(() => {
  for (const item of props.items) {
    if (item.subItems?.some((sub: NavItem) => sub.href === currentUrl)) {
      open.value = item.title;
      break;
    }
  }
});
</script>

<template>
  <SidebarGroup class="px-2 py-0">
    <SidebarMenu>
      <SidebarMenuItem v-for="item in props.items" :key="item.title">
        <SidebarMenuButton
          as-child
          :is-active="item.href === currentUrl || item.subItems?.some((sub: NavItem) => sub.href === currentUrl)"
          :tooltip="item.title"
        >
          <div
            @click="handleClick(item)"
            class="flex items-center w-full cursor-pointer px-2 py-2 rounded-md hover:bg-gray-700"
            :class="{
              'bg-blue-600 text-white': item.href === currentUrl || item.subItems?.some((sub: NavItem) => sub.href === currentUrl)
            }"
          >
            <component :is="item.icon" class="mr-2" />
            <span class="flex-1">{{ item.title }}</span>
            <span v-if="item.subItems" class="ml-auto">
              <svg
                :class="{ 'rotate-180': open === item.title }"
                class="w-3 h-3 transition-transform"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
              >
              <path stroke-linecap="round" class="text-gray-600" stroke-width="4" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
              </svg>
            </span>
          </div>
        </SidebarMenuButton>

        <!-- Submenu -->
        <transition name="fade">
          <div
            v-if="item.subItems && open === item.title"
            class="relative ml-4 pl-2 border-gray-600 mt-1 space-y-1"
          >
            <SidebarMenu>
              <SidebarMenuItem v-for="sub in item.subItems" :key="sub.title">
                <SidebarMenuButton
                  as-child
                  :is-active="sub.href === currentUrl"
                  :tooltip="sub.title"
                >
                  <Link
                    :href="sub.href"
                    class="flex items-center w-full px-2 py-2 rounded-md hover:bg-gray-700"
                    :class="{ 'text-white': sub.href === currentUrl }"
                  >
                    <component v-if="sub.icon" :is="sub.icon" class="mr-2" />
                    <span class="pl-3">{{ sub.title }}</span>
                  </Link>
                </SidebarMenuButton>
              </SidebarMenuItem>
            </SidebarMenu>
          </div>
        </transition>
      </SidebarMenuItem>
    </SidebarMenu>
  </SidebarGroup>
</template>

<style scoped>

</style>
