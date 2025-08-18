<script setup lang="ts">
import AppContent from '@/components/AppContent.vue';
import AppShell from '@/components/AppShell.vue';
import AdminAppSidebar from '@/components/AdminAppSidebar.vue';
import type { BreadcrumbItemType } from '@/types';
import AdminAppSidebarHeaderCopy from '@/components/AdminAppSidebarHeader copy.vue';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppShell variant="sidebar">
        <AdminAppSidebar />
        <AppContent variant="sidebar">
            <AdminAppSidebarHeaderCopy :breadcrumbs="breadcrumbs" />
            <slot />
        </AppContent>
    </AppShell>
</template>
