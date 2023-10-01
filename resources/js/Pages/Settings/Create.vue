<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import UpdateHeroData from './UpdateHeroData.vue';

defineProps({
    settings: Object,
});
</script>

<template>
    <AppLayout title="Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Settings
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdateHeroData :settings="settings"></UpdateHeroData>
            </div>
        </div>
    </AppLayout>
</template>
