<script setup>

</script>

<template>
    <div v-if="$page.props.flash.success" class="fixed-bottom-4 right-4 flex items-center text-white rounded px-8 py-4 bg-green-500">
        {{ $page.props.flash.success }}
    </div>
</template>