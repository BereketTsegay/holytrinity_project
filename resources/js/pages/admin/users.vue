<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
// import PlaceholderPattern from '../../components/PlaceholderPattern.vue';
import AdminLayout from '@/layouts/AdminLayout.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Admin Users',
        href: '/admin/users',
    },
];
</script>

<template>
    <Head title="Admin Users" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <AdminLayout title="Admin Users">
            Users things goes here
        </AdminLayout>
    </AppLayout>
</template>
