<script setup lang="ts">
import AdminSimpleLayout from '@/layouts/app/AdminSimpleLayout.vue';

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <AdminSimpleLayout :title="title">
        <slot />
    </AdminSimpleLayout>
</template>
