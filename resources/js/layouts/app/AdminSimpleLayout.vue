<script setup lang="ts">
import NavMain from '@/components/NavMain.vue';
import Sidebar from '@/components/ui/sidebar/Sidebar.vue';
import SidebarContent from '@/components/ui/sidebar/SidebarContent.vue';
import { NavItem } from '@/types';
import { Component, HandCoins, LayoutGrid, Split, SquareUserRound } from 'lucide-vue-next';


// import AppLogoIcon from '@/components/AppLogoIcon.vue';
// import { Link } from '@inertiajs/vue3';

defineProps<{
    title?: string;
    description?: string;
  
}>();


const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: '/admin/dashboard',
        icon: LayoutGrid,
    },
    {
        title: 'Roles',
        href: '/admin/roles',
        icon: Split,
    },
    {
        title: 'Permissions',
        href: '/admin/permissions',
        icon: HandCoins,
    },
    {
        title: 'Users',
        href: '/admin/users',
        icon: SquareUserRound,
    },
    {
        title: 'Departments',
        href: '/admin/department',
        icon: Component,
    },
    
    
];
</script>

<template>
    <div class="flex min-h-svh flex-col gap-6 bg-background p-6 md:p-10">
        <div class="w-full max-w-sm">
            <div class="grid grid-cols-5  gap-4">
                <div class="col-span-4 ">
                    <slot/>
                </div>
                <div class="col-start-5">
                    <Sidebar side="right">
                        <SidebarContent>
                            <NavMain :items="mainNavItems" -label-group="Admin Links" />
                        </SidebarContent>
                    </Sidebar>
                </div>
            </div>
        </div>
    </div>
</template>
