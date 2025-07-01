<script setup lang="ts">
import NavMain from '@/components/NavMain.vue';
import { Sidebar, SidebarContent } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { LayoutGrid, Cable, ChartArea, MessageCircle, Phone, History, ArrowRightLeft, File, GroupIcon, UserRoundXIcon, FolderClosedIcon } from 'lucide-vue-next';


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
    {
        title: 'Document',
        href: '/document',
        icon: FolderClosedIcon,
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
                        <div class="flex gap-2 my-5">
                            <div class="flex ml-3 aspect-square size-10 items-center justify-center rounded-md">
                                <img class="w-14" src="/assets/img/favicon.png" alt="icon">
                            </div>
                            <div class="grid flex-1 text-left text-sm mt-2.5">
                                <img class="w-40" src="/assets/img/brand.png" alt="">
                            </div>
                        </div>
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
