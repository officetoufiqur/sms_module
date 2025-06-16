<script setup lang="ts">
import NavMain from '@/components/NavMain.vue';
import { Sidebar, SidebarContent, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { LayoutGrid, Cable, ChartArea, MessageCircle, Phone, History, ArrowRightLeft, File, GroupIcon } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Balance Recharge',
        href: '/recharge',
        icon: Cable,
    },
    {
        title: 'Transections',
        href: '/transections',
        icon: ArrowRightLeft,
    },
    {
        title: 'Plan Rate',
        href: '/rate-plan',
        icon: ChartArea,
    },
    {
        title: 'Group',
        href: '/group',
        icon: GroupIcon,
    },
    {
        title: 'Send Sms',
        href: '/send-sms',
        icon: MessageCircle,
    },
    {
        title: 'Send SMS From File',
        href: '/send-sms-file',
        icon: File,
    },
    {
        title: 'Sender Id',
        href: '/sender_id',
        icon: Phone,
    },
    {
        title: 'SMS Logs',
        href: '/sms_logs',
        icon: History,
    },
];

</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                        <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

    </Sidebar>
    <slot />
</template>
