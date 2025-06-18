<script setup lang="ts">
import NavMain from '@/components/NavMain.vue';
import { Sidebar, SidebarContent, } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { Contact2Icon, FilePenLine, FlagTriangleRight, HeartHandshake, InfoIcon, LayoutGrid, ListTodo, MessageCircleQuestion, SendIcon, User2, Users2 } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Create Customer',
        href: '/admin/create/customer',
        icon: User2,
    },
    {
        title: 'Manage Customers',
        href: '/admin/manage/customers',
        icon: Users2,
    },
    {
        title: 'Pending KYC',
        href: '/admin/pending/kyc',
        icon: ListTodo,
    },
    {
        title: 'Banner',
        href: '/admin/banner',
        icon: FlagTriangleRight,
    },
    {
        title: 'About',
        href: '/admin/about',
        icon: InfoIcon,
    },
    {
        title: 'Pricing',
        href: '/admin/pricing',
        icon: SendIcon,
    },
    {
        title: 'Faqs',
        href: '/admin/faqs',
        icon: MessageCircleQuestion,
    },
    {
        title: 'Blog',
        href: '/admin/blog',
        icon: FilePenLine,
    },
    {
        title: 'Contact',
        href: '/admin/contact',
        icon: Contact2Icon,
    },
    {
        title: 'ClientSays',
        href: '/admin/client-says',
        icon: HeartHandshake,
    },
];

</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <!-- <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                        <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader> -->

        <Link :href="route('dashboard')">
            <AppLogo />
        </Link>

        <SidebarContent>
            <NavMain :items="mainNavItems" />
        </SidebarContent>

    </Sidebar>
    <slot />
</template>
