<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import EditBtn from '@/OwnComponents/EditBtn.vue';
import DeleteBtn from '@/OwnComponents/DeleteBtn.vue';
import SimplePagination from '@/OwnComponents/SimplePagination.vue';
import AppTable from '@/OwnComponents/Table.vue';

const props = defineProps({
    categories: Object,
});

const headers = [
    { name: "Name" },
    { name: "Slug" },
    {
        name: "Actions",
        class: "text-right"
    }
];

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <AppTable :headers="headers">
                        <tr v-for="category in categories.data" :key="category.id">
                            <td>{{ category.name }}</td>
                            <td>{{ category.slug }}</td>
                            <td>
                                <div class="flex items-center justify-end space-x-2">
                                    <EditBtn :url="route('categories.edit', { category: category.id })"></EditBtn>

                                    <DeleteBtn :url="route('categories.destroy', { category: category.id })"
                                        module-name="category"></DeleteBtn>
                                </div>
                            </td>
                        </tr>
                    </AppTable>

                    <!-- <table>
                        <thead>
                            <tr>
                                <th class="text-left">Name</th>
                                <th class="text-left">Slug</th>
                                <th class="text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="category in categories.data" :key="category.id">
                                <td>{{category.name}}</td>
                                <td>{{category.slug}}</td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <EditBtn :url="route('categories.edit',{category: category.id})"></EditBtn>

                                        <DeleteBtn :url="route('categories.destroy',{category: category.id})" module-name="category"></DeleteBtn>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table> -->

                    <div class="mt-10">

                        <SimplePagination :prevUrl="categories.links.prev" :nextUrl="categories.links.next">
                        </SimplePagination>
                    </div>
                </div>
            </div>
        </div>
</AppLayout></template>
