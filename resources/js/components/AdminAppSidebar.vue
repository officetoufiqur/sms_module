<script setup lang="ts">
import NavMain from '@/components/NavMain.vue';
import { Sidebar, SidebarContent, } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link } from '@inertiajs/vue3';
import { Contact2Icon, FilePenLine, FlagTriangleRight, InfoIcon, LayoutGrid, ListTodo, MessageCircleQuestion, SendIcon, Users2 } from 'lucide-vue-next';


const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
        icon: LayoutGrid,
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
    // {
    //     title: 'ClientSays',
    //     href: '/admin/client-says',
    //     icon: HeartHandshake,
    // },
    
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
