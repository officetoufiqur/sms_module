<script setup lang="ts">
import NavMain from '@/components/NavMain.vue';
import { Sidebar, SidebarContent, SidebarHeader, SidebarMenu, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { LayoutGrid, Cable, ChartArea, MessageCircle, Phone, ArrowRightLeft, GroupIcon, UserRoundXIcon, FolderClosedIcon } from 'lucide-vue-next';


const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Document',
        icon: FolderClosedIcon,
        subMenu: [
            {
                title: 'Developers',
                subMenu: [
                    {
                        title: 'API Documentation',
                        href: '/send/sms/document',
                    },
                    {
                        title: 'Check Balance',
                        href: '/check/balance',
                    }
                ]
            },
            {
                title: 'Send SMS',
                subMenu: [
                    {
                        title: 'Send SMS using json',
                        href: '/send/sms/using/json',
                    },
                    {
                        title: 'Send SMS using xml',
                        href: '/send/sms/using/xml',
                    },
                    {
                        title: 'Utilities',
                        href: '/utilities',
                    },
                ]
            },
            {
                title: 'General',
                href: '/doc/general',
            },
            {
                title: 'Contacts Interface',
                href: '/doc/contacts/interface',
            }
        ]
    },
    {
        title: 'SMS',
        icon: MessageCircle,
        subMenu: [
            {
                title: 'Send Sms',
                href: '/send-sms',
            },
            {
                title: 'Send SMS From File',
                href: '/send-sms-file'
            },
            {
                title: 'SMS Logs',
                href: '/sms_logs'
            },
        ]
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
        title: 'Block User',
        href: '/block_user',
        icon: UserRoundXIcon,
    },
    {
        title: 'Group',
        href: '/group',
        icon: GroupIcon,
    },

    {
        title: 'Sender Id',
        href: '/sender-id',
        icon: Phone,
    },
];

</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <div class="mt-1">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <Link :href="route('dashboard')">
                        <div class="flex gap-2">
                            <div class="flex ml-3 aspect-square size-10 items-center justify-center rounded-md">
                                <img class="w-14" src="/assets/img/favicon.png" alt="icon">
                            </div>
                            <div class="ml-1 grid flex-1 text-left text-sm mt-1.5">
                                <img class="w-32" src="/assets/img/brand.png" alt="">
                            </div>
                        </div>
                        </Link>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>
        </div>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

        <!-- <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter> -->
    </Sidebar>
    <slot />
</template>