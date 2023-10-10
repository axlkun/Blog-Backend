<script setup>
const props = defineProps({
    headers: {
        type: Array,
        required: true
    }
});
</script>

<template>
    <table>
        <thead>
            <tr>
                <th v-for="(header,index) in headers" :key="`header-${index}`" :class="header.class || 'text-left'">{{header.name}}</th>
            </tr>
        </thead>
        <tbody>
            <slot></slot>
        </tbody>
    </table>
</template>